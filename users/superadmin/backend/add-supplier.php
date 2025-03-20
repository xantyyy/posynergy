<?php
// backend/add-supplier.php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// Include the config file (adjusted path)
require_once '../../includes/config.php'; // Go up two directories

// Log request data
error_log("Received POST data: " . print_r($_POST, true));

// Get form data
$supplier = $_POST['Supplier'] ?? '';
$tin = $_POST['TIN'] ?? '';
$address = $_POST['Address'] ?? '';
$name = $_POST['Name'] ?? '';
$contactNumber = $_POST['ContactNumber'] ?? '';

// Basic validation
if (empty($supplier)) {
    echo json_encode(['success' => false, 'message' => 'Supplier name is required']);
    exit;
}

// Check if connection is valid
if (!$conn || $conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

try {
    $stmt = $conn->prepare("INSERT INTO tbl_supplier (Supplier, TIN, Address, Name, ContactNumber) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $supplier, $tin, $address, $name, $contactNumber);
    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }

    echo json_encode(['success' => true, 'message' => 'Supplier added successfully']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}

$stmt->close();
$conn->close();
?>