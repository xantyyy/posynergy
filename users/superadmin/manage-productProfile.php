<?php
require_once '../../includes/config.php'; // Database connection

$type = isset($_GET['type']) ? $_GET['type'] : '';
$data = array();

if ($type === 'CATEGORY') {
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