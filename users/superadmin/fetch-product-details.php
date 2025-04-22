<?php
require_once '../../includes/config.php';

header('Content-Type: application/json');

$barcode = isset($_GET['barcode']) ? mysqli_real_escape_string($conn, $_GET['barcode']) : '';
$response = [
    'costDetails' => [],
    'priceDetails' => []
];

if (!empty($barcode)) {
    // Fetch cost details from tbl_productcost
    $costSql = "SELECT isDefault, SupplierName, Cost 
                FROM tbl_productcost 
                WHERE Barcode = '$barcode'";
    $costResult = mysqli_query($conn, $costSql);

    if ($costResult && mysqli_num_rows($costResult) > 0) {
        while ($row = mysqli_fetch_assoc($costResult)) {
            $response['costDetails'][] = $row;
        }
    } else {
        error_log("Cost query failed or no results: $costSql");
    }

    // Fetch price details from tbl_productprice
    $priceSql = "SELECT Measurement, PriceType, isVAT, AppliedSRP 
                 FROM tbl_productprice 
                 WHERE Barcode = '$barcode'";
    $priceResult = mysqli_query($conn, $priceSql);

    if ($priceResult && mysqli_num_rows($priceResult) > 0) {
        while ($row = mysqli_fetch_assoc($priceResult)) {
            $response['priceDetails'][] = $row;
        }
    } else {
        error_log("Price query failed or no results: $priceSql");
    }
} else {
    error_log("No barcode provided");
}

echo json_encode($response);
?>