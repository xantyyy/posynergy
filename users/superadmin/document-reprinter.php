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
											<thead class="fw-bold fs-6 fst-italic card-header bg-dark opacity-60 text-white">
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