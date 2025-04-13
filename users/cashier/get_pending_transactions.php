<?php
// Initialize the session
require_once '../../includes/config.php'; // Database connection

try {
    // Since all data is in one table, we just need to group by TransactionNo
    $sql = "SELECT 
                TransactionNo,
                TransactionDate,
                SUM(Quantity) as TotalQty,
                SUM(Amount) as TotalAmount
            FROM 
                tbl_transactionpending
            GROUP BY 
                TransactionNo, TransactionDate
            ORDER BY 
                TransactionDate DESC, TransactionNo DESC";

    $result = $conn->query($sql);
    
    $transactions = array();
    
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $transactions[] = array(
                'transactionNo' => $row['TransactionNo'],
                'transactionDate' => $row['TransactionDate'],
                'totalQty' => $row['TotalQty'],
                'totalAmount' => $row['TotalAmount']
            );
        }
        echo json_encode(['status' => 'success', 'transactions' => $transactions]);
    } else {
        echo json_encode(['status' => 'success', 'transactions' => []]);
    }
    
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>