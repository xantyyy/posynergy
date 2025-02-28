<?php
// Connect to MySQL database
include '../../includes/config.php';

// Prepare and bind statement for inserting sales data
$stmt = $conn->prepare("INSERT INTO sales (invoice_number, invoice_date, product_id, category_id, quantity, price, subtotal_amount, discount, user_id, branch_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiiddiii", $invoice_number, $invoice_date, $product_id, $category_id, $quantity, $price, $subtotal_amount, $discount, $user_id, $branch_id);

// Get the current date and time
$date = new DateTime();
$timestamp = $date->format('YmdHis');

// Generate a random number
$rand = rand(1000, 9999);

// Get form data
$invoice_number = "INV-" . $timestamp . "-" . $rand;
$user_id = $_POST["user"];
$branch_id = $_POST["branch"];
$invoice_date = $_POST["date"];

// Loop through each product in the table and insert into database
for ($i = 0; $i < count($_POST["category"]); $i++) {
    $category_id = $_POST["category"][$i];
    $product_id = $_POST["name"][$i];
    $quantity = $_POST["quantity"][$i];
    $price = $_POST["price"][$i];

    // Fetch discount from database
    $discount_query = $conn->prepare("SELECT discount FROM products WHERE product_id = ?");
    $discount_query->bind_param("i", $product_id);
    $discount_query->execute();
    $discount_result = $discount_query->get_result();
    $discount_row = $discount_result->fetch_assoc();
    $discount = $discount_row['discount'];
    $discount_query->close();

    // Calculate subtotal after applying discount
    $subtotal_amount = $price * $quantity * (1 - ($discount / 100));

    // Insert sales data into the sales table
    $stmt->execute();

    // Update product quantity
    $update_quantity = $conn->prepare("UPDATE products SET product_quantity = product_quantity - ? WHERE product_id = ?");
    $update_quantity->bind_param("ii", $quantity, $product_id);
    $update_quantity->execute();
    $update_quantity->close();
}

// Close statement and database connection
$stmt->close();
$conn->close();

// Redirect back to the form page
if($stmt){
    echo "<script>alert('You have successfully added a new sale!');</script>";
    echo "<script>document.location='sales-manage.php';</script>";
}
exit();
?>