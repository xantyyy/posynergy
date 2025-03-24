<?php include_once 'header.php'; ?>

			<!--MENU SIDEBAR CONTENT-->
			<nav id="sidebar">
				<div class="sidebar-header">
					<img src="../../assets/images/isynergies.png" class="img-fluid"/>
					
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
						
						<a class="navbar-brand" href="#">Inventory</a>
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
							<h2 style="margin: 0 20px; margin-top: 15px;">Incoming Inventory</h2>
						</div>
					</div>
					<div class="row mb-3">
                        <!-- Left Side - Product Data Entry Form -->
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="inventoryNo">Inventory No.:</label>
                                                <input type="text" class="form-control" id="inventoryNo">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inventoryDate">Inventory Date:</label>
                                                <input type="text" class="form-control" id="inventoryDate">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="supplier">Supplier:</label>
                                            <textarea class="form-control" id="supplier" rows="4"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="ship">Ship To:</label>
                                                <input type="text" class="form-control" id="ship">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="ship">Address:</label>
                                                <input type="text" class="form-control" id="address">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="remarks">Remarks:</label>
                                            <textarea class="form-control" id="remarks" rows="3"></textarea>
                                        </div>
                                        <div class="form-group d-flex align-items-center">
                                            <div class="me-3">
                                                <label for="purpose" class="me-2">Purpose:</label>
                                                <input type="text" class="form-control d-inline-block" id="purpose" style="width: 170px;">
                                            </div>
                                            <div>
                                                <label for="terms" class="me-2">Terms:</label>
                                                <input type="text" class="form-control d-inline-block" id="terms" style="width: 170px;">
                                            </div>
                                        </div>                                 
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="#">Total Quantity:</label>
                                                <input type="text" class="form-control" id="#">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="#">Gross Amount:</label>
                                                <input type="text" class="form-control" id="#">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="#">Product Discount:</label>
                                                <input type="text" class="form-control" id="#">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="#">Purchase Discount:</label>
                                                <input type="text" class="form-control" id="#">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="#">Net Amount:</label>
                                                <input type="text" class="form-control" id="#">
                                            </div>
                                        </div>                                    
                                    </form>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#" style="width: auto; margin-right: 5px; font-size: 12px; margin-top: 15px;">
                                        <i class="fas fa-save"></i> Send to Server
                                    </button>
                                    <button type="button" class="btn btn-success" style="width: auto; margin-right: 5px; font-size: 12px; margin-top: 15px;" data-bs-toggle="modal" data-bs-target="#">
										<i class="fas fa-save"></i> Reveiced Items
									</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Scrollable Table Wrapper -->
                                    <div style="overflow-x: auto; white-space: nowrap;">
                                        <table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
                                            <thead class="fw-bold fs-6 fst-italic card-header bg-dark opacity-60 text-white">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Barcode</th>
                                                    <th>Description</th>
                                                    <th>Qty</th>
                                                    <th>Partial Qty</th>
                                                    <th>UOM</th>
                                                    <th>Unit Price</th>
                                                    <th>Vat</th>
                                                    <th>Disc</th>
                                                    <th>Amount</th>
                                                    <th>Location</th>
                                                    <th>Vatable</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="radio" name="selectItem" value="1"></td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#" style="width: 80px; margin-right: 5px; font-size: 12px;">
                                        <i class="fas fa-plus"></i> New
                                    </button>
                                    <button type="button" class="btn btn-success" style="width: 80px; margin-right: 5px; font-size: 12px;" data-bs-toggle="modal" data-bs-target="#">
                                        <i class="fas fa-save"></i> Open
                                    </button>
                                    <button type="button" class="btn btn-danger" style="width: 80px; margin-right: 5px; font-size: 12px;" data-bs-toggle="modal" data-bs-target="#">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h6>Product Discounts</h6>
                                    <table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
                                        <thead class="fw-bold fs-6 fst-italic card-header bg-dark opacity-60 text-white">
                                            <tr>
												<th>#</th>
                                                <th>Description</th>
                                                <th>Disc.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
													<td><input type="radio" name="selectItem" value="1"></td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-body">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal" style="width: auto; margin-right: 5px; font-size: 15px  ;">
                                        <i class="fas fa-plus"></i> Create
                                    </button>
                                    <button type="button" class="btn btn-primary" style="width: auto; margin-right: 5px; font-size: 15px;" data-bs-toggle="modal" data-bs-target="#">
										<i class="fas fa-save"></i> Set Expiration
									</button>
                                    <button type="button" class="btn btn-primary" style="width: auto; margin-right: 5px; font-size: 15px;" data-bs-toggle="modal" data-bs-target="#">
                                        <i class="fas fa-plus"></i> Add Product Disc.
                                    </button>
                                    <button type="button" class="btn btn-danger" style="width: auto; margin-right: 5px; font-size: 15px;" data-bs-toggle="modal" data-bs-target="#">
                                        <i class="fas fa-trash"></i> Delete Item
                                    </button>
                                    <button type="button" class="btn btn-warning" style="width: auto; margin-right: 5px; font-size: 15px;" data-bs-toggle="modal" data-bs-target="#">
										<i class="fas fa-save"></i> Set Expiration
									</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h6>Expiration Details</h6>
                                    <table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
                                        <thead class="fw-bold fs-6 fst-italic card-header bg-dark opacity-60 text-white">
                                            <tr>
												<th>#</th>
                                                <th>Description</th>
                                                <th>Expiration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
													<td><input type="radio" name="selectItem" value="1"></td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                </tr>
                                        </tbody>
                                    </table>
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
							background: rgb(0, 0, 128) !important;
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
							background: rgb(0, 0, 128) !important; /* Navy Blue */
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
							border-left: 4px solid rgb(0, 0, 128); /* Navy Blue Border */
						}

						/* 🔹 HOVER EFFECT FOR DROPDOWN BUTTON (NAVY BLUE BACKGROUND & WHITE TEXT) */
						.dropdown-toggle:hover, 
						.dropdown-toggle.highlighted-dropdown:hover {
							background: rgb(0, 0, 128) !important; /* Navy Blue */
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
							background: rgb(0, 0, 128) !important; /* Navy Blue */
							overflow: visible !important;
						}

						.sidebar .collapse {
							display: none;
						}

						.sidebar .collapse.show {
							display: block !important;
						}

						/* 🔹 BLUE BORDER AROUND DROPDOWN BUTTONS */
						.dropdown-toggle {
							border: 2px solid rgb(0, 0, 128); /* Navy Blue Border */
							border-radius: 5px;
							padding: 5px 10px;
						}

						/* 🔹 HOVER EFFECT ON DROPDOWN BUTTONS */
						.dropdown-toggle:hover, 
						.dropdown-toggle.highlighted-dropdown {
							border: 2px solid rgb(0, 0, 128) !important; /* Navy Blue Border */
						}

							#table-bold thead th {
							font-weight: bold;
							font-style: italic;
						}
				</style>
<?php include_once 'footer.php'; ?>