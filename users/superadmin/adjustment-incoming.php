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
								<h2 style="margin: 0 20px; margin-top: 15px;">Adjustemnt / Incoming</h2>
							</div>
						</div>
						<div class="row">
							<!-- Left Side - Product Data Entry Form -->
							<div class="col-md-4">
								<div class="card h-100">
									<div class="card-body">
										<form>			
											<div class="form-row mt-2">
												<h5>Select</h5>
												<div class="d-flex align-items-center">
													<div class="form-check me-4 mt-3" style="margin-left: 50px;">
														<input class="form-check-input" type="radio" name="recordSearch" id="adjustmentRadio" value="adjustment">
														<label class="form-check-label" for="adjustmentRadio">Adjustment</label>
													</div>
													<div class="form-check me-4 mt-3" style="margin-left: 10px;">
														<input class="form-check-input" type="radio" name="recordSearch" id="incomingRadio" value="incoming">
														<label class="form-check-label" for="incomingRadio">Incoming</label>
													</div>
												</div>
											</div>
											<hr>
											<div class="form-row mt-3">
												<h5>Supplier:</h5>
												<div class="form-group col-md-12 me-4">
													<select class="form-select" id="fieldDropdown" disabled>
														<option value="option1">Option 1</option>
														<option value="option2">Option 2</option>
													</select>
												</div>
											</div>
											<hr>
											<div class="form-row mt-3">
												<h5>Date Filter:</h5>
												<div class="form-group col-md-12 d-flex align-items-center">
													<input type="checkbox" id="enableAsOf" class="me-2">
													<label style="width: 70px;" for="enableAsOf" class="me-2">As of:</label>
													<input type="date" class="form-control" id="asOfDate" disabled>
												</div>
												<div class="form-group col-md-12 mt-2 d-flex align-items-center">
													<label for="toDate" class="me-2">To:</label>
													<input type="date" class="form-control me-2" id="toDate" disabled>
													<button type="button" class="btn btn-primary" style="font-size: 13px;" disabled id="quickSearchBtn">
														<i class="fas fa-search"></i>
													</button>
												</div>
											</div>
											<button type="button" class="btn btn-success mt-2" style="font-size: 13px; margin-left: 65%;" disabled id="printSummaryBtn">
												<i class="fas fa-print"></i> Print Summary
											</button>
										</form>
									</div>
								</div>
							</div>

							<!-- Right Side - Additional Table -->
							<div class="col-md-8">
								<div class="card h-100">
									<div class="card-body">
										<div id="tableContainer" style="overflow-x: auto; white-space: nowrap;">
											<!-- Default "No Data Available" Content -->
											<p class="text-center text-muted" id="noDataText">No Data Available</p>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="card mt-4">
									<div class="card-body">
										<div style="overflow-x: auto; white-space: nowrap;">
											<table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
												<thead class="card-header bg-dark opacity-60 text-white">
													<tr>
														<th>Barcode</th>
														<th>Product Name</th>
														<th>Qty</th>
														<th>Unit</th>
														<th>Cost</th>
														<th>Discount</th>
														<th>Total Cost</th>
													</tr>
												</thead>
												<tbody>
														<tr>
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
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>

				<script>
					const adjustmentTable = `
						<table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
							<thead class="card-header bg-dark opacity-60 text-white">
								<tr>
									<th>Adj. Date</th>
									<th>Adj. Date</th>
									<th>Quantity</th>
									<th>Net Amount</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Sample</td>
									<td>Sample</td>
									<td>Sample</td>
									<td>Sample</td>
								</tr>
							</tbody>
						</table>
					`;

					const incomingTable = `
						<table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
							<thead class="card-header bg-dark opacity-60 text-white">
								<tr>
									<th>Inventory Date</th>
									<th>Inventory #</th>
									<th>Net Amount</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Sample</td>
									<td>Sample</td>
									<td>Sample</td>
								</tr>
							</tbody>
						</table>
					`;

					const tableContainer = document.getElementById('tableContainer');
					const noDataText = document.getElementById('noDataText');
					const fieldDropdown = document.getElementById('fieldDropdown');

					document.getElementById('adjustmentRadio').addEventListener('change', function () {
						noDataText.style.display = 'none';
						tableContainer.innerHTML = adjustmentTable;
						fieldDropdown.disabled = false;
					});

					document.getElementById('incomingRadio').addEventListener('change', function () {
						noDataText.style.display = 'none';
						tableContainer.innerHTML = incomingTable;
						fieldDropdown.disabled = false;
					});

					const enableAsOfCheckbox = document.getElementById('enableAsOf');
					const asOfDate = document.getElementById('asOfDate');
					const toDate = document.getElementById('toDate');
					const quickSearchBtn = document.getElementById('quickSearchBtn');
					const printSummaryBtn = document.getElementById('printSummaryBtn');

					// Add an event listener to the checkbox
					enableAsOfCheckbox.addEventListener('change', function () {
						// Enable or disable elements based on checkbox state
						const isChecked = this.checked;
						asOfDate.disabled = !isChecked;
						toDate.disabled = !isChecked;
						quickSearchBtn.disabled = !isChecked;
						printSummaryBtn.disabled = !isChecked;
					});

					const currentUrl = window.location.pathname.split('/').pop();
					document.querySelectorAll('.list-unstyled a').forEach(link => {
						if (link.getAttribute('href') === currentUrl) {
							link.classList.add('active');

							if (link.closest('.dashboard')) {
								link.closest('.dashboard').classList.add('active');
							} else {
								document.querySelector('.dashboard')?.classList.remove('active');
							}

							const parentMenu = link.closest('.collapse');
							if (parentMenu) {
								parentMenu.classList.add('show');

								const dropdownToggle = parentMenu.previousElementSibling;
								if (dropdownToggle) {
									dropdownToggle.setAttribute('aria-expanded', 'true');
								}
							}
						}
					});
				</script>

            	<style>
					.navbar{
					background-color: #1137a9;
					color: #fff;
					}

					.navbar-brand{
						color: #fff;
					}
					.sidebar {
						width: 250px;
						background-color: #f8f9fa;
						padding: 10px;
						height: 100vh;
						position: fixed;
					}

					.nav-link {
						color: #333;
						font-size: 14px;
					}

					.nav-link:hover, .nav-link.active {
						color: #007bff;
						font-weight: bold;
					}

					.collapse.show {
						background-color: #e9ecef;
						padding: 5px 10px;
						border-left: 4px solid #007bff;
					}

					.list-unstyled a.active {
						background-color: #f0f0f0;
						color: #000;
						font-weight: bold;
					}

					.dropdown-toggle[aria-expanded="true"] {
						background-color: #e0e0e0;
						font-weight: bold;
					}

					#table-bold thead th {
						font-weight: bold;
						font-style: italic;
					}
				</style>
<?php include_once 'footer.php'; ?>