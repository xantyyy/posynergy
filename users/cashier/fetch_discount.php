<?php
header('Content-Type: application/json');

require_once '../../includes/config.php';

// Get configuration name from request
$configName = isset($_GET['configName']) ? $_GET['configName'] : '';

if (empty($configName)) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Configuration name is required']);
    exit;
}

// Prepare and execute query
$stmt = $conn->prepare("SELECT ConfigName, Value FROM tbl_invconfig WHERE ConfigName = ?");
$stmt->bind_param("s", $configName);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Just return the value directly as requested
    echo $row['Value'];
} else {
    // If no result, return default value
    if ($configName === 'PWDDISCOUNT' || $configName === 'SENIORDISCOUNT') {
        echo "0.05"; // Default 5% discount
    } else {
        echo "0";
    }
}

// Close connection
$stmt->close();
$conn->close();
?>