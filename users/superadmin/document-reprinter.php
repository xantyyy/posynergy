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
						
						<a class="navbar-brand" href="#">Other Transaction</a>
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
							<h2 style="margin: 0 20px; margin-top: 15px;">Document Reprinter</h2>
						</div>
					</div>
					<div class="row">
						<!-- Left Side - Fixed Form -->
						<div class="col-md-5">
							<div class="card">
								<div class="card-body">
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
											<button type="button" class="btn btn-warning" style="font-size: 12px;" id="enableButton">
												<i class="#"></i> ✓
											</button>
										</div>

										<h6 class="mt-4">Record Search</h6>
										<div class="d-flex flex-wrap mt-2">
											<div class="form-check me-4" style="margin-left: 10px;">
												<input class="form-check-input" type="radio" name="recordSearch" id="receipt" value="receipt" disabled>
												<label class="form-check-label" for="receipt">Receipt</label>
											</div>
											<div class="form-check me-4" style="margin-left: 120px;">
												<input class="form-check-input" type="radio" name="recordSearch" id="shiftReading" value="shiftReading" disabled>
												<label class="form-check-label" for="shiftReading">Shift-Reading</label>
											</div>
											<div class="form-check me-4 mt-2" style="margin-left: 10px;">
												<input class="form-check-input" type="radio" name="recordSearch" id="xReading" value="xReading" disabled>
												<label class="form-check-label" for="xReading">X-Reading</label>
											</div>
											<div class="form-check me-4 mt-2" style="margin-left: 99px;">
												<input class="form-check-input" type="radio" name="recordSearch" id="zReading" value="zReading" disabled>
												<label class="form-check-label" for="zReading">Z-Reading</label>
											</div>
										</div>
									</form>
									<hr>
									<div class="form-group mt-2">
										<label for="#">Cashier Name:</label>
										<select class="form-control" id="cashierName" disabled>
											<option value="option1">Cashier 1</option>
											<option value="option2">Cashier 2</option>
										</select>
									</div>
									<div class="form-group mt-2">
										<label for="#">Pay Type:</label>
										<select class="form-control" id="payType" disabled>
											<option value="option1">Option 1</option>
											<option value="option2">Option 2</option>
										</select>
									</div>
									<div class="d-flex mt-3 d-flex justify-content-end">
										<button type="button" class="btn btn-primary" style="font-size: 12px;" disabled id="searchButton">
											<i class="fas fa-save"></i> Search
										</button>
										<button type="button" class="btn btn-success" style="font-size: 12px; margin-left: 10px;" disabled id="clearButton">
											<i class="fas fa-times"></i> Clear Search
										</button>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-7">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive" style="height: calc(94vh - 300px); overflow-y: auto;">
										<table class="table table-bordered" id="table-bold">
											<thead class="fw-bold fs-6 fst-italic">
												<tr>
													<th>Date</th>
													<th>Transaction No.</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<!-- Sample rows -->
												<tr>
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
							<div class="card-body">
								<h5>List</h5>
								<table class="table table-bordered" style="margin-top: 10px;" id="dynamicTable">
									<!-- Table headers and rows will be updated dynamically -->
								</table>
							</div>
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
									<thead>
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
									<thead>
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
									<thead>
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
									<thead>
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
				</style>
<?php include_once 'footer.php'; ?>