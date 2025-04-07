<?php
// Database connection
$conn = new mysqli("localhost", "username", "password", "database");

// Sanitize input
$search = $conn->real_escape_string($_POST['search']);

// Query products table (prioritize barcode matches first)
$query = "(SELECT * FROM tbl_productprice 
          WHERE Barcode LIKE '$search%' 
          ORDER BY Barcode LIMIT 5)
          UNION
          (SELECT * FROM tbl_productprice 
          WHERE ProductName LIKE '%$search%' 
          ORDER BY ProductName LIMIT 5)";

$result = $conn->query($query);

if($result->num_rows > 0) {
    echo '<div class="item-list">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<div class="item-name">'.$row['ProductName'].'</div>';
        echo '<div class="item-details">';
        echo '<span>Qty: 1</span>';
        echo '<span>Price: '.$row['SRP'].'</span>';
        echo '<span>Amount: '.$row['AppliedSRP'].'</span>';
        echo '</div></div>';
    }
    echo '</div>';
} else {
    echo '<p>No products found</p>';
}

$conn->close();
?>