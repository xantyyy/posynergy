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
							<h2 style="margin: 0 20px; margin-top: 15px;">Advantage Card Enrollment Form</h2>
						</div>
					</div>
					<div class="row mb-3">
                        <!-- Left Side - Product Data Entry Form -->
                        <div class="col-md-12">
							<div class="card">
                                <div class="card-body">
                                    <h6>Personal Information</h6>
                                    <form>
										<div class="d-flex align-items-center">
											<div class="form-group col-md-3 me-4">
												<label for="#">Last Name:</label>
												<input type="text" class="form-control" id="#">
											</div>
											<div class="form-group col-md-3 me-4">
												<label for="#">First Name:</label>
												<input type="text" class="form-control" id="#">
											</div>
											<div class="form-group col-md-3 me-4">
												<label for="#">Middle Name:</label>
												<input type="text" class="form-control" id="#">
											</div>
											<div class="form-group col-md-1 me-4">
												<label for="#" style="width: 150px;">Extention Name:</label>
												<select class="form-control" id="#">
													<option value="option1" selected hidden ></option>
													<option value="option2">Option 1</option>
													<option value="option3">Option 2</option>
												</select>
                                        	</div>
										</div>
										<div class="d-flex align-items-center mt-4">
											<div class="form-group col-md-3 me-4">
												<label for="#">Lot/House/Building/#:</label>
												<input type="text" class="form-control" id="#">
											</div>
											<div class="form-group col-md-4 me-4">
												<label for="#">Street/Purok:</label>
												<input type="text" class="form-control" id="#">
											</div>
											<div class="form-group col-md-4 me-4">
												<label for="#">Barangay:</label>
												<input type="text" class="form-control" id="#">
											</div>
										</div>
										<div class="d-flex align-items-center mt-4">
											<div class="form-group col-md-3 me-4">
												<label for="#">Town/City:</label>
												<input type="text" class="form-control" id="#">
											</div>
											<div class="form-group col-md-4 me-4">
												<label for="#">Province:</label>
												<input type="text" class="form-control" id="#">
											</div>
											<div class="form-group col-md-4 me-4">
												<label for="#">Civil Status:</label>
												<select class="form-control" id="#">
													<option value="option1" selected hidden ></option>
													<option value="option2">Option 1</option>
													<option value="option3">Option 2</option>
												</select>
                                        	</div>
										</div>
										<div class="d-flex align-items-center mt-4">
											<div class="form-group col-md-3 me-4">
                                                <label for="#">Birthday:</label>
                                                <input type="date" class="form-control" id="#">
                                            </div>
											<label for="#" class="mr-3 me-3 mt-4">Gender:</label>
											<div class="form-check me-3 mt-4">
                                                <input class="form-check-input" type="radio" name="#" id="#" value="#" checked>
                                                <label class="form-check-label" for="#">
                                                    Male
                                                </label>
                                            </div>
											<div class="form-check me-4 mt-4">
                                                <input class="form-check-input" type="radio" name="#" id="#" value="#" checked>
                                                <label class="form-check-label" for="#">
                                                    Female
                                                </label>
                                            </div>
											<div class="form-group col-md-4 me-2">
												<label for="#">Card Details:</label>
												<input type="text" class="form-control" id="#" placeholder="Card #">
											</div>
											<button type="button" class="btn btn-primary mt-4" style="width: auto; margin-right: 5px; font-size: 12px;" onclick="window.location.href='product-entry.php';">
												<i class="fas fa-plus"></i> New
												</button>
												<button type="button" class="btn btn-warning mt-4" style="width: auto; margin-right: 5px; font-size: 12px;">
													<i class="fas fa-save"></i> Save
												</button>
												<button type="button" class="btn btn-danger mt-4" style="width: auto; margin-right: 5px; font-size: 12px;">
													<i class="fas fa-trash"></i> Cancel
												</button>
										</div>
                                    </form>
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
						padding: 5px;
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
						padding: 5px 5px;
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