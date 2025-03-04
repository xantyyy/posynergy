<?php
// Include the database connection
include '../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the capital amount from the form
    $capital = isset($_POST["capital"]) ? floatval($_POST["capital"]) : 0;

    // Validate the input
    if ($capital > 0) {
        // Insert or update the record for today's capital
        $today = date('Y-m-d');
        $sql = "INSERT INTO cashier_monitor (capital, daily_sale, date) VALUES (?, 0, ?) ON DUPLICATE KEY UPDATE capital = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("dss", $capital, $today, $capital);

        if ($stmt->execute()) {
            // Redirect to index.php after successful submission
            header("Location: index.php");
            exit();
        } else {
            // Redirect back with an error message
            header("Location: add-capital.php?error=true");
            exit();
        }
    } else {
        // Redirect back with an error message for invalid input
        header("Location: add-capital.php?error=true");
        exit();
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: add-capital.php");
    exit();
}
?>