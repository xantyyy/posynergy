<?php
require_once '../../includes/config.php'; // Database connection

$type = isset($_GET['type']) ? $_GET['type'] : '';
$data = array();

if ($type === 'SAVE_PRODUCT_PROFILE') {
    // Get the JSON data from the request body
    $json = file_get_contents('php://input');
    $postData = json_decode($json, true);

    // Validate required fields
    if (
        empty($postData['barCode']) ||
        empty($postData['pluCode']) ||
        empty($postData['productCode']) ||
        empty($postData['productName']) ||
        empty($postData['category']) ||
        empty($postData['date'])
    ) {
        $data = array('success' => false, 'message' => 'Missing required fields.');
    } else {
        try {
            // Prepare SQL statement for inserting data into tbl_productprofile
            $stmt = $conn->prepare("INSERT INTO tbl_productprofile (TransactionDate, Barcode, PLUcode, Category, ProductCode, ProductName, Shelf, ShelfDescription) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "ssssssss",
                $postData['date'],
                $postData['barCode'],
                $postData['pluCode'],
                $postData['category'],
                $postData['productCode'],
                $postData['productName'],
                $postData['shelf'],
                $postData['shelfDescription']
            );

            if ($stmt->execute()) {
                $data = array(
                    'success' => true,
                    'message' => 'Product profile saved successfully!'
                );
            } else {
                throw new Exception('Failed to insert record: ' . $stmt->error);
            }

            $stmt->close();
        } catch (Exception $e) {
            $data = array(
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage(),
                'error_code' => $e->getCode()
            );
        }
    }
} elseif ($type === 'UPDATE_CODES') {
    // Existing logic for updating codes
    $json = file_get_contents('php://input');
    $postData = json_decode($json, true);

    if (empty($postData['productCodeNo']) || empty($postData['pluCodeNo'])) {
        $data = array('success' => false, 'message' => 'Code numbers are required');
    } else {
        try {
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
    // Existing logic for generating codes
    try {
        $result = $conn->query("SELECT ProductCodeNo, PLUCodeNo FROM tbl_idno ORDER BY ID DESC LIMIT 1");
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $productCodeNo = $row['ProductCodeNo'] + 1;
            $pluCodeNo = $row['PLUCodeNo'] + 1;
        } else {
            $productCodeNo = 6435; // Starting product code
            $pluCodeNo = 6435;    // Starting PLU code
        }

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
    // Existing logic for fetching categories
    $sql = "SELECT ItemName FROM tbl_invmaintenance WHERE ItemType = 'CATEGORY'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['ItemName'];
        }
    }
} elseif ($type === 'SHELF') {
    // Existing logic for fetching shelf details
    $sql = "SELECT ItemName, ItemSubName FROM tbl_invmaintenance WHERE ItemType = 'SHELF'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'ItemName' => $row['ItemName'],
                'ItemSubName' => $row['ItemSubName']
            );
        }
    }
} elseif ($type === 'SUPPLIERS') {
    // New functionality to fetch suppliers from tbl_suppliers
    try {
        $sql = "SELECT Supplier FROM tbl_suppliers ORDER BY Supplier ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row['Supplier'];
            }
        }
    } catch (Exception $e) {
        $data = array(
            'success' => false,
            'message' => 'Database error: ' . $e->getMessage(),
            'error_code' => $e->getCode()
        );
    }
} elseif ($type === 'UOM') {
    // Fetch UOM (Units of Measurement) from tbl_invmaintenance where ItemType = 'UNIT'
    try {
        $sql = "SELECT ItemName FROM tbl_invmaintenance WHERE ItemType = 'UNIT' ORDER BY ItemName ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row['ItemName'];
            }
        }
    } catch (Exception $e) {
        $data = array(
            'success' => false,
            'message' => 'Database error: ' . $e->getMessage(),
            'error_code' => $e->getCode()
        );
    }
} elseif (isset($_GET['selectedCategory'])) {
    $selectedCategory = $_GET['selectedCategory'];

    $sql = "SELECT DiscountType FROM tbl_discountslist WHERE Category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedCategory);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['DiscountType'];
        }
    }

    $stmt->close();
}

// Return the data as JSON
echo json_encode($data);

$conn->close();
?>