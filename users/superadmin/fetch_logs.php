<?php
require_once '../../includes/config.php';

// Database connection (adjust as per your setup)
$conn = new mysqli('localhost', 'username', 'password', 'ampcdb');
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

// Get POST parameters
$logType = isset($_POST['logType']) ? $_POST['logType'] : '';
$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '';
$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';
$user = isset($_POST['user']) ? $_POST['user'] : 'ADMIN';

// Log the incoming parameters
error_log("logType: $logType, startDate: $startDate, endDate: $endDate, user: $user");

// Base query to fetch logs
// Adjusting for potential case sensitivity and column names
$query = "SELECT Timestamp, Remarks, Control, User, App AS Application FROM tbl_logs WHERE UPPER(User) = UPPER(?)";
$params = [$user];
$types = 's';

// Filter by log type
if ($logType && $logType !== 'OVERALL') {
    if ($logType === 'POS') {
        $query .= " AND UPPER(App) = UPPER('Point of Sale')";
    } elseif ($logType === 'INVENTORY') {
        $query .= " AND UPPER(App) = UPPER('Inventory')";
    }
} else {
    $query .= " AND UPPER(App) IN (UPPER('Point of Sale'), UPPER('Inventory'))";
}

// Filter by date range
if ($startDate && $endDate) {
    // Ensure Timestamp is treated as a date, handle potential format issues
    $query .= " AND DATE(CAST(Timestamp AS DATETIME)) BETWEEN ? AND ?";
    $params[] = $startDate;
    $params[] = $endDate;
    $types .= 'ss';
}

// Log the final query and parameters
error_log("Query: $query");
error_log("Params: " . json_encode($params));

// Prepare and execute the query
$stmt = $conn->prepare($query);
if ($stmt === false) {
    error_log("Query preparation failed: " . $conn->error);
    die(json_encode(['status' => 'error', 'message' => 'Query preparation failed: ' . $conn->error]));
}

$stmt->bind_param($types, ...$params);
if (!$stmt->execute()) {
    error_log("Query execution failed: " . $stmt->error);
    die(json_encode(['status' => 'error', 'message' => 'Query execution failed: ' . $stmt->error]));
}

$result = $stmt->get_result();
$logs = [];
while ($row = $result->fetch_assoc()) {
    $logs[] = $row;
    error_log("Fetched row: " . json_encode($row)); // Log each row for debugging
}

// Log the number of rows fetched
error_log("Number of logs fetched: " . count($logs));

// If no logs are found, include a message for debugging
if (empty($logs)) {
    error_log("No logs found. Check if data exists for User: $user and App: Point of Sale/Inventory");
    echo json_encode(['status' => 'success', 'logs' => [], 'message' => 'No logs found for the given criteria']);
} else {
    echo json_encode(['status' => 'success', 'logs' => $logs]);
}

// Clean up
$stmt->close();
$conn->close();
?>