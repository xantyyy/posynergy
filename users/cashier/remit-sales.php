<?php
// Start the session
session_start();

// Include database connection
include '../../includes/config.php';

// Prevent caching of this page
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Check if the user is logged in
if (!isset($_SESSION['cashier_name'])) {
    header('location: ../../index.php');
    exit();
}

// Get today's date
$today = date('Y-m-d');

// Check if sales have already been remitted for today
$sql = "SELECT remitted FROM cashier_monitor WHERE date = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['remitted'] == 1) {
        header("Location: index.php"); // Redirect to the dashboard
        exit();
    }
}

// Process remittance if form is submitted
if (isset($_POST['remit'])) {
    $enteredPassword = $_POST['password'];
    $username = $_SESSION['cashier_name'];

    // Get the hashed password from the database
    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedHash = $row['password'];

        // Verify the entered password
        if (password_verify($enteredPassword, $storedHash)) {
            // Update remitted status
            $sql = "UPDATE cashier_monitor SET remitted = 1 WHERE date = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $today);
            if ($stmt->execute()) {
                $_SESSION['success'] = "Sales remitted successfully!";
            } else {
                $_SESSION['error'] = "Error remitting sales: " . $conn->error;
            }

            $conn->close();
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password.";
        }
    } else {
        $_SESSION['error'] = "User not found.";
    }
}

// Get sales information for today
$sql = "SELECT * FROM cashier_monitor WHERE date = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

$dailySale = 0;
$saleDate = null;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dailySale = $row['daily_sale'];
    $saleDate = $row['date'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remit Sales Confirmation</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Remit Sales Confirmation</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
        <p>Sales Date: <?php echo isset($saleDate) ? date("F j, Y", strtotime($saleDate)) : 'N/A'; ?></p>
        <p>Daily Sales: ₱<?php echo number_format($dailySale, 2); ?></p>

        <!-- Form -->
        <form action="remit-sales.php" method="POST" onsubmit="return confirmRemit()">
            <div class="form-group">
                <label for="password">Enter Password for Confirmation</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" name="remit" class="btn btn-success">Confirm Remit</button>
            <a href="index.php" class="btn btn-secondary">Back to Dashboard</a>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        // Confirmation function for remit
        function confirmRemit() {
            const amount = "<?php echo number_format($dailySale, 2); ?>";
            return confirm(`You want to remit this amount: ₱${amount}?`);
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>