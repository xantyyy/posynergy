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
						
						<a class="navbar-brand" href="#">Configuration</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	  

				<!-- PHP FOR ADDING NEW PRODUCT IN THE DATABASE -->

				<!--MAIN CONTENT HERE!!!!!!!!-->
					<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; margin-top: -30px;">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<div class="card">
										<div class="card-body">
											<div class="col-md-12">
												<h2>User Setup</h2>
											</div>
											<form>
												<div class="d-flex align-items-center mt-3">
													<button type="button" class="btn btn-primary mb-2 me-2" style="font-size: 13px;" id="newBtn">
														<i class="fas fa-plus"></i> New
													</button>
													<button type="button" class="btn btn-warning mb-2 me-2" style="font-size: 13px;" id="#">
														<i class="fas fa-save"></i> Save
													</button>
													<button type="button" class="btn btn-success mb-2 me-2" style="font-size: 13px;" id="#">
														<i class="fas fa-edit"></i> Edit
													</button>
													<button type="button" class="btn btn-danger mb-2" style="font-size: 13px;" id="#">
														<i class="fas fa-ban"></i> Disable
													</button>
												</div>
												<div class="d-flex align-items-center mt-2">
													<h6>Supplier Info:</h6>
													<label for="#" class="mb-2" style="margin-left: 10px; color: red; text-transform: none;">
														Right click user account to set the User Authority Restriction.
													</label>
												</div>
											</form>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<h6>User List</h6>
													<div class="card">
														<div class="card-body">
															<div style="overflow-x: auto; white-space: nowrap;">
																<table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
																	<thead class="card-header bg-dark opacity-60 text-white">
																		<tr>
																			<th>Username</th>
																			<th>Role</th>
																			<th>Status</th>
																			<th>Traning Mode</th>
																		</tr>
																	</thead>
																	<tbody>
																			<tr>
																				<td>ADMIN</td>
																				<td>ADMIN / IT</td>
																				<td>Enabled</td>
																				<td>No</td>
																			</tr>
																			<tr>
																				<td>CASHIER</td>
																				<td>CASHIER</td>
																				<td>Enabled</td>
																				<td>No</td>
																			</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<h6>User Fullname</h6>
													<form>
														<div class="d-flex align-items-center mt-3">
															<input type="text" class="form-control" style="width: 97%; margin-left: 10px;" id="fullName" disabled>
														</div>
													</form>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<h6>Account Details</h6>
													<form>
														<div class="d-flex align-items-center mt-3">
															<label for="roleInput" class="me-2">Role:</label>
															<input type="text" class="form-control" style="width: 97%; margin-left: 50px;" id="roleInput" disabled>
														</div>
														<div class="d-flex align-items-center mt-3">
															<label for="usernameInput" class="me-2">Username:</label>
															<input type="text" class="form-control" style="width: 97%; margin-left: 10px;" id="usernameInput" disabled>
														</div>
														<div class="d-flex align-items-center mt-3">
															<label for="passwordInput" class="me-2">Password:</label>
															<input type="text" class="form-control" style="width: 97%; margin-left: 15px;" id="passwordInput" disabled>
														</div>
														<div class="d-flex align-items-center mt-3">
															<label for="confirmInput" class="me-2">Confirm:</label>
															<input type="text" class="form-control" style="width: 97%; margin-left: 23px;" id="confirmInput" disabled>
														</div>
													</form>
													<p style="text-transform: none; font-size: 14px; font-style: italic; margin-left: 95px;" class="mt-2">
														Password are case-sensitive.
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
            	</div>

            <script>
				document.getElementById('newBtn').addEventListener('click', function () {
				// Enable the input fields
				document.getElementById('fullName').disabled = false;
				document.getElementById('roleInput').disabled = false;
				document.getElementById('usernameInput').disabled = false;
				document.getElementById('passwordInput').disabled = false;
				document.getElementById('confirmInput').disabled = false;
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