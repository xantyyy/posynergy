<?php
header('Content-Type: application/json'); // Set the response type to JSON

require_once 'db_connection.php'; // Adjust this based on your setup

session_start();

// Fetch branch_id of the current user
$user_id = $_SESSION['user_id']; // Assuming you are using session
$query = "SELECT branch_id FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $branch_id = $row['branch_id'];

    // Fetch capital for this branch
    $queryCapital = "SELECT capital FROM cashier_monitor WHERE id = ?";
    $stmtCapital = $conn->prepare($queryCapital);
    $stmtCapital->bind_param("i", $branch_id);
    $stmtCapital->execute();
    $resultCapital = $stmtCapital->get_result();

    if ($rowCapital = $resultCapital->fetch_assoc()) {
        echo json_encode(['capital' => $rowCapital['capital']]);
    } else {
        echo json_encode(['capital' => 0]); // Default when no capital is set
    }
} else {
    echo json_encode(['capital' => 0]); // Default when branch_id is not found
}

$stmt->close();
$conn->close();
exit; // Terminate the script here to avoid unintended output
