<?php include_once 'header.php'; ?>

<?php
include '../../includes/config.php';

// Check if a capital entry exists for today
$today = date('Y-m-d');
$sql = "SELECT * FROM cashier_monitor WHERE date = '$today'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $capitalAdded = true;
} else {
    $capitalAdded = false;
}
?>

<script>
    var capitalAdded = <?php echo $capitalAdded ? 'true' : 'false'; ?>;
</script>

<!--MENU SIDEBAR CONTENT-->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="../../assets/images/isynergies.png" class="img-fluid"/>
        <?php 
            $admin = $_SESSION['cashier_name'];
            $sql1 = "SELECT * FROM (users INNER JOIN branches ON users.branch_id = branches.branch_id) WHERE username = '$admin'";
            $result = $conn->query($sql1);
            while($row = $result->fetch_assoc()) {
                $branch = $row['branch_description'];
                $name = $row['first_name'] . " " . $row['last_name'];
                $role = $row['role'];
        ?>
        <div class="ml-auto" id="userInfo">
            <p class="text-right"><?php echo $name . " | " . $role; ?></p>
            <p class="text-right"><?php echo $branch; } ?></p>
        </div>
    </div>
    <ul class="list-unstyled components">
        <li class="">
            <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
        </li>
        <li class="dropdown active">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="material-icons">point_of_sale</i><span>Sales</span></a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                <li>
                    <a href="sales-add.php">Add New Sale</a>
                </li>
                <li>
                    <a href="sales-manage.php">Manage Sales</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="charts.php" class="dashboard"><i class="material-icons">equalizer</i><span>Charts</span></a>
        </li>
        <li class="logout">
            <a href="?logout='1'"><i class="material-icons">logout</i><span>Logout</span></a>
        </li>
    </ul>
</nav>
<div id="content">

    <!--TOP NAVBAR CONTENT-->
    <div class="top-navbar">
        <nav class="navbar  navbar-expand-lg">
            <button type="button" id="sidebar-collapse" class="back">
            <span class="material-icons"></span>
            </button>
            
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>
            
        </nav>
    </div>	  

    <!--MAIN CONTENT HERE!!!!!!!!-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br /><br />
                <h2 style="margin: 0 20px;">Add New Sale</h2>
            </div>
        </div>
        <!-- Display the table for adding new sales -->
        <form method="POST" action="sales-create-sales.php" style="margin: 0 20px;">

            <br />

            <div class="row">
                <div class="col-md-4">
                </div>

                <?php 
                    $admin_name = $_SESSION['cashier_name'];
                    $sql = "SELECT * FROM users INNER JOIN branches ON users.branch_id = branches.branch_id WHERE username = '$admin_name'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $user_name = $row["first_name"] . " " . $row["last_name"];
                        $branch_description = $row["branch_description"];
                        $user_id = $row["user_id"];
                        $branch_id = $row["branch_id"];
                    } else {
                        $user_name = "Unknown";
                        $branch_description = "Unknown";
                    }
                ?>
                
                <div class="col-md-4">
                    <input type="text" name="user" readonly hidden value="<?php echo $user_id; ?>" class="form-control">
                </div>
                <div class="col-md-8">
                    <input type="text" name="branch" readonly hidden value="<?php echo $branch_id; ?>" class="form-control">
                </div>
                
                <div class="col-md-4 position-relative">
                    <label for="productSearch">Search Product:</label>
                    <input 
                        type="text" 
                        id="productSearch" 
                        class="form-control" 
                        style="margin-bottom: 20px; margin-right: 40px;" 
                        placeholder="Enter Product Name" 
                        autocomplete="off" 
                    >
                    <ul id="searchResults" class="list-group position-absolute" style="z-index: 1000; width: 100%; display: none;">
                        <!-- Search results will appear here -->
                    </ul>
                </div>

                <div class="col-md-2">
                    <label>Type of ID: </label>
                    <div class="d-flex align-items-center">
                        <input type="checkbox" id="type_id_checkbox" name="has_id" class="me-2">
                        <select name="type_id" id="type_id" class="form-control" disabled required>
                            <option selected hidden value="">Select ID Type</option>
                            <option value="PWD">PWD</option>
                            <option value="Senior Citizen">Senior Citizen</option>
                            <option value="Solo Parent">Solo Parent</option>
                            <option value="Gift Card">Gift Card</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <label>Beneficiaries Name: </label>
                    <input type="text" name="benefit" id="benefit" class="form-control" disabled required>
                </div>

                <div class="col-md-3">
                    <label>ID Number: </label>
                    <input type="text" name="id_no" id="id_no" class="form-control" disabled required>
                </div>

                <script>
                    document.getElementById("type_id_checkbox").addEventListener("change", function() {
                        let isChecked = this.checked;
                        
                        document.getElementById("type_id").disabled = !isChecked;
                        document.getElementById("benefit").disabled = !isChecked;
                        document.getElementById("id_no").disabled = !isChecked;
                    });
                </script>

                <div class="col-md-3">
                    <label>Date: </label>
                    <input type="text" name="date" readonly value="<?php echo date("Y-m-d"); ?>" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-select" hidden>
                        <option selected hidden value="">Select Here... </option>
                        <?php 
                            $sql = "SELECT * FROM status";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["status_id"] . "'>" . $row["status_description"] . "</option>";
                            }
                        ?>
                    </select>
                </div>
            </div><br />

            <table class="table" id="product-table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount (%)</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select id="category" name="category[]" class="form-select category" required>
                                <option selected hidden value="">Select Category Here...</option>
                                <?php 
                                    $sql2 = "SELECT * FROM categories";
                                    $result = $conn->query($sql2);

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["category_id"] . "'>" . $row["category_description"] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select id="name" name="name[]" class="form-select name" required onchange="fetchProductPrice(this)">
                            </select>
                        </td>
                        <td><input type="number" name="quantity[]" class="form-control quantity" min="1" required></td>
                        <td><input type="number" name="price[]" class="form-control price" readonly></td>
                        <td><input type="number" name="discount[]" class="form-control discount" value="0" readonly></td>
                        <td><input type="number" name="subtotal[]" class="form-control subtotal" readonly></td>
                        <td><button type="button" class="btn btn-danger delete-product"><i class="fa fa-trash"></i></button></td>
                    </tr>
                </tbody>
                <tfoot> 
                    <tr>
                        <td colspan="4" class="text-right"></td>
                        <td class="text-right">Total:</td>
                        <td><input type="number" id="total" name="total" class="form-control" readonly></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="buttons pull-right">
                <button type="button" id="add-product" class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</button>
                <button type="submit" name="create_sales" id="create-sale" class="btn btn-success"><i class="fa fa-save"></i> Create Sales</button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (!capitalAdded) {
                document.querySelectorAll('input, select, button').forEach(function(element) {
                    if (element.type !== 'button' && element.type !== 'submit') {
                        element.disabled = true;
                    }
                });

                document.getElementById('add-product').disabled = true;
                document.getElementById('create-sale').disabled = true;

                alert('Please add capital for today before proceeding with sales.');
            }
        });

        function fetchProductPrice(selectElement) {
            var productId = selectElement.value;
            var row = selectElement.closest("tr");
            var priceInput = row.querySelector(".price");
            var quantityInput = row.querySelector(".quantity");
            var discountInput = row.querySelector(".discount");

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);

                    priceInput.value = response.price;
                    quantityInput.max = response.quantity;
                    discountInput.value = response.discount;
                    discountInput.setAttribute("readonly", true);
                    discountInput.classList.add("disabled");

                    applyDiscount(row);
                    calculateSubtotal(row);
                    calculateTotals();
                }
            };
            xhr.open("POST", "sales-get-price.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("product_id=" + productId);
        }

        function applyDiscount(discountInput) {
            var idType = document.querySelector('input[name="id_type"]:checked');

            if (idType) {
                var discountValue = 0;
                if (idType.value === "PWD" || idType.value === "Senior Citizen") {
                    discountValue = 20;
                } else if (idType.value === "Solo Parent" || idType.value === "Gift Card") {
                    discountValue = 10;
                }

                discountInput.value = discountValue;
                discountInput.setAttribute("readonly", true);
                discountInput.classList.add("disabled");
            } else {
                discountInput.value = 0; // No discount
                discountInput.removeAttribute("readonly");
                discountInput.classList.remove("disabled");
            }
        }

        document.querySelectorAll('input[name="id_type"]').forEach((radio) => {
            radio.addEventListener("change", function () {
                document.querySelectorAll(".discount").forEach((discountInput) => {
                    applyDiscount(discountInput);
                });
                calculateTotals();
            });
        });

        $('#product-table').on('input', '.quantity, .discount', function() {
            var row = $(this).closest('tr');
            calculateSubtotal(row);
            calculateTotals();
        });

        function calculateTotals() {
            var subtotal = 0;
            $('.subtotal').each(function() {
                subtotal += parseFloat($(this).val());
            });
            $('#subtotal').val(subtotal.toFixed(2));

            var total = subtotal;
            $('#total').val(total.toFixed(2));
        }

        function calculateSubtotal(row) {
            var quantity = row.find('.quantity').val();
            var price = row.find('.price').val();
            var discount = row.find('.discount').val();
            var subtotal = quantity * price * (1 - discount / 100);
            row.find('.subtotal').val(subtotal.toFixed(2));
        }

        $('#add-product').click(function () {
            $.ajax({
                url: 'sales-add-rows.php',
                method: 'GET',
                success: function (responseHTML) {
                    $('#product-table tbody').append(responseHTML);

                    var newRow = $('#product-table tbody tr:last');
                    var discountInput = newRow.find('.discount');

                    discountInput.attr('readonly', true);
                    discountInput.addClass('disabled');
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error('Error: ' + textStatus + ' ' + errorThrown);
                }
            });
        });

        $('#product-table').on('click', '.delete-product', function() {
            $(this).closest('tr').remove();
            calculateTotals();
        });

        $(document).ready(function() {
            $(document).on("change", ".category", function() {
                var category_id = $(this).val();
                var row = $(this).closest("tr");
                var nameSelect = row.find(".name");

                $.ajax({
                    url: "sales-get-products.php",
                    type: "POST",
                    data: {category_id: category_id},
                    success: function(data) {
                        nameSelect.html(data);
                    }
                });
            });
        });

        $('#create-sale').click(function() {
            var totalAmount = $('#total').val();
            
            $.ajax({
                url: "sales-create.php",
                type: "POST",
                data: {total: totalAmount},
                success: function(response) {
                    alert("Sale created successfully!");
                    location.reload();
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error('Error: ' + textStatus + ' ' + errorThrown);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const productSearch = document.getElementById('productSearch');
            const searchResults = document.getElementById('searchResults');

            productSearch.addEventListener('input', function () {
                const query = this.value.trim();
                console.log("Search query:", query);

                if (query.length > 0) {
                    // Send AJAX request to fetch matching products
                    fetch('fetch-products.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `query=${encodeURIComponent(query)}`,
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log("Response data:", data);

                            searchResults.innerHTML = '';
                            searchResults.style.display = 'block';

                            if (data.length > 0) {
                                data.forEach(product => {
                                    const li = document.createElement('li');
                                    li.classList.add('list-group-item', 'search-result-item');
                                    
                                    li.innerHTML = `
                                        <strong>${product.name}</strong><br>
                                        <small>Category: ${product.category}</small><br>
                                        <small>Price: ₱${parseFloat(product.price).toLocaleString()}</small>
                                    `;
                                    li.dataset.productId = product.id;

                                    li.addEventListener('click', function () {
                                        productSearch.value = product.name;
                                        searchResults.style.display = 'none';
                                    });

                                    searchResults.appendChild(li);
                                });
                            } else {
                                const li = document.createElement('li');
                                li.classList.add('list-group-item');
                                li.textContent = 'No results found.';
                                searchResults.appendChild(li);
                            }
                        })
                        .catch(error => {
                            console.error("Error fetching products:", error);
                        });
                } else {
                    searchResults.style.display = 'none';
                }
            });

            document.addEventListener('click', function (e) {
                if (!productSearch.contains(e.target) && !searchResults.contains(e.target)) {
                    searchResults.style.display = 'none';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            let barcodeBuffer = '';
            let scanning = false;

            document.addEventListener('keydown', function (event) {
                if (!scanning) scanning = true;

                if (event.key === 'Enter') {
                    const trimmedBarcode = barcodeBuffer.trim();
                    processBarcode(trimmedBarcode);
                    barcodeBuffer = '';
                    scanning = false;
                } else {
                    barcodeBuffer += event.key;
                }
            });

            function processBarcode(barcode) {
                fetch('sales-fetch-barcode.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `barcode=${encodeURIComponent(barcode)}`,
                })
                .then(response => response.json())
                .then(product => {
                    if (product.error) {
                        alert('Product not found!');
                        return;
                    }

                    addOrUpdateProductRow(product);
                })
                .catch(error => {
                    console.error('Error fetching product by barcode:', error);
                });
            }

            function addOrUpdateProductRow(product) {
                const tableBody = document.querySelector('#product-table tbody');

                removeEmptyRows();

                const existingRow = findExistingRow(product.product_id);

                if (existingRow) {
                    updateRow(existingRow, product);
                } else {
                    const newRowHTML = createNewRowHTML(product);
                    tableBody.insertAdjacentHTML('beforeend', newRowHTML);
                }

                calculateTotals();
            }

            function removeEmptyRows() {
                const rows = document.querySelectorAll('#product-table tbody tr');
                rows.forEach(row => {
                    const nameSelect = row.querySelector('.name');
                    if (!nameSelect || nameSelect.value.trim() === '') {
                        row.remove();
                    }
                });
            }

            function findExistingRow(productId) {
                const rows = document.querySelectorAll('#product-table tbody tr');
                return Array.from(rows).find(row => {
                    const nameSelect = row.querySelector('.name');
                    return nameSelect && nameSelect.value === productId.toString();
                });
            }

            function updateRow(row, product) {
                const quantityInput = row.querySelector('.quantity');
                const subtotalInput = row.querySelector('.subtotal');
                const price = parseFloat(row.querySelector('.price').value);
                const discount = parseFloat(row.querySelector('.discount').value);

                quantityInput.value = parseInt(quantityInput.value) + 1;
                subtotalInput.value = (
                    parseInt(quantityInput.value) *
                    price *
                    (1 - discount / 100)
                ).toFixed(2);
            }

            function createNewRowHTML(product) {
                return `
                    <tr>
                        <td>
                            <select name="category[]" class="form-select category" required>
                                <option selected value="${product.category_id}">${product.category}</option>
                            </select>
                        </td>
                        <td>
                            <select name="name[]" class="form-select name" required>
                                <option selected value="${product.product_id}">${product.name}</option>
                            </select>
                        </td>
                        <td><input type="number" name="quantity[]" class="form-control quantity" value="1" min="1"></td>
                        <td><input type="number" name="price[]" class="form-control price" value="${product.price}" readonly></td>
                        <td><input type="number" name="discount[]" class="form-control discount" value="${product.discount}" readonly></td>
                        <td><input type="number" name="subtotal[]" class="form-control subtotal" value="${(product.price * (1 - product.discount / 100)).toFixed(2)}" readonly></td>
                        <td><button type="button" class="btn btn-danger delete-product"><i class="fa fa-trash"></i></button></td>
                    </tr>
                `;
            }

            function calculateTotals() {
                let total = 0;

                document.querySelectorAll('.subtotal').forEach(input => {
                    total += parseFloat(input.value) || 0;
                });

                document.querySelector('#total').value = total.toFixed(2);
            }

            document.querySelector('#product-table').addEventListener('click', function (event) {
                if (event.target.classList.contains('delete-product')) {
                    const row = event.target.closest('tr');
                    row.remove();
                    calculateTotals();
                }
            });
        });
    </script>

<style>
	.navbar{
	background-color:#2DAA9E;
	color:#fff;
}
</style>

<?php 
$conn->close();
include_once 'footer.php'; 
?>