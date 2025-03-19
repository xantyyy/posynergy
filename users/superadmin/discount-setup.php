<?php include_once 'header.php'; ?>

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
						
						<a class="navbar-brand" href="#">Other Transaction</a>
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
							<div class="row">
								<div class="col-md-12">
									<h2 style="margin: 0 20px; margin-top: 15px;">Discount Setup</h2>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-6">
									<div class="card">
										<div class="card-body">
											<h5>Setup</h5>
											<form>
												<div class="d-flex align-items-center mt-2">
													<label for="categoryDropdown" class="me-2">Category:</label>
													<select class="form-control" id="categoryDropdown">
														<option value="option1">Option 1</option>
														<option value="option2">Option 2</option>
													</select>
												</div>
											</form>
											<hr>
											<div class="row">
												<div class="col-md-6">
													<h5>Discount Category</h5>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(94vh - 300px); overflow-y: auto;">
																<table class="table table-bordered" id="table-bold">
																	<thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
																		<tr>
																			<th>Category</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>BABY CARE</td>
																		</tr>
																		<tr>
																			<td>BEVERAGES</td>
																		</tr>
																		<tr>
																			<td>CANNED GOODS</td>
																		</tr>
																		<tr>
																			<td>CANNED GOODS (LOCAL)</td>
																		</tr>
																		<tr>
																			<td>CIGARS</td>
																		</tr>
																		<tr>
																			<td>FORMULA MILK & BABY FOODS</td>
																		</tr>
																		<tr>
																			<td>INFANTS</td>
																		</tr>
																		<tr>
																			<td>POULTRY</td>
																		</tr>
																		<tr>
																			<td>RICE & SUGAR (LOCAL)</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4" style="font-size: 16px;">
													<h5>Discount Type</h5>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="overallDiscount" value="overall">
														<label class="form-check-label" for="overallDiscount">Overall</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="seniorDiscount" value="senior">
														<label class="form-check-label" for="seniorDiscount">Senior</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="pwdDiscount" value="pwd">
														<label class="form-check-label" for="pwdDiscount">PWD</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="naacDiscount" value="naac">
														<label class="form-check-label" for="naacDiscount">NAAC</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="soloDiscount" value="solo">
														<label class="form-check-label" for="soloDiscount">Solo Parent</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="valorDiscount" value="valor">
														<label class="form-check-label" for="valorDiscount">Medal of Valor</label>
													</div>
													
													<div class="d-flex flex-column mt-3">
													<button type="button" class="btn" style="background-color:rgb(57, 133, 219); color: white; font-size: 15px; margin-bottom: 5px;" id="addButton">
														<i class="fas fa-plus"></i> Add
													</button>
													<button type="button" class="btn" style="background-color:rgb(239, 164, 60); color: white; font-size: 15px; margin-bottom: 5px;" id="editButton">
														<i class="fas fa-save"></i> Edit
													</button>
													<button type="button" class="btn" style="background-color:rgb(236, 94, 94); color: white; font-size: 15px; margin-bottom: 5px;" id="deleteButton">
														<i class="fas fa-trash"></i> Delete
													</button>
													<button type="button" class="btn" style="background-color:rgb(95, 212, 95); color: white; font-size: 15px; margin-bottom: 5px;" id="cancelButton">
														<i class="fas fa-times"></i> Cancel
													</button>

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