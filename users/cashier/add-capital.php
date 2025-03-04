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

        <!-- Response Message -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success mt-3">Capital successfully added!</div>
        <?php elseif (isset($_GET['error'])): ?>
            <div class="alert alert-danger mt-3">An error occurred. Please try again.</div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>