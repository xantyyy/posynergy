<?php
// Start the session
session_start();

// Include database connection
include '../../includes/config.php';

// Check if a capital entry already exists for today
$today = date('Y-m-d');
$sql = "SELECT * FROM cashier_monitor WHERE date = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();

// If a capital entry exists, redirect to the dashboard
if ($result->num_rows > 0) {
    header("Location: index.php"); // Redirect to the dashboard
    exit();
}

// Process capital submission
if (isset($_POST['save_capital'])) {
    $enteredPassword = $_POST['password'];
    $capitalAmount = $_POST['capital'];
    $username = $_SESSION['cashier_name'];

    // Validate capital amount
    if ($capitalAmount <= 0) {
        $_SESSION['error'] = "Capital amount must be greater than zero.";
    } else {
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
                // Insert the capital entry into the database
                $sql = "INSERT INTO cashier_monitor (date, daily_sale, remitted, capital) VALUES (?, 0, 0, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sd", $today, $capitalAmount);

                if ($stmt->execute()) {
                    $_SESSION['success'] = "Capital added successfully!";
                } else {
                    $_SESSION['error'] = "Error saving capital: " . $conn->error;
                }
            } else {
                $_SESSION['error'] = "Incorrect password.";
            }
        } else {
            $_SESSION['error'] = "User not found.";
        }
    }

    // Reload the page to show messages
    header("Location: add-capital.php");
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
        .card-footer {
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
            color: #555;
        }
    </style>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0"><b>Add Daily Capital</b></h3>
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

                <!-- Form -->
                <form method="POST">
                    <div class="form-group mb-3">
                        <label for="capital" class="form-label">Enter Capital Amount</label>
                        <input type="number" name="capital" id="capital" class="form-control" placeholder="Enter amount..." required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Enter Password for Confirmation</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" name="save_capital" class="btn btn-success w-45">Save Capital</button>
                        <a href="index.php" class="btn btn-secondary w-45">Back to Dashboard</a>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                iSynergies Inc.
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>