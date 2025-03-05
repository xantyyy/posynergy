<?php
include '../../includes/config.php'; // Include database connection

if (isset($_POST['query'])) {
    $query = trim($_POST['query']);

    if (!empty($query)) {
        try {
            $stmt = $conn->prepare(
                "SELECT p.product_id AS id, 
                        p.name AS name, 
                        p.price, 
                        c.category_description AS category, 
                        p.product_quantity, 
                        p.discount
                 FROM products AS p
                 INNER JOIN categories AS c 
                 ON p.category_id = c.category_id
                 WHERE p.name LIKE CONCAT('%', ?, '%') 
                 AND p.product_quantity > 0
                 ORDER BY p.name ASC
                 LIMIT 10"
            );

            $stmt->bind_param("s", $query);
            $stmt->execute();
            $result = $stmt->get_result();

            $products = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row; // Ensure 'name' is directly included
                }
                echo json_encode($products);
            } else {
                echo json_encode([]);
            }

            $stmt->close();
        } catch (Exception $e) {
            error_log("Error fetching products: " . $e->getMessage());
            echo json_encode(["error" => "An error occurred while fetching products."]);
        }
    } else {
        echo json_encode([]);
    }
}

$conn->close();
?>