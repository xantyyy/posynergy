<?php
session_start();
header('Content-Type: application/json');

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    require_once '../../includes/config.php';
    global $conn; // Use the MySQLi connection from config.php

    if (!$conn) {
        throw new Exception('Database connection failed: MySQLi connection is not initialized');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $inputPassword = $_POST['password'] ?? '';
        error_log("Input password received: $inputPassword");

        if (empty($inputPassword)) {
            echo json_encode(['status' => 'error', 'message' => 'Password cannot be empty']);
            exit;
        }

        // Query for the CASHIER user using MySQLi with prepared statement
        $username = 'CASHIER';
        $sql = "SELECT Password FROM tbl_users WHERE Username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $storedHash = $user['Password'];
            error_log("Stored hash: $storedHash");

            // Verify the password
            if (password_verify($inputPassword, $storedHash)) {
                error_log("Password verification successful for input: $inputPassword");
                echo json_encode(['status' => 'success']);
            } else {
                error_log("Password verification failed for input: $inputPassword");
                echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
            }
        } else {
            error_log("User CASHIER not found");
            echo json_encode(['status' => 'error', 'message' => 'User CASHIER not found']);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    }
} catch (Exception $e) {
    error_log("Server error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Server error: ' . $e->getMessage()]);
}
?>