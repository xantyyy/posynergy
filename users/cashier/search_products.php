<?php
require_once '../../includes/config.php'; // Database connection

header('Content-Type: application/json');

$response = ['status' => 'error', 'products' => [], 'message' => ''];

// Get search query, barcode flag, and price type
$search = isset($_POST['query']) ? trim($_POST['query']) : '';
$isBarcode = isset($_POST['isBarcode']) && $_POST['isBarcode'] === 'true';
$priceType = isset($_POST['priceType']) ? trim($_POST['priceType']) : 'RETAIL'; // Default to RETAIL if not set
$multiple = isset($_POST['multiple']) && $_POST['multiple'] === 'true';

if (empty($search)) {
    $response['message'] = 'No search query provided';
    echo json_encode($response);
    exit;
}

try {
    $products = [];
    if ($multiple) {
        // Handle multiple barcodes (comma-separated)
        $barcodes = explode(',', $search);
        $placeholders = implode(',', array_fill(0, count($barcodes), '?'));
        $sql = "SELECT p.Barcode, p.ProductName, pp.SRP, pp.PriceType, p.Quantity 
                FROM tbl_invprodlist p
                LEFT JOIN tbl_productprice pp ON p.Barcode = pp.Barcode AND pp.PriceType = ?
                WHERE p.Barcode IN ($placeholders)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare statement for multiple barcodes');
        }
        $params = array_merge([$priceType], $barcodes);
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
    } else {
        // Single barcode or fuzzy search
        $likeSearch = '%' . $search . '%';
        $sql = "SELECT p.Barcode, p.ProductName, pp.SRP, pp.PriceType, p.Quantity 
                FROM tbl_invprodlist p
                LEFT JOIN tbl_productprice pp ON p.Barcode = pp.Barcode AND pp.PriceType = ?
                WHERE (p.Barcode LIKE ? OR p.ProductName LIKE ?)
                LIMIT 10";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Failed to prepare statement for fuzzy search');
        }
        $stmt->bind_param('sss', $priceType, $likeSearch, $likeSearch);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        if ($row['SRP'] !== null) {
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
    $response['message'] = 'Server error: ' + $e->getMessage();
}

$conn->close();
echo json_encode($response);
?>