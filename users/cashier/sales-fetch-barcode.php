<?php
include '../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $barcode = $_POST['barcode'];

    $sql = "SELECT 
    products.product_id, 
    products.name AS name, 
    products.price, 
    products.product_quantity AS quantity, 
    products.discount, 
    products.category_id,
    categories.category_description AS category
FROM products
JOIN categories ON products.category_id = categories.category_id
WHERE products.barcode = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $barcode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
$product = $result->fetch_assoc();
echo json_encode($product);
} else {
echo json_encode(['error' => 'Product not found']);
}

    $stmt->close();
    $conn->close();
}
?>