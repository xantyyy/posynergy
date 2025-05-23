<?php include_once 'header.php'; ?>

			<!--MENU SIDEBAR CONTENT-->
			<nav id="sidebar">
				<div class="sidebar-header">
					<img src="../../assets/images/isynergies.png" class="img-fluid"/>
					<?php 
						
						$admin = $_SESSION['admin_name'];
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
						
					<li class="dropdown">
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
					<!-- <li class="dropdown">
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
					</li>
					<li class="">
						<a href="charts.php" class="dashboard"><i class="material-icons">equalizer</i><span>Charts</span></a>
					</li> -->
 
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
						
						<a class="navbar-brand" href="#">Edit Product</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>

                <!-- PHP UPDATING DATABASE for PRODUCTS -->

                <?php 
                    require_once '../../includes/config.php';

                    if(isset($_POST['update'])) {
                        $id = $_GET['id'];

                        $name = $_POST['name'];
						$category = $_POST['category'];
						$price = $_POST['price'];

                        $sql = mysqli_query($conn, "UPDATE products SET name='$name', category_id='$category', price='$price' WHERE product_id='$id'");
                        if($sql) {
                            echo "<script>alert('You have successfully updated the record!');</script>";
                            echo "<script>document.location='products-manage.php';</script>";
                        }
                    }
                ?>

                <!--MAIN CONTENT HERE!!!!!!!!-->
                <div class="container">
					<div class="row" style="margin: 0 20px;">
						<div class="col-md-12">
							<br /><br />
							<h2>Update Product Information</h2>
						</div>
					</div>

					<!-- FORM FOR ADDING USERS --> 
					<form method="POST" style="margin: 0 20px;">

                        <?php 

                            $id = $_GET['id'];
                            $sql1 = mysqli_query($conn, "SELECT * FROM (products INNER JOIN categories ON products.category_id = categories.category_id) WHERE product_id = '$id'");

                            while ($row = mysqli_fetch_array($sql1)) {

                            
                        ?>
						<br /><br />
						<h4>Product Information: </h4>

						<div class="row">
							<div class="col-md-12">
								<label>Name:</label>
								<input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Category:</label>
								<select class='form-select' name='category' required>
									<option selected hidden value="<?php echo $row['category_id']; ?>"><?php echo $row['category_description']; } ?></option>
									<?php 

										$sql2 = "SELECT * FROM categories";
										$result = $conn->query($sql2);

										while ($row = $result->fetch_assoc()) {
											echo "<option value='" . $row["category_id"] . "'>" . $row["category_description"] . "</option>";
										}
									?>
								</select>
							</div>
                            <div class="col-md-6">
                                <label>Price:</label>
                                <?php 

                                    $id = $_GET['id'];
                                    $sql6 = mysqli_query($conn, "SELECT * FROM products WHERE product_id = '$id'");

                                    while ($row = mysqli_fetch_array($sql6)) {
                                ?>
                                <input type="text" name="price" value="<?php echo $row['price']; } ?>" class="form-control" required>
                            </div>
						</div>

						<!-- BUTTONS FOR ADDING USERS --> 
						<div class="row" style="margin-top: 1%;">
							<div class="col-md-12 d-flex justify-content-end">
								<button type="text" name="update" class="btn btn-success">Update</button> &nbsp;&nbsp;&nbsp;
								<a href="products-manage.php" class="btn btn-danger">Cancel</a>
							</div>
						</div><br />

					</form>
				</div>


<?php include_once 'footer.php'; ?>