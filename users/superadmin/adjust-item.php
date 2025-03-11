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
							<h2 style="margin: 0 20px; margin-top: 15px;">Adjustment Details</h2>
						</div>
					</div>
					<div class="row">
                        <!-- Left Side - Product Data Entry Form -->

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Adjustment No:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="#">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Adjustment Date:</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="#">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Supplier:</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="#">
                                                        <option value="option1">Option 1</option>
                                                        <option value="option2">Option 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Address:</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" id="#" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Contact Person:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="#">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Contact No:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="#">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label for="#">Purpose</label>
                                                <select class="form-control" id="#">
                                                    <option value="option1">Option 1</option>
                                                    <option value="option2">Option 2</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label for="#">Remarks:</label>
                                                <textarea class="form-control" id="#" rows="3"></textarea>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label for="#">Terms:</label>
                                                <input type="text" class="form-control" id="#">
                                            </div>
                                        </div>                                    
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="form-group col-md-5">
                                        <label for="#">Barcode:</label>
                                        <input type="text" class="form-control" id="#">
                                    </div>
                                    <table class="table table-bordered" style="margin-top: 10px;">
                                        <thead class="fw-bold fs-6 fst-italic">
                                            <tr>
                                                <th>Batch</th>
                                                <th>Description</th>
                                                <th>Expiration</th>
                                                <th>Qty</th>
                                                <th>Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
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

                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5>Add Quantity</h5>
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                            <input type="number" name="#" class="form-control quantity" value="0" min="1" required>
                                            </div>
                                            <button type="button"
                                            class="btn btn-primary"
                                            onclick="location.href='adjust-item.php';"
                                            data-bs-toggle="modal"
                                            data-bs-target="#"
                                            style="width: auto; margin-right: 5px; font-size: 15px; margin-top: 10px;">
                                                <i class="fas fa-plus"></i> Add
                                            </button>
                                        </div>                                    
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <table class="table table-bordered" style="margin-top: 10px;">
                                        <thead class="fw-bold fs-6 fst-italic">
                                            <tr>
                                                <th>Barcode</th>
                                                <th>Description</th>
                                                <th>Qty</th>
                                                <th>UOM</th>
                                                <th>Unit Price</th>
                                                <th>Amount</th>
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
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group row mb-4">
                                                <label for="#" class="col-sm-4 col-form-label">Gross Amount:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="#">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Total Quantity:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="#">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Less Discount:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="#">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Add Adjustment:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="#">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="#" class="col-sm-4 col-form-label">Net Amount:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="#">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary mt-3" style="width: auto; margin-right: 5px; font-size: 15px;" data-bs-toggle="modal" data-bs-target="#">
                                            <i class="fas fa-save"></i> Submit
                                        </button>
                                        <button type="button" class="btn btn-success mt-3" style="width: auto; font-size: 15px;" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-7">
                            <div class="card-body mt-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" style="width: auto; margin-right: 5px; font-size: 15px;" data-bs-toggle="modal" data-bs-target="#">
                                    <i class="fas fa-save"></i> Save to Pending
                                </button>
								<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal" style="width: auto; margin-right: 5px; font-size: 15px  ;">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                                <button type="button" class="btn btn-danger" style="width: auto; margin-right: 5px; font-size: 15px;" data-bs-toggle="modal" data-bs-target="#">
									<i class="fas fa-trash"></i> Delete All
								</button>
                            </div>
                        </div>

                        
                    </div>
				</div>
            </div>

            <style>
				.navbar{
				background-color: #1137a9;
				color: #fff;
				}

                .navbar-brand{
                    color: #fff;
                }
			</style>
<?php include_once 'footer.php'; ?>