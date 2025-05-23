<?php
header('Content-Type: application/json');
require_once '../../includes/config.php'; // Database connection

$response = [
    'status' => 'error', 
    'message' => '', 
    'data' => null, 
    'shelves' => [], 
    'categories' => [], 
    'costingDetails' => [], 
    'retailDetails' => [], 
    'suppliers' => [], // Add suppliers to the response
    'uoms' => [] // Add UOMs to the response
];

// Fetch shelf options from tbl_invmaintenance
$shelfSql = "SELECT ItemName, ItemSubName FROM tbl_invmaintenance WHERE ItemType = 'SHELF'";
$shelfResult = $conn->query($shelfSql);
if ($shelfResult->num_rows > 0) {
    while ($row = $shelfResult->fetch_assoc()) {
        $response['shelves'][] = $row;
    }
}

// Fetch category options from tbl_invmaintenance
$categorySql = "SELECT ItemName FROM tbl_invmaintenance WHERE ItemType = 'CATEGORY'";
$categoryResult = $conn->query($categorySql);
if ($categoryResult->num_rows > 0) {
    while ($row = $categoryResult->fetch_assoc()) {
        $response['categories'][] = $row['ItemName'];
    }
}

// Fetch suppliers from tbl_suppliers
$supplierSql = "SELECT Supplier FROM tbl_suppliers";
$supplierResult = $conn->query($supplierSql);
if ($supplierResult->num_rows > 0) {
    while ($row = $supplierResult->fetch_assoc()) {
        $response['suppliers'][] = $row['Supplier'];
    }
}

// Fetch UOMs from tbl_invmaintenance where ItemType = 'UNIT'
$uomSql = "SELECT ItemName FROM tbl_invmaintenance WHERE ItemType = 'UNIT'";
$uomResult = $conn->query($uomSql);
if ($uomResult->num_rows > 0) {
    while ($row = $uomResult->fetch_assoc()) {
        $response['uoms'][] = $row['ItemName'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['barcode'])) {
    // Fetch product details
    $barcode = $conn->real_escape_string($_GET['barcode']);
    $sql = "SELECT * FROM tbl_productprofile WHERE Barcode = '$barcode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        // Ensure TransactionDate is in YYYY-MM-DD format
        if (!empty($product['TransactionDate']) && strtotime($product['TransactionDate'])) {
            $product['TransactionDate'] = date('Y-m-d', strtotime($product['TransactionDate']));
        } else {
            $product['TransactionDate'] = ''; // Set to empty if invalid
        }
        $response['status'] = 'success';
        $response['data'] = $product;

        // Fetch costing details from tbl_productcost
        $costingSql = "SELECT SupplierName, Cost, Measurement, Barcode FROM tbl_productcost WHERE Barcode = '$barcode'";
        $costingResult = $conn->query($costingSql);
        if ($costingResult->num_rows > 0) {
            while ($costingRow = $costingResult->fetch_assoc()) {
                $response['costingDetails'][] = $costingRow;
            }
        }

        // Fetch retail details from tbl_productprice, including Cost, MarkupPercent, and SRP
        $retailSql = "SELECT PriceType, Barcode, ProductName, Measurement, Quantity, AppliedSRP, Cost, MarkupPercent, SRP FROM tbl_productprice WHERE Barcode = '$barcode'";
        $retailResult = $conn->query($retailSql);
        if ($retailResult->num_rows > 0) {
            while ($retailRow = $retailResult->fetch_assoc()) {
                $response['retailDetails'][] = $retailRow;
            }
        }
    } else {
        $response['message'] = 'Product not found';
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_product'])) {
    // Update product details
    $barcode = $conn->real_escape_string($_POST['barcode']);
    $pluCode = $conn->real_escape_string($_POST['pluCode']);
    $transactionDate = $conn->real_escape_string($_POST['transactionDate']);
    $category = $conn->real_escape_string($_POST['category']);
    $productDetails = $conn->real_escape_string($_POST['productDetails']);
    $productCode = $conn->real_escape_string($_POST['productCode']);
    $productName = $conn->real_escape_string($_POST['productName']);
    $shelf = $conn->real_escape_string($_POST['shelf']);
    $shelfDescription = $conn->real_escape_string($_POST['shelfDescription']);

    $updateSql = "UPDATE tbl_productprofile SET 
        Barcode = '$barcode',
        PLUcode = '$pluCode',
        TransactionDate = '$transactionDate',
        Category = '$category',
        ProductCode = '$productCode',
        ProductName = '$productName',
        Shelf = '$shelf',
        ShelfDescription = '$shelfDescription'
        WHERE Barcode = '$barcode'";

    if ($conn->query($updateSql) === TRUE) {
        $response['status'] = 'success';
        $response['message'] = 'Product updated successfully';

        // Update costing details if provided
        if (isset($_POST['costingDetails'])) {
            $costingDetails = json_decode($_POST['costingDetails'], true);
            if (is_array($costingDetails)) {

                // Insert updated costing details
                foreach ($costingDetails as $costing) {
                    $supplierName = $conn->real_escape_string($costing['SupplierName']);
                    $cost = $conn->real_escape_string($costing['Cost']);
                    $measurement = $conn->real_escape_string($costing['Measurement']);
                    $costBarcode = $conn->real_escape_string($costing['Barcode']);
                    $vatAble = isset($costing['VatAble']) && $costing['VatAble'] ? 1 : 0;

                    $insertCostingSql = "INSERT INTO tbl_productcost (SupplierName, Cost, Measurement, Barcode, VatAble) 
                        VALUES ('$supplierName', '$cost', '$measurement', '$costBarcode', '$vatAble')";
                    $conn->query($insertCostingSql);
                }
            }
        }

        // Update retail details if provided
        if (isset($_POST['retailDetails'])) {
            $retailDetails = json_decode($_POST['retailDetails'], true);
            if (is_array($retailDetails)) {

                // Insert updated retail details
                foreach ($retailDetails as $retail) {
                    $priceType = $conn->real_escape_string($retail['PriceType']);
                    $retailBarcode = $conn->real_escape_string($retail['Barcode']);
                    $productName = $conn->real_escape_string($retail['ProductName']);
                    $measurement = $conn->real_escape_string($retail['Measurement']);
                    $quantity = $conn->real_escape_string($retail['Quantity']);
                    $appliedSRP = $conn->real_escape_string($retail['AppliedSRP']);
                    $cost = $conn->real_escape_string($retail['Cost']);
                    $markupPercent = $conn->real_escape_string($retail['MarkUp']);
                    $srp = $conn->real_escape_string($retail['SRP']);

                    $insertRetailSql = "INSERT INTO tbl_productprice (PriceType, Barcode, ProductName, Measurement, Quantity, AppliedSRP, Cost, MarkupPercent, SRP) 
                        VALUES ('$priceType', '$retailBarcode', '$productName', '$measurement', '$quantity', '$appliedSRP', '$cost', '$markupPercent', '$srp')";
                    $conn->query($insertRetailSql);
                }
            }
        }
    } else {
        $response['message'] = 'Error updating product: ' . $conn->error;
    }
} else {
    $response['message'] = 'Invalid request';
}

$conn->close();
echo json_encode($response);
?>