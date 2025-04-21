<?php
require_once '../../includes/config.php';

header('Content-Type: application/json');

$searchTerm = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$products = [];

if (!empty($searchTerm)) {
    $sql = "SELECT p.ID, p.Barcode, p.ProductName, p.Shelf 
            FROM tbl_productprofile p 
            WHERE p.ProductName LIKE '%$searchTerm%' OR p.Barcode LIKE '%$searchTerm%'";
} else {
    $sql = "SELECT p.ID, p.Barcode, p.ProductName, p.Shelf 
            FROM tbl_productprofile p";
}

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

echo json_encode($products);
?>