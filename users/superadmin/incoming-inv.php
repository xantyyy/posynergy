<?php include_once 'header.php'; ?>
<?php include_once 'incoming-item.php'; ?>
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
					<li class="#">
						<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</b></span></a>
						
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

				<?php
					// Place this code at the beginning of incoming-inv.php, after your includes
					if (isset($_GET['po'])) {
						$poNumber = $_GET['po'];
						
						// Prepare the SQL statement to prevent SQL injection
						$sql = "SELECT * FROM tbl_purchasepending WHERE POnumber = ?";
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("s", $poNumber);
						$stmt->execute();
						$result = $stmt->get_result();
						
						if ($result->num_rows > 0) {
							// Get the main PO data
							$poData = $result->fetch_assoc();
							
							// Calculate totals
							$totalQtySql = "SELECT SUM(Quantity) as TotalQty, 
													SUM(TotalCostPrice) as GrossAmount 
											FROM tbl_purchasepending 
											WHERE POnumber = ?";
							$totalStmt = $conn->prepare($totalQtySql);
							$totalStmt->bind_param("s", $poNumber);
							$totalStmt->execute();
							$totalResult = $totalStmt->get_result();
							$totals = $totalResult->fetch_assoc();
							
							// Get all items for this PO
							$itemsSql = "SELECT Barcode, ProductName, Quantity, Unit, CostPrice, 
												isVat, Discount, TotalCostPrice, Location, CompanyVat 
										FROM tbl_purchasepending 
										WHERE POnumber = ? AND ProductName IS NOT NULL";
							$itemsStmt = $conn->prepare($itemsSql);
							$itemsStmt->bind_param("s", $poNumber);
							$itemsStmt->execute();
							$itemsResult = $itemsStmt->get_result();
							
							// Store items in an array
							$items = [];
							while ($row = $itemsResult->fetch_assoc()) {
								$items[] = $row;
							}
						} else {
							// No PO found with the given number
							echo "<script>alert('No inventory found with the specified number.');</script>";
							echo "<script>window.location.href='incoming.php';</script>";
							exit;
						}
					} else {
						// No PO number provided, redirect back
						echo "<script>window.location.href='incoming.php';</script>";
						exit;
					}
					?>

				<!--MAIN CONTENT HERE!!!!!!!!-->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 style="margin: 0 20px; margin-top: 15px;">Incoming Item</h2>
						</div>
					</div>
					<div class="row">
                        <!-- Left Side - Product Data Entry Form -->
                            <div class="col-md-4">
								<div class="card" style="height: 90%;">
									<div class="card-body">
										<form>
											<div class="form-group col-md-12 d-flex align-items-center">
												<label for="inv-no" style="width: 120px; white-space: nowrap;">Inventory No:</label>
												<input type="text" class="form-control input-field" id="inv-no" value="<?php echo isset($poData['POnumber']) ? htmlspecialchars($poData['POnumber']) : ''; ?>" disabled style="flex: 1;">
											</div>
											<div class="form-group col-md-12 mt-2 d-flex align-items-center">
												<label for="inv-date" style="width: 120px; white-space: nowrap;">Inventory Date:</label>
												<input type="date" class="form-control input-field date-field" id="inv-date" value="<?php echo isset($poData['POdate']) ? htmlspecialchars($poData['POdate']) : ''; ?>" disabled style="flex: 1;">
											</div>
											<div class="form-group col-md-12 mt-2 d-flex align-items-center">
												<label for="inv-supplier" style="width: 120px; white-space: nowrap;">Supplier:</label>
												<textarea class="form-control input-field" id="inv-supplier" placeholder="Description" rows="2" disabled style="flex: 1;"><?php echo isset($poData['Supplier']) ? htmlspecialchars($poData['Supplier']) : ''; ?></textarea>
											</div>
										</form>
									</div>
								</div>
                            </div>

                            <!-- Right Side - Additional Table -->
                            <div class="col-md-4">
								<div class="card">
                                    <div class="card-body">
                                        <form>
											<div class="form-group col-md-12 d-flex align-items-center">
												<label for="inv-ship" style="width: 80px; white-space: nowrap;">Ship To:</label>
												<input type="text" class="form-control input-field" id="inv-ship" value="<?php echo isset($poData['ShipTo']) ? htmlspecialchars($poData['ShipTo']) : ''; ?>" style="flex: 1;" disabled>
											</div>
											<div class="form-group col-md-12 mt-2 d-flex align-items-center">
												<label for="inv-address" style="width: 80px; white-space: nowrap;">Address:</label>
												<textarea class="form-control input-field" id="inv-address" placeholder="Description" rows="2" style="flex: 1;" disabled><?php echo isset($poData['Address']) ? htmlspecialchars($poData['Address']) : ''; ?></textarea>
											</div>
											<div class="form-group col-md-12 mt-2 d-flex align-items-center">
												<label for="inv-remarks" style="width: 80px; white-space: nowrap;">Remarks:</label>
												<textarea class="form-control input-field" id="inv-remarks" placeholder="Description" disabled rows="2" style="flex: 1;"><?php echo isset($poData['Remarks']) ? htmlspecialchars($poData['Remarks']) : ''; ?></textarea>
											</div>
											<div class="form-group mt-2 col-md-12 d-flex align-items-center">
												<label class="me-2" for="inv-purpose" style="width: 120px; white-space: nowrap;">Purpose:</label>
												<input type="text" class="form-control input-field me-2" id="inv-purpose" value="<?php echo isset($poData['Purpose']) ? htmlspecialchars($poData['Purpose']) : ''; ?>" disabled>
												<label class="me-2" for="inv-terms" style="width: 120px; white-space: nowrap;">Terms:</label>
												<input type="text" class="form-control input-field" id="inv-terms" value="<?php echo isset($poData['Terms']) ? htmlspecialchars($poData['Terms']) : ''; ?>" disabled>
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>

							<div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
										<p style="text-transform: none; font-style: italic; color: blue;">
											Selected Category discountable for the following discount type in the list.
										</p>
                                        <div class="table-responsive" style="height: calc(75vh - 300px); overflow-y: auto;">
                                            <table class="table table-bordered" id="table-bold">
                                                <thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                                                    <tr>
                                                        <th>Barcode</th>
                                                        <th>Product Name</th>
                                                        <th>Qty</th>
                                                        <th>Partial Qty</th>
														<th>UOM</th>
														<th>Unit Price</th>
														<th>VAT</th>
														<th>Dics.</th>
														<th>Amount</th>
														<th>Location</th>
														<th>Vatable</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
													<?php if (isset($items) && count($items) > 0): ?>
														<?php foreach($items as $item): ?>
															<tr>
																<td><?php echo htmlspecialchars($item['Barcode'] ?? ''); ?></td>
																<td><?php echo htmlspecialchars($item['ProductName'] ?? ''); ?></td>
																<td><?php echo htmlspecialchars($item['Quantity'] ?? ''); ?></td>
																<td>-</td>
																<td><?php echo htmlspecialchars($item['Unit'] ?? ''); ?></td>
																<td><?php echo htmlspecialchars($item['CostPrice'] ?? ''); ?></td>
																<td><?php echo htmlspecialchars($item['isVat'] ?? ''); ?></td>
																<td><?php echo htmlspecialchars($item['Discount'] ?? ''); ?></td>
																<td><?php echo htmlspecialchars($item['TotalCostPrice'] ?? ''); ?></td>
																<td><?php echo htmlspecialchars($item['Location'] ?? ''); ?></td>
																<td><?php echo htmlspecialchars($item['CompanyVat'] ?? ''); ?></td>
															</tr>
														<?php endforeach; ?>
													<?php else: ?>
														<tr>
															<td colspan="11" class="text-center">No Data Available</td>
														</tr>
													<?php endif; ?>
												</tbody>                                           
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<div class="col-md-5">
								<div class="card">
									<div class="card-body">
										<h6>Product Discount</h6>
										<div class="table-responsive" style="height: calc(60vh - 300px); overflow-y: auto;">
											<table class="table table-bordered" id="table-bold">
												<thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
													<tr>
														<th>Product Name</th>
														<th>Discount</th>
													</tr>
												</thead>
												<tbody id="discountTableBody">
													<?php
													if (isset($poNumber)) {
														$sql = "SELECT ProductName, Discount 
																FROM tbl_purchasepending 
																WHERE POnumber = ? AND ProductName IS NOT NULL 
																AND Discount IS NOT NULL AND Discount > 0";
														$stmt = $conn->prepare($sql);
														$stmt->bind_param("s", $poNumber);
														$stmt->execute();
														$result = $stmt->get_result();

														if ($result->num_rows > 0) {
															while ($row = $result->fetch_assoc()) {
																echo "<tr>";
																echo "<td>" . htmlspecialchars($row['ProductName']) . "</td>";
																echo "<td>" . number_format($row['Discount']) . "%</td>"; // Added % sign here
																echo "</tr>";
															}
														} else {
															echo "<tr><td colspan='2' class='text-center'>No Data Available</td></tr>";
														}
														$stmt->close();
													} else {
														echo "<tr><td colspan='2' class='text-center'>No Data Available</td></tr>";
													}
													?>
												</tbody>                                            
											</table>
										</div>
									</div>
								</div>

								<div class="card">
                                    <div class="card-body">
										<h6>Expiration Details</h6>
                                        <div class="table-responsive" style="height: calc(60vh - 300px); overflow-y: auto;">
											<table class="table table-bordered" id="table-bold">
												<thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
													<tr>
														<th>Product Name</th>
														<th>Expiration</th>
													</tr>
												</thead>
												<tbody id="expirationTableBody">
													<?php
													// Assuming $poNumber is already defined from earlier in your code
													if (isset($poNumber)) {
														$sql = "SELECT ProductName, ExpirationDate 
																FROM tbl_purchasepending 
																WHERE POnumber = ? AND ProductName IS NOT NULL 
																AND ExpirationDate IS NOT NULL";
														$stmt = $conn->prepare($sql);
														$stmt->bind_param("s", $poNumber);
														$stmt->execute();
														$result = $stmt->get_result();

														if ($result->num_rows > 0) {
															while ($row = $result->fetch_assoc()) {
																echo "<tr>";
																echo "<td>" . htmlspecialchars($row['ProductName']) . "</td>";
																echo "<td>" . htmlspecialchars($row['ExpirationDate']) . "</td>";
																echo "</tr>";
															}
														} else {
															echo "<tr><td colspan='2' class='text-center'>No Data Available</td></tr>";
														}
														$stmt->close();
													} else {
														echo "<tr><td colspan='2' class='text-center'>No Data Available</td></tr>";
													}
													?>
												</tbody>                                            
											</table>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<div class="col-md-7">
								<div class="form-group col-md-12 d-flex align-items-center">
									<!--<button type="button" class="btn me-2 mt-4 new-btn btn-outline-primary" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#inventoryModal">
										<i class="fas fa-plus"></i> Create
									</button>-->
									<button type="button" class="btn me-2 mt-4 new-btn btn-outline-primary" style="font-size: 13px;" id="setExpirationBtn">
										<i class="fas fa-plus"></i> Set Expiration
									</button>
									<button type="button" class="btn me-2 mt-4 new-btn btn-outline-primary" style="font-size: 13px;" id="addDiscountBtn" data-product-id="123" data-product-name="Product Name Example">
										<i class="fas fa-plus"></i> Add Product Discount
									</button>
									<button type="button" class="btn me-2 mt-4 new-btn btn-outline-primary" style="font-size: 13px;" id="deleteItemBtn">
										<i class="fas fa-trash"></i> Delete Item
									</button>
									<button type="button" class="btn me-2 mt-4 new-btn btn-outline-primary" style="font-size: 13px;">
										<i class="fas fa-save"></i> Save Pending
									</button>
                                </div>

								<div class="card" style="width: 88%; height: 80%;">
									<div class="card-body">
										<form>
											<div class="form-group col-md-12 d-flex align-items-center">
												<label for="total-qty" style="white-space: nowrap; width: 150px;">Total Quantity:</label>
												<input type="text" style="flex: 1;" class="form-control input-field" id="total-qty" value="<?php echo isset($totals['TotalQty']) ? htmlspecialchars($totals['TotalQty']) : '0'; ?>" disabled>
											</div>
											<div class="form-group col-md-12 d-flex align-items-center">
												<label class="mt-3" for="gross-amt" style="white-space: nowrap; width: 150px;">Gross Amount:</label>
												<input type="text" style="flex: 1;" class="form-control input-field mt-3" id="gross-amt" value="<?php echo isset($totals['GrossAmount']) ? number_format($totals['GrossAmount'], 2) : '0.00'; ?>" disabled>
											</div>
											<div class="form-group col-md-12 d-flex align-items-center">
												<label class="mt-3" for="prod-disc" style="white-space: nowrap; width: 150px;">Product Discount:</label>
												<input type="text" style="flex: 1;" class="form-control input-field mt-3" id="prod-disc" value="0.00" disabled>
											</div>
											<div class="form-group col-md-12 d-flex align-items-center">
												<label class="mt-3" for="purc-disc" style="white-space: nowrap; width: 150px;">Purchase Discount:</label>
												<input type="text" style="flex: 1;" class="form-control input-field mt-3" id="purc-disc" value="0.00" disabled>
											</div>
											<div class="form-group col-md-12 d-flex align-items-center">
												<label class="mt-3" for="net-amt" style="white-space: nowrap; width: 150px;">Net Amount:</label>
												<input type="text" style="flex: 1;" class="form-control input-field mt-3" id="net-amt" value="<?php echo isset($totals['GrossAmount']) ? number_format($totals['GrossAmount'], 2) : '0.00'; ?>" disabled>
											</div>
										</form>
										<div class="form-group col-md-12 d-flex align-items-end justify-content-end mt-3">
											<button type="button" id="sendToServerBtn" class="btn me-2 new-btn btn-outline-primary" style="font-size: 13px; width: auto;">
												<i class="fas fa-save"></i> SEND TO SERVER
											</button>
											<button type="button" id="recieveBtn" class="btn me-2 new-btn btn-outline-primary" style="font-size: 13px;">
												<i class="fas fa-plus"></i> RECIEVE ITEM
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
				// Function to handle the click event for the "SEND TO SERVER" button
				document.addEventListener('DOMContentLoaded', function() {
					// Get PO number
					const invNoInput = document.getElementById('inv-no');
					if (!invNoInput) {
						console.error('Error: inv-no input not found');
						return;
					}
					const poNumber = invNoInput.value;

					// Get button references
					const setExpirationBtn = document.getElementById('setExpirationBtn');
					const addDiscountBtn = document.getElementById('addDiscountBtn');
					const deleteItemBtn = document.getElementById('deleteItemBtn');
					const sendToServerBtn = document.getElementById('sendToServerBtn');

					// Get table references
					const mainTable = document.querySelector('#table-bold'); // Main items table
					const mainTableRows = document.querySelectorAll('#table-bold tbody tr');
					const discountTable = document.querySelector('#discountTableBody').closest('table');
					const expirationTable = document.querySelector('#expirationTableBody').closest('table');

					// Function to update UI based on sent state
					function updateUIForSentState(isSent) {
						// Handle buttons
						const buttons = document.querySelectorAll('.new-btn.btn-outline-primary');
						buttons.forEach(button => {
							if (!button.textContent.includes('RECIEVE ITEM')) {
								button.disabled = isSent;
								button.style.pointerEvents = isSent ? 'none' : 'auto'; // Prevent clicks
								if (isSent) {
									button.classList.add('disabled-btn');
								} else {
									button.classList.remove('disabled-btn');
								}
							}
						});

						// Handle all tables
						[mainTable, discountTable, expirationTable].forEach(table => {
							if (table) {
								if (isSent) {
									table.classList.add('disabled-table');
									table.style.pointerEvents = 'none'; // Prevent all interactions
								} else {
									table.classList.remove('disabled-table');
									table.style.pointerEvents = 'auto';
								}
							}
						});

						// Ensure table-specific buttons are disabled when sent
						if (isSent) {
							if (setExpirationBtn) setExpirationBtn.disabled = true;
							if (addDiscountBtn) addDiscountBtn.disabled = true;
							if (deleteItemBtn) deleteItemBtn.disabled = true;
							if (setExpirationBtn) setExpirationBtn.classList.add('disabled-btn');
							if (addDiscountBtn) addDiscountBtn.classList.add('disabled-btn');
							if (deleteItemBtn) deleteItemBtn.classList.add('disabled-btn');
							// Clear any selected row
							mainTableRows.forEach(row => row.classList.remove('selected'));
						} else {
							// Initial state: table buttons disabled until row selected
							if (setExpirationBtn) setExpirationBtn.disabled = true;
							if (addDiscountBtn) addDiscountBtn.disabled = true;
							if (deleteItemBtn) deleteItemBtn.disabled = true;
							if (setExpirationBtn) setExpirationBtn.classList.add('disabled-btn');
							if (addDiscountBtn) addDiscountBtn.classList.add('disabled-btn');
							if (deleteItemBtn) deleteItemBtn.classList.add('disabled-btn');
						}
					}

					// Check sent state from localStorage
					const sentPOs = JSON.parse(localStorage.getItem('sentPOs') || '{}');
					if (poNumber && sentPOs[poNumber]) {
						updateUIForSentState(true);
					} else {
						updateUIForSentState(false);
					}

					// Table row selection logic (only active when not sent)
					let selectedRow = null;
					mainTableRows.forEach(row => {
						// Skip rows with "No Data Available"
						if (row.cells.length > 1 && 
							row.cells[0].textContent.trim() !== '' && 
							row.cells[1].textContent.trim() !== 'No Data Available') {
							row.addEventListener('click', function(e) {
								// Only allow selection if table is not disabled
								if (!mainTable.classList.contains('disabled-table')) {
									// Remove 'selected' class from all rows
									mainTableRows.forEach(r => r.classList.remove('selected'));
									// Add 'selected' class to clicked row
									this.classList.add('selected');
									selectedRow = this;

									// Enable table-specific buttons
									if (setExpirationBtn) setExpirationBtn.disabled = false;
									if (addDiscountBtn) addDiscountBtn.disabled = false;
									if (deleteItemBtn) deleteItemBtn.disabled = false;
									if (setExpirationBtn) setExpirationBtn.classList.remove('disabled-btn');
									if (addDiscountBtn) addDiscountBtn.classList.remove('disabled-btn');
									if (deleteItemBtn) deleteItemBtn.classList.remove('disabled-btn');

									// Set product data for discount modal
									if (this.cells.length > 1) {
										const barcode = this.cells[0].textContent.trim();
										const productName = this.cells[1].textContent.trim();
										if (addDiscountBtn) {
											addDiscountBtn.setAttribute('data-product-id', barcode);
											addDiscountBtn.setAttribute('data-product-name', productName);
										}
									}
								}
							});
						}
					});

					// SEND TO SERVER button logic
					if (sendToServerBtn) {
						sendToServerBtn.addEventListener('click', function(e) {
							e.preventDefault();

							// Show confirmation alert
							if (!confirm('Are you sure you want to send to server? This action cannot be undone.')) {
								return;
							}

							// Simulate sending to server
							setTimeout(() => {
								// Show success message
								alert('Successfully sent to server!');

								// Update UI to sent state
								updateUIForSentState(true);

								// Save sent state to localStorage
								sentPOs[poNumber] = true;
								localStorage.setItem('sentPOs', JSON.stringify(sentPOs));
								console.log(`Saved sent state for PO: ${poNumber}`);
							}, 500); // Simulate network delay
						});
					} else {
						console.error('Error: sendToServerBtn not found');
					}
				});

				//SET EXPIRATION
				document.getElementById('setExpirationBtn').addEventListener('click', function() {
					// Show the modal
					$('#expirationModal').modal('show');
					
					// Set minimum date to tomorrow
					const today = new Date();
					const tomorrow = new Date(today);
					tomorrow.setDate(tomorrow.getDate() + 1);
					
					const minDate = tomorrow.toISOString().split('T')[0]; // Format: YYYY-MM-DD
					document.getElementById('expirationDate').setAttribute('min', minDate);
				});

				document.getElementById('saveExpiration').addEventListener('click', function() {
					const expirationDate = document.getElementById('expirationDate').value;
					const poNumber = document.getElementById('inv-no').value;

					if (!expirationDate) {
						alert('Please select an expiration date');
						return;
					}

					// AJAX request to update expiration date
					$.ajax({
						url: 'update-incomingItem.php', // File to handle the update
						type: 'POST',
						data: {
							poNumber: poNumber,
							expirationDate: expirationDate
						},
						success: function(response) {
							const result = JSON.parse(response);
							if (result.success) {
								alert('Expiration date updated successfully');
								$('#expirationModal').modal('hide');
								// Auto-reload the page after successful update
								setTimeout(function() {
									location.reload();
								}, 500);
							} else {
								alert('Failed to update expiration date: ' + result.message);
							}
						},
						error: function(xhr, status, error) {
							alert('Error updating expiration date: ' + error);
						}
					});
				});

				document.addEventListener('DOMContentLoaded', function() {
					// Get references to the buttons using their IDs
					const setExpirationBtn = document.getElementById('setExpirationBtn');
					const addDiscountBtn = document.getElementById('addDiscountBtn');
					const deleteItemBtn = document.getElementById('deleteItemBtn'); // Using the ID directly
					
					// Initially disable the buttons
					setExpirationBtn.disabled = true;
					addDiscountBtn.disabled = true;
					deleteItemBtn.disabled = true;
					
					// Add visual indication of disabled state
					setExpirationBtn.classList.add('disabled-btn');
					addDiscountBtn.classList.add('disabled-btn');
					deleteItemBtn.classList.add('disabled-btn');
					
					// Add click event to all table rows to make them selectable
					const tableRows = document.querySelectorAll('#table-bold tbody tr');
					let selectedRow = null;
					
					tableRows.forEach(row => {
						// Skip rows with "No Data Available" text
						if (row.cells.length > 1 && row.cells[0].textContent.trim() !== '' && 
							row.cells[1].textContent.trim() !== 'No Data Available') {
							row.addEventListener('click', function() {
								// Remove 'selected' class from all rows
								tableRows.forEach(r => r.classList.remove('selected'));
								// Add 'selected' class to clicked row
								this.classList.add('selected');
								selectedRow = this;
								
								// Enable the buttons when a row is selected
								setExpirationBtn.disabled = false;
								addDiscountBtn.disabled = false;
								deleteItemBtn.disabled = false;
								
								// Remove visual indication of disabled state
								setExpirationBtn.classList.remove('disabled-btn');
								addDiscountBtn.classList.remove('disabled-btn');
								deleteItemBtn.classList.remove('disabled-btn');
								
								// Set product data for the discount modal
								if (this.cells.length > 1) {
									const barcode = this.cells[0].textContent.trim();
									const productName = this.cells[1].textContent.trim();
									
									// Update the button data attributes for use in the modal
									addDiscountBtn.setAttribute('data-product-id', barcode);
									addDiscountBtn.setAttribute('data-product-name', productName);
								}
							});
						}
					});
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
				document.addEventListener('DOMContentLoaded', function() {
					// Add click event to all table rows to make them selectable
					const tableRows = document.querySelectorAll('#table-bold tbody tr');
					let selectedRow = null;
					let discountModal;

					tableRows.forEach(row => {
						// Skip rows with "No Data Available" text
						if (row.cells.length > 1 && row.cells[1].textContent.trim() !== 'No Data Available') {
							row.addEventListener('click', function() {
								// Remove 'selected' class from all rows
								tableRows.forEach(r => r.classList.remove('selected'));
								// Add 'selected' class to clicked row
								this.classList.add('selected');
								selectedRow = this;
							});
						}
					});
					
					// Add click event to the Add Product Discount button
				document.getElementById('addDiscountBtn').addEventListener('click', function() {
					// Get the first product from the table (or you can choose any specific one)
					const productTable = document.querySelector('#table-bold tbody');
					const firstProductRow = productTable.querySelector('tr');
					
					// Check if there are any products in the table
					if (firstProductRow && firstProductRow.cells.length > 1 && firstProductRow.cells[1].textContent.trim() !== 'No Data Available') {
						// Get product name and barcode from the first row
						const productName = firstProductRow.cells[1].textContent.trim();
						const barcode = firstProductRow.cells[0].textContent.trim();
						
						// Set the values in the modal
						document.getElementById('productId').value = barcode;
						document.getElementById('productName').value = productName;
						
						// Show the modal
						const addDiscountModal = document.getElementById('addDiscountModal');
						const discountModal = new bootstrap.Modal(addDiscountModal);
						discountModal.show();
					} else {
						alert('No products available to add discount.');
					}
				});

					// Event listener for saving the discount
					document.getElementById('saveDiscount').addEventListener('click', function() {
						const productId = document.getElementById('productId').value;
						const productName = document.getElementById('productName').value;
						const discountPercentage = document.getElementById('discountPercentage').value;
						const poNumber = document.getElementById('inv-no').value;
						
						// Validate input
						if (!discountPercentage || discountPercentage < 0 || discountPercentage > 100) {
							alert('Please enter a valid discount percentage between 0 and 100.');
							return;
						}
						
						// Send data to backend using fetch or AJAX
						fetch('save-discount.php', {
							method: 'POST',
							headers: {
								'Content-Type': 'application/x-www-form-urlencoded',
							},
							body: 'productId=' + encodeURIComponent(productId) + 
								'&productName=' + encodeURIComponent(productName) + 
								'&discountPercentage=' + encodeURIComponent(discountPercentage) + 
								'&poNumber=' + encodeURIComponent(poNumber)
						})
						.then(response => response.json())
						.then(data => {
							if (data.success) {
								alert('Discount saved successfully!');
								
								// Close the modal - different approach
								const addDiscountModal = document.getElementById('addDiscountModal');
								// Use jQuery approach which is more reliable
								$(addDiscountModal).modal('hide');
								
								// Refresh the page to show updated discounts
								location.reload();
							} else {
								alert('Error saving discount: ' + data.message);
							}
						})
						.catch(error => {
							console.error('Error:', error);
							alert('An error occurred while saving the discount.');
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

					/* 🔹 HOVER EFFECT ON DROPDOWN BUTTONS */
					.dropdown-toggle:hover, 
					.dropdown-toggle.highlighted-dropdown {
						background: rgb(65, 165, 232) !important; /* Navy Blue Background */
    					color: #ffffff !important; /* White Text */
    					transform: scale(1.05);
					}

					#table-bold thead th {
						font-weight: bold;
						font-style: italic;
					}

					.btn:disabled {
						border-color: rgb(6, 0, 0); /* Gray border for disabled buttons */
						color: rgb(6, 1, 1); /* Light gray text for disabled buttons */
						background-color: rgb(241, 201, 201); /* Light gray background for better visibility */
						cursor: not-allowed; /* Show "not-allowed" cursor */
					}

					.btn:not(:disabled):hover {
						background-color: #007bff; /* Blue background */
						color: #ffffff; /* White text */
						border-color: #0056 fraseb3; /* Darker blue border */
					}

					#table-bold tbody tr.selected {
						background-color: #e0f0ff;
						cursor: pointer;
					}

					/* Table row hover effect */
					#table-bold tbody tr:hover {
						background-color: #f0f8ff;
						cursor: pointer;
					}

					/* Make sure other rows are clickable */
					#table-bold tbody tr {
						cursor: pointer;
					}

					/* Exception for "No Data Available" row */
					#table-bold tbody tr td[colspan] {
						cursor: default;
					}
			</style>

<?php include_once 'footer.php'; ?>