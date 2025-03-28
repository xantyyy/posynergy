<?php
require_once '../../includes/config.php'; // Database connection

$type = isset($_GET['type']) ? $_GET['type'] : '';
$data = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['type'] === 'UPDATE_AND_ADD') {
    $response = ['success' => false, 'message' => ''];

    // Log ang natanggap na POST data para sa debugging
    error_log("Received POST Data: " . print_r($_POST, true));

    $productCodeNo = $_POST['productCodeNo'] ?? '';
    $pluCodeNo = $_POST['pluCodeNo'] ?? '';
    $productName = trim($_POST['productName'] ?? ''); // Trim para sa seguridad
    $price = $_POST['price'] ?? 0;

    $data = [
        'productCodeNo' => $productCodeNo,
        'pluCodeNo' => $pluCodeNo,
        'productName' => $productName,
        'price' => $price
    ];

    // Backend Validation (Idagdag ang iyong mga patakaran sa validation dito)
    if (empty($data['productName'])) {
        $response['message'] = "Error: Product Name cannot be empty.";
        echo json_encode($response);
        exit();
    }

    try {
        $conn->begin_transaction(); // Start transaction

        $idToUpdate = $_POST['id_to_update'] ?? null; // Palitan ito ng iyong aktwal na logic
        if ($idToUpdate !== null) {
            $updateIdno = $conn->prepare("
                UPDATE tbl_idno
                SET productCodeNo = ?, pluCodeNo = ?
                WHERE id = ?");
            $updateIdno->bind_param("ssi", $data['productCodeNo'], $data['pluCodeNo'], $idToUpdate);
            if (!$updateIdno->execute()) {
                throw new Exception("Error updating tbl_idno: " . $updateIdno->error);
            }
            $updateIdno->close();
        } else {
            error_log("Warning: 'id_to_update' not provided. Skipping tbl_idno update.");
        }


        // 2. INSERT INTO tbl_productprofile (include all required fields)
        $insertProduct = $conn->prepare("
            INSERT INTO tbl_productprofile
            (productCode, pluCode, productName, price)
            VALUES (?, ?, ?, ?)");
        $insertProduct->bind_param(
            "sssd",
            $data['productCodeNo'],
            $data['pluCodeNo'],
            $data['productName'],
            $data['price']
        );
        if (!$insertProduct->execute()) {
            throw new Exception("Error inserting into tbl_productprofile: " . $insertProduct->error);
        }
        $insertProduct->close();

        $conn->commit(); // Commit if both queries succeed
        $response['success'] = true;
    } catch (Exception $e) {
        $conn->rollback(); // Rollback on error
        $response['message'] = "Database error: " . $e->getMessage();
        error_log("Database Error Details: " . $e->getMessage());
    }

    echo json_encode($response);
    $conn->close(); // Siguraduhing isara ang koneksyon dito kung hindi na kailangan sa ibang bahagi ng script
    exit();
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