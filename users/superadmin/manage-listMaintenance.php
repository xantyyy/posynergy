<?php
require_once '../../includes/config.php';

// Add a new ItemType
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['listName'])) {
    $itemType = trim($_POST['listName']);

    if (!empty($itemType)) {
        $sql = "INSERT INTO tbl_invmaintenance (ItemType) VALUES (?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $itemType);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'List added successfully!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to prepare statement.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'List name cannot be empty.']);
    }

    $conn->close();
    exit;
}

// Edit an existing ItemType
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['oldItemType']) && isset($_POST['newItemType'])) {
    $oldItemType = trim($_POST['oldItemType']);
    $newItemType = trim($_POST['newItemType']);

    if (!empty($newItemType)) {
        $sql = "UPDATE tbl_invmaintenance SET ItemType = ? WHERE ItemType = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $newItemType, $oldItemType);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'List name updated successfully!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error updating list name: ' . $conn->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to prepare statement.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'New list name cannot be empty.']);
    }

    $conn->close();
    exit;
}

// Fetch ItemName based on ItemType
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['itemType'])) {
    $itemType = $_POST['itemType'];

    $sql = "SELECT ItemName FROM tbl_invmaintenance WHERE ItemType = ? AND ItemName IS NOT NULL ORDER BY ItemName ASC";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $itemType);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row['ItemName'];
            }
            echo json_encode(['success' => true, 'data' => $data]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No items found for the selected type.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare statement.']);
    }

    $conn->close();
    exit;
}

// Handle Delete Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteItemType'])) {
    $deleteItemType = trim($_POST['deleteItemType']);

    if (!empty($deleteItemType)) {
        $sql = "DELETE FROM tbl_invmaintenance WHERE ItemType = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $deleteItemType);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'List type deleted successfully!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error deleting list type: ' . $conn->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to prepare statement.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'List type cannot be empty.']);
    }

    $conn->close();
    exit;
}

// Fetch all distinct ItemType values
$sql = "SELECT DISTINCT ItemType FROM tbl_invmaintenance WHERE ItemType IS NOT NULL ORDER BY ItemType ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['ItemType'];
    }
    echo json_encode(['success' => true, 'data' => $data]);
} else {
    echo json_encode(['success' => false, 'message' => 'No data found.']);
}

$conn->close();
?>