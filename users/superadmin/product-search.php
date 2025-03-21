<?php include_once 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
						
						<a class="navbar-brand" href="#">Product Profile</a>
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
                                            <div class="table-responsive" style="height: calc(123vh - 300px); overflow-y: auto;">
                                                <table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
                                                    <thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
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
                                            </div>
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
                                        <div class="table-responsive" style="height: calc(80vh - 300px); overflow-y: auto;">
                                            <table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
                                                <thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
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
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5>Selling Price</h5>
                                        <div class="table-responsive" style="height: calc(80vh - 300px); overflow-y: auto;">
                                            <table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
                                                <thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
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
                                        </div>
                                        <button type="button" class="btn" style="background-color: #0056b3; color: white; width: auto; margin-right: 5px; font-size: 13px;" onclick="window.location.href='product-entry.php';">
                                            <i class="fas fa-plus"></i> New
                                        </button>
                                        <button type="button" class="btn" style="background-color: #d48f00; color: white; width: auto; margin-right: 5px; font-size: 13px;">
                                            <i class="fas fa-save"></i> Edit
                                        </button>
                                        <button type="button" class="btn" style="background-color: #b30000; color: white; width: auto; margin-right: 5px; font-size: 13px;">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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