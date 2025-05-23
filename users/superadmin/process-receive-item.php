<?php
// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start output buffering
ob_start();

// Include database connection
require_once '../../includes/config.php';

// Initialize response array
$response = array(
    'success' => false,
    'message' => ''
);

// Check if request is POST and PO number is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['poNumber'])) {
    $poNumber = trim($_POST['poNumber']);
    
    $conn->begin_transaction();
    
    try {
        // 1. Get all items from tbl_purchasepending for this PO
        $getPOSql = "SELECT * FROM tbl_purchasepending WHERE POnumber = ? AND ProductName IS NOT NULL";
        $stmt = $conn->prepare($getPOSql);
        $stmt->bind_param("s", $poNumber);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 0) {
            throw new Exception("No items found for this inventory number.");
        }
        
        $transactionDate = date('Y-m-d');
        
        // 2. Process each item
        while ($row = $result->fetch_assoc()) {
            $barcode = $row['Barcode'] ?? '';
            
            // Check if barcode exists in tbl_productprofile to determine batch number
            $batchCheckSql = "SELECT COUNT(*) as count FROM tbl_productprofile WHERE Barcode = ?";
            $batchStmt = $conn->prepare($batchCheckSql);
            $batchStmt->bind_param("s", $barcode);
            $batchStmt->execute();
            $batchResult = $batchStmt->get_result();
            $batchData = $batchResult->fetch_assoc();
            
            $batch = ($batchData['count'] > 0) ? '2' : '1';
            $batchStmt->close();
            
            // Prepare common values for both tables
            $productName = $row['ProductName'] ?? '';
            $productCode = $row['ProductCode'] ?? '';
            $productDescription = '';
            $manufacturer = '';
            $supplier = $row['Supplier'] ?? '';
            $category = $row['Category'] ?? '';
            $size = '';
            $unit = $row['Unit'] ?? '';
            $expirationDate = $row['ExpirationDate'] ?? null;
            $quantity = $row['Quantity'] ?? 0;
            $retailCostPrice = $row['CostPrice'] ?? 0;
            
            // Calculate RetailSellingPrice based on isVat
            $isVat = $row['IsVat'] ?? '';
            error_log("isVat value for product {$row['ProductName']}: $isVat");

            // Your calculation logic seems correct but might be getting an unexpected value
            /*if ($isVat === 'YES') {
                $vatSellingPrice = $retailCostPriceStart / 1.12 * 0.12;
                $retailCostPrice = $retailCostPriceStart + $vatSellingPrice;
            } else {
                $retailCostPrice = $retailCostPriceStart;
            }*/
            
            // Calculate TotalCostPrice and TotalSellingPrice
            $totalCostPrice = $row['TotalCostPrice'] ?? 0;
            $totalSellingPrice = $quantity * $retailSellingPrice;
            
            $threshold = 0;
            $reference = $row['POnumber'] ?? '';
            $purpose = $row['Purpose'] ?? '';
            $tag = $row['Tag'] ?? '';
            $shelf = $row['Shelf'] ?? '';
            $shelfDescription = $row['ShelfDescription'] ?? '';
            $location = $row['Location'] ?? '';
            $companyVat = $row['CompanyVat'] ?? 'NO';
            
            // 3. Insert into tbl_invincoming (includes Purpose)
            $insertIncomingSql = "INSERT INTO tbl_invincoming (
                Batch, Barcode, ProductDescription, ProductCode, ProductName, Manufacturer, 
                Supplier, Category, Size, Unit, ExpirationDate, Quantity, RetailCostPrice, 
                RetailSellingPrice, TotalCostPrice, TotalSellingPrice, Threshold, Reference, 
                Purpose, Tag, Shelf, ShelfDescription, TransactionDate, Location, IsVat, CompanyVat
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";
            
            $insertIncomingStmt = $conn->prepare($insertIncomingSql);
            $insertIncomingStmt->bind_param(
                "sssssssssssdddddssssssssss",
                $batch, $barcode, $productDescription, $productCode, $productName, $manufacturer, 
                $supplier, $category, $size, $unit, $expirationDate, $quantity, $retailCostPrice, 
                $retailSellingPrice, $totalCostPrice, $totalSellingPrice, $threshold, $reference, 
                $purpose, $tag, $shelf, $shelfDescription, $transactionDate, $location, $isVat, $companyVat
            );
            
            if (!$insertIncomingStmt->execute()) {
                throw new Exception("Error inserting item into tbl_invincoming: " . $conn->error);
            }
            
            $insertIncomingStmt->close();
            
            // 4. Insert into tbl_invprodlist (excludes Purpose, uses AsOf instead of TransactionDate)
            $insertProdlistSql = "INSERT INTO tbl_invprodlist (
                Batch, Barcode, ProductDescription, ProductCode, ProductName, Manufacturer, 
                Supplier, Category, Size, Unit, ExpirationDate, Quantity, RetailCostPrice, 
                RetailSellingPrice, TotalCostPrice, TotalSellingPrice, Threshold, Reference, 
                Tag, Shelf, ShelfDescription, AsOf, Location, IsVat, CompanyVat
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";
            
            $insertProdlistStmt = $conn->prepare($insertProdlistSql);
            $insertProdlistStmt->bind_param(
                "sssssssssssdddddsssssssss", // Removed one 's' for Purpose
                $batch, $barcode, $productDescription, $productCode, $productName, $manufacturer, 
                $supplier, $category, $size, $unit, $expirationDate, $quantity, $retailCostPrice, 
                $retailSellingPrice, $totalCostPrice, $totalSellingPrice, $threshold, $reference, 
                $tag, $shelf, $shelfDescription, $transactionDate, $location, $isVat, $companyVat
            );
            
            if (!$insertProdlistStmt->execute()) {
                throw new Exception("Error inserting item into tbl_invprodlist: " . $conn->error);
            }
            
            $insertProdlistStmt->close();
        }
        
        // 5. Delete the items from tbl_purchasepending
        $deleteSql = "DELETE FROM tbl_purchasepending WHERE POnumber = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param("s", $poNumber);
        
        if (!$deleteStmt->execute()) {
            throw new Exception("Error deleting original items: " . $conn->error);
        }
        
        // 6. Commit the transaction
        $conn->commit();
        
        $response['success'] = true;
        $response['message'] = "Inventory successfully received and added to product list!";
        
    } catch (Exception $e) {
        // Rollback the transaction if there's an error
        $conn->rollback();
        $response['message'] = $e->getMessage();
        error_log("Error in process-receive-item.php: " . $e->getMessage());
    }
} else {
    $response['message'] = "Invalid request or missing inventory number.";
}

// Clear the buffer and send the response
ob_end_clean();
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>