<?php
require_once '../../includes/config.php'; // Database connection

// Ensure the script returns JSON
header('Content-Type: application/json');

// Check if the database connection is successful
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Get search query
$search = isset($_POST['query']) ? trim($_POST['query']) : '';

if (strlen($search) < 2) {
    echo json_encode(['status' => 'error', 'message' => 'Query too short']);
    exit;
}

// Prepare SQL query with prepared statements
$sql = "SELECT p.ID, p.Barcode, p.ProductName, p.SRP, i.Quantity 
        FROM tbl_productprice p 
        LEFT JOIN tbl_invprodlist i ON p.Barcode = i.Barcode 
        WHERE p.Barcode LIKE ? 
        OR p.ProductName LIKE ? 
        OR p.SRP LIKE ?
        LIMIT 10";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => 'SQL preparation failed: ' . $conn->error]);
    $conn->close();
    exit;
}

// Bind parameters
$searchTerm = "%$search%";
$stmt->bind_param('sss', $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = [
        'ID' => $row['ID'],
        'Barcode' => $row['Barcode'],
        'ProductName' => $row['ProductName'],
        'SRP' => $row['SRP'],
        'Quantity' => $row['Quantity'] ?? 0 // Use actual Quantity from tbl_invprodlist; default to 0 if null
    ];
}

$stmt->close();
$conn->close();

// Log the response for debugging (optional, remove in production)
error_log("search.php response: " . json_encode($products));

// Return JSON response
if (count($products) > 0) {
    echo json_encode(['status' => 'success', 'products' => $products]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No products found']);
}
?>