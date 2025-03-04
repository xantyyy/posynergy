<?php
// Start the session
session_start();

// Include database connection
include '../../includes/config.php';

// Check if a capital entry already exists for today
$today = date('Y-m-d');
$sql = "SELECT * FROM cashier_monitor WHERE date = '$today'";
$result = $conn->query($sql);

// If a capital entry exists, redirect to the dashboard
if ($result->num_rows > 0) {
    header("Location: index.php"); // Redirect to the dashboard
    exit();
}

// Prevent caching of this page
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Daily Capital</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Add Daily Capital</h2>

        <!-- Form -->
        <form action="process-capital.php" method="POST">
            <div class="form-group">
                <label for="capital">Enter Capital Amount:</label>
                <input type="number" name="capital" id="capital" class="form-control" placeholder="Enter amount..." required>
            </div>
            <button type="submit" class="btn btn-success">Save Capital</button>
            <a href="index.php" class="btn btn-secondary">Back to Dashboard</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
