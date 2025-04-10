<?php
require_once '../../includes/config.php';

$response = array('success' => false, 'message' => '');

try {
    if (isset($_POST['poNumber']) && isset($_POST['expirationDate'])) {
        $poNumber = $_POST['poNumber'];
        $expirationDate = $_POST['expirationDate'];

        // Validate date format
        $date = DateTime::createFromFormat('Y-m-d', $expirationDate);
        if (!$date || $date->format('Y-m-d') !== $expirationDate) {
            throw new Exception('Invalid date format');
        }

        // Check if date is in the future
        $today = new DateTime();
        $selectedDate = new DateTime($expirationDate);
        if ($selectedDate <= $today) {
            throw new Exception('Expiration date must be in the future');
        }

        // Prepare and execute update query
        $sql = "UPDATE tbl_purchasepending SET ExpirationDate = ? WHERE POnumber = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $expirationDate, $poNumber);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Expiration date updated successfully';
        } else {
            $response['message'] = 'Failed to update database';
        }
        
        $stmt->close();
    } else {
        $response['message'] = 'Missing required parameters';
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>