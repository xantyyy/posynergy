<?php
// Initialize the session
require_once '../../includes/config.php'; // Database connection

if (isset($_POST['transactionNo'])) {
    $transactionNo = $_POST['transactionNo'];
    $action = isset($_POST['action']) ? $_POST['action'] : 'delete';
    
    try {
        // Begin transaction
        $conn->begin_transaction();
        
        // Delete the transaction items
        $sql = "DELETE FROM tbl_transactionpending WHERE TransactionNo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $transactionNo);
        $result = $stmt->execute();
        
        if ($result) {
            // Commit transaction
            $conn->commit();
            
            if ($action === 'remove_after_load') {
                echo json_encode(['status' => 'success', 'message' => 'Transaction loaded and removed from pending']);
            } else {
                echo json_encode(['status' => 'success', 'message' => 'Transaction deleted successfully']);
            }
        } else {
            // Rollback transaction on error
            $conn->rollback();
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete transaction']);
        }
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Transaction number not provided']);
}
?>