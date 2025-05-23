<?php include_once 'header.php'; ?>
<?php include_once 'modals.php'; ?>


			<!--MENU SIDEBAR CONTENT-->
			<nav id="sidebar">
				<div class="sidebar-header">
					<img src="../../assets/images/isynergiesinc.png" class="img-fluid"/>
					
					<div class="ml-auto" id="userInfo">
						<p class="text-right">Admin</p>
						<p class="text-right">Main Branch</p>
					</div>
					
				</div>
				<ul class="list-unstyled components">
					<li class="">
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
                            <h2 style="margin: 0 20px; margin-top: 15px;">Sales</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Left Side - Product Data Entry Form -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
									<form>
										<div class="d-flex flex-wrap align-items-center">
											<button type="button" class="btn btn-outline-secondary me-2 mb-2 ms-md-3" style="width: auto; font-size: 13px;" id="quickSearchBtn">
												<i class="fas fa-search"></i> Quick Search
											</button>
											<button type="button" class="btn btn-outline-secondary me-2 mb-2" style="width: auto; font-size: 13px;" id="valueSearchBtn">
												<i class="fas fa-search"></i> Value Search
											</button>
											<button type="button" class="btn btn-outline-secondary mb-2" style="width: auto; font-size: 13px;">
												<i class="fas fa-search"></i> Search
											</button>
										</div>
										<div class="form-row mt-2">
											<h5>Transaction Date:</h5>
											<div class="form-group col-md-12">
												<label for="#">From</label>
												<input type="date" class="form-control" id="fromDate" disabled>
											</div>
											<div class="form-group col-md-12 mt-3">
												<label for="#">To:</label>
												<input type="date" class="form-control" id="toDate" disabled>
											</div>
										</div>
										<hr>
										<div class="form-row mt-3">
											<h5>Value Search</h5>
											<div class="d-flex mt-3">
												<div class="form-group col-md-7 me-4">
													<label for="fieldDropdown">Field:</label>
													<select class="form-select" id="fieldDropdown" disabled>
														<option value="option1">Option 1</option>
														<option value="option2">Option 2</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="operatorDropdown">Operator:</label>
													<select class="form-select" id="operatorDropdown" disabled>
														<option value="option1">Option 1</option>
														<option value="option2">Option 2</option>
													</select>
												</div>
											</div>
											<div class="d-flex mt-3">
												<div class="form-group col-md-7 me-4">
													<label for="valueDropdown">Value:</label>
													<select class="form-select" id="valueDropdown" disabled>
														<option value="option1">Option 1</option>
														<option value="option2">Option 2</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="andorDropdown">And/Or:</label>
													<select class="form-select" id="andorDropdown" disabled>
														<option value="option1">Option 1</option>
														<option value="option2">Option 2</option>
													</select>
												</div>
											</div>
										</div>
									</form>
									<div class="table-responsive mt-4" style="height: calc(80vh - 300px); overflow-y: auto;">
										<table class="table table-bordered table-hover" id="table-bold">
											<thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
												<tr>
													<th>
														<div class="d-flex justify-content-between align-items-center">
															<span>Current Filter</span>
															<div>
																<button type="button" id="addButton" class="btn btn-success me-2" style="font-size: 10px;" disabled>
																	<i class="fas fa-plus"></i>
																</button>
																<button type="button" id="cancelButton" class="btn btn-danger" style="font-size: 10px;" disabled>
																		<i class="fas fa-times"></i>
																</button>
															</div>
														</div>
													</th>
												</tr>
											</thead>
											<tbody>
													<tr>
														<td>Sample</td>
													</tr>
											</tbody>
										</table>
									</div>
									<p style="text-transform: none; font-size: 14px; " class="mt-4 text-center">
										Double click on filter to edit search values. 
										<a href="#" style="color: blue; text-decoration: underline; cursor: pointer;">Reset Filter</a>
									</p>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - Additional Table -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
									<div style="overflow-x: auto; white-space: nowrap;">
										<h5>Sales Summary</h5>
										<div class="table-responsive mt-2" style="height: calc(85vh - 300px); overflow-y: auto;">
											<table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
												<thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
													<tr>
														<th>No. of Transac.</th>
														<th>No. of Items</th>
														<th>Gross of Sales</th>
														<th>Discount</th>
														<th>Net of Sales</th>
													</tr>
												</thead>
												<tbody>
														<tr>
															<td class="text-center" colspan="5">No Data Available</td>
														</tr>
												</tbody>
											</table>
										</div>
									</div>
                                </div>
                            </div>

							<div class="d-flex justify-content-end">
								<button type="button" class="btn btn-light me-2" style="font-size: 13px;">
									<i class="fas fa-print"></i> BIR Sales
								</button>
								<button type="button" class="btn btn-light me-2" style="font-size: 13px;">
									<i class="fas fa-print"></i> Vatable
								</button>
								<button type="button" class="btn btn-light me-2" style="font-size: 13px;">
									<i class="fas fa-print"></i> Non-VAT
								</button>
								<button type="button" class="btn btn-light" style="font-size: 13px;">
									<i class="fas fa-print"></i> Print
								</button>
							</div>

                            <div class="card">
								<div class="card-body">
									<div style="overflow-x: auto; white-space: nowrap;">
										<h5>List</h5>
										<div class="table-responsive mt-2" style="height: calc(85vh - 300px); overflow-y: auto;">
											<table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
												<thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
													<tr>
														<th>Barcode</th>
														<th>Product Name</th>
														<th>Quantity</th>
														<th>SRP</th>
														<th>Total</th>
													</tr>
												</thead>
												<tbody>
														<tr>
															<td class="text-center" colspan="5">No Data Available</td>
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
            
            <script>
						document.getElementById('quickSearchBtn').addEventListener('click', function () {
						document.getElementById('fromDate').disabled = false;
						document.getElementById('toDate').disabled = false;

						document.getElementById('fieldDropdown').disabled = true;
						document.getElementById('operatorDropdown').disabled = true;
						document.getElementById('valueDropdown').disabled = true;
						document.getElementById('andorDropdown').disabled = true;

						document.getElementById('addButton').disabled = true;
						document.getElementById('cancelButton').disabled = true;
					});

					document.getElementById('valueSearchBtn').addEventListener('click', function () {
						document.getElementById('fieldDropdown').disabled = false;
						document.getElementById('operatorDropdown').disabled = false;
						document.getElementById('valueDropdown').disabled = false;
						document.getElementById('andorDropdown').disabled = false;

						document.getElementById('addButton').disabled = false;
						document.getElementById('cancelButton').disabled = false;

						document.getElementById('fromDate').disabled = true;
						document.getElementById('toDate').disabled = true;
					});

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

					#table-bold thead th {
						font-weight: bold;
						font-style: italic;
					}
				</style>
<?php include_once 'footer.php'; ?>