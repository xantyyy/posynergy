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
						
						<a class="navbar-brand" href="#">Configuration</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	  

				<!-- PHP FOR ADDING NEW PRODUCT IN THE DATABASE -->

				<!--MAIN CONTENT HERE!!!!!!!!-->
					<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<div class="card">
										<div class="card-body">
											<div class="col-md-12">
												<h2>User Permissions</h2>
											</div>
											<form>
												<div class="d-flex align-items-center mt-3">
													<button type="button" class="btn btn-success mb-2 me-2" style="font-size: 13px;" id="#">
														<i class="fas fa-edit"></i> Edit Previleges
													</button>
													<button type="button" class="btn btn-danger mb-2 me-2" style="font-size: 13px;" id="#">
														<i class="fas fa-trash"></i> Delete
													</button>
													<button type="button" class="btn btn-warning mb-2 me-2" style="font-size: 13px;" id="#">
														<i class="fas fa-save"></i> Save
													</button>
													<button type="button" class="btn btn-info mb-2" style="font-size: 13px;" id="#">
														<i class="fas fa-times"></i> Cancel
													</button>
												</div>
											</form>
											<hr>
											<form>
												<h6>Roles:</h6>
												<div class="d-flex align-items-center mt-2">
													<select class="form-select" id="#">
														<option value="#" selected hidden></option>
														<option value="option1">Option 1</option>
														<option value="option2">Option 2</option>
													</select>
												</div>
											</form>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<h6>Inventory</h6>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(80vh - 500px); overflow-y: auto;">
																<table class="table">
																	<tbody>
																		<tr>
																			<th style="width: 50%;">Incoming Inventory:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Adjustment Inventory:</th>
																			<td id="#">YES</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<h6>Inventory Purchases</h6>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(80vh - 500px); overflow-y: auto;">
																<table class="table">
																	<tbody>
																		<tr>
																			<th style="width: 50%;">Purchase Order:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Purchase Return:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Receiving:</th>
																			<td id="#">YES</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<h6>Inventory Product Profile</h6>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(80vh - 500px); overflow-y: auto;">
																<table class="table">
																	<tbody>
																		<tr>
																			<th style="width: 50%;">PLU Entry:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>PLU Search:</th>
																			<td id="#">YES</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<h6>Inventory Search</h6>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(80vh - 400px); overflow-y: auto;">
																<table class="table">
																	<tbody>
																		<tr>
																			<th style="width: 50%;">Search Inventory:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Search Sales:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Search Discounts:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Adjustment/Incoming:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Product SL:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Search Return:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>E-Journal:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Void Transactions:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Suki Points:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Logs:</th>
																			<td id="#">YES</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<h6>Other Transaction</h6>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(80vh - 450px); overflow-y: auto;">
																<table class="table">
																	<tbody>
																		<tr>
																			<th style="width: 50%;">Enroll:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Document Reprinter:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Senior Discount:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>PWD Dicount:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Discount Setup:</th>
																			<td id="#">YES</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<h6>Inventory Configuration</h6>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(80vh - 450px); overflow-y: auto;">
																<table class="table">
																	<tbody>
																		<tr>
																			<th style="width: 50%;">Supplier:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Inventory Maintenance:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Product Description:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Inventory Branch Setup:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>SI Setup:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Inventory User:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Permissions:</th>
																			<td id="#">YES</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<h6>Inventory Utilities</h6>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(80vh - 500px); overflow-y: auto;">
																<table class="table">
																	<tbody>
																		<tr>
																			<th style="width: 50%;">Close Inventory:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Backup Data:</th>
																			<td id="#">YES</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<h6>Point of Sales</h6>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(80vh - 470px); overflow-y: auto;">
																<table class="table">
																	<tbody>
																		<tr>
																			<th style="width: 50%;">Point of Sale:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Tender Declaration:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Shift Reading:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>X Reading:</th>
																			<td id="#">YES</td>
																		</tr>
																		<tr>
																			<th>Z Reading:</th>
																			<td id="#">YES</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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

					#table-bold thead th {
						font-weight: bold;
						font-style: italic;
					}
			</style>
<?php include_once 'footer.php'; ?>