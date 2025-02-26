<?php
require_once '../../includes/config.php';

if(isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    $stmt = $conn->prepare("SELECT price, product_quantity FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['price' => $row['price'], 'quantity' => $row['product_quantity']]);
    } else {
        echo json_encode(['price' => 0, 'quantity' => 0]);
    }
}
$conn->close();
?>