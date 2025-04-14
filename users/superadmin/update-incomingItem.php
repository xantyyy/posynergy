<?php
// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start output buffering
ob_start();

// Include database connection
require_once '../../includes/config.php';

// Initialize response array
$response = array(
    'success' => false,
    'message' => ''
);

// Check if request is POST and required fields are provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['poNumber']) && isset($_POST['expirationDate'])) {
    $poNumber = trim($_POST['poNumber']);
    $expirationDate = trim($_POST['expirationDate']);

    // Validate the expiration date format
    if (!DateTime::createFromFormat('Y-m-d', $expirationDate)) {
        $response['message'] = "Invalid expiration date format. Please use YYYY-MM-DD.";
    } else {
        try {
            // Update the expiration date in tbl_purchasepending for all rows with the given POnumber
            $updateSql = "UPDATE tbl_purchasepending 
                          SET ExpirationDate = ? 
                          WHERE POnumber = ? AND ProductName IS NOT NULL";
            $stmt = $conn->prepare($updateSql);
            $stmt->bind_param("ss", $expirationDate, $poNumber);
            
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $response['success'] = true;
                    $response['message'] = "Expiration date updated successfully!";
                } else {
                    $response['message'] = "No matching items found to update.";
                }
            } else {
                $response['message'] = "Error updating expiration date: " . $conn->error;
            }
            
            $stmt->close();
        } catch (Exception $e) {
            $response['message'] = "Error: " . $e->getMessage();
        }
    }
} else {
    $response['message'] = "Invalid request or missing required fields.";
}

// Clear the buffer and send the response
ob_end_clean();
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>