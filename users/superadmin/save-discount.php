<?php
// Include your database connection
require_once '../../includes/config.php'; // Database connection

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the posted data
    $productId = isset($_POST['productId']) ? $_POST['productId'] : '';
    $productName = isset($_POST['productName']) ? $_POST['productName'] : '';
    $discountPercentage = isset($_POST['discountPercentage']) ? floatval($_POST['discountPercentage']) : 0;
    $poNumber = isset($_POST['poNumber']) ? $_POST['poNumber'] : '';
    
    // Validate the data
    if (empty($productName) || empty($poNumber) || $discountPercentage < 0 || $discountPercentage > 100) {
        echo json_encode(['success' => false, 'message' => 'Invalid input data']);
        exit;
    }
    
    // Update ONLY the discount column in the database
    $sql = "UPDATE tbl_purchasepending 
            SET Discount = ? 
            WHERE POnumber = ? AND ProductName = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dss", $discountPercentage, $poNumber, $productName);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Discount saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $stmt->error]);
    }
    
    $stmt->close();
} else {
    // Not a POST request
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>