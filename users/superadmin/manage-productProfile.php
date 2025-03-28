<?php
require_once '../../includes/config.php'; // Database connection

$type = isset($_GET['type']) ? $_GET['type'] : '';
$data = array();

if ($type === 'UPDATE_CODES') {
    // Get the JSON data from the request body
    $json = file_get_contents('php://input');
    $postData = json_decode($json, true);

    // Validate required fields
    if (empty($postData['productCodeNo']) || empty($postData['pluCodeNo'])) {
        $data = array('success' => false, 'message' => 'Code numbers are required');
    } else {
        try {
            // Update the existing record (assuming you're updating the last record)
            $updateStmt = $conn->prepare("UPDATE tbl_idno SET ProductCodeNo = ?, PLUCodeNo = ? ORDER BY ID DESC LIMIT 1");
            $updateStmt->bind_param("ii", $postData['productCodeNo'], $postData['pluCodeNo']);
            
            if ($updateStmt->execute()) {
                $data = array(
                    'success' => true, 
                    'message' => 'Codes updated successfully',
                    'action' => 'update'
                );
            } else {
                throw new Exception('Failed to update record: ' . $updateStmt->error);
            }
            $updateStmt->close();
        } catch (Exception $e) {
            $data = array(
                'success' => false, 
                'message' => 'Database error: ' . $e->getMessage(),
                'error_code' => $e->getCode()
            );
        }
    }
} elseif ($type === 'GENERATE_CODES') {
    try {
        // Get the last used codes
        $result = $conn->query("SELECT ProductCodeNo, PLUCodeNo FROM tbl_idno ORDER BY ID DESC LIMIT 1");
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $productCodeNo = $row['ProductCodeNo'] + 1;
            $pluCodeNo = $row['PLUCodeNo'] + 1;
        } else {
            // Initialize with default values if table is empty
            $productCodeNo = 6435; // Starting product code
            $pluCodeNo = 6435;    // Starting PLU code
        }

        // Return the new codes (don't insert yet - will be inserted when saved)
        $data = array(
            'success' => true,
            'productCode' => 'PROD' . str_pad($productCodeNo, 6, '0', STR_PAD_LEFT),
            'pluCode' => 'PLU' . str_pad($pluCodeNo, 4, '0', STR_PAD_LEFT),
            'productCodeNo' => $productCodeNo,
            'pluCodeNo' => $pluCodeNo,
            'action' => ($result->num_rows == 0) ? 'initialize' : 'increment'
        );
        
    } catch (Exception $e) {
        $data = array(
            'success' => false,
            'message' => $e->getMessage(),
            'error_code' => $e->getCode()
        );
    }
} elseif ($type === 'CATEGORY') {
    // Fetch ItemName for CATEGORY
    $sql = "SELECT ItemName FROM tbl_invmaintenance WHERE ItemType = 'CATEGORY'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['ItemName']; // Add Category ItemName to the data array
        }
    }
} elseif ($type === 'SHELF') {
    // Fetch ItemName and ItemSubName for SHELF
    $sql = "SELECT ItemName, ItemSubName FROM tbl_invmaintenance WHERE ItemType = 'SHELF'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'ItemName' => $row['ItemName'],       // Shelf dropdown value
                'ItemSubName' => $row['ItemSubName'] // Corresponding textbox value
            );
        }
    }
} elseif ($type === 'PRODUCTNAME') {
    // Fetch ProductName from tbl_invprodlist
    $sql = "SELECT ProductName FROM tbl_productprofile";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['ProductName']; // Add ProductName to the data array
        }
    }
} elseif (isset($_GET['selectedCategory'])) {
    // Fetch DiscountType for the selected Category
    $selectedCategory = $_GET['selectedCategory'];

    $sql = "SELECT DiscountType FROM tbl_discountslist WHERE Category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedCategory);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['DiscountType']; // Add DiscountType to the data array
        }
    }

    $stmt->close();
}

// Return the data as JSON
echo json_encode($data);

$conn->close();
?>