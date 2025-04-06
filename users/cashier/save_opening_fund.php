<?php
require_once '../../includes/config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['amount'])) {
    $amount = $_POST['amount'];
    
    // Validate amount
    if (!is_numeric($amount) || $amount <= 0) {
        echo "Invalid amount";
        exit;
    }
    
    // Get current username (assuming you have it in session)
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "CASHIER";
    
    // Get current date and time
    $transDate = date('Y-m-d H:i:s');
    
    // Prepare SQL statement to insert data
    $sql = "INSERT INTO tbl_openingfund (Username, Amount, TransDate) 
            VALUES (?, ?, ?)";
    
    // Create prepared statement
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind parameters and execute
        $stmt->bind_param("sds", $username, $amount, $transDate);
        
        if ($stmt->execute()) {
            echo "Opening fund successfully recorded!";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    
    $conn->close();
} else {
    echo "Invalid request method or missing amount";
}
?>