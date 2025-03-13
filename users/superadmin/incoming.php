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

				<!-- PHP FOR ADDING NEW PRODUCT IN THE DATABASE -->

				<!--MAIN CONTENT HERE!!!!!!!!-->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 style="margin: 0 20px; margin-top: 15px;">Incoming Inventory</h2>
						</div>
					</div>
					<div class="row">
                        <!-- Left Side - Product Data Entry Form -->
                        <div class="col-md-4">
                            <div class="card">
								<div class="card-body">
                                    <h6>Search Parameters</h6>
                                    <form class="d-flex align-items-center">
                                        <input type="text" class="form-control me-3" style="width: 100%;" id="searchInput" placeholder="Search here...">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
                                        <thead class="fw-bold fs-6 fst-italic card-header bg-dark opacity-60 text-white">
                                            <tr>
												<th>#</th>
                                                <th>Inventory No.</th>
                                                <th>Date Created</th>
                                                <th>Supplier</th>
                                                <th>Net Amount</th>
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
									<button type="button" class="btn btn-primary" onclick="window.location.href='incoming-inv.php';" style="width: auto; margin-right: 5px; font-size: 13px;">
										<i class="fas fa-plus"></i> New
									</button>
                                    <button type="button" class="btn btn-success" style="width: auto; margin-right: 5px; font-size: 13px;" data-bs-toggle="modal" data-bs-target="#editModalcost">
										<i class="fas fa-save"></i> Open
									</button>
                                    <button type="button" class="btn btn-danger" style="width: auto; margin-right: 5px; font-size: 13px;" data-bs-toggle="modal" data-bs-target="#deleteModalcost">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- Table Here -->
                <div class="container">
                    
            </div>
			
			<script>
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
    @keyframes aurora {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .navbar {
        background: linear-gradient(270deg, #ff4b5c, #00509d, #adb5bd, #ff4b5c, #00509d, #adb5bd, #ff4b5c);
        background-size: 400% 400%;
        animation: aurora 10s ease infinite;
        transition: all 0.8s ease-in-out;
    }

    .navbar-brand {
        color: #fff;
    }

    .nav-link, 
    .dropdown-toggle, 
    .list-unstyled a {
        color: #333;
        font-size: 16px;
        transition: all 0.3s ease-in-out;
    }

    .nav-link, .nav-link:hover, 
    .list-unstyled a:hover, .dropdown-toggle:hover,
    .hovered-dropdown, .hover-effect {
        background: linear-gradient(90deg, #adb5bd, #ff4b5c);
        color: #ffffff !important;
        transform: scale(1.05);
    }

    .nav-link.active, .list-unstyled a.active, .dropdown-toggle.active {
        color: #ffffff !important;
        font-weight: bold;
        background: linear-gradient(90deg, #adb5bd, #ff4b5c) !important;
    }

    .dropdown-toggle[aria-expanded="true"], 
    .dropdown-toggle.highlighted-dropdown {
        background: linear-gradient(90deg, #adb5bd, #ff4b5c) !important;
        color: #ffffff !important;
        font-weight: bold;
    }

    .dropdown-toggle.highlighted-dropdown:hover {
        background: linear-gradient(90deg, #adb5bd, #ff4b5c) !important;
    }

    .sidebar {
        width: 250px;
        background: #ff4b5c !important;
        overflow: visible !important;
    }

    .sidebar .collapse {
        display: none;
    }

    .sidebar .collapse.show {
        display: block !important;
    }
</style>





		
<?php include_once 'footer.php'; ?>