<?php include_once 'header.php'; ?>
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
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Details</h5>
                                    <form>
                                        <button type="button" class="btn me-2 new-btn btn-outline-primary opacity-50" style="font-size: 13px;">
                                            <i class="fas fa-plus"></i> New
                                        </button>
                                        <button type="button" class="btn save-btn btn-outline-primary opacity-50" style="font-size: 13px;" disabled>
                                            <i class="fas fa-save"></i> Save
                                        </button>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="barCode">Bar Code:</label>
                                                <input type="text" class="form-control input-field" id="barCode" disabled>
                                            </div>
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="pluCode">PLU Code:</label>
                                                <input type="text" class="form-control input-field" id="pluCode" readonly>
                                                <input type="hidden" id="pluCodeNo"> <!-- For raw number -->
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="date">Date:</label>
                                                <input type="date" class="form-control input-field date-field" id="date" disabled>
                                            </div>
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="category">Category:</label>
                                                <select class="form-select input-field" id="category" disabled>
                                                    <option>Select Category</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for="productDetails">Product Details:</label>
                                            <textarea class="form-control input-field" id="productDetails" rows="3" disabled></textarea>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for="productCode">Product Code:</label>
                                            <input type="text" class="form-control input-field" id="productCode" readonly>
                                            <input type="hidden" id="productCodeNo"> <!-- For raw number -->
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for="productName">Product Name:</label>
                                            <input type="text" class="form-control input-field" id="productName" name="productName"disabled>
                                        </div>
                                        <div class="form-group col-md-12 mt-3">
                                            <div class="d-flex align-items-center">
                                                <label for="shellOptions" class="me-2" style="white-space: nowrap;">Shelf:</label>
                                                <div class="d-flex flex-grow-1">
                                                    <select class="form-select input-field me-2" id="shellOptions" disabled style="max-width: 30%;">
                                                        <option></option>
                                                    </select>
                                                    <input type="text" class="form-control" id="shelfTextbox" disabled style="max-width: 70%;">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive table-container" style="height: calc(50vh - 250px); overflow-y: auto; margin-top: -15px;">
                                        <table class="table-borderless table-data mt-2" id="discountTable">
                                            <thead>
                                                <tr>
                                                    <th>Discount Type</th>
                                                </tr>
                                            </thead>
                                            <tbody id="discountTableBody">
                                                <tr>
                                                    <td>No discounts available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p style="text-transform: none; font-style: italic; color: blue;">
                                        Selected Category discountable for the following discount type in the list.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - Additional Table -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Costing Details</h5>
                                    <button type="button" class="btn addCosting-btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#productInfoModal">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                    <button type="button" class="btn edit-btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" disabled>
                                        <i class="fas fa-save"></i> Edit
                                    </button>
                                    <button type="button" class="btn delete-btn btn-outline-primary opacity-50" style="font-size: 13px;" disabled>
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                    <div class="table-responsive table-container" style="height: calc(76.5vh - 250px); overflow-y: auto;">
                                        <table class="table table-bordered mt-2 table-data" id="table-bold">
                                            <thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                                                <tr>
                                                    <th>Supplier Name</th>
                                                    <th>Cost</th>
                                                    <th>UOM</th>
                                                    <th>Barcode</th>
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
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5>Retail Details</h5>
                                    <button type="button" class="btn addRetail-btn2 btn-outline-primary opacity-50 me-2" style="font-size: 13px;">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                    <button type="button" class="btn edit-btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" disabled>
                                        <i class="fas fa-save"></i> Edit
                                    </button>
                                    <button type="button" class="btn delete-btn btn-outline-primary opacity-50" style="font-size: 13px;" disabled>
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                    <div class="table-responsive table-container" style="height: calc(76.5vh - 250px); overflow-y: auto;">
                                        <table class="table table-bordered mt-2 table-data" id="table-bold">
                                            <thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                                                <tr>
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
            </div>      

			<script>
                $(document).ready(function () {
                    // ================== VARIABLES ====================
                    let lastProductCode = null;
                    let lastPLUCode = null;
                    let codesGenerated = false;

                    const discountTypeMapping = {
                        'SD': 'Senior Citizen',
                        'SP': 'Solo Parent',
                        'PWD': 'PWD'
                    };

                    // ================== FUNCTIONS ====================

                    // Set current date to input field
                    const setCurrentDate = () => {
                        const today = new Date().toISOString().split('T')[0];
                        $('#date').val(today);
                    };

                    // Initialize form (disable everything except "New" button)
                    const initializeFormState = () => {
                        $('.edit-btn, .delete-btn, .addCosting-btn, .addRetail-btn2').prop('disabled', true);
                        $('.input-field').prop('disabled', true);
                        $('#category, #shellOptions').prop('disabled', true);
                        $('.costing-table, .retail-table').css('pointer-events', 'none').find('tbody tr').addClass('disabled-row');
                    };

                    // Enable form inputs except the date field
                    const enableFormElements = () => {
                        $('.edit-btn, .delete-btn, .addCosting-btn, .addRetail-btn2').prop('disabled', false);
                        $('.input-field').not('.date-field').prop('disabled', false);
                        $('#category, #shellOptions').prop('disabled', false);
                        $('.costing-table, .retail-table').css('pointer-events', 'auto').find('tbody tr').removeClass('disabled-row');
                    };

                    // Generate product and PLU codes
                    const generateNextCodes = () => {
                        return fetch('manage-productProfile.php?type=GENERATE_CODES')
                            .then(response => {
                                if (!response.ok) throw new Error('Failed to fetch codes');
                                return response.json();
                            })
                            .then(data => {
                                if (data.productCode && data.pluCode) {
                                    lastProductCode = data.productCode;
                                    lastPLUCode = data.pluCode;
                                    $('#productCode').val(data.productCode);
                                    $('#pluCode').val(data.pluCode);
                                    $('#productCodeNo').val(data.productCodeNo);
                                    $('#pluCodeNo').val(data.pluCodeNo);
                                    $('.save-btn').prop('disabled', false);
                                } else {
                                    throw new Error('Invalid code data');
                                }
                            })
                            .catch(error => console.error('Error generating codes:', error));
                    };

                    // Fetch and populate dropdown options
                    const fetchDropdownData = (url, dropdownId, placeholder) => {
                        return fetch(url)
                            .then(response => response.json())
                            .then(data => {
                                const dropdown = $(dropdownId);
                                dropdown.empty().append(`<option disabled selected>${placeholder}</option>`);
                                data.forEach(item => {
                                    const option = dropdownId === '#shellOptions'
                                        ? `<option value="${item.ItemName}" data-subname="${item.ItemSubName}">${item.ItemName}</option>`
                                        : `<option value="${item}">${item}</option>`;
                                    dropdown.append(option);
                                });
                            })
                            .catch(error => console.error(`Error fetching ${url}:`, error));
                    };

                    // Handle save button click
                    const saveCodes = () => {
                        const codeData = {
                            productCodeNo: $('#productCodeNo').val(),
                            pluCodeNo: $('#pluCodeNo').val()
                        };

                        const saveBtn = $('.save-btn');
                        saveBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

                        fetch('manage-productProfile.php?type=UPDATE_CODES', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(codeData)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Codes updated successfully in tbl_idno!');
                                location.reload();
                            } else {
                                throw new Error(data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Save error:', error);
                            alert('Error saving codes');
                            saveBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Save');
                        });
                    };

                    // Handle "New" button click
                    const handleNewButton = () => {
                        const newBtn = $('.new-btn');
                        const isCancel = newBtn.data('isCancel') || false;

                        if (!isCancel) {
                            newBtn.html('<i class="fas fa-times"></i> Cancel').data('isCancel', true);
                            enableFormElements();

                            generateNextCodes();
                            fetchDropdownData('manage-productProfile.php?type=CATEGORY', '#category', 'Select Category');
                            fetchDropdownData('manage-productProfile.php?type=SHELF', '#shellOptions', 'Select Shelf').then(() => {
                                $('#shellOptions').on('change', function () {
                                    const subName = $(this).find(':selected').data('subname') || '';
                                    $('#shelfTextbox').val(subName);
                                });
                            });
                        } else {
                            newBtn.html('<i class="fas fa-plus"></i> New').data('isCancel', false);
                            initializeFormState();
                            $('#productCode, #pluCode, #productCodeNo, #pluCodeNo').val('');
                            $('#category, #shellOptions').empty().append('<option disabled selected>Select an option</option>');
                            $('#shelfTextbox').val('');
                            $('.save-btn').prop('disabled', true).html('<i class="fas fa-save"></i> Save');
                        }
                    };

                    // ================== EVENT LISTENERS ====================
                    $('.new-btn').on('click', handleNewButton);
                    $('.save-btn').on('click', saveCodes);

                    $('#category').on('change', function () {
                        const selectedCategory = $(this).val();
                        const tableBody = $('#discountTableBody');
                        tableBody.empty();

                        if (selectedCategory === 'Select Category') {
                            tableBody.append('<tr><td>No discounts available</td></tr>');
                            return;
                        }

                        fetch(`manage-productProfile.php?selectedCategory=${encodeURIComponent(selectedCategory)}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.length > 0) {
                                    data.forEach(discount => {
                                        const displayName = discountTypeMapping[discount] || discount;
                                        tableBody.append(`<tr><td>${displayName}</td></tr>`);
                                    });
                                } else {
                                    tableBody.append('<tr><td>No discounts available</td></tr>');
                                }
                            })
                            .catch(error => {
                                console.error('Error fetching DiscountType data:', error);
                                tableBody.append('<tr><td>Error fetching discounts</td></tr>');
                            });
                    });

                    // ================== INITIALIZATION ====================
                    initializeFormState();
                    setCurrentDate();
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
                    .btn:disabled {
                        border-color:rgb(6, 0, 0); /* Gray border for disabled buttons */
                        color:rgb(6, 1, 1); /* Light gray text for disabled buttons */
                        background-color:rgb(241, 201, 201); /* Light gray background for better visibility */
                        cursor: not-allowed; /* Show "not-allowed" cursor */
                        opacity: 1; /* Keep solid visibility */
                    }

                    /* Additional hover styles for enabled buttons */
                    .btn:not(:disabled):hover {
                        background-color: #007bff; /* Blue background */
                        color: #ffffff; /* White text */
                        border-color: #0056b3; /* Darker blue border */
                    }
                </style>

<?php include_once 'footer.php'; ?>