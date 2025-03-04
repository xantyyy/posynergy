<?php 

// Include the database configuration
include '../../includes/config.php';

// Check if the form is submitted using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the capital amount from the form
    $capital = isset($_POST["capital"]) ? floatval($_POST["capital"]) : 0;

    // Validate that the capital amount is greater than 0
    if ($capital > 0) {
        // Prepare the SQL query to insert into the database
        $stmt = $conn->prepare("INSERT INTO cashier_monitor (capital, daily_sale, date) VALUES (?, 0, NOW())");
        $stmt->bind_param("d", $capital); // "d" is for double/float data type

        // Execute the query and check for success
        if ($stmt->execute()) {
            // Redirect back with success
            header("Location: add-capital.php?success=true");
        } else {
            // Redirect back with an error
            header("Location: add-capital.php?error=true");
        }

        // Close the statement
        $stmt->close();
    } else {
        // Redirect back with an error for invalid input
        header("Location: add-capital.php?error=true");
    }
} else {
    // Redirect if accessed directly
    header("Location: add-capital.php");
    exit();
}

// Close the database connection
$conn->close();
?>