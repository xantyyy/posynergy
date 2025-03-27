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
            // First check if record exists
            $checkStmt = $conn->prepare("SELECT COUNT(*) FROM tbl_idno");
            $checkStmt->execute();
            $count = $checkStmt->get_result()->fetch_row()[0];
            $checkStmt->close();

            if ($count == 0) {
                // Insert new record if table is empty
                $insertStmt = $conn->prepare("INSERT INTO tbl_idno (ProductCodeNo, PLUCodeNo) VALUES (?, ?)");
                $insertStmt->bind_param("ii", $postData['productCodeNo'], $postData['pluCodeNo']);
                
                if ($insertStmt->execute()) {
                    $data = array(
                        'success' => true, 
                        'message' => 'Initial codes created successfully',
                        'action' => 'insert'
                    );
                } else {
                    throw new Exception('Failed to create initial record: ' . $insertStmt->error);
                }
                $insertStmt->close();
            } else {
                // Update existing record
                $stmt = $conn->prepare("UPDATE tbl_idno SET ProductCodeNo = ?, PLUCodeNo = ?");
                $stmt->bind_param("ii", $postData['productCodeNo'], $postData['pluCodeNo']);
                
                if ($stmt->execute()) {
                    $data = array(
                        'success' => true, 
                        'message' => 'Codes updated successfully',
                        'affected_rows' => $stmt->affected_rows,
                        'action' => 'update'
                    );
                } else {
                    throw new Exception('Execute failed: ' . $stmt->error);
                }
                $stmt->close();
            }
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
        // Get current codes
        $result = $conn->query("SELECT ProductCodeNo, PLUCodeNo FROM tbl_idno ORDER BY ID DESC LIMIT 1");
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $newProductCodeNo = $row['ProductCodeNo'] + 1;
            $newPLUCodeNo = $row['PLUCodeNo'] + 1;
            
            // Update the codes table
            $stmt = $conn->prepare("UPDATE tbl_idno SET ProductCodeNo = ?, PLUCodeNo = ?");
            $stmt->bind_param("ii", $newProductCodeNo, $newPLUCodeNo);
            $stmt->execute();
            $stmt->close();
        } else {
            // Initialize if table is empty
            $newProductCodeNo = 6285;
            $newPLUCodeNo = 6253;
            
            $stmt = $conn->prepare("INSERT INTO tbl_idno (ProductCodeNo, PLUCodeNo) VALUES (?, ?)");
            $stmt->bind_param("ii", $newProductCodeNo, $newPLUCodeNo);
            $stmt->execute();
            $stmt->close();
        }

        $data = [
            'success' => true,
            'productCode' => 'PROD' . str_pad($newProductCodeNo, 6, '0', STR_PAD_LEFT),
            'pluCode' => 'PLU' . str_pad($newPLUCodeNo, 4, '0', STR_PAD_LEFT),
            'productCodeNo' => $newProductCodeNo,
            'pluCodeNo' => $newPLUCodeNo
        ];
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
    $sql = "SELECT ProductName FROM tbl_invprodlist";
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