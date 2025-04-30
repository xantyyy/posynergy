<?php include_once 'header.php'; ?>
<?php include_once 'modals.php'; ?>

<?php
// Database connection
$servername = "127.0.0.1";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "ampcdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for the search results
$voidedTransactions = [];
$fromDate = date('Y-m-d'); // Default to today
$toDate = date('Y-m-d'); // Default to today

// Function to fetch voided transactions
function fetchVoidedTransactions($conn, $fromDate, $toDate) {
    $transactions = [];
    
    // Format dates for SQL query
    $fromDateFormatted = date('Y-m-d', strtotime($fromDate));
    $toDateFormatted = date('Y-m-d 23:59:59', strtotime($toDate)); // Include entire day
    
    // Prepare SQL query to fetch data from tbl_voidreason
    $sql = "SELECT 
                TransactionDate,
                Cashier,
                Barcode,
                ProductName,
                SRP,
                Discount,
                Quantity as Qty,
                TotalAmount,
                Reason
            FROM tbl_voidreason
            WHERE DATE(TransactionDate) BETWEEN ? AND DATE(?)
            ORDER BY TransactionDate DESC";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fromDateFormatted, $toDateFormatted);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }
    
    $stmt->close();
    return $transactions;
}

// Load data on initial page load (today's transactions)
$voidedTransactions = fetchVoidedTransactions($conn, $fromDate, $toDate);

// Process search request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    
    // Fetch transactions for the selected date range
    $voidedTransactions = fetchVoidedTransactions($conn, $fromDate, $toDate);
}
?>

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

				<!--MAIN CONTENT HERE!!!!!!!!-->
				<div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="margin: 0 20px; margin-top: 15px;">Voided Transaction</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Left Side - Product Data Entry Form -->
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Transaction Date:</h5>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
										<div class="form-row">
											<div class="form-group col-md-12 d-flex align-items-center">
												<label for="fromDate" class="me-4">From:</label>
												<input type="date" class="form-control me-2" id="fromDate" name="fromDate" value="<?php echo $fromDate; ?>">
											</div>
											<div class="form-group col-md-12 mt-2 d-flex align-items-center">
												<label for="toDate" class="me-5">To:</label>
												<input type="date" class="form-control me-2" id="toDate" name="toDate" value="<?php echo $toDate; ?>">
											</div>
										</div>
                                        <div class="d-flex justify-content-end mt-3 me-2">
                                            <button type="submit" name="search" class="btn btn-outline-secondary" style="font-size: 13px;">
                                                <i class="fas fa-search"></i> Search
                                            </button>
                                        </div>                                   
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - Additional Table -->
                        <div class="col-md-12">
                            <div class="card">
								<div class="card-body">
									<h5>List</h5>
									<div class="table-responsive mt-2" style="height: calc(80vh - 300px); overflow-y: auto;">
										<table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
										<thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
												<tr>
													<th>Transaction Date</th>
													<th>Cashier</th>
													<th>Barcode</th>
													<th>Product Name</th>
													<th>SRP</th>
													<th>Discount</th>
													<th>Qty</th>
													<th>Total Amount</th>
													<th>Reason</th>
												</tr>
											</thead>
											<tbody>
                                                <?php if (empty($voidedTransactions)): ?>
                                                    <tr>
                                                        <td colspan="9" class="text-center">No voided transactions found for the selected date range.</td>
                                                    </tr>
                                                <?php else: ?>
                                                    <?php foreach ($voidedTransactions as $transaction): ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($transaction['TransactionDate']); ?></td>
                                                            <td><?php echo htmlspecialchars($transaction['Cashier']); ?></td>
                                                            <td><?php echo htmlspecialchars($transaction['Barcode']); ?></td>
                                                            <td><?php echo htmlspecialchars($transaction['ProductName']); ?></td>
                                                            <td><?php echo htmlspecialchars($transaction['SRP']); ?></td>
                                                            <td><?php echo htmlspecialchars($transaction['Discount']); ?></td>
                                                            <td><?php echo htmlspecialchars($transaction['Qty']); ?></td>
                                                            <td><?php echo htmlspecialchars($transaction['TotalAmount']); ?></td>
                                                            <td><?php echo htmlspecialchars($transaction['Reason']); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
                            </div>
							<div class="d-flex justify-content-end">
								<button type="button" class="btn btn-light" id="printBtn">
									<i class="fas fa-print"></i> Print
								</button>
							</div>
                        </div>
                    </div>
                </div>                  
            </div>
            
            <script>
				document.addEventListener("DOMContentLoaded", function () {
					// Only set default dates if they are not already set (for preserving search values)
					const fromDateInput = document.getElementById("fromDate");
					const toDateInput = document.getElementById("toDate");
					
					if (!fromDateInput.value) {
						fromDateInput.value = new Date().toISOString().split('T')[0];
					}
					
					if (!toDateInput.value) {
						toDateInput.value = new Date().toISOString().split('T')[0];
					}

					// Existing code for active link and hover effects
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

                    // Updated print functionality to print only the table
                    document.getElementById('printBtn').addEventListener('click', function() {
                        // Get the table element
                        const table = document.querySelector('.table-responsive table').outerHTML;
                        
                        // Create a new window for printing
                        const printWindow = window.open('', '_blank', 'width=800,height=600');
                        
                        // Write the HTML structure for printing
                        printWindow.document.write(`
                            <html>
                            <head>
                                <title>Voided Transactions</title>
                                <style>
                                    body { font-family: Arial, sans-serif; margin: 20px; }
                                    table { width: 100%; border-collapse: collapse; }
                                    th, td { border: 1px solid #000; padding: 8px; text-align: left; }
                                    th { background-color: #cbd1d3; font-weight: bold; font-style: italic; }
                                    @media print {
                                        @page { margin: 1cm; }
                                    }
                                </style>
                            </head>
                            <body>
                                <h2>Voided Transactions</h2>
                                ${table}
                            </body>
                            </html>
                        `);
                        
                        // Close the document and trigger the print
                        printWindow.document.close();
                        printWindow.focus();
                        printWindow.print();
                        printWindow.close();
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

<?php
// Close the database connection
$conn->close();
?>