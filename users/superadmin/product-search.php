<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
	.navbar{
	background-color:#1137a9;
	color:#fff;
}
</style>

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
								<a href="#">Adjustment</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">inventory</i><span>Product Profile</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu2">
							<li>
								<a href="#">Product Entry</a>
							</li>
							<li>
								<a href="#">Product Search</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">payment</i><span>Other Transaction</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu3">
							<li>
								<a href="#">Enroll Card</a>
							</li>
							<li>
								<a href="#">Document Reprinter</a>
							</li>
							<li>
								<a href="#">Discount Setup</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">search</i><span>Search</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu4">
							<li>
								<a href="#">Inventory</a>
							</li>
							<li>
								<a href="#">Sales</a>
							</li>
							<li>
								<a href="#">Discounts</a>
							</li>
							<li>
								<a href="#">Adjustemnt / Incoming</a>
							</li>
							<li>
								<a href="#">Product SL</a>
							</li>
							<li>
								<a href="#">Return</a>
							</li>
							<li>
								<a href="#">E-Journal</a>
							</li>
							<li>
								<a href="#">Voided Transaction</a>
							</li>
							<li>
								<a href="#">Suki Points</a>
							</li>
							<li>
								<a href="#">System Log</a>
							</li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">settings</i><span>Configuration</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu5">
							<li>
								<a href="#">Supplier</a>
							</li>
							<li>
								<a href="#">List Maintenance</a>
							</li>
							<li>
								<a href="#">Branch Setup</a>
							</li>
							<li>
								<a href="#">SI No. & Txn No.</a>
							</li>
							<li>
								<a href="#">User Accounts</a>
							</li>
							<li>
								<a href="#">Permissions</a>
							</li>
						</ul>
					</li>
 
					<li class="dropdown">
						<a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">build</i><span>Utilities</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu7">
							<li>
								<a href="#">Close Today's Transaction</a>
							</li>
							<li>
								<a href="#">Data Back-up</a>
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
						
						<a class="navbar-brand" href="#">Dashboard</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	 	  
				

				<?php
					require_once '../../includes/config.php';

					if(isset($_GET['delid'])) {
						$id = intval($_GET['delid']);
						$sql = mysqli_query($conn, "DELETE FROM users WHERE user_id = '$id'");

						echo "<script>alert('Record has been successfully deleted!');</script>";
						echo "<script>window.location='users-manage.php';</script>";
					}
				?> 

				<!--MAIN CONTENT HERE!!!!!!!!-->
				<div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="margin: 0 20px; margin-top: 15px;">Product Data Entry</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Left Side - Product Data Entry Form -->
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>Search Parameters</h6>
                                        <form class="d-flex align-items-center">
                                            <input type="text" class="form-control me-3" style="width: 54%;" id="searchInput" placeholder="Search here...">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="searchType" id="searchBarcode" value="barcode" checked>
                                                <label class="form-check-label" for="searchBarcode">
                                                    Barcode
                                                </label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="searchType" id="searchDescription" value="description">
                                                <label class="form-check-label" for="searchDescription">
                                                    Description
                                                </label>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="loadAllButton" style="font-size: small;">Load All</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Product List</h5>
                                        <form>
                                        <table class="table table-bordered" style="margin-top: 10px;">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Barcode</th>
                                                    <th>Product</th>
                                                    <th>Shelf</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr onclick="selectRow(this)" style="cursor: pointer;">
                                                        <td>Sample</td>
                                                        <td>Sample</td>
                                                        <td>Sample</td>
                                                        <td>Sample</td>
                                                        <td>Sample</td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side - Additional Table -->
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Details</h5>
                                        <h6>Category:</h6>
                                        <table class="table table-bordered" style="margin-top: 10px;">
                                            <thead>
                                                <tr>
                                                    <th>Default</th>
                                                    <th>Supplier Name</th>
                                                    <th>Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
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
                                        <h5>Selling Price</h5>
                                        <table class="table table-bordered" style="margin-top: 10px;">
                                            <thead>
                                                <tr>
                                                    <th>UOM</th>
                                                    <th>Price Type</th>
                                                    <th>VAT-able</th>
                                                    <th>SRP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                    <td>Sample</td>
                                                </tr>
                                            </tbody>                                            
                                        </table>
                                        <button type="button" class="btn btn-primary" style="width: 80px; margin-right: 5px; font-size: 10px;">
                                            <i class="fas fa-plus"></i> New
                                        </button>
                                        <button type="button" class="btn btn-warning" style="width: 80px; margin-right: 5px; font-size: 10px;">
                                            <i class="fas fa-save"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" style="width: 80px; margin-right: 5px; font-size: 10px;">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        $(document).ready(function() {
                            $('#example').DataTable( {
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                                        extend: 'copy',
                                        exportOptions: {
                                            columns: ':visible:not(.no-print)'
                                        }
                                    },
                                    {
                                        extend: 'csv',
                                        exportOptions: {
                                            columns: ':visible:not(.no-print)'
                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        exportOptions: {
                                            columns: ':visible:not(.no-print)'
                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        exportOptions: {
                                            columns: ':visible:not(.no-print)'
                                        }
                                    },
                                    {
                                        extend: 'print',
                                        customize: function ( win ) {
                                            $(win.document.body)
                                                .find('.no-print')
                                                .remove();
                                        }
                                    }
                                ],
                                columnDefs: [
                                    {
                                        targets: [12], // replace 2 with the index of the column you want to exclude
                                        visible: true,
                                        className: 'no-print'
                                    }
                                ]
                            } );
                        });

                        $(document).ready(function() {
                            var table = $('#example').DataTable();

                            // Add a custom filter function
                            $.fn.dataTable.ext.search.push(
                                function(settings, data, dataIndex) {
                                var branch = $('#branch-filter').val();
                                var role = $('#role-filter').val();
                                var branchData = data[0];
                                var roleData = data[1];

                                // If the date column is empty, don't show the row
                                if (branchData === "" || roleData === "") {
                                    return false;
                                }

                                // Compare the branch with the user input date range
                                if (branch === "" || branch === branchData) {
                                    if (role === "" || role === roleData) {
                                        return true;
                                    }
                                }

                                return false;
                                }
                            );

                            // Trigger the filtering when the user changes the date range
                            $('#branch-filter, #role-filter').change(function() {
                                table.draw();
                            });
                        });
                    </script>

<?php include_once 'footer.php'; ?>