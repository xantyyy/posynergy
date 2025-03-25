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
						
						<a class="navbar-brand" href="#">Configuration</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	  

				<?php
					require_once '../../includes/config.php';

					// Handle form submission for adding new supplier
					if (isset($_POST['add_supplier'])) {
						$supplier = $_POST['supplier'];
						$tin = $_POST['tin'];
						$address = $_POST['address'];
						$name = $_POST['name'];
						$contactNumber = $_POST['contactNumber'];

						$sql = "INSERT INTO tbl_suppliers (Supplier, TIN, Address, Name, ContactNumber) 
								VALUES (?, ?, ?, ?, ?)";

						$stmt = $conn->prepare($sql);
						$stmt->bind_param("sssss", $supplier, $tin, $address, $name, $contactNumber);

						if ($stmt->execute()) {
							echo "<script>alert('New supplier added successfully!'); window.location.href='supplier.php';</script>";
						} else {
							echo "<script>alert('Error adding supplier: " . $conn->error . "');</script>";
						}

						$stmt->close();
					}

					// Handle form submission for updating supplier
					if (isset($_POST['update_supplier'])) {
						$id = $_POST['id'];
						$supplier = isset($_POST['supplier']) ? trim($_POST['supplier']) : null;
						$tin = $_POST['tin'];
						$address = $_POST['address'];
						$name = $_POST['name'];
						$contactNumber = $_POST['contactNumber'];

						// Start building the SQL query dynamically
						$sql = "UPDATE tbl_suppliers SET ";
						$fields = [];
						$params = [];
						$types = '';

						// Add fields to update only if they are provided
						if (!empty($supplier)) {
							$fields[] = "Supplier = ?";
							$params[] = $supplier;
							$types .= 's';
						}
						$fields[] = "TIN = ?";
						$params[] = $tin;
						$types .= 's';

						$fields[] = "Address = ?";
						$params[] = $address;
						$types .= 's';

						$fields[] = "Name = ?";
						$params[] = $name;
						$types .= 's';

						$fields[] = "ContactNumber = ?";
						$params[] = $contactNumber;
						$types .= 's';

						$params[] = $id; // Add ID for WHERE clause
						$types .= 'i';

						// Combine fields into the query
						$sql .= implode(", ", $fields) . " WHERE ID = ?";

						$stmt = $conn->prepare($sql);
						$stmt->bind_param($types, ...$params);

						if ($stmt->execute()) {
							echo "<script>alert('Supplier updated successfully!'); window.location.href='supplier.php';</script>";
						} else {
							echo "<script>alert('Error updating supplier: " . $conn->error . "');</script>";
						}

						$stmt->close();
					}

					// Query to get all suppliers
					$sql = "SELECT ID, Supplier FROM tbl_suppliers ORDER BY Supplier ASC";
					$result = $conn->query($sql);

					$conn->close();
				?>

				<!--MAIN CONTENT HERE!!!!!!!!-->
				<div class="d-flex justify-content-center align-items-center">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-6">
								<div class="card">
									<div class="card-body">
										<div class="col-md-12">
											<h2>Supplier Maintenance</h2>
										</div>
										<form>
											<div class="d-flex align-items-center mt-3">
												<!-- Updated New Supplier button to trigger modal -->
												<button type="button" class="btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" 
													data-bs-toggle="modal" data-bs-target="#newSupplierModal">
													<i class="fas fa-plus"></i> New Supplier
												</button>
												<button type="button" class="btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" id="deleteBtn" disabled>
													<i class="fas fa-trash"></i> Delete
												</button>
											</div>
											<h6>Supplier Info:</h6>
											<div class="d-flex align-items-center mt-2">
												<label for="supplierSelect" class="me-2">Select:</label>
												<select class="form-select" id="supplierSelect" name="supplier_id">
													<option value="" selected hidden>Select Supplier</option>
													<?php
													if ($result->num_rows > 0) {
														while ($row = $result->fetch_assoc()) {
															echo "<option value='" . $row['ID'] . "'>" . htmlspecialchars($row['Supplier']) . "</option>";
														}
													} else {
														echo "<option value=''>No suppliers found</option>";
													}
													?>
												</select>
											</div>
										</form>
										<!-- Rest of your existing code remains the same -->
										<hr>
										<div class="row">
											<div class="col-md-12">
												<h6>Supplier Information</h6>
												<div class="card">
													<div class="card-body">
														<div class="table-responsive" style="height: calc(90vh - 375px); overflow-y: auto;">
															<table class="table">
																<tbody>
																	<tr>
																		<th style="width: 30%;">Supplier:</th>
																		<td id="supplierName"></td>
																	</tr>
																	<tr>
																		<th>TIN:</th>
																		<td id="supplierTIN"></td>
																	</tr>
																	<tr>
																		<th>Address:</th>
																		<td id="supplierAddress"></td>
																	</tr>
																	<tr>
																		<th>Name:</th>
																		<td id="supplierContactPerson"></td>
																	</tr>
																	<tr>
																		<th>Contact No.:</th>
																		<td id="supplierContactNo"></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="d-flex justify-content-end">
										<button type="button" class="btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" id="editBtn" disabled 
											data-bs-toggle="modal" data-bs-target="#editSupplierModal">
											<i class="fas fa-edit"></i> Edit
										</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>

            <script>
				$(document).ready(function() {
					// Initially disable buttons
					toggleButtons(false);

					$('#supplierSelect').on('change', function() {
						var supplierId = $(this).val();
						console.log('Selected supplier ID:', supplierId);
						
						if (supplierId) {
							console.log('Enabling buttons');
							toggleButtons(true);
							
							$.ajax({
								url: 'get_supplier.php',
								type: 'POST',
								data: {id: supplierId},
								dataType: 'json',
								success: function(response) {
									console.log('AJAX response:', response);
									if (response.success) {
										$('#supplierName').text(response.supplier);
										$('#supplierTIN').text(response.tin);
										$('#supplierAddress').text(response.address);
										$('#supplierContactPerson').text(response.name);
										$('#supplierContactNo').text(response.contactNumber);
									} else {
										alert('Supplier not found');
										clearTable();
									}
								},
								error: function(xhr, status, error) {
									console.log('AJAX error:', status, error);
									alert('Error fetching supplier data');
									clearTable();
								}
							});
						} else {
							console.log('Disabling buttons');
							clearTable();
							toggleButtons(false);
						}
					});

					// Populate modal when Edit button is clicked
					$('#editBtn').on('click', function() {
						var supplierId = $('#supplierSelect').val();
						var supplierName = $('#supplierSelect option:selected').text();
						if (supplierId) {
							$.ajax({
								url: 'get_supplier.php',
								type: 'POST',
								data: { id: supplierId },
								dataType: 'json',
								success: function(response) {
									if (response.success) {
										$('#editSupplierModalLabel').text('Supplier: ' + supplierName);
										$('#editSupplierId').val(supplierId);
										$('#editSupplier').val(response.supplier);
										$('#editTin').val(response.tin);
										$('#editAddress').val(response.address);
										$('#editName').val(response.name);
										$('#editContactNumber').val(response.contactNumber);
									} else {
										alert('Supplier data not found');
									}
								},
								error: function() {
									alert('Error fetching supplier data for edit');
								}
							});
						}
					});

					function clearTable() {
						$('#supplierName').text('');
						$('#supplierTIN').text('');
						$('#supplierAddress').text('');
						$('#supplierContactPerson').text('');
						$('#supplierContactNo').text('');
					}

					function toggleButtons(enable) {
						$('#editBtn').prop('disabled', !enable);
						console.log('Toggle buttons - Enable:', enable);
					}
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