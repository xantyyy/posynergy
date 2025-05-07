<?php
require_once '../../includes/config.php';

// Get POST parameters
$logType = isset($_POST['logType']) ? trim($_POST['logType']) : '';
$startDate = isset($_POST['startDate']) ? trim($_POST['startDate']) : '';
$endDate = isset($_POST['endDate']) ? trim($_POST['endDate']) : '';
$user = isset($_POST['user']) ? trim($_POST['user']) : 'ADMIN';

// Log the incoming parameters for debugging
error_log("logType: $logType, startDate: $startDate, endDate: $endDate, user: $user");

// Base query to fetch logs
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
    // Validate date format (YYYY-MM-DD)
    $dateFormat = 'Y-m-d';
    $startDateTime = DateTime::createFromFormat($dateFormat, $startDate);
    $endDateTime = DateTime::createFromFormat($dateFormat, $endDate);

    if ($startDateTime && $endDateTime) {
        $query .= " AND DATE(CAST(Timestamp AS DATETIME)) BETWEEN ? AND ?";
        $params[] = $startDate;
        $params[] = $endDate;
        $types .= 'ss';
    } else {
        error_log("Invalid date format: startDate=$startDate, endDate=$endDate");
        echo json_encode(['status' => 'error', 'message' => 'Invalid date format']);
        exit;
    }
}

// Log the final query and parameters
error_log("Query: $query");
error_log("Params: " . json_encode($params));

// Prepare and execute the query
$stmt = $conn->prepare($query);
if ($stmt === false) {
    error_log("Query preparation failed: " . $conn->error);
    echo json_encode(['status' => 'error', 'message' => 'Query preparation failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param($types, ...$params);
if (!$stmt->execute()) {
    error_log("Query execution failed: " . $stmt->error);
    echo json_encode(['status' => 'error', 'message' => 'Query execution failed: ' . $stmt->error]);
    exit;
}

$result = $stmt->get_result();
$logs = [];
while ($row = $result->fetch_assoc()) {
    // Ensure Timestamp is formatted consistently if needed
    $logs[] = $row;
    error_log("Fetched row: " . json_encode($row));
}

// Log the number of rows fetched
error_log("Number of logs fetched: " . count($logs));

// If no logs are found, include a message for debugging
if (empty($logs)) {
    error_log("No logs found for User: $user, App: Point of Sale/Inventory, Date Range: $startDate to $endDate");
    echo json_encode(['status' => 'success', 'logs' => [], 'message' => 'No logs found for the given criteria']);
} else {
    echo json_encode(['status' => 'success', 'logs' => $logs]);
}

// Clean up
$stmt->close();
$conn->close();
?>