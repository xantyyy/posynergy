<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = "";     // Replace with your database password
$dbname = "ampcdb"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Get the raw POST data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Log the received data for debugging
file_put_contents('debug.log', print_r($data, true));

// Check if all required fields are present
$requiredFields = ['lastName', 'firstName', 'middleName', 'lotHouse', 'street', 'barangay', 'townCity', 'province', 'civilStatus', 'birthday', 'gender', 'cardNumber', 'pointsEarned', 'pointsUsed', 'balance'];
foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || (is_string($data[$field]) && empty(trim($data[$field])))) {
        die(json_encode(['success' => false, 'message' => 'Missing required field: ' . $field]));
    }
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO tbl_cardholders (LastName, FirstName, MiddleName, LHBNo, Street, Barangay, TownCity, Province, CivilStatus, Birthday, Gender, CardNumber, PointsEarned, PointsUsed, Balance) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssiii", 
    $data['lastName'], 
    $data['firstName'], 
    $data['middleName'], 
    $data['lotHouse'], 
    $data['street'], 
    $data['barangay'], 
    $data['townCity'], 
    $data['province'], 
    $data['civilStatus'], 
    $data['birthday'], 
    $data['gender'], 
    $data['cardNumber'], 
    $data['pointsEarned'], 
    $data['pointsUsed'], 
    $data['balance']
);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Cardholder saved successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error saving cardholder: ' . $stmt->error]);
}

// Close connections
$stmt->close();
$conn->close();
?>