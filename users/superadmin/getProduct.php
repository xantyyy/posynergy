<?php
// Include the config file
require_once '../../includes/config.php';

// Set the header for JSON
header('Content-Type: application/json');

try {
    // Check if $conn is defined
    if (!isset($conn)) {
        throw new Exception('Database connection ($conn) not found in config.php');
    }

    $barcode = $_POST['barcode'] ?? '';
    if (empty($barcode)) {
        echo json_encode(['success' => false, 'error' => 'No barcode provided']);
        exit;
    }

    // Join the tables to get all required information including Supplier and AppliedSRP
    $query = "SELECT p.ProductName, p.Shelf, p.Category, 
                     c.Measurement AS UOM, c.Cost, 
                     IFNULL(c.IsVAT, 'No') AS Vatable, 
                     c.SupplierName AS Supplier,
                     pr.AppliedSRP
              FROM tbl_productprofile p
              LEFT JOIN tbl_productcost c ON p.Barcode = c.Barcode
              LEFT JOIN tbl_productprice pr ON p.Barcode = pr.Barcode
              WHERE p.Barcode = ?";

    // Use MySQLi instead of PDO
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param('s', $barcode); // 's' for string (barcode might be a string in your DB)
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        echo json_encode([
            'success' => true, 
            'productName' => $row['ProductName'],
            'shelf' => $row['Shelf'],
            'category' => $row['Category'],
            'uom' => $row['UOM'],
            'cost' => $row['Cost'],
            'vatable' => $row['Vatable'],
            'supplier' => $row['Supplier'],
            'appliedSRP' => $row['AppliedSRP'] // Include AppliedSRP in the response
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No product found']);
    }

    $stmt->close();

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>