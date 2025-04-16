<?php
header('Content-Type: application/json');

require_once '../../includes/config.php';

try {
    // Query to get the last TransactionNo from tbl_transactiondate
    $stmt = $conn->prepare("SELECT TransactionNo FROM tbl_transactiondate ORDER BY TransactionNo DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastTransactionNo = $row['TransactionNo'];
        echo json_encode(['lastTransactionNo' => $lastTransactionNo]);
    } else {
        // If no transactions exist, return a default starting Transaction No
        echo json_encode(['lastTransactionNo' => 'TRX000000']);
    }

    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch last transaction number: ' . $e->getMessage()]);
}
?>