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
                                        <table class="table table-bordered" style="margin-top: 10px;">
                                            <thead class="fw-bold fs-6 fst-italic">
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
                                    <table class="table table-bordered" style="margin-top: 10px;">
                                        <thead class="fw-bold fs-6 fst-italic">
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
                                    <table class="table table-bordered" style="margin-top: 10px;">
                                        <thead class="fw-bold fs-6 fst-italic">
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
				</style>
<?php include_once 'footer.php'; ?>