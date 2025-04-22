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
                                            <input type="text" class="form-control me-3" style="width: 85%;" id="searchInput" placeholder="Search here...">
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
                                                        <tr>
                                                            <td class="text-center" colspan="5" style="text-transform: none;">Please search for a Product</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side - Additional Tables -->
                            <div class="col-md-5">
                                <div class="card">
                                        <div class="card-body">
                                            <h5>Details</h5>
                                            <h6>Category:</h6>
                                            <div class="table-responsive" style="height: calc(80vh - 300px); overflow-y: auto;">
                                                <table class="table table-bordered" style="margin-top: 10px;" id="details-table">
                                                    <thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                                                        <tr>
                                                            <th>Default</th>
                                                            <th>Supplier Name</th>
                                                            <th>Cost</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center" colspan="3" style="text-transform: none;">Select a product to view details</td>
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
                                            <table class="table table-bordered" style="margin-top: 10px;" id="selling-price-table">
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
                                                        <td class="text-center" colspan="4" style="text-transform: none;">Select a product to view details</td>
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

                            // Add event listener for search input
                            document.getElementById('searchInput').addEventListener('input', function () {
                                const searchTerm = this.value.trim();
                                if (searchTerm === '') {
                                    // If search input is empty, show the initial message
                                    const tbody = document.querySelector('#table-bold tbody');
                                    tbody.innerHTML = '<tr><td class="text-center" colspan="5">Please search for a product</td></tr>';
                                    // Clear the details table
                                    const detailsTbody = document.querySelector('#details-table tbody');
                                    detailsTbody.innerHTML = '<tr><td class="text-center" colspan="3" style="text-transform: none;">Select a product to view details</td></tr>';
                                    // Clear the selling price table
                                    const sellingPriceTbody = document.querySelector('#selling-price-table tbody');
                                    sellingPriceTbody.innerHTML = '<tr><td class="text-center" colspan="4" style="text-transform: none;">Select a product to view details</td></tr>';
                                } else {
                                    // Fetch products only if there is a search term
                                    fetchProducts(searchTerm);
                                }
                            });

                            // Add event listener for Load All button
                            document.getElementById('loadAllButton').addEventListener('click', function () {
                                document.getElementById('searchInput').value = '';
                                const tbody = document.querySelector('#table-bold tbody');
                                tbody.innerHTML = '<tr><td class="text-center" colspan="5" style="text-transform: none;">Please search for a Product</td></tr>';
                                // Clear the details table
                                const detailsTbody = document.querySelector('#details-table tbody');
                                detailsTbody.innerHTML = '<tr><td class="text-center" colspan="3" style="text-transform: none;">Select a product to view details</td></tr>';
                                // Clear the selling price table
                                const sellingPriceTbody = document.querySelector('#selling-price-table tbody');
                                sellingPriceTbody.innerHTML = '<tr><td class="text-center" colspan="4" style="text-transform: none;">Select a product to view details</td></tr>';
                            });

                            // Add event listener for Load All button
                            document.getElementById('loadAllButton').addEventListener('click', function () {
                                document.getElementById('searchInput').value = ''; // Clear the search input
                                fetchProducts(''); // Fetch all products
                            });

                            function fetchProducts(searchTerm) {
                                fetch(`search-product.php?search=${encodeURIComponent(searchTerm)}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        const tbody = document.querySelector('#table-bold tbody');
                                        tbody.innerHTML = '';

                                        if (data.length === 0) {
                                            tbody.innerHTML = '<tr><td class="text-center" colspan="5">No products found</td></tr>';
                                        } else {
                                            data.forEach(product => {
                                                const row = document.createElement('tr');
                                                row.style.cursor = 'pointer';
                                                row.onclick = () => selectRow(row, product.Barcode);
                                                row.innerHTML = `
                                                    <td>${product.ID}</td>
                                                    <td>${product.Barcode}</td>
                                                    <td>${product.ProductName}</td>
                                                    <td>${product.Shelf}</td>
                                                    <td>${product.Quantity || '0'}</td>
                                                `;
                                                tbody.appendChild(row);
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error fetching products:', error);
                                        const tbody = document.querySelector('#table-bold tbody');
                                        tbody.innerHTML = '<tr><td colspan="5">Error loading products</td></tr>';
                                    });
                            }

                            function selectRow(row, barcode) {
                                // Highlight the selected row
                                document.querySelectorAll('#table-bold tbody tr').forEach(r => r.classList.remove('table-active'));
                                row.classList.add('table-active');

                                // Fetch combined details for the selected product using barcode
                                fetch(`fetch-product-details.php?barcode=${encodeURIComponent(barcode)}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        // Populate the Details table (cost details)
                                        const detailsTbody = document.querySelector('#details-table tbody');
                                        detailsTbody.innerHTML = '';

                                        if (data.costDetails.length === 0) {
                                            detailsTbody.innerHTML = '<tr><td class="text-center" colspan="3">No details found</td></tr>';
                                        } else {
                                            data.costDetails.forEach(detail => {
                                                const detailRow = document.createElement('tr');
                                                detailRow.innerHTML = `
                                                    <td>${detail.isDefault ? 'Yes' : 'No'}</td>
                                                    <td>${detail.SupplierName}</td>
                                                    <td>${detail.Cost}</td>
                                                `;
                                                detailsTbody.appendChild(detailRow);
                                            });
                                        }

                                        // Populate the Selling Price table (price details)
                                        const sellingPriceTbody = document.querySelector('#selling-price-table tbody');
                                        sellingPriceTbody.innerHTML = '';

                                        if (data.priceDetails.length === 0) {
                                            sellingPriceTbody.innerHTML = '<tr><td class="text-center" colspan="4">No selling price details found</td></tr>';
                                        } else {
                                            data.priceDetails.forEach(price => {
                                                const priceRow = document.createElement('tr');
                                                priceRow.innerHTML = `
                                                    <td>${price.Measurement}</td>
                                                    <td>${price.PriceType}</td>
                                                    <td>${price.isVAT ? 'Yes' : 'No'}</td>
                                                    <td>${price.AppliedSRP}</td>
                                                `;
                                                sellingPriceTbody.appendChild(priceRow);
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error fetching combined details:', error);
                                        const detailsTbody = document.querySelector('#details-table tbody');
                                        detailsTbody.innerHTML = '<tr><td colspan="3">Error loading details</td></tr>';
                                        const sellingPriceTbody = document.querySelector('#selling-price-table tbody');
                                        sellingPriceTbody.innerHTML = '<tr><td colspan="4">Error loading selling price details</td></tr>';
                                    });
                            }
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

                    #details-table thead th {
						font-weight: bold;
						font-style: italic;
					}

                    #selling-price-table thead th {
						font-weight: bold;
						font-style: italic;
					}

                    /* Highlight selected row */
                    .table-active {
                        background-color: #e9ecef !important;
                    }
                </style>

<?php include_once 'footer.php'; ?>