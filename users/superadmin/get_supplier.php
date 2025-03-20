<?php
require_once '../../includes/config.php';

if (isset($_POST['id'])) {
    $supplierId = $_POST['id'];
    
    $sql = "SELECT Supplier, TIN, Address, Name, ContactNumber 
            FROM tbl_suppliers 
            WHERE ID = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $supplierId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array(
            'success' => true,
            'supplier' => $row['Supplier'],
            'tin' => $row['TIN'],
            'address' => $row['Address'],
            'name' => $row['Name'],
            'contactNumber' => $row['ContactNumber']
        );
    } else {
        $response = array('success' => false);
    }
    
    $stmt->close();
    $conn->close();
    
    echo json_encode($response);
}
?>