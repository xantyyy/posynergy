<?php
require_once '../../includes/config.php'; // Database connection

// Check if the required parameters are provided
if (!isset($_POST['searchTerm']) || !isset($_POST['searchType'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required parameters']);
    exit;
}

$searchTerm = $_POST['searchTerm'];
$searchType = $_POST['searchType'];

try {
    // Prepare the appropriate query based on search type
    if ($searchType === 'cardNo') {
        $stmt = $conn->prepare("SELECT * FROM tbl_cardholders WHERE CardNumber LIKE ?");
        $searchParam = $searchTerm . '%';
    } else { // customerName
        $stmt = $conn->prepare("SELECT * FROM tbl_cardholders WHERE 
                               CONCAT(LastName, ' ', FirstName, ' ', IFNULL(MiddleName, '')) LIKE ?");
        $searchParam = '%' . $searchTerm . '%';
    }
    
    $stmt->bind_param("s", $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $customers = [];
    
    while ($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }
    
    if (count($customers) > 0) {
        // Return the first customer as the primary result and all matching customers for the table
        echo json_encode([
            'status' => 'success',
            'data' => $customers[0],
            'customers' => $customers
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No customer found']);
    }
    
    $stmt->close();
    
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

$conn->close();
?>