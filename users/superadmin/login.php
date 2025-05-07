<?php
session_start();
require_once 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT Username, Password, Status FROM tbl_users WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['Status'] === 'ENABLED' && password_verify($password, $row['Password'])) {
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            if ($row['Status'] === 'DISABLED') {
                echo "Account is disabled. Contact the administrator.";
            } else {
                echo "Invalid password.";
            }
        }
    } else {
        echo "User not found.";
    }
    $stmt->close();
}
$conn->close();
?>