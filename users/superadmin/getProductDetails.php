<?php
require_once '../../includes/config.php';

header('Content-Type: application/json');

try {
    if (!isset($conn)) {
        throw new Exception('Database connection ($conn) not found in config.php');
    }

    $barcode = $_POST['barcode'] ?? '';
    if (empty($barcode)) {
        echo json_encode(['success' => false, 'message' => 'No barcode provided']);
        exit;
    }

    // Remove IsVAT from the query since the column doesn't exist
    $query = "SELECT ProductCode, ProductName, Shelf, ShelfDescription, Category 
              FROM tbl_productprofile 
              WHERE Barcode = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param('s', $barcode);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        echo json_encode([
            'success' => true,
            'productCode' => $row['ProductCode'],
            'productName' => $row['ProductName'],
            'shelf' => $row['Shelf'],
            'shelfDescription' => $row['ShelfDescription'],
            'category' => $row['Category'],
            'isVat' => 'NO' // Set a default value for isVat
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No product found for barcode: ' . $barcode]);
    }

    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>