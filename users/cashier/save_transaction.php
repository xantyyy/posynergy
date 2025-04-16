<?php
require_once '../../includes/config.php'; // Include your database connection

try {
    // Get the transaction data from the request
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    // Extract transaction details (only the required fields)
    $transactionNo = $data['transactionNo'];
    $transactionDateTime = $data['transactionDateTime'];
    $cashier = $data['cashier'];

    // Prepare the SQL query to insert into tbl_transactiondate
    $stmt = $conn->prepare("INSERT INTO tbl_transactiondate (TransactionDateTime, Cashier, TransactionNo) VALUES (?, ?, ?)");
    $stmt->execute([$transactionDateTime, $cashier, $transactionNo]);

    // Send success response
    echo json_encode(['status' => 'success', 'message' => 'Transaction saved successfully']);
} catch (Exception $e) {
    // Send error response
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
}
?>