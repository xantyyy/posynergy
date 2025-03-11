<?php include_once 'header.php'; ?>
<?php include_once 'modals.php'; ?>


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
						
						<a class="navbar-brand" href="#">Product Profile</a>
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
                            <h2 style="margin: 0 20px; margin-top: 15px;">Product Data Entry</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Left Side - Product Data Entry Form -->
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Details</h5>
                                    <form>
                                        <button type="button" class="btn btn-primary" style="width: 80px; font-size: 10px;">
                                            <i class="fas fa-plus"></i> New
                                        </button>
                                        <button type="button" class="btn btn-success" style="width: 80px; font-size: 10px;">
                                            <i class="fas fa-save"></i> Save
                                        </button>
                                        <button type="button" class="btn btn-danger" style="width: 80px; font-size: 10px;">
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="barCode">Bar Code</label>
                                                <input type="text" class="form-control" id="barCode">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="pujCode">PLU Code</label>
                                                <input type="text" class="form-control" id="pujCode">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" id="date">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="category">Category</label>
                                                <input type="text" class="form-control" id="category">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="productDetails">Product Details</label>
                                            <textarea class="form-control" id="productDetails" rows="3"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="productCode">Product Code</label>
                                            <input type="text" class="form-control" id="productCode">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="shellOptions">Shelf</label>
                                            <select class="form-control" id="shellOptions">
                                                <option value="option1">Option 1</option>
                                                <option value="option2">Option 2</option>
                                            </select>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - Additional Table -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Costing Details</h5>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal" style="width: 80px; margin-right: 5px; font-size: 10px;">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                    <button type="button" class="btn btn-warning" style="width: 80px; margin-right: 5px; font-size: 10px;" data-bs-toggle="modal" data-bs-target="#editModalcost">
										<i class="fas fa-save"></i> Edit
									</button>
                                    <button type="button" class="btn btn-danger" style="width: 80px; margin-right: 5px; font-size: 10px;" data-bs-toggle="modal" data-bs-target="#deleteModalcost">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                    <table class="table table-bordered" style="margin-top: 10px;">
                                        <thead>
                                            <tr>
												<th>#</th>
                                                <th>Supplier Name</th>
                                                <th>Cost</th>
                                                <th>UOM</th>
                                                <th>Barcode</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
													<td><input type="radio" name="selectItem" value="1"></td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
								<div class="card-body">
									<h5>Retail Details</h5>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal" style="width: 80px; margin-right: 5px; font-size: 10px;">
										<i class="fas fa-plus"></i> Add
									</button>
									<button type="button" class="btn btn-warning" style="width: 80px; margin-right: 5px; font-size: 10px;" data-bs-toggle="modal" data-bs-target="#editModalprice">
										<i class="fas fa-save"></i> Edit
									</button>
									<button type="button" class="btn btn-danger" style="width: 80px; margin-right: 5px; font-size: 10px;" data-bs-toggle="modal" data-bs-target="#deleteModalsrp">
										<i class="fas fa-trash"></i> Delete
									</button>

									<table class="table table-bordered" style="margin-top: 10px;">
										<thead>
											<tr>
												<th>#</th>
												<th>Price Type</th>
												<th>Barcode</th>
												<th>Product Name</th>
												<th>UOM</th>
												<th>Quantity</th>
												<th>Selling Price</th>
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
											</tr>
										</tbody>
									</table>
								</div>
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