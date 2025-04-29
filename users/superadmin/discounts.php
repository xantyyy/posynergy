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
						</div>
					</div>
				</div>
                <!-- Table Here -->
                <div class="d-flex justify-content-center align-items-center vh-100">
					<div class="card p-4 col-md-6">
						<h4 class="text-center"><b>Discount Report</b></h4>
						<hr>
						<form id="discount-report-form">
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="from-date" class="form-label"><b>From:</b></label>
									<input type="date" id="from-date" class="form-control">
								</div>
								<div class="col-md-6">
									<label for="to-date" class="form-label"><b>To:</b></label>
									<input type="date" id="to-date" class="form-control">
								</div>
							</div>

							<h5 class="text-center"><b>Discount Type</b></h5>
							<div class="row">
								<div class="col-md-6">
									<div class="form-check">
										<input type="radio" name="discountType" id="senior" class="form-check-input" value="senior">
										<label for="senior" class="form-check-label"><b>Senior Citizen</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="pwd" class="form-check-input" value="pwd">
										<label for="pwd" class="form-check-label"><b>PWD</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="naac" class="form-check-input" value="naac">
										<label for="naac" class="form-check-label"><b>NAAC</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="medal" class="form-check-input" value="medal">
										<label for="medal" class="form-check-label"><b>Medal of Valor</b></label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-check">
										<input type="radio" name="discountType" id="discounted" class="form-check-input" value="discounted">
										<label for="discounted" class="form-check-label"><b>Discounted Products</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="regular" class="form-check-input" value="regular">
										<label for="regular" class="form-check-label"><b>Regular Discount</b></label>
									</div>
									<div class="form-check mt-2">
										<input type="radio" name="discountType" id="solo" class="form-check-input" value="solo">
										<label for="solo" class="form-check-label"><b>Solo Parent</b></label>
									</div>
								</div>
							</div>

							<div class="mt-3 text-center">
							<button type="button" id="preview-btn" class="btn btn-outline-secondary">
								<i class="fa fa-eye"></i> Preview
							</button>
							</div>
						</form>
					</div>
				</div>

                <!-- Receipt Modal -->
                <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="receiptModalLabel">Discount Report</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="receipt-content" style="font-family: 'Courier New', monospace;"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="print-receipt">Print</button>
                            </div>
                        </div>
                    </div>
                </div>

				<script>
					document.addEventListener("DOMContentLoaded", function () {
						// Get today's date in YYYY-MM-DD format
						const today = new Date().toISOString().split('T')[0];

						// Set the default value for both date inputs
						document.getElementById("from-date").value = today;
						document.getElementById("to-date").value = today;

						// Existing code for active link and hover effects
						const currentUrl = window.location.pathname.split('/').pop();
						
						document.querySelectorAll('.list-unstyled a').forEach(link => {
							const linkHref = link.getAttribute('href');
							const parentMenu = link.closest('.collapse');
							const dropdownToggle = parentMenu ? parentMenu.previousElementSibling : null;

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

                        // Preview button functionality
                        document.getElementById('preview-btn').addEventListener('click', function() {
                            const fromDate = document.getElementById('from-date').value;
                            const toDate = document.getElementById('to-date').value;
                            
                            // Get selected discount type
                            let selectedDiscountType = '';
                            let discountTypeName = '';
                            document.querySelectorAll('input[name="discountType"]').forEach(function(radio) {
                                if (radio.checked) {
                                    selectedDiscountType = radio.value;
                                    discountTypeName = radio.nextElementSibling.textContent;
                                }
                            });
                            
                            if (!selectedDiscountType) {
                                alert('Please select a discount type');
                                return;
                            }
                            
                            // Format dates for display
                            const formatDate = (dateString) => {
                                const date = new Date(dateString);
                                return date.toLocaleDateString('en-US', {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric'
                                });
                            };
                            
                            // Generate receipt content based on selected discount type
                            let receiptHTML = '';
                            
                            // Common header for all reports
                            receiptHTML += `
                                <div class="text-center">
                                    <h2>AAA COMPANY</h2>
                                    <p>Owned & Operated By: AAA Company Inc.</p>
                                    <p>#101 SAN PASCUAL, TALAVERA, N.E.</p>
                                    <p>Tel no: 000-0000</p>
                                    <hr>
                                    <h3>${discountTypeName} Report</h3>
                                    <p>Period: ${formatDate(fromDate)} to ${formatDate(toDate)}</p>
                                </div>
                                <hr>
                            `;
                            
                            // For Discounted Products report (matching the image)
                            if (selectedDiscountType === 'discounted') {
                                receiptHTML += `
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Transaction Date</th>
                                                    <th>Transaction Number</th>
                                                    <th>Barcode</th>
                                                    <th>Name</th>
                                                    <th>Product Name</th>
                                                    <th>Payment Type</th>
                                                    <th>Quantity</th>
                                                    <th>Discount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2025-04-26</td>
                                                    <td>TXN-001</td>
                                                    <td>12345678</td>
                                                    <td>Juan Dela Cruz</td>
                                                    <td>Paracetamol 500mg</td>
                                                    <td>Cash</td>
                                                    <td>2</td>
                                                    <td>₱10.00</td>
                                                </tr>
                                                <tr>
                                                    <td>2025-04-26</td>
                                                    <td>TXN-002</td>
                                                    <td>87654321</td>
                                                    <td>Maria Santos</td>
                                                    <td>Vitamin C 500mg</td>
                                                    <td>Card</td>
                                                    <td>1</td>
                                                    <td>₱15.50</td>
                                                </tr>
                                                <tr>
                                                    <td>2025-04-27</td>
                                                    <td>TXN-003</td>
                                                    <td>23456789</td>
                                                    <td>Pedro Reyes</td>
                                                    <td>Amoxicillin 500mg</td>
                                                    <td>Cash</td>
                                                    <td>3</td>
                                                    <td>₱25.75</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" style="text-align:right;"><strong>TOTAL</strong></td>
                                                    <td>6</td>
                                                    <td>₱51.25</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                `;
                            } else if (selectedDiscountType === 'senior') {
                                // Senior Citizen specific format
                                receiptHTML += `
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Transaction Date</th>
                                                    <th>Senior ID</th>
                                                    <th>Name</th>
                                                    <th>Product Name</th>
                                                    <th>Orig. Amount</th>
                                                    <th>Discount (20%)</th>
                                                    <th>Final Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2025-04-26</td>
                                                    <td>SC-12345</td>
                                                    <td>Juan Dela Cruz</td>
                                                    <td>Maintenance Medication</td>
                                                    <td>₱500.00</td>
                                                    <td>₱100.00</td>
                                                    <td>₱400.00</td>
                                                </tr>
                                                <tr>
                                                    <td>2025-04-27</td>
                                                    <td>SC-67890</td>
                                                    <td>Maria Santos</td>
                                                    <td>Multivitamins</td>
                                                    <td>₱300.00</td>
                                                    <td>₱60.00</td>
                                                    <td>₱240.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align:right;"><strong>TOTAL</strong></td>
                                                    <td>₱800.00</td>
                                                    <td>₱160.00</td>
                                                    <td>₱640.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                `;
                            } else if (selectedDiscountType === 'pwd') {
                                // PWD specific format
                                receiptHTML += `
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Transaction Date</th>
                                                    <th>PWD ID</th>
                                                    <th>Name</th>
                                                    <th>Product Name</th>
                                                    <th>Orig. Amount</th>
                                                    <th>Discount (20%)</th>
                                                    <th>Final Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2025-04-26</td>
                                                    <td>PWD-12345</td>
                                                    <td>Carlos Reyes</td>
                                                    <td>Prescription Medication</td>
                                                    <td>₱600.00</td>
                                                    <td>₱120.00</td>
                                                    <td>₱480.00</td>
                                                </tr>
                                                <tr>
                                                    <td>2025-04-28</td>
                                                    <td>PWD-67890</td>
                                                    <td>Elena Cruz</td>
                                                    <td>Medical Supplies</td>
                                                    <td>₱450.00</td>
                                                    <td>₱90.00</td>
                                                    <td>₱360.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align:right;"><strong>TOTAL</strong></td>
                                                    <td>₱1,050.00</td>
                                                    <td>₱210.00</td>
                                                    <td>₱840.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                `;
                            } else {
                                // Generic format for other discount types
                                receiptHTML += `
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Transaction Date</th>
                                                    <th>ID Number</th>
                                                    <th>Customer Name</th>
                                                    <th>Total Amount</th>
                                                    <th>Discount Amount</th>
                                                    <th>Final Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2025-04-26</td>
                                                    <td>ID-00123</td>
                                                    <td>Sample Customer 1</td>
                                                    <td>₱500.00</td>
                                                    <td>₱50.00</td>
                                                    <td>₱450.00</td>
                                                </tr>
                                                <tr>
                                                    <td>2025-04-27</td>
                                                    <td>ID-00124</td>
                                                    <td>Sample Customer 2</td>
                                                    <td>₱300.00</td>
                                                    <td>₱30.00</td>
                                                    <td>₱270.00</td>
                                                </tr>
                                                <tr>
                                                    <td>2025-04-28</td>
                                                    <td>ID-00125</td>
                                                    <td>Sample Customer 3</td>
                                                    <td>₱700.00</td>
                                                    <td>₱70.00</td>
                                                    <td>₱630.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" style="text-align:right;"><strong>TOTAL</strong></td>
                                                    <td>₱1,500.00</td>
                                                    <td>₱150.00</td>
                                                    <td>₱1,350.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                `;
                            }
                            
                            // Add footer
                            receiptHTML += `
                                <hr>
                                <div class="text-center">
                                    <p>*** End of Report ***</p>
                                    <p>Generated on: ${new Date().toLocaleString()}</p>
                                </div>
                            `;
                            
                            // Set receipt content and show modal
                            document.getElementById('receipt-content').innerHTML = receiptHTML;
                            $('#receiptModal').modal('show');
                        });

                        // Print functionality
                        document.getElementById('print-receipt').addEventListener('click', function() {
                            const receiptContent = document.getElementById('receipt-content').innerHTML;
                            const printWindow = window.open('', '_blank');
                            
                            printWindow.document.write(`
                                <!DOCTYPE html>
                                <html>
                                <head>
                                    <title>Print Discount Report</title>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
                                    <style>
                                        body {
                                            font-family: 'Courier New', monospace;
                                            padding: 20px;
                                        }
                                        table {
                                            width: 100%;
                                            border-collapse: collapse;
                                        }
                                        th, td {
                                            border: 1px solid #ddd;
                                            padding: 8px;
                                            text-align: left;
                                        }
                                        th {
                                            background-color: #f2f2f2;
                                        }
                                        .text-center {
                                            text-align: center;
                                        }
                                        h2, h3 {
                                            margin-bottom: 5px;
                                        }
                                        p {
                                            margin: 3px 0;
                                        }
                                        hr {
                                            border-top: 1px dashed #000;
                                            margin: 10px 0;
                                        }
                                    </style>
                                </head>
                                <body>
                                    ${receiptContent}
                                </body>
                                </html>
                            `);
                            
                            printWindow.document.close();
                            printWindow.focus();
                            setTimeout(function() {
                                printWindow.print();
                                printWindow.close();
                            }, 500);
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

                    /* Additional styles for receipt printing */
                    @media print {
                        body * {
                            visibility: hidden;
                        }
                        #receipt-content, #receipt-content * {
                            visibility: visible;
                        }
                        #receipt-content {
                            position: absolute;
                            left: 0;
                            top: 0;
                            width: 100%;
                        }
                    }
				</style>
<?php include_once 'footer.php'; ?>