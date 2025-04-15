<?php
require_once '../../includes/config.php';

header('Content-Type: application/json');

// Get the raw POST data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

try {
    if (!isset($conn)) {
        throw new Exception('Database connection ($conn) not found in config.php');
    }

    if (!isset($data['items']) || empty($data['items'])) {
        throw new Exception('No items provided to save.');
    }

    // Begin transaction to ensure data consistency
    $conn->begin_transaction();

    // Prepare the insert statement
    $query = "INSERT INTO tbl_purchasepending (
        POnumber, POdate, Supplier, SupAddress, ContactPerson, ContactNo, ShipTo, Address, 
        Purpose, Remarks, Terms, Barcode, Category, ProductCode, ProductName, Shelf, 
        ShelfDescription, Quantity, Unit, CostPrice, Discount, TotalCostPrice, ExpirationDate, 
        ReceivingNo, User, Location, IsVat, CompanyVat
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        throw new Exception('Prepare failed: ' . $conn->error);
    }

    // Insert each item
    foreach ($data['items'] as $item) {
        $discount = 0; // Default value
        $expirationDate = null; // Default value (NULL for database)

        $stmt->bind_param(
            'sssssssssssssssssisdssdsssss',
            $data['poNumber'],
            $data['poDate'],
            $data['supplier'],
            $data['supAddress'],
            $data['contactPerson'],
            $data['contactNo'],
            $data['shipTo'],
            $data['address'],
            $data['purpose'],
            $data['remarks'],
            $data['terms'],
            $item['barcode'],
            $item['category'],
            $item['productCode'],
            $item['productName'],
            $item['shelf'],
            $item['shelfDescription'],
            $item['quantity'],
            $item['unit'],
            $item['appliedSRP'],
            $discount,
            $item['totalCostPrice'],
            $expirationDate,
            $data['receivingNo'],
            $data['user'],
            $data['location'],
            $item['isVat'],
            $data['companyVat']
        );

        if (!$stmt->execute()) {
            throw new Exception('Execute failed: ' . $stmt->error);
        }
    }

    // Commit the transaction
    $conn->commit();
    $stmt->close();

    echo json_encode(['success' => true, 'message' => 'Data successfully saved to tbl_purchasepending']);
} catch (Exception $e) {
    // Rollback the transaction on error
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>