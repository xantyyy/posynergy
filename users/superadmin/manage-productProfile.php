<?php
require_once '../../includes/config.php'; // Database connection

$type = isset($_GET['type']) ? $_GET['type'] : '';
$data = array();

if ($type === 'CATEGORY') {
    // Fetch ItemName for CATEGORY using prepared statement
    $sql = "SELECT ItemName FROM tbl_invmaintenance WHERE ItemType = ?";
    $stmt = $conn->prepare($sql);
    $categoryType = 'CATEGORY';
    $stmt->bind_param("s", $categoryType);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['ItemName'];
        }
    }
    $stmt->close();
} elseif ($type === 'SHELF') {
    // Fetch ItemName and ItemSubName for SHELF using prepared statement
    $sql = "SELECT ItemName, ItemSubName FROM tbl_invmaintenance WHERE ItemType = ?";
    $stmt = $conn->prepare($sql);
    $shelfType = 'SHELF';
    $stmt->bind_param("s", $shelfType);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'ItemName' => $row['ItemName'],
                'ItemSubName' => $row['ItemSubName']
            );
        }
    }
    $stmt->close();
} elseif (isset($_GET['selectedCategory'])) {
    // Fetch DiscountType for the selected Category (already using prepared statement)
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