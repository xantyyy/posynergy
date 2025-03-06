<?php include_once 'header.php'; ?>

			<!--MENU SIDEBAR CONTENT-->
			<nav id="sidebar">
				<div class="sidebar-header">
					<img src="../../assets/images/isynergies.png" class="img-fluid"/>
					<?php 
						
						$admin = $_SESSION['superadmin_name'];
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
						
					<!-- <li class="dropdown">
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
					</li> -->
					<li class="dropdown active">
						<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">inventory</i><span>Products</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu2">
							<li>
								<a href="products-add.php">Add New Product</a>
							</li>
							<li>
								<a href="products-manage.php">Manage Products</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">group</i><span>Categories</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu3">
							<li>
								<a href="categories-add.php">Add New Category</a>
							</li>
							<li>
								<a href="categories-manage.php">Manage Categories</a>
							</li>
						</ul>
					</li>
					<!--<li class="dropdown">
						<a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">local_shipping</i><span>Branches</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu4">
							<li>
								<a href="branches-add.php">Add New Branch</a>
							</li>
							<li>
								<a href="branches-manage.php">Manage Branches</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">payments</i><span>Expenses</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu5">
							<li>
								<a href="expenses-add.php">Add New Expenses</a>
							</li>
							<li>
								<a href="expenses-manage.php">Manage Expenses</a>
							</li>
						</ul>
					</li>-->
					<li class="">
						<a href="charts.php" class="dashboard"><i class="material-icons">equalizer</i><span>Charts</span></a>
					</li>
 
					<li class="dropdown">
						<a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">account_circle</i><span>Manage Users</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu7">
							<li>
								<a href="users-add.php">Add New User</a>
							</li>
							<li>
								<a href="users-manage.php">Manage Users</a>
							</li>
						</ul>
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
						
						<a class="navbar-brand" href="#">Add New Product</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	  

				<!-- PHP FOR ADDING NEW PRODUCT IN THE DATABASE -->
				<?php
					require_once '../../includes/config.php';

					if (isset($_POST['submit'])) {
						$barcode = trim($_POST['barcode']);
						$name = $_POST['name'];
						$category = $_POST['category'];
						$price = $_POST['price'];
						$quantity = $_POST['quantity'];
						$discount = $_POST['discount'][0];

						$stmt = $conn->prepare("INSERT INTO products (barcode, name, category_id, price, product_quantity, discount) VALUES (?, ?, ?, ?, ?, ?)");
						$stmt->bind_param("ssidii", $barcode, $name, $category, $price, $quantity, $discount);

						if ($stmt->execute()) {
							echo "<script>alert('New product successfully added!');</script>";
							echo "<script>document.location='products-add.php';</script>";
						} else {
							echo "<script>alert('Something went wrong! Please try again.');</script>";
						}

						$stmt->close();
					}
				?>

				<!--MAIN CONTENT HERE!!!!!!!!-->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<br /><br />
							<h2 style="margin: 0 20px;">Add New Product</h2>
						</div>
					</div>

					<!-- FORM FOR ADDING USERS --> 
					<form method="POST" style="margin: 0 20px;">

						<br /><br />
						<h4>Product Information: </h4>

						<div class="row">

							<!-- Barcode Input -->
							<div class="col-md-4" style="margin-left: 66.7%">
								<label>Barcode:</label>
								<input type="text" id="barcodeInput" name="barcode" class="form-control" placeholder="Scan barcode here" required>
							</div>

							<div class="col-md-6">
								<label>Name:</label>
								<input type="text" name="name" class="form-control" required>
							</div>
							<div class="col-md-6">
								<label>Category</label>
								<select class='form-select' name='category' required>
									<option selected hidden value="">Select Here... </option>
									<?php 
										require_once '../../includes/config.php';

										$sql = "SELECT * FROM categories";
										$result = $conn->query($sql);

										while ($row = $result->fetch_assoc()) {
											echo "<option value='" . $row["category_id"] . "'>" . $row["category_description"] . "</option>";
										}
									?>
								</select>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>Discount:</label>
								<input type="number" name="discount[]" class="form-control discount" value="0" step="1" min="0" max="100">
							</div>
							<div class="col-md-4">
								<label>Quantity:</label>
								<input type="number" name="quantity" class="form-control quantity" value="0" min="1" required>
							</div>
							<div class="col-md-4">
								<label>Price:</label>
								<input type="text" name="price" class="form-control" placeholder="0" required>
							</div>
						</div><br />

						<!-- BUTTONS FOR ADDING USERS --> 
						<div class="row" style="margin-top: 1%;">
							<div class="col-md-12 d-flex justify-content-end">
								<button type="text" name="submit" class="btn btn-primary">Submit</button>&nbsp; &nbsp;
								<a href="products-manage.php" class="btn btn-danger">Cancel</a> 
							</div>
						</div><br />

					</form>
				</div>

				<script>
					document.addEventListener('DOMContentLoaded', function () {
						const barcodeInput = document.getElementById('barcodeInput');
						const allInputs = document.querySelectorAll('input, select'); // Target all inputs and selects

						// Autofocus the barcode input on page load
						barcodeInput.focus();

						// Disable all fields except the barcode input on page load
						allInputs.forEach((input) => {
							if (input.id !== 'barcodeInput') {
								input.disabled = true;
							}
						});

						// Listen for barcode scanning (Enter key after scanning)
						barcodeInput.addEventListener('keypress', function (e) {
							if (e.key === 'Enter') {
								e.preventDefault(); // Prevent form submission

								const scannedBarcode = barcodeInput.value.trim(); // Get the scanned barcode

								if (scannedBarcode) {
									// Make the barcode input readonly (to include in form submission)
									barcodeInput.readOnly = true;

									// Enable all other input fields for editing
									allInputs.forEach((input) => {
										if (input.id !== 'barcodeInput') {
											input.disabled = false;
										}
									});

									// Move focus to the next input field (e.g., Product Name)
									const productNameInput = document.querySelector('input[name="name"]');
									if (productNameInput) {
										productNameInput.focus();
									}
								} else {
									alert('Please scan a valid barcode.');
								}
							}
						});
					});
    			</script>
                <style>
					.navbar{
					background-color:#1137a9;
					color:#fff;
				}
				</style>
<?php include_once 'footer.php'; ?>