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
							<h2 style="margin: 0 20px; margin-top: 15px;">Product Subsidiary</h2>
						</div>
					</div>
					<div class="row">
						<!-- Left Side - Fixed Form -->
						<div class="col-md-5">
							<div class="card">
								<div class="card-body">
									<h6>Filters</h6>
									<h6>Date</h6>
									<form>
										<div class="d-flex align-items-center mb-3">
											<div class="form-group me-2" style="flex: 1;">
												<input type="date" class="form-control" id="startDate">
											</div>
											<label class="me-2"> - </label>
											<div class="form-group me-2" style="flex: 1;">
												<input type="date" class="form-control" id="endDate">
											</div>
										</div>

										<div class="form-check-group">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="recordSearch" id="supplier" value="supplier">
												<label class="form-check-label" for="supplier">Supplier</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="recordSearch" id="barcode" value="barcode">
												<label class="form-check-label" for="barcode">Barcode</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="recordSearch" id="productName" value="productName">
												<label class="form-check-label" for="productName">Product Name</label>
											</div>
										</div>
										<div class="form-select-container">
							
												<select class="form-select" aria-label="Default select">
													<option value="" selected hidden>-- Select an option --</option>
												</select>
											</div>
											<script>
												const select = document.querySelector('.form-select');
												select.addEventListener('focus', function () {
													select.innerHTML = '<option value="" selected hidden>-- Select an option --</option>';

													const options = [
														{ value: "1", text: "NE CROSSING" },
														{ value: "2", text: "COCA COLA" },
														{ value: "3", text: "FRIENSHIP SUPERMARKET" },
														{ value: "4", text: "AVON" },
														{ value: "5", text: "168 COMMERCIAL" },
														{ value: "6", text: "UNILAB" },
													];
													options.forEach(option => {
														const opt = document.createElement('option');
														opt.value = option.value;
														opt.textContent = option.text;
														select.appendChild(opt);
													});
												});
											</script>

									</form>
									<hr>
									<div class="mt-">
										<h5>Product List</h5>
										<div class="table-responsive" style="max-height: 300px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
											<table class="table table-bordered table-sm">
												<thead>
													<tr>
														<th style="width: 30%;">Barcode</th>
														<th style="width: 70%;">Description</th>
													</tr>
												</thead>
												<tbody>
													<tr class="clickable-row" onclick="handleRowClick('8977845', '3J DRUM 1513 CLASS A 140L')">
														<td>8977845...</td>
														<td>3J DRUM 1513 CLASS A 140L</td>
													</tr>
													<tr class="clickable-row" onclick="handleRowClick('8658547', '54532354645')">
														<td>8658547...</td>
														<td>54532354645</td>
													</tr>
													<tr class="clickable-row" onclick="handleRowClick('244663', '555 BOTTLED SARDINES SPANISH')">
														<td>244663...</td>
														<td>555 BOTTLED SARDINES SPANISH</td>
													</tr>
													<tr class="clickable-row" onclick="handleRowClick('35546', '555 CARNE NORTE 150G')">
														<td>35546...</td>
														<td>555 CARNE NORTE 150G</td>
													</tr>
													<tr class="clickable-row" onclick="handleRowClick('685367', '555 FRIED SARDINES WITH TAU')">
														<td>685367...</td>
														<td>555 FRIED SARDINES WITH TAU...</td>
													</tr>
													<tr class="clickable-row" onclick="handleRowClick('674388', '555 SARDINES IN TOMATO SAU')">
														<td>674388...</td>
														<td>555 SARDINES IN TOMATO SAU...</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									<script>

										function handleRowClick(barcode, description) {
											alert(`Barcode: ${barcode}\nDescription: ${description}`);
										}
										document.querySelectorAll('.clickable-row').forEach(row => {
											row.style.cursor = 'pointer';
											row.addEventListener('mouseenter', () => {
												row.style.backgroundColor = '#f5f5f5';
											});
											row.addEventListener('mouseleave', () => {
												row.style.backgroundColor = '';
											});
										});
									</script>
									<div class="d-flex justify-content-center mt-3">
									<button class="btn btn-primary me-2">
										<i class="fas fa-search"></i> Search
									</button>
									<button class="btn btn-outline-danger">
										<i class="fas fa-sync-alt"></i> Clear
									</button>
								</div>
								<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

								</div>
							</div>
						</div>
						<div class="col-md-7">
						<h5><b>Summary</b></h5>
						<div class="card">
							<div class="card-body">
								<h5>Product Summary</h5>
								<div class="record-summary">
									<table class="table table-sm">
										<tbody>
											<tr>
												<td>Barcode</td>
											</tr>
											<tr>
												<td>Product Name</td>
											</tr>
											<tr>
												<td>Category</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<button type="button" class="btn btn-success" style="width: 100px; margin-left: 88%; font-size: 13px;">
                                <i class="fas fa-print"></i> Print
                            </button>
							
						<div class="col-md-15">
						<h5>Details</h5>
							<div class="card">
								<div class="card-body">
									<div class="table-responsive" style="height: calc(94vh - 300px); overflow-y: auto;">
										<table class="table table-bordered" id="table-bold">
											<thead class="fw-bold fs-6 fst-italic card-header bg-dark opacity-60 text-white">
												<tr>
													<th>Date</th>
													<th>Type</th>
													<th>Purpose</th>
													<th>Transaction No.</th>
													<th>Rreference</th>
													<th>IN</th>
													<th>OUT</th>
													<th>Balance</th>
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
													<td>Sample</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card">
							
						</div>
					</div>
				</div>

                <script>
					const enableButton = document.getElementById("enableButton");
					const elementsToEnable = [
						document.getElementById("receipt"),
						document.getElementById("shiftReading"),
						document.getElementById("xReading"),
						document.getElementById("zReading"),
						document.getElementById("cashierName"),
						document.getElementById("payType"),
						document.getElementById("searchButton"),
						document.getElementById("clearButton"),
					];

					enableButton.addEventListener("click", () => {
						elementsToEnable.forEach((element) => {
							element.disabled = false;
						});
						enableButton.disabled = true;
					});

					function updateTable(type) {
						const table = document.getElementById("dynamicTable");
						let tableContent = "";

						switch (type) {
							case "receipt":
								tableContent = `
									<thead class="card-header bg-dark opacity-60 text-white">
										<tr>
											<th>Transaction</th>
											<th>Barcode</th>
											<th>Product Name</th>
											<th>SRP</th>
											<th>Qty</th>
											<th>Cost</th>
											<th>Discount</th>
											<th>Total Cost</th>
											<th>Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>TXN001</td>
											<td>1234567890</td>
											<td>Product A</td>
											<td>100.00</td>
											<td>2</td>
											<td>90.00</td>
											<td>5.00</td>
											<td>180.00</td>
											<td>200.00</td>
										</tr>
									</tbody>`;
								break;

							case "shiftReading":
								tableContent = `
									<thead class="card-header bg-dark opacity-60 text-white">
										<tr>
											<th>POS Type</th>
											<th>Transaction</th>
											<th>POS Total Amount</th>
											<th>Cashier Total Amount</th>
											<th>Short/Over</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>POS1</td>
											<td>TXN002</td>
											<td>3000.00</td>
											<td>2950.00</td>
											<td>-50.00</td>
										</tr>
									</tbody>`;
								break;

							case "xReading":
								tableContent = `
									<thead class="card-header bg-dark opacity-60 text-white">
										<tr>
											<th>Category</th>
											<th>Category Sales Count</th>
											<th>Total Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Category A</td>
											<td>15</td>
											<td>1500.00</td>
										</tr>
									</tbody>`;
								break;

							case "zReading":
								tableContent = `
									<thead class="card-header bg-dark opacity-60 text-white">
										<tr>
											<th>Category</th>
											<th>Category Sales Count</th>
											<th>Total Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Category B</td>
											<td>20</td>
											<td>2000.00</td>
										</tr>
									</tbody>`;
								break;

							default:
								tableContent = `<tbody><tr><td colspan="9" class="text-center">No data available</td></tr></tbody>`;
								break;
						}

						table.innerHTML = tableContent;
					}

					document.querySelectorAll('input[name="recordSearch"]').forEach((radio) => {
						radio.addEventListener("change", (event) => {
							updateTable(event.target.value);
						});
					});

					// Initial state: clear the table
					updateTable("");

					const currentUrl = window.location.pathname.split("/").pop();
					document.querySelectorAll(".list-unstyled a").forEach((link) => {
						if (link.getAttribute("href") === currentUrl) {
							link.classList.add("active");

							if (link.closest(".dashboard")) {
								link.closest(".dashboard").classList.add("active");
							} else {
								document.querySelector(".dashboard")?.classList.remove("active");
							}

							const parentMenu = link.closest(".collapse");
							if (parentMenu) {
								parentMenu.classList.add("show");

								const dropdownToggle = parentMenu.previousElementSibling;
								if (dropdownToggle) {
									dropdownToggle.setAttribute("aria-expanded", "true");
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

					#dynamicTable thead th {
						font-style: italic;
						font-weight: bold;
					}

					#table-bold thead th {
						font-weight: bold;
						font-style: italic;
					}

					.form-check-group {
						display: flex;
						justify-content: space-between;
						max-width: 400px;
						margin-bottom: 10px;
					}

					.form-check {
						display: flex;
						align-items: center;
						gap: 5px;
					}

					.form-check-label {
						font-size: 14px;
						font-weight: bold;
					}

					.form-check-input {
						width: 18px;
						height: 18px;
					}

					.form-select-container {
						width: 100%;
						max-width: 400px;
					}

					.form-select {
						width: 100%;
						padding: 5px;
						font-size: 14px;
					}

					.btn-primary {
						background-color: #6CD2E8; /* Light blue */
						border-color: #6CD2E8;
						color: black;
						border-radius: 8px;
						padding: 10px 20px;
					}
					.btn-primary:hover {
						background-color: #5ABBD5; /* Slightly darker on hover */
					}
					.btn-outline-danger {
						border-color: #D9534F; /* Red outline */
						color: #D9534F;
						border-radius: 8px;
						padding: 10px 20px;
					}
					.btn-outline-danger:hover {
						background-color: #D9534F;
						color: white;
					}
				</style>
<?php include_once 'footer.php'; ?>