<?php
require_once '../../includes/config.php'; // Database connection

//
// Get search query
$search = $_POST['query'];

// Search in multiple columns
$sql = "SELECT ID, Barcode, ProductName, SRP FROM tbl_productprice 
        WHERE Barcode LIKE '%$search%' 
        OR ProductName LIKE '%$search%' 
        OR SRP LIKE '%$search%'
        LIMIT 10";
        
$result = $conn->query($sql);

// Generate HTML for search results
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="search-item" 
            data-value="'.$row['ID'].'" 
            data-name="'.$row['ProductName'].'" 
            data-price="'.$row['SRP'].'" 
            data-barcode="'.$row['Barcode'].'">';
        echo '<strong>'.$row['ProductName'].'</strong><br>';
        echo 'Barcode: '.$row['Barcode'].' | SRP: ₱'.$row['SRP'];
        echo '</div>';
    }
} else {
    echo '<div class="search-item">No results found</div>';
}

$conn->close();
?>