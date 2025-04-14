<?php
require_once '../../includes/config.php'; // Database connection

// Get the password and type from the AJAX request
$password = isset($_POST['password']) ? $_POST['password'] : '';
$type = isset($_POST['type']) ? $_POST['type'] : '';

// Validate inputs
if(empty($password) || empty($type)) {
    echo json_encode(['status' => 'error', 'message' => 'Password and type are required']);
    exit;
}

try {
    // Query the database for the password
    $stmt = $conn->prepare("SELECT * FROM tbl_voidpassword WHERE password = ? AND type = ?");
    $stmt->bind_param("ss", $password, $type);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        // Password is correct
        echo json_encode(['status' => 'success']);
    } else {
        // Password is incorrect
        echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
    }
    
} catch(Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

$stmt->close();
$conn->close();
?>