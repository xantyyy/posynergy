<?php
// Initialize the session
require_once '../../includes/config.php'; // Database connection

if (isset($_GET['transactionNo'])) {
    $transactionNo = $_GET['transactionNo'];
    
    try {
        // Query to get all items for a specific transaction
        $sql = "SELECT * FROM tbl_transactionpending WHERE TransactionNo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $transactionNo);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result) {
            $items = [];
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
            
            echo json_encode(['status' => 'success', 'items' => $items]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to fetch transaction items']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Transaction number not provided']);
}
?>