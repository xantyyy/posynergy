<?php
require_once '../../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fullName']) && isset($_POST['username']) && isset($_POST['role']) && isset($_POST['password'])) {
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
    $terminal = 1; // Default terminal value (adjust as needed)
    $trainingMode = "NO"; // Default training mode value
    $status = "ENABLED"; // Default status to allow login

    // Check if username already exists
    $checkSql = "SELECT Username FROM tbl_users WHERE Username = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo "Username already exists.";
    } else {
        $sql = "INSERT INTO tbl_users (Username, Password, Status, Role, Owner, Terminal, TrainingMode) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssis", $username, $password, $status, $role, $fullName, $terminal, $trainingMode);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error: " . $conn->error;
        }
        $stmt->close();
    }
    $checkStmt->close();
}
$conn->close();
?>