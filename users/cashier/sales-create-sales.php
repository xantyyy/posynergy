<?php
    // Connect to MySQL database
    include '../../includes/config.php';

    // Prepare and bind statement for inserting sales data
    $stmt = $conn->prepare("INSERT INTO sales (invoice_number, invoice_date, product_id, category_id, quantity, price, subtotal_amount, discount, user_id, branch_id, id_number, b_name, type_id) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiiddiiisss", $invoice_number, $invoice_date, $product_id, $category_id, $quantity, $price, $subtotal_amount, $discount, $user_id, $branch_id, $id_number, $b_name, $type_id);

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
    $id_number = isset($_POST["id_no"]) ? $_POST["id_no"] : NULL;
    $b_name = isset($_POST["benefit"]) ? $_POST["benefit"] : NULL;
    $type_id = isset($_POST["type_id"]) ? $_POST["type_id"] : NULL;

    // Determine discount based on ID type
    $id_discount = 0;
    if ($type_id == "PWD" || $type_id == "Senior Citizen") {
        $id_discount = 20; // 20% discount
    } elseif ($type_id == "Solo Parent" || $type_id == "Gift Card") {
        $id_discount = 10; // 10% discount
    }

    // Initialize daily sales total
    $daily_sales_total = 0;

    // Loop through each product in the table and insert into database
    for ($i = 0; $i < count($_POST["category"]); $i++) {
        $category_id = $_POST["category"][$i];
        $product_id = $_POST["name"][$i];
        $quantity = $_POST["quantity"][$i];
        $price = $_POST["price"][$i];

        // Fetch product discount from database
        $discount_query = $conn->prepare("SELECT discount FROM products WHERE product_id = ?");
        $discount_query->bind_param("i", $product_id);
        $discount_query->execute();
        $discount_result = $discount_query->get_result();
        $discount_row = $discount_result->fetch_assoc();
        $product_discount = $discount_row['discount'] ?? 0;
        $discount_query->close();

        // Determine the highest discount to apply (either product or ID type)
        $discount = max($product_discount, $id_discount);

        // Calculate subtotal after applying discount
        $subtotal_amount = $price * $quantity * (1 - ($discount / 100));
        $daily_sales_total += $subtotal_amount;

        // Insert sales data into the sales table
        if (!$stmt->execute()) {
            die("Error inserting sale: " . $stmt->error);
        }

        // Update product quantity
        $update_quantity = $conn->prepare("UPDATE products SET product_quantity = product_quantity - ? WHERE product_id = ?");
        $update_quantity->bind_param("ii", $quantity, $product_id);
        if (!$update_quantity->execute()) {
            die("Error updating product quantity: " . $update_quantity->error);
        }
        $update_quantity->close();
    }

    // Check if a daily sales record exists in cashier_monitor
    $monitor_query = $conn->prepare("SELECT daily_sale FROM cashier_monitor WHERE date = ?");
    $monitor_query->bind_param("s", $invoice_date);
    $monitor_query->execute();
    $monitor_result = $monitor_query->get_result();

    if ($monitor_result->num_rows > 0) {
        // Update the existing daily sales record
        $monitor_row = $monitor_result->fetch_assoc();
        $updated_daily_sale = $monitor_row['daily_sale'] + $daily_sales_total;

        $update_monitor = $conn->prepare("UPDATE cashier_monitor SET daily_sale = ? WHERE date = ?");
        $update_monitor->bind_param("ds", $updated_daily_sale, $invoice_date);
        if (!$update_monitor->execute()) {
            die("Error updating daily sales: " . $update_monitor->error);
        }
        $update_monitor->close();
    } else {
        // Insert a new daily sales record
        $insert_monitor = $conn->prepare("INSERT INTO cashier_monitor (daily_sale, date) VALUES (?, ?)");
        $insert_monitor->bind_param("ds", $daily_sales_total, $invoice_date);
        if (!$insert_monitor->execute()) {
            die("Error inserting daily sales: " . $insert_monitor->error);
        }
        $insert_monitor->close();
    }
    $monitor_query->close();

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect only if the insertion is successful
    echo "<script>alert('You have successfully added a new sale!');</script>";
    echo "<script>document.location='sales-manage.php';</script>";
    exit();
?>
