<?php include_once 'header.php'; ?>

			<!--MENU SIDEBAR CONTENT-->
			<nav id="sidebar">
				<div class="sidebar-header">
					<img src="../../assets/images/isynergiesinc.png" class="img-fluid"/>
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
					<li class="active">
						<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
						
					</li>
						
					<li class="dropdown">
						<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">warehouse</i><span>Inventory</span></a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu1">
							<li>
								<a href="incoming.php">Incoming</a>
							</li>
							<li>
								<a href="adjustment-item.php">Adjustment</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">inventory</i><span>Product Profile</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu2">
							<li>
								<a href="product-entry.php">Product Entry</a>
							</li>
							<li>
								<a href="product-search.php">Product Search</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">payment</i><span>Other Transaction</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu3">
							<li>
								<a href="enroll-card.php">Enroll Card</a>
							</li>
							<li>
								<a href="document-reprinter.php">Document Reprinter</a>
							</li>
							<li>
								<a href="discount-setup.php">Discount Setup</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">search</i><span>Search</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu4">
							<li>
								<a href="inventory.php">Inventory</a>
							</li>
							<li>
								<a href="sales.php">Sales</a>
							</li>
							<li>
								<a href="discounts.php">Discounts</a>
							</li>
							<li>
								<a href="adjustment-incoming.php">Adjustemnt / Incoming</a>
							</li>
							<li>
								<a href="product-SL.php">Product SL</a>
							</li>
							<li>
								<a href="return.php">Return</a>
							</li>
							<li>
								<a href="e-journal.php">E-Journal</a>
							</li>
							<li>
								<a href="voided-transaction.php">Voided Transaction</a>
							</li>
							<li>
								<a href="suki-points.php">Suki Points</a>
							</li>
							<li>
								<a href="system-log.php">System Log</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">settings</i><span>Configuration</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu5">
						<li>
								<a href="supplier.php">Supplier</a>
							</li>
							<li>
								<a href="list-maintenance.php">List Maintenance</a>
							</li>
							<li>
								<a href="branch-setup.php">Branch Setup</a>
							</li>
							<li>
								<a href="si-no.-txn-no.php">SI No. & Txn No.</a>
							</li>
							<li>
								<a href="user-accounts.php">User Accounts</a>
							</li>
							<li>
								<a href="permissions.php">Permissions</a>
							</li>
						</ul>
					</li>
 
					<li class="dropdown">
						<a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">build</i><span>Utilities</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu7">
							<li>
								<a href="#">Close Today's Transaction</a>
							</li>
							<li>
								<a href="#">Data Back-up</a>
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
						
						<a class="navbar-brand" href="#">Dashboard</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	  
				
				<!--DASHBOARD CONTENT-->
				<div class="main-content">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header">
									<div class="icon icon-warning">
										<span class="material-icons">equalizer</span>
									</div>
								</div>

								<?php 
									include '../../includes/config.php';

									$sql = "SELECT COUNT(name) AS total_products FROM products";
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {

								?>

								<div class="card-content">
									<p class="category"><strong>No. of Products</strong></p>
									<h4 class="card-title"><?php echo $row['total_products']; ?></h4>
								</div>

								<?php 
										}
									}

									$conn->close();

								?>

								<div class="card-footer">
									<div class="stats">
										<i class="material-icons text-info">info</i>
										<a href="products-manage.php">See detailed report</a>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header">
									<div class="icon icon-rose">
										<span class="material-icons">shopping_cart</span>
									</div>
								</div>

								<?php 
									include '../../includes/config.php';

									$sql = "SELECT SUM(subtotal_amount) AS total_amount FROM sales";
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {

								?>

								<div class="card-content">
									<p class="category"><strong>Total Sales</strong></p>
									<h4 class="card-title">₱<?php echo number_format($row['total_amount']); ?></h4>
								<?php 
										}
									}

									$conn->close();

								?>
								</div>
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">local_offer</i>
										product-wise sales
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header">
									<div class="icon icon-success">
										<span class="material-icons">attach_money</span>
									</div>
								</div>

								<?php 
									include '../../includes/config.php';

									$sql = "SELECT SUM(amount) AS total_amount FROM expenses";
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {

								?>

								<div class="card-content">
									<p class="category"><strong>Expenses</strong></p>
									<h4 class="card-title">₱<?php echo number_format($row['total_amount']); ?></h4>
								</div>

								<?php 
										}
									}

									$conn->close();

								?>

								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">date_range</i> Total Sales Amount
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header">
									<div class="icon icon-info">
										<span class="material-icons">follow_the_signs</span>
									</div>
								</div>

								<?php 
									include '../../includes/config.php';

									$sql = "SELECT COUNT(user_id) AS total_users FROM users";
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {

								?>
								<div class="card-content">
									<p class="category"><strong>No. of Users</strong></p>
									<h3 class="card-title">+<?php echo $row['total_users']; ?></h3>
								</div>

								<?php 
										}
									}

									$conn->close();

								?>

								<div class="card-footer">
									<div class="stats">
										<i class="material-icons">update</i>
										just Updated
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--SECOND ROW OF DASHBOARD CONTENT-->
					
					<div class="row">
						<div class="col-lg-7 col-md-18">
							<div class="card" style="min-height:485px">
								<div class="card-header card-header-text">
									<h4 class="card-title">Total Sales (Line Chart)</h4>
								</div>

								<div class="filter pull-right" style="margin: 20px;">
									<label for="filter">Filter by:</label>
									<select id="filter" class="form-select">
										<option value="weekly">Weekly</option>
										<option value="monthly">Monthly</option>
										<option value="quarterly">Quarterly</option>
										<option value="yearly">Yearly</option>
									</select>
								</div>

								<div style="margin: 20px;">
        							<canvas id="sales-chart"></canvas>
    							</div>

							</div>
						</div>
						<div class="col-lg-5 col-md-18">
							<div class="card" style="min-height:485px">
								<div class="card-header card-header-text">
									<h4 class="card-title">Trending Products</h4>
								</div>

								<div class="filter pull-right" style="margin: 20px;">
									<select id="branch_filter" class="form-select" hidden>
										<option selected value="all">All branches</option>
										<?php 
											include '../../includes/config.php';

											$sql = "SELECT * FROM branches";
											$result = $conn->query($sql);
											
											while($row = $result->fetch_assoc()) {
												echo "<option value='" . $row['branch_id'] . "'>" . $row['branch_description']  . "</option>";
											}

											$conn->close();
										?>
									</select>
								</div>
								<br/><br/>

								<div class="table-responsive">
									<table class="table table-striped table-bordered" id="products_table">
										<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Sold</th>
											</tr>
										</thead>
										<tbody>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				<script>
    var filter = 'weekly';

    var salesChart = new Chart($('#sales-chart'), {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Total Sales',
                data: [],
                fill: false,
                borderColor: '#ff4b5c',
                pointBackgroundColor: '#ff4b5c',
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function updateChart() {
        $.ajax({
            url: 'get-data.php',
            type: 'POST',
            data: { filter: filter },
            dataType: 'json',
            success: function (data) {
                salesChart.data.labels = data.labels;
                salesChart.data.datasets[0].data = data.data;
                salesChart.update();
            }
        });
    }
    

    document.addEventListener("DOMContentLoaded", function () {
        const currentUrl = window.location.pathname.split('/').pop();
        
        document.querySelectorAll('.list-unstyled a').forEach(link => {
            const linkHref = link.getAttribute('href');
            const parentMenu = link.closest('.collapse');
            const dropdownToggle = parentMenu ? parentMenu.previousElementSibling : null;

            // Mark the active link
            if (linkHref === currentUrl) {
                link.classList.add('active');
                if (parentMenu) {
                    parentMenu.classList.add('show');
                    if (dropdownToggle) {
                        dropdownToggle.classList.add('highlighted-dropdown', 'active');
                        dropdownToggle.setAttribute('aria-expanded', 'true');
                    }
                }
            }

            // Apply hover effect for menu items
            link.addEventListener("mouseenter", function () {
                this.classList.add("hover-effect");
            });

            link.addEventListener("mouseleave", function () {
                this.classList.remove("hover-effect");
            });
        });
        
        document.querySelectorAll('.dropdown-toggle').forEach(dropdown => {
            const parentMenu = dropdown.nextElementSibling;
            if (parentMenu && parentMenu.querySelector('.active')) {
                dropdown.classList.add('highlighted-dropdown', 'active');
                dropdown.setAttribute('aria-expanded', 'true');
            }
            
            dropdown.addEventListener("mouseenter", function () {
                this.classList.add('hovered-dropdown');
            });

            dropdown.addEventListener("mouseleave", function () {
                this.classList.remove("hovered-dropdown");
            });
        });
    });
</script>

			<style>
					/* 🔹 NAVBAR BACKGROUND COLOR (Navy Blue) */
					.navbar {
						background: rgb(65, 165, 232) !important;
					}

					/* 🔹 NAVBAR BRAND COLOR (White) */
					.navbar-brand {
						color: #ffffff !important;
					}

					/* 🔹 DEFAULT COLOR OF NAV-LINKS & DROPDOWN TOGGLE */
					.nav-link, 
					.dropdown-toggle, 
					.list-unstyled a {
						color: #333;
						font-size: 16px;
						transition: all 0.3s ease-in-out;
					}

					/* 🔹 HOVER EFFECT - NAV-LINK, DROPDOWN BUTTON, & DROPDOWN LIST ITEMS */
					.nav-link:hover, 
					.list-unstyled a:hover, 
					.dropdown-toggle:hover,
					.hovered-dropdown, .hover-effect {
						background: rgb(65, 165, 232) !important; /* Navy Blue */
						color: #ffffff !important; /* White Text */
						transform: scale(1.05);
					}

					/* 🔹 ACTIVE LINK STYLE (For Clicked Items) */
					.nav-link.active, 
					.list-unstyled a.active, 
					.dropdown-toggle.active {
						color: rgb(0, 0, 0) !important; /* Black */
						font-weight: bold !important;
						background: transparent !important;
					}

					/* 🔹 WHEN DROPDOWN IS EXPANDED */
					.dropdown-toggle[aria-expanded="true"], 
					.dropdown-toggle.highlighted-dropdown {
						background: rgb(255, 255, 255) !important; /* White Background */
						color: rgb(0, 0, 0) !important; /* Black Text */
						font-weight: bold;
					}

					/* 🔹 BLUE BORDER ON LEFT WHEN DROPDOWN CONTENT IS VISIBLE */
					.collapse.show {
						background-color: rgb(255, 255, 255);
						border-left: 4px solid rgb(65, 165, 232); /* Navy Blue Border */
					}


					/* 🔹 MAKE SURE ICONS & TEXT INSIDE DROPDOWN BUTTON TURN WHITE ON HOVER */
					.dropdown-toggle:hover *, 
					.dropdown-toggle.highlighted-dropdown:hover * {
						color: white !important;
					}

					/* 🔹 SIDEBAR STYLE */
					.sidebar {
						width: 250px;
						background: rgb(65, 165, 232) !important; /* Navy Blue */
						overflow: visible !important;
					}

					.sidebar .collapse {
						display: none;
					}

					.sidebar .collapse.show {
						display: block !important;
					}

					/* 🔹 HOVER EFFECT ON DROPDOWN BUTTONS */
					.dropdown-toggle:hover, 
					.dropdown-toggle.highlighted-dropdown {
					}
			</style>





<?php include_once 'footer.php'; ?>