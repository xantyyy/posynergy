<?php include_once 'header.php'; ?>

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
                                require_once '../../includes/config.php';

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

                                $conn->close();

                            ?>
                            
                            <div class="col-md-3">
                                <input type="text" name="user" readonly hidden value="<?php echo $user_id; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="branch" readonly hidden value="<?php echo $branch_id; ?>" class="form-control">
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
                                        include '../../includes/config.php';

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
                            <button type="submit" name="create_sales" class="btn btn-success"><i class="fa fa-save"></i> Create Sales</button>
                        </div>
                    </form>
                </div>
                    <script>
                        function fetchProductPrice(selectElement) {
                            var productId = selectElement.value;
                            var row = selectElement.closest("tr"); // Get the row element
                            var priceInput = row.querySelector(".price");
                            var quantityInput = row.querySelector(".quantity");
                            var discountInput = row.querySelector(".discount");

                            // Send an AJAX request to fetch product details (price, quantity, discount)
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    var response = JSON.parse(xhr.responseText);

                                    // Update price and quantity
                                    priceInput.value = response.price;
                                    quantityInput.max = response.quantity;

                                    // Fetch discount from database
                                    discountInput.value = response.discount;
                                    discountInput.setAttribute("readonly", true); // Ensure discount field is readonly
                                    discountInput.classList.add("disabled"); // Optional: Add CSS class for styling

                                    // Apply additional discount based on ID type (if applicable)
                                    applyDiscount(row);

                                    // Calculate updated subtotal and total
                                    calculateSubtotal(row);
                                    calculateTotals();
                                }
                            };
                            xhr.open("POST", "sales-get-price.php", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.send("product_id=" + productId);
                        }

                        // Function to apply automatic discount based on selected ID
                        function applyDiscount(discountInput) {
                            var idType = document.querySelector('input[name="id_type"]:checked'); // Get selected ID type

                            if (idType) {
                                var discountValue = 0;
                                if (idType.value === "PWD" || idType.value === "Senior Citizen") {
                                    discountValue = 20; // 20% discount
                                } else if (idType.value === "Solo Parent" || idType.value === "Gift Card") {
                                    discountValue = 10; // 10% discount
                                }

                                // Apply discount and disable manual editing
                                discountInput.value = discountValue;
                                discountInput.setAttribute("readonly", true);
                                discountInput.classList.add("disabled"); // Optional styling
                            } else {
                                discountInput.value = 0; // No discount
                                discountInput.removeAttribute("readonly");
                                discountInput.classList.remove("disabled");
                            }
                        }

                        // Recalculate when ID type is changed
                        document.querySelectorAll('input[name="id_type"]').forEach((radio) => {
                            radio.addEventListener("change", function () {
                                document.querySelectorAll(".discount").forEach((discountInput) => {
                                    applyDiscount(discountInput);
                                });
                                calculateTotals();
                            });
                        });

                        // Calculate subtotal when quantity or discount changes
                        $('#product-table').on('input', '.quantity, .discount', function() {
                            var row = $(this).closest('tr');
                            calculateSubtotal(row);
                            calculateTotals();
                        });

                        // Calculate total price
                        function calculateTotals() {
                            var subtotal = 0;
                            $('.subtotal').each(function() {
                                subtotal += parseFloat($(this).val());
                            });
                            $('#subtotal').val(subtotal.toFixed(2));

                            var total = subtotal;
                            $('#total').val(total.toFixed(2));
                        }

                        // Calculate subtotal for each row
                        function calculateSubtotal(row) {
                            var quantity = row.find('.quantity').val();
                            var price = row.find('.price').val();
                            var discount = row.find('.discount').val();
                            var subtotal = quantity * price * (1 - discount / 100);
                            row.find('.subtotal').val(subtotal.toFixed(2));
                        }

                        // Add product row via AJAX
                        $('#add-product').click(function() {
                            $.ajax({
                                url: 'sales-add-rows.php',
                                method: 'GET',
                                success: function(responseHTML) {
                                    $('#product-table tbody').append(responseHTML);
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                    console.error('Error: ' + textStatus + ' ' + errorThrown);
                                }
                            });
                        });

                        // Delete product row
                        $('#product-table').on('click', '.delete-product', function() {
                            $(this).closest('tr').remove();
                            calculateTotals();
                        });

                        // When category changes, fetch corresponding products
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

                        // Ensure correct total is sent to the database
                        $('#create-sale').click(function() {
                            var totalAmount = $('#total').val();
                            
                            $.ajax({
                                url: "sales-create.php",
                                type: "POST",
                                data: {total: totalAmount},
                                success: function(response) {
                                    alert("Sale created successfully!"); // Replace with proper UI feedback
                                    location.reload(); // Reload the page to reset form
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                    console.error('Error: ' + textStatus + ' ' + errorThrown);
                                }
                            });
                        });
                    </script>

<?php include_once 'footer.php'; ?>