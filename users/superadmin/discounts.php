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
								<a href="close-todays-transaction.php">Close Today's Transaction</a>
							</li>
							<li>
								<a href="data-backup.php">Data Back-up</a>
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
						
						<a class="navbar-brand" href="#">Search</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	  

				<!-- PHP FOR ADDING NEW PRODUCT IN THE DATABASE -->

				<!--MAIN CONTENT HERE!!!!!!!!-->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
						</div>
					</div>
				</div>
                <!-- Table Here -->
                <div class="d-flex justify-content-center align-items-center vh-100">
					<div class="card p-4 col-md-6">
						<h4 class="text-center"><b>Discount Report</b></h4>
						<hr>
						<form>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="from-date" class="form-label"><b>From:</b></label>
									<input type="date" id="from-date" class="form-control">
								</div>
								<div class="col-md-6">
									<label for="to-date" class="form-label"><b>To:</b></label>
									<input type="date" id="to-date" class="form-control">
								</div>
							</div>

							<h5 class="text-center"><b>Discount Type</b></h5>
							<div class="row">
								<div class="col-md-6">
									<div class="form-check">
										<input type="radio" name="discountType" id="senior" class="form-check-input">
										<label for="senior" class="form-check-label"><b>Senior Citizen</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="pwd" class="form-check-input">
										<label for="pwd" class="form-check-label"><b>PWD</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="naac" class="form-check-input">
										<label for="naac" class="form-check-label"><b>NAAC</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="medal" class="form-check-input">
										<label for="medal" class="form-check-label"><b>Medal of Valor</b></label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-check">
										<input type="radio" name="discountType" id="discounted" class="form-check-input">
										<label for="discounted" class="form-check-label"><b>Discounted Products</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="regular" class="form-check-input">
										<label for="regular" class="form-check-label"><b>Regular Discount</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="solo" class="form-check-input">
										<label for="solo" class="form-check-label"><b>Solo Parent</b></label>
									</div>
								</div>
							</div>

							<div class="mt-3 text-center">
							<button type="submit" class="btn btn-outline-secondary">
								<i class="fa fa-eye"></i> Preview
							</button>

							</div>
						</form>
					</div>
				</div>

				<script>
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
					/* 🔹 HOVER EFFECT FOR DROPDOWN BUTTON (NAVY BLUE BACKGROUND & WHITE TEXT) */
                    .list-unstyled a:hover, 
					.list-unstyled a.highlighted-dropdown:hover {
						background: rgb(65, 165, 232) !important; /* Navy Blue */
						color: white !important; /* White Text */
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

				</style>
<?php include_once 'footer.php'; ?>