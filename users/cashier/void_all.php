<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include your database connection file
require_once '../../includes/config.php'; 

// Check if reason is present
if (!isset($_POST['reason']) || empty($_POST['reason'])) {
    echo json_encode(['status' => 'error', 'message' => 'Reason is required']);
    exit;
}

// Extract reason from $_POST
$reason = $_POST['reason'];

// Items are required for voiding products
if (!isset($_POST['items']) || empty($_POST['items'])) {
    echo json_encode(['status' => 'error', 'message' => 'No items provided for voiding']);
    exit;
}

$items = json_decode($_POST['items'], true);

// Validate items array
if (!is_array($items) || empty($items)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid items format']);
    exit;
}

try {
    // Get the current date and time for VoidDate/TransactionDate
    $voidDate = date('Y-m-d H:i:s');
    
    // Get the terminal number from the session
    $terminalNo = isset($_SESSION['terminal_no']) ? $_SESSION['terminal_no'] : null;
    
    // Generate a unique TransactionNo
    $transactionNo = 'VOID-' . date('YmdHis') . '-' . rand(1000, 9999);
    $_SESSION['transaction_no'] = $transactionNo; // Store in session for reference
    
    // Get the cashier username
    $cashier = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    
    // Begin transaction
    $conn->begin_transaction();
    
    $voidedItems = 0;
    $errors = [];
    
    // Process each item in the array
    foreach ($items as $item) {
        $barcode = isset($item['Barcode']) ? $item['Barcode'] : null;
        $quantity = isset($item['Quantity']) ? $item['Quantity'] : 0;
        $productName = isset($item['ProductName']) ? $item['ProductName'] : null;
        $srp = isset($item['SRP']) ? $item['SRP'] : 0;
        
        // Skip if barcode is missing
        if (!$barcode) {
            $errors[] = "Missing barcode for item: " . ($productName ?? 'Unknown');
            continue;
        }
        
        // Fetch the product details from tbl_invprodlist
        $productQuery = $conn->prepare("SELECT * FROM tbl_invprodlist WHERE Barcode = ?");
        $productQuery->bind_param("s", $barcode);
        $productQuery->execute();
        $productResult = $productQuery->get_result();
        
        if ($productResult->num_rows > 0) {
            $product = $productResult->fetch_assoc();
            
            // Insert into tbl_voidlist
            $stmt = $conn->prepare("INSERT INTO tbl_voidlist (
                Batch, Barcode, ProductDescription, ProductCode, ProductName,
                Manufacturer, Supplier, Category, Size, Unit,
                ExpirationDate, Quantity, SRP, Gross, Discount,
                Total, Threshold, VoidDate, TransactionNo, InCharge,
                Reference, SINumber
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            // Map data for tbl_voidlist
            $batch = $product['Batch'] ?? null;
            $productDescription = $product['ProductDescription'] ?? null;
            $productCode = $product['ProductCode'] ?? null;
            $productName = $productName ?? $product['ProductName'] ?? null;
            $manufacturer = $product['Manufacturer'] ?? null;
            $supplier = $product['Supplier'] ?? null;
            $category = $product['Category'] ?? null;
            $size = $product['Size'] ?? null;
            $unit = $product['Unit'] ?? null;
            $expirationDate = $product['ExpirationDate'] ?? null;
            $srp = $srp ?? $product['RetailSellingPrice'] ?? '0';
            $gross = $srp * $quantity; // Calculate gross amount
            $discount = '0'; // Default
            $total = $gross; // Without discount
            $threshold = $product['Threshold'] ?? null;
            $inCharge = $cashier;
            $reference = $product['Reference'] ?? null; 
            $siNumber = null; // Set based on business logic
            
            $stmt->bind_param(
                "sssssssssssddddsssssss",
                $batch, $barcode, $productDescription, $productCode, $productName,
                $manufacturer, $supplier, $category, $size, $unit,
                $expirationDate, $quantity, $srp, $gross, $discount,
                $total, $threshold, $voidDate, $transactionNo, $inCharge,
                $reference, $siNumber
            );
            
            if (!$stmt->execute()) {
                $errors[] = "Error inserting into tbl_voidlist: " . $stmt->error . " for product: " . $productName;
                continue;
            }
            
            // Insert into tbl_voidreason
            $stmtVoidReason = $conn->prepare("INSERT INTO tbl_voidreason (
                TransactionNO, TransactionDate, Cashier, Barcode, ProductName,
                COST, SRP, QUANTITY, AMOUNT, TOTALCOST, TOTALAMOUNT,
                NETSales, PaymentType, Category, SINumber, Supplier,
                OutType, isVAT, REASON
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            // Map data for tbl_voidreason
            $transactionDate = $voidDate;
            $cost = $product['CostPrice'] ?? '0';
            $amount = $srp * $quantity;
            $totalCost = $cost * $quantity;
            $totalAmount = $amount;
            $netSales = $amount; // Same as amount if no discount
            $paymentType = null; // Set if available
            $outType = 'VOID'; // Set as VOID
            $isVat = $product['isVAT'] ?? '0'; // Get VAT status from product
            
            $stmtVoidReason->bind_param(
                "sssssddddddssssssss",
                $transactionNo, $transactionDate, $cashier, $barcode, $productName,
                $cost, $srp, $quantity, $amount, $totalCost, $totalAmount,
                $netSales, $paymentType, $category, $siNumber, $supplier,
                $outType, $isVat, $reason
            );
            
            if (!$stmtVoidReason->execute()) {
                $errors[] = "Error inserting into tbl_voidreason: " . $stmtVoidReason->error . " for product: " . $productName;
            } else {
                $voidedItems++;
            }
            
            $stmtVoidReason->close();
            $stmt->close();
            
        } else {
            $errors[] = "Product not found with barcode: " . $barcode;
        }
        
        $productQuery->close();
    }
    
    // Commit or rollback transaction
    if (empty($errors)) {
        $conn->commit();
        echo json_encode([
            'status' => 'success', 
            'message' => 'Successfully voided ' . $voidedItems . ' items',
            'transaction_number' => $transactionNo
        ]);
    } else {
        $conn->rollback();
        echo json_encode([
            'status' => 'error', 
            'message' => 'Errors occurred while processing void', 
            'errors' => $errors
        ]);
    }
    
} catch (Exception $e) {
    if (isset($conn) && $conn->connect_errno === 0) {
        $conn->rollback();
    }
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

if (isset($conn) && $conn->connect_errno === 0) {
    $conn->close();
}
?>