<?php
require_once '../../includes/config.php'; // Database connection

header('Content-Type: application/json');

$response = ['status' => 'error', 'products' => [], 'message' => ''];

// Get search query, barcode flag, and price type
$search = isset($_POST['query']) ? trim($_POST['query']) : '';
$isBarcode = isset($_POST['isBarcode']) && $_POST['isBarcode'] === 'true';
$priceType = isset($_POST['priceType']) ? trim($_POST['priceType']) : 'RETAIL'; // Default to RETAIL if not set

if (empty($search)) {
    $response['message'] = 'No search query provided';
    echo json_encode($response);
    exit;
}

try {
    // Join tbl_invprodlist with tbl_productprice to get the correct price based on PriceType
    $likeSearch = '%' . $search . '%';
    $sql = "SELECT p.Barcode, p.ProductName, pp.SRP, p.Quantity, pp.PriceType 
            FROM tbl_invprodlist p
            LEFT JOIN tbl_productprice pp ON p.Barcode = pp.Barcode AND pp.PriceType = ?
            WHERE (p.Barcode LIKE ? OR p.ProductName LIKE ?)
            LIMIT 10";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Failed to prepare statement for fuzzy search');
    }
    $stmt->bind_param('sss', $priceType, $likeSearch, $likeSearch);

    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];

    while ($row = $result->fetch_assoc()) {
        if ($row['SRP'] !== null) { // Only include products with a valid price for the given PriceType
            $products[] = [
                'Barcode' => $row['Barcode'],
                'ProductName' => $row['ProductName'],
                'SRP' => $row['SRP'],
                'Quantity' => $row['Quantity'] ?? 0,
                'PriceType' => $row['PriceType']
            ];
        }
    }

    $stmt->close();

    if (empty($products)) {
        $response['message'] = 'No results found';
    } else {
        $response['status'] = 'success';
        $response['products'] = $products;
    }

} catch (Exception $e) {
    $response['message'] = 'Server error: ' . $e->getMessage();
}

$conn->close();
echo json_encode($response);
?>