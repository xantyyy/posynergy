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
<style>
        body {
            background-image: url('assets/images/isynergies.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        .card {
            background: #fff;
            color: #333;
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            background: linear-gradient(135deg,rgb(109, 167, 255),rgb(45, 158, 251));
            color: #fff;
            border-radius: 15px 15px 0 0;
            text-align: center;
            padding: 15px;
        }
        .btn-success {
            background-color: #4caf50;
            border: none;
        }
        .btn-success:hover {
            background-color: #43a047;
        }
        .btn-secondary {
            background-color: #9e9e9e;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #757575;
        }
        .form-control {
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .form-control:focus {
            border-color: #4caf50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.4);
        }
        .alert {
            font-size: 14px;
        }
        .text-highlight {
            color: #43a047;
            font-weight: bold;
        }
        .card-footer {
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><b>Remit Sales Confirmation</b></h3>
            </div>
            <div class="card-body">
                <!-- Session Alerts -->
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

                <!-- Sales Information -->
                <p><span class="text-highlight">Sales Date:</span> <?php echo isset($saleDate) ? date("F j, Y", strtotime($saleDate)) : 'N/A'; ?></p>
                <p><span class="text-highlight">Daily Sales:</span> ₱<?php echo number_format($dailySale, 2); ?></p>

                <!-- Form -->
                <form action="remit-sales.php" method="POST" onsubmit="return confirmRemit()">
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Enter Password for Confirmation</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" name="remit" class="btn btn-success w-45">Confirm Remit</button>
                        <a href="index.php" class="btn btn-secondary w-45">Back to Dashboard</a>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                iSynergies Inc.
            </div>
        </div>
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