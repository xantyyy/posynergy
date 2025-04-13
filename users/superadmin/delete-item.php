<?php
// Include database connection
require_once '../../includes/config.php'; // Database connection

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get parameters from the request
    $barcode = isset($_POST['barcode']) ? $_POST['barcode'] : '';
    $poNumber = isset($_POST['poNumber']) ? $_POST['poNumber'] : '';
    
    try {
        // Prepare SQL statement to delete the item
        $sql = "DELETE FROM tbl_purchasepending WHERE POnumber = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $barcode);
        $result = $stmt->execute();
        
        if ($result) {
            // Check if any rows were affected
            if ($stmt->affected_rows > 0) {
                echo json_encode(['success' => true, 'message' => 'Item deleted successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'No matching item found.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete item: ' . $conn->error]);
        }
        
        $stmt->close();
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>