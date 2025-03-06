<?php
include '../../includes/config.php';

error_log("Received POST data: " . print_r($_POST, true));

$stmt = $conn->prepare("INSERT INTO sales (invoice_number, invoice_date, product_id, category_id, quantity, price, subtotal_amount, discount, user_id, branch_id, id_number, b_name, type_id) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiiddiiisss", $invoice_number, $invoice_date, $product_id, $category_id, $quantity, $price, $subtotal_amount, $discount, $user_id, $branch_id, $id_number, $b_name, $type_id);

$date = new DateTime();
$timestamp = $date->format('YmdHis');
$rand = rand(1000, 9999);

$invoice_number = "INV-" . $timestamp . "-" . $rand;
$user_id = $_POST["user"] ?? null;
$branch_id = $_POST["branch"] ?? null;
$invoice_date = $_POST["date"] ?? null;
$id_number = $_POST["id_no"] ?? null;
$b_name = $_POST["benefit"] ?? null;
$type_id = $_POST["type_id"] ?? null;

if (!$user_id || !$branch_id || !$invoice_date) {
    die("Missing required fields: User ID, Branch ID, or Invoice Date.");
}

$id_discount = 0;
if ($type_id == "PWD" || $type_id == "Senior Citizen") {
    $id_discount = 20;
} elseif ($type_id == "Solo Parent" || $type_id == "Gift Card") {
    $id_discount = 10;
}

$daily_sales_total = 0;

if (!isset($_POST["category"], $_POST["name"], $_POST["quantity"], $_POST["price"])) {
    die("Missing product details in the form.");
}

$categories = $_POST["category"];
$product_ids = $_POST["name"];
$quantities = $_POST["quantity"];
$prices = $_POST["price"];

for ($i = 0; $i < count($categories); $i++) {
    $category_id = $categories[$i] ?? null;
    $product_id = $product_ids[$i] ?? null;
    $quantity = $quantities[$i] ?? 0;
    $price = $prices[$i] ?? 0;

    error_log("Processing product - Category ID: $category_id, Product ID: $product_id, Quantity: $quantity, Price: $price");

    if (!$category_id || !$product_id || $quantity <= 0 || $price <= 0) {
        error_log("Skipping invalid product entry: Category ID: $category_id, Product ID: $product_id, Quantity: $quantity, Price: $price");
        continue;
    }

    $discount_query = $conn->prepare("SELECT discount FROM products WHERE product_id = ?");
    $discount_query->bind_param("i", $product_id);
    $discount_query->execute();
    $discount_result = $discount_query->get_result();
    $discount_row = $discount_result->fetch_assoc();
    $product_discount = $discount_row['discount'] ?? 0;
    $discount_query->close();

    $discount = max($product_discount, $id_discount);

    $subtotal_amount = $price * $quantity * (1 - ($discount / 100));
    $daily_sales_total += $subtotal_amount;

    if (!$stmt->execute()) {
        die("Error inserting sale: " . $stmt->error);
    }

    $update_quantity = $conn->prepare("UPDATE products SET product_quantity = product_quantity - ? WHERE product_id = ?");
    $update_quantity->bind_param("ii", $quantity, $product_id);
    if (!$update_quantity->execute()) {
        die("Error updating product quantity: " . $update_quantity->error);
    }
    $update_quantity->close();
}

$monitor_query = $conn->prepare("SELECT daily_sale FROM cashier_monitor WHERE date = ?");
$monitor_query->bind_param("s", $invoice_date);
$monitor_query->execute();
$monitor_result = $monitor_query->get_result();

if ($monitor_result->num_rows > 0) {
    $monitor_row = $monitor_result->fetch_assoc();
    $updated_daily_sale = $monitor_row['daily_sale'] + $daily_sales_total;

    $update_monitor = $conn->prepare("UPDATE cashier_monitor SET daily_sale = ? WHERE date = ?");
    $update_monitor->bind_param("ds", $updated_daily_sale, $invoice_date);
    if (!$update_monitor->execute()) {
        die("Error updating daily sales: " . $update_monitor->error);
    }
    $update_monitor->close();
} else {
    $insert_monitor = $conn->prepare("INSERT INTO cashier_monitor (daily_sale, date) VALUES (?, ?)");
    $insert_monitor->bind_param("ds", $daily_sales_total, $invoice_date);
    if (!$insert_monitor->execute()) {
        die("Error inserting daily sales: " . $insert_monitor->error);
    }
    $insert_monitor->close();
}

$monitor_query->close();
$stmt->close();
$conn->close();

echo "<script>alert('You have successfully added a new sale!');</script>";
echo "<script>document.location='sales-manage.php';</script>";
exit();
?>