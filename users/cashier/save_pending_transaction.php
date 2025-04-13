<?php
// Initialize the session
require_once '../../includes/config.php'; // Database connection

// Check if transaction data is received
if (isset($_POST['transaction'])) {
    // Decode the JSON transaction data
    $transaction = json_decode($_POST['transaction'], true);
    
    // Validate transaction data
    if (!$transaction || !isset($transaction['transactionNo']) || !isset($transaction['items']) || empty($transaction['items'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid transaction data']);
        exit;
    }
    
    try {
        // Begin transaction
// Begin transaction
$conn->begin_transaction();

// Get terminal number from session as the cashier info
// If terminal_no is not set in session, use 'ADMIN' as fallback
$cashier = isset($_SESSION['terminal_no']) ? $_SESSION['terminal_no'] : 'ADMIN';

$transactionNo = $transaction['transactionNo'];
$transactionDate = $transaction['transactionDate'];
$totalAmount = $transaction['totalAmount'];
$totalCost = $transaction['totalAmount'];
$netSales = $transaction['totalAmount'];
$paymentType = 'PENDING';

// For each item, insert a complete record with all transaction information
foreach ($transaction['items'] as $item) {
    $productName = $conn->real_escape_string($item['name']);
    $barcode = $conn->real_escape_string($item['barcode']);
    $quantity = floatval($item['quantity']);
    $cost = floatval($item['price']);
    $srp = floatval($item['price']);
    $amount = floatval($item['totalPrice']);
    
    // Insert complete row with ALL information including terminal number as cashier
    $sql = "INSERT INTO tbl_transactionpending
            (TransactionNo, TransactionDate, Cashier, Barcode, ProductName, Quantity, Cost, SRP, Amount, TotalAmount, TotalCost, NetSales, PaymentType) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssddddddds",
        $transactionNo,
        $transactionDate,
        $cashier,      // This will contain the terminal number from session
        $barcode,
        $productName,
        $quantity,
        $cost,
        $srp,
        $amount,
        $totalAmount,
        $totalCost,
        $netSales,
        $paymentType
    );
    $stmt->execute();
    $stmt->close();
}

// Commit transaction
$conn->commit();
        echo json_encode(['status' => 'success', 'message' => 'Transaction saved successfully']);
    }
    catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No transaction data received']);
}