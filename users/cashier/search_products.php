<?php
require_once '../../includes/config.php'; // Database connection

header('Content-Type: application/json');

$response = ['status' => 'error', 'products' => [], 'message' => ''];

// Get search query and check if it's a barcode scan
$search = isset($_POST['query']) ? trim($_POST['query']) : '';
$isBarcode = isset($_POST['isBarcode']) && $_POST['isBarcode'] === 'true';

if (empty($search)) {
    $response['message'] = 'No search query provided';
    echo json_encode($response);
    exit;
}

try {
    if ($isBarcode) {
        // Exact match for barcode
        $sql = "SELECT Barcode, ProductName, RetailCostPrice AS SRP, Quantity 
                FROM tbl_invprodlist 
                WHERE Barcode = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare statement for barcode search');
        }
        $stmt->bind_param('s', $search);
    } else {
        // Fuzzy search for product name or barcode
        $likeSearch = '%' . $search . '%';
        $sql = "SELECT Barcode, ProductName, RetailCostPrice AS SRP, Quantity 
                FROM tbl_invprodlist 
                WHERE Barcode LIKE ? OR ProductName LIKE ?
                LIMIT 10";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare statement for fuzzy search');
        }
        $stmt->bind_param('ss', $likeSearch, $likeSearch);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = [
            'Barcode' => $row['Barcode'],
            'ProductName' => $row['ProductName'],
            'SRP' => $row['SRP'],
            'Quantity' => $row['Quantity'] ?? 0
        ];
    }

    $stmt->close();

    $response['status'] = 'success';
    $response['products'] = $products;

} catch (Exception $e) {
    $response['message'] = 'Server error: ' . $e->getMessage();
}

$conn->close();
echo json_encode($response);
?>