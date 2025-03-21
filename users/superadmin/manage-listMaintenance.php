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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteListType'])) {
    // Sanitize and validate input
    $deleteListType = trim($_POST['deleteListType']);

    if (!empty($deleteListType)) {
        try {
            // Prepare SQL query to delete the item type
            $sql = "DELETE FROM tbl_invmaintenance WHERE ItemType = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind the parameter and execute the statement
                $stmt->bind_param("s", $deleteListType);

                if ($stmt->execute()) {
                    // Check if any rows were affected
                    if ($stmt->affected_rows > 0) {
                        echo json_encode(['success' => true, 'message' => 'List type deleted successfully!']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'No matching list type found to delete.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error executing query: ' . $stmt->error]);
                }

                $stmt->close(); // Close the prepared statement
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to prepare SQL statement.']);
            }
        } catch (Exception $e) {
            // Handle any unexpected exceptions
            echo json_encode(['success' => false, 'message' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'List type cannot be empty.']);
    }

    // Close the database connection
    $conn->close();
    exit;
}

// Add a new item to the ItemName column
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedItemType']) && isset($_POST['newItemName'])) {
    $selectedItemType = trim($_POST['selectedItemType']);
    $newItemName = trim($_POST['newItemName']);

    if (!empty($selectedItemType) && !empty($newItemName)) {
        $sql = "INSERT INTO tbl_invmaintenance (ItemType, ItemName) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $selectedItemType, $newItemName);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Item added successfully!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error adding item: ' . $conn->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to prepare statement.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Item name and type cannot be empty.']);
    }

    $conn->close();
    exit;
}

// Handle Bulk Deletion of Items
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['itemsToDelete'])) {
    $itemsToDelete = $_POST['itemsToDelete']; // Array of items to delete

    if (!empty($itemsToDelete)) {
        // Prepare placeholders for SQL IN clause
        $placeholders = implode(',', array_fill(0, count($itemsToDelete), '?'));
        $sql = "DELETE FROM tbl_invmaintenance WHERE ItemName IN ($placeholders)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Dynamically bind parameters
            $types = str_repeat('s', count($itemsToDelete)); // 's' for string
            $stmt->bind_param($types, ...$itemsToDelete);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Selected items were successfully removed.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error deleting items: ' . $conn->error]);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to prepare statement.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No items to delete.']);
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