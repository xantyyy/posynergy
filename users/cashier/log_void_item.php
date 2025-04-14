<?php
// Include your database connection file
require_once '../../includes/config.php'; 

// Check if required fields are present in $_POST
if (!isset($_POST['productId']) || !isset($_POST['reason']) || !isset($_POST['quantity'])) {
    echo json_encode(['status' => 'error', 'message' => 'Product ID, reason, and quantity are required']);
    exit;
}

// Extract data from $_POST
$productId = $_POST['productId'];
$reason = $_POST['reason'];
$quantity = $_POST['quantity'];

try {
    // Get the current date and time for VoidDate/TransactionDate
    $voidDate = date('Y-m-d H:i:s');
    
    // Get the user ID from the session
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
    
    // Get the terminal number from the session
    $terminalNo = isset($_SESSION['terminal_no']) ? $_SESSION['terminal_no'] : 'N/A';
    
    // Fetch the product details from your database
    $productQuery = $conn->prepare("SELECT * FROM tbl_invprodlist WHERE Barcode = ?");
    $productQuery->bind_param("s", $productId);
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
        $batch = $product['Batch'] ?? '';
        $barcode = $product['Barcode'] ?? '';
        $productDescription = $product['ProductDescription'] ?? '';
        $productCode = $product['ProductCode'] ?? '';
        $productName = $product['ProductName'] ?? '';
        $manufacturer = $product['Manufacturer'] ?? '';
        $supplier = $product['Supplier'] ?? '';
        $category = $product['Category'] ?? '';
        $size = $product['Size'] ?? '';
        $unit = $product['Unit'] ?? '';
        $expirationDate = $product['ExpirationDate'] ?? '';
        $srp = $product['RetailSellingPrice'] ?? '0';
        $gross = '0'; // You may need to calculate this
        $discount = '0'; // Set appropriate default
        $total = $product['TotalSellingPrice'] ?? '0';
        $threshold = $product['Threshold'] ?? '0';
        $transactionNo = isset($_SESSION['transaction_no']) ? $_SESSION['transaction_no'] : '';
        $inCharge = isset($_SESSION['username']) ? $_SESSION['username'] : '';
        $reference = $product['Reference'] ?? ''; 
        $siNumber = '0'; // You may need to set this based on your business logic
        
        $stmt->bind_param(
            "ssssssssssssssssssssss",
            $batch, $barcode, $productDescription, $productCode, $productName,
            $manufacturer, $supplier, $category, $size, $unit,
            $expirationDate, $quantity, $srp, $gross, $discount,
            $total, $threshold, $voidDate, $transactionNo, $inCharge,
            $reference, $siNumber
        );
        
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            // Successfully inserted into tbl_voidlist, now insert into tbl_voidreason
            $stmtVoidReason = $conn->prepare("INSERT INTO tbl_voidreason (
                TransactionNO, TransactionDate, Cashier, Barcode, ProductName,
                COST, SRP, QUANTITY, AMOUNT, TOTALCOST, TOTALAMOUNT,
                NETSales, PaymentType, Category, SINumber, Supplier,
                OutType, isVAT, REASON
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            // Map data for tbl_voidreason
            $transactionDate = $voidDate; // Same as VoidDate
            $cashier = $inCharge; // Same as InCharge
            $cost = $product['CostPrice'] ?? '0'; // Use CostPrice if available in tbl_invprodlist
            $amount = (float)$srp * (float)$quantity; // Calculate AMOUNT as SRP * QUANTITY
            $totalCost = $cost; // Adjust if you have a different logic
            $totalAmount = $amount; // Adjust if you have a different logic
            $netSales = '0'; // Adjust based on your business logic
            $paymentType = ''; // Set if available in session or elsewhere
            $category = $category; // Use Category from tbl_invprodlist
            $outType = ''; // Set if applicable
            $isVat = '0'; // Set based on your business logic
            
            $stmtVoidReason->bind_param(
                "sssssssssssssssssss",
                $transactionNo, $transactionDate, $cashier, $barcode, $productName,
                $cost, $srp, $quantity, $amount, $totalCost, $totalAmount,
                $netSales, $paymentType, $category, $siNumber, $supplier,
                $outType, $isVat, $reason
            );
            
            $stmtVoidReason->execute();
            
            if ($stmtVoidReason->affected_rows > 0) {
                // Successfully logged into both tables
                echo json_encode(['status' => 'success']);
            } else {
                // Failed to log into tbl_voidreason
                echo json_encode(['status' => 'error', 'message' => 'Failed to log void reason record']);
            }
            
            $stmtVoidReason->close();
        } else {
            // Failed to log into tbl_voidlist
            echo json_encode(['status' => 'error', 'message' => 'Failed to log void record']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Product not found']);
    }
    
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

if (isset($productQuery)) $productQuery->close();
if (isset($stmt)) $stmt->close();
$conn->close();
?>