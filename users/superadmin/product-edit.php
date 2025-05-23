<?php include_once 'header.php'; ?>
<?php include_once 'modals.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
						<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false Type" class="dropdown-toggle">
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
								<a href="#" data-bs-toggle="modal" data-bs-target="#closeInventoryModal"> Close Today's Transaction</a>
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
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Close">
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
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Details</h5>
                                    <form id="productForm" method="POST" action="edit-product.php">
                                        <button type="button" class="btn me-2 new-btn btn-outline-primary" style="font-size: 13px;" onclick="window.location.href='product-search.php';">
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn save-btn btn-outline-primary" style="font-size: 13px;" name="save_product">
                                            <i class="fas fa-save"></i> Save
                                        </button>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="barCode">Barcode:</label>
                                                <input type="text" class="form-control input-field" id="barCode" name="barcode" placeholder="Enter Barcode">
                                            </div>
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="pluCode">PLU Code:</label>
                                                <input type="text" class="form-control input-field" id="pluCode" name="pluCode" readonly>
                                                <input type="hidden" id="pluCodeNo" name="pluCodeNo">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="date">Date:</label>
                                                <input type="date" class="form-control input-field date-field" id="date" readonly name="transactionDate">
                                            </div>
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="category">Category:</label>
                                                <select class="form-select input-field" id="category" name="category">
                                                    <option value="">Select Category</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for="productDetails">Product Details:</label>
                                            <textarea class="form-control input-field" id="productDetails" name="productDetails" placeholder="Description" rows="3"></textarea>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for="productCode">Product Code:</label>
                                            <input type="text" class="form-control input-field" id="productCode" name="productCode" readonly>
                                            <input type="hidden" id="productCodeNo" name="productCodeNo">
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for="productName">Product Name:</label>
                                            <input type="text" class="form-control input-field" id="productName" name="productName" placeholder="Enter Product Name">
                                        </div>
                                        <div class="form-group col-md-12 mt-3">
                                            <div class="d-flex align-items-center">
                                                <label for="shellOptions" class="me-2" style="white-space: nowrap;">Shelf:</label>
                                                <div class="d-flex flex-grow-1">
                                                    <select class="form-select input-field me-2" id="shellOptions" name="shelf" style="max-width: 30%;">
                                                        <option value="">Select Shelf</option>
                                                    </select>
                                                    <input type="text" class="form-control" id="shelfTextbox" name="shelfDescription" style="max-width: 70%;">
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
                                    <button type="button" class="btn addCosting-btn btn-outline-primary me-2" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#productInfoModal" id="addButton">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                    <button type="button" class="btn edit-btn btn-outline-primary me-2" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#editProductInfoModal" disabled>
                                        <i class="fas fa-save"></i> Edit
                                    </button>
                                    <button type="button" class="btn delete-btn btn-outline-primary" style="font-size: 13px;" disabled>
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                    <div class="table-responsive table-container" style="height: calc(81.5vh - 250px); overflow-y: auto;">
                                        <table class="table table-bordered mt-2 table-data" id="table-bold">
                                            <thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                                                <tr>
                                                    <th>Supplier Name</th>
                                                    <th>Cost</th>
                                                    <th>UOM</th>
                                                    <th>Barcode</th>
                                                </tr>
                                            </thead>
                                            <tbody id="costingTableBody">
                                                <tr>
                                                    <td colspan="4" class="text-center">No Data Available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5>Retail Details</h5>
                                    <button type="button" class="btn edit-addRetail-btn btn-outline-primary me-2" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#productModalRetail" id="addRetailButton">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                    <button type="button" class="btn edit-editRetail-btn btn-outline-primary me-2" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#editRetailModal" disabled>
                                        <i class="fas fa-save"></i> Edit
                                    </button>
                                    <button type="button" class="btn edit-deleteRetail-btn btn-outline-primary" style="font-size: 13px;" disabled>
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                    <div class="table-responsive table-container" style="height: calc(81.5vh - 250px); overflow-y: auto;">
                                        <table class="table table-bordered mt-2 table-data" id="retail-table">
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
                                            <tbody id="retailTableBody">
                                                <tr>
                                                    <td colspan="6" class="text-center">No Data Available</td>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

                    // Handle the close transaction confirmation
                    document.getElementById('confirmCloseInventory')?.addEventListener('click', function () {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '';
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'close_transaction';
                        input.value = '1';
                        form.appendChild(input);
                        document.body.appendChild(form);
                        form.submit();
                    });

                    let shelfData = []; // Store shelf data for dynamic updates
                    let costingData = []; // Store costing data for editing
                    let retailData = []; // Store retail data for editing
                    let suppliers = []; // Store suppliers for dropdown
                    let uoms = []; // Store UOMs for dropdown

                    // Get references to Edit and Delete buttons for Costing Details
                    const editButton = document.querySelector('.edit-btn');
                    const deleteButton = document.querySelector('.delete-btn');
                    const costingTableBody = document.getElementById('costingTableBody');

                    // Get references to Edit and Delete buttons for Retail Details
                    const editRetailButton = document.querySelector('.edit-editRetail-btn');
                    const deleteRetailButton = document.querySelector('.edit-deleteRetail-btn');
                    const retailTableBody = document.getElementById('retailTableBody');

                    // Function to toggle Costing button states
                    function toggleCostingButtonsState(enabled) {
                        editButton.disabled = !enabled;
                        deleteButton.disabled = !enabled;
                    }

                    // Function to toggle Retail button states
                    function toggleRetailButtonsState(enabled) {
                        editRetailButton.disabled = !enabled;
                        deleteRetailButton.disabled = !enabled;
                    }

                    // Function to handle Costing row selection
                    function handleCostingRowSelection(row, index) {
                        // Remove 'selected' class from all rows
                        costingTableBody.querySelectorAll('tr').forEach(r => r.classList.remove('selected'));
                        // Add 'selected' class to the clicked row
                        row.classList.add('selected');
                        // Store the selected row index
                        row.dataset.index = index;
                        // Enable buttons
                        toggleCostingButtonsState(true);
                    }

                    // Function to handle Retail row selection
                    function handleRetailRowSelection(row, index) {
                        // Remove 'selected' class from all rows
                        retailTableBody.querySelectorAll('tr').forEach(r => r.classList.remove('selected'));
                        // Add 'selected' class to the clicked row
                        row.classList.add('selected');
                        // Store the selected row index
                        row.dataset.index = index;
                        // Enable buttons
                        toggleRetailButtonsState(true);
                    }

                    // Function to populate dropdowns
                    function populateDropdowns() {
                        // Populate Supplier dropdowns
                        const editSupplierSelect = document.getElementById('editSupplier');
                        editSupplierSelect.innerHTML;
                        suppliers.forEach(supplier => {
                            const option = document.createElement('option');
                            option.value = supplier;
                            option.textContent = supplier;
                            editSupplierSelect.appendChild(option);
                        });

                        // Populate UOM dropdowns
                        const editUOMSelect = document.getElementById('editUOM');
                        editUOMSelect.innerHTML;
                        uoms.forEach(uom => {
                            const option = document.createElement('option');
                            option.value = uom;
                            option.textContent = uom;
                            editUOMSelect.appendChild(option);
                        });

                        // Populate Retail UOM dropdown
                        const editRetailUOMSelect = document.getElementById('editRetailUOM');
                        uoms.forEach(uom => {
                            const option = document.createElement('option');
                            option.value = uom;
                            option.textContent = uom;
                            editRetailUOMSelect.appendChild(option);
                        });
                    }

                    // Function to calculate SRP
                    function calculateSRP(cost, markUp) {
                        if (cost && markUp) {
                            return (parseFloat(cost) + (parseFloat(cost) * parseFloat(markUp) / 100)).toFixed(2);
                        }
                        return '';
                    }

                    // Fetch product data based on barcode from URL
                    const urlParams = new URLSearchParams(window.location.search);
                    const barcode = urlParams.get('barcode');
                    if (barcode) {
                        fetch(`edit-product.php?barcode=${encodeURIComponent(barcode)}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    const product = data.data;
                                    document.getElementById('barCode').value = product.Barcode || '';
                                    document.getElementById('pluCode').value = product.PLUcode || '';
                                    document.getElementById('date').value = product.TransactionDate || '';
                                    document.getElementById('productDetails').value = product.ProductDetails || '-';
                                    document.getElementById('productCode').value = product.ProductCode || '';
                                    document.getElementById('productName').value = product.ProductName || '';

                                    // Populate Category dropdown with options from tbl_invmaintence
                                    const categorySelect = document.getElementById('category');
                                    categorySelect.innerHTML = '<option value="">Select Category</option>'; // Reset options
                                    data.categories.forEach(category => {
                                        const option = document.createElement('option');
                                        option.value = category;
                                        option.textContent = category;
                                        if (category === product.Category) {
                                            option.selected = true;
                                        }
                                        categorySelect.appendChild(option);
                                    });

                                    // Store shelf data for dynamic updates
                                    shelfData = data.shelves;

                                    // Populate Shelf dropdown with ItemName
                                    const shelfSelect = document.getElementById('shellOptions');
                                    shelfSelect.innerHTML = '<option value="">Select Shelf</option>'; // Reset options
                                    data.shelves.forEach(shelf => {
                                        const option = document.createElement('option');
                                        option.value = shelf.ItemName;
                                        option.textContent = shelf.ItemName; // Display ItemName
                                        if (shelf.ItemName === product.Shelf) {
                                            option.selected = true;
                                        }
                                        shelfSelect.appendChild(option);
                                    });

                                    // Set initial Shelf Description (ItemSubName) based on selected Shelf
                                    const selectedShelf = shelfData.find(shelf => shelf.ItemName === product.Shelf);
                                    document.getElementById('shelfTextbox').value = selectedShelf ? selectedShelf.ItemSubName : product.ShelfDescription || '';

                                    // Add event listener to update Shelf Description when Shelf changes
                                    shelfSelect.addEventListener('change', function () {
                                        const selectedValue = this.value;
                                        const selectedShelf = shelfData.find(shelf => shelf.ItemName === selectedValue);
                                        document.getElementById('shelfTextbox').value = selectedShelf ? selectedShelf.ItemSubName : '';
                                    });

                                    // Store costing data and populate table
                                    costingData = data.costingDetails;
                                    costingTableBody.innerHTML = ''; // Clear existing rows
                                    if (costingData.length > 0) {
                                        costingData.forEach((costing, index) => {
                                            const row = document.createElement('tr');
                                            row.innerHTML = `
                                                <td>${costing.SupplierName || ''}</td>
                                                <td>${costing.Cost || ''}</td>
                                                <td>${costing.Measurement || ''}</td>
                                                <td>${costing.Barcode || ''}</td>
                                            `;
                                            // Make row clickable
                                            row.style.cursor = 'pointer';
                                            row.addEventListener('click', () => handleCostingRowSelection(row, index));
                                            costingTableBody.appendChild(row);
                                        });
                                    } else {
                                        costingTableBody.innerHTML = '<tr><td colspan="4" class="text-center">No Data Available</td></tr>';
                                    }

                                    // Store retail data and populate table
                                    retailData = data.retailDetails;
                                    retailTableBody.innerHTML = ''; // Clear existing rows
                                    if (retailData.length > 0) {
                                        retailData.forEach((retail, index) => {
                                            const row = document.createElement('tr');
                                            row.innerHTML = `
                                                <td>${retail.PriceType || ''}</td>
                                                <td>${retail.Barcode || ''}</td>
                                                <td>${retail.ProductName || ''}</td>
                                                <td>${retail.Measurement || ''}</td>
                                                <td>${retail.Quantity || ''}</td>
                                                <td>${retail.AppliedSRP || ''}</td>
                                            `;
                                            // Make row clickable
                                            row.style.cursor = 'pointer';
                                            row.addEventListener('click', () => handleRetailRowSelection(row, index));
                                            retailTableBody.appendChild(row);
                                        });
                                    } else {
                                        retailTableBody.innerHTML = '<tr><td colspan="6" class="text-center">No Data Available</td></tr>';
                                    }

                                    // Use suppliers and UOMs from the response
                                    suppliers = data.suppliers;
                                    uoms = data.uoms;
                                    populateDropdowns();
                                } else {
                                    alert(data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error fetching product:', error);
                                alert('Error fetching product data');
                            });
                    }

                    // Handle Edit button click to populate modal for Costing
                    editButton.addEventListener('click', () => {
                        const selectedRow = costingTableBody.querySelector('tr.selected');
                        if (selectedRow) {
                            const index = selectedRow.dataset.index;
                            const costing = costingData[index];
                            document.getElementById('editBarcode').value = costing.Barcode || '';
                            document.getElementById('editSupplier').value = costing.SupplierName || '';
                            document.getElementById('editUOM').value = costing.Measurement || '';
                            document.getElementById('editCostPrice').value = costing.Cost || '';
                            document.getElementById('editVatAble').checked = costing.VatAble || false;
                        }
                    });

                    // Handle Edit button click to populate modal for Retail
                    editRetailButton.addEventListener('click', () => {
                        const selectedRow = retailTableBody.querySelector('tr.selected');
                        if (selectedRow) {
                            const index = selectedRow.dataset.index;
                            const retail = retailData[index];
                            document.getElementById('editPriceType').value = retail.PriceType || '';
                            document.getElementById('editCost').value = retail.Cost || '';
                            document.getElementById('editRetailBarcode').value = retail.Barcode || '';
                            document.getElementById('editRetailProductName').value = retail.ProductName || '';
                            document.getElementById('editRetailUOM').value = retail.Measurement || '';
                            document.getElementById('editMarkUp').value = retail.MarkupPercent || ''; // Correctly map MarkupPercent to Mark Up
                            document.getElementById('editSRP').value = retail.SRP || calculateSRP(retail.Cost, retail.MarkupPercent);
                            document.getElementById('editAppliedSRP').value = retail.AppliedSRP || '';

                            // Add event listeners to update SRP dynamically
                            const costInput = document.getElementById('editCost');
                            const markUpInput = document.getElementById('editMarkUp');
                            const srpInput = document.getElementById('editSRP');

                            function updateSRP() {
                                const cost = costInput.value;
                                const markUp = markUpInput.value;
                                srpInput.value = calculateSRP(cost, markUp);
                            }

                            costInput.addEventListener('input', updateSRP);
                            markUpInput.addEventListener('input', updateSRP);
                        }
                    });

                    // Handle Save Changes in Edit Modal for Costing
                    document.getElementById('saveEditProductInfo')?.addEventListener('click', () => {
                        const selectedRow = costingTableBody.querySelector('tr.selected');
                        if (selectedRow) {
                            const index = selectedRow.dataset.index;
                            const updatedCosting = {
                                SupplierName: document.getElementById('editSupplier').value,
                                Cost: document.getElementById('editCostPrice').value,
                                Measurement: document.getElementById('editUOM').value,
                                Barcode: document.getElementById('editBarcode').value,
                                VatAble: document.getElementById('editVatAble').checked
                            };
                            costingData[index] = updatedCosting;

                            // Update the table row
                            selectedRow.innerHTML = `
                                <td>${updatedCosting.SupplierName || ''}</td>
                                <td>${updatedCosting.Cost || ''}</td>
                                <td>${updatedCosting.Measurement || ''}</td>
                                <td>${updatedCosting.Barcode || ''}</td>
                            `;
                            selectedRow.style.cursor = 'pointer';
                            selectedRow.addEventListener('click', () => handleCostingRowSelection(selectedRow, index));

                            // Close the modal
                            const modal = bootstrap.Modal.getInstance(document.getElementById('editProductInfoModal'));
                            modal.hide();
                        }
                    });

                    // Handle Save Changes in Edit Modal for Retail
                    document.getElementById('saveEditRetail').addEventListener('click', () => {
                        const selectedRow = retailTableBody.querySelector('tr.selected');
                        if (selectedRow) {
                            const index = selectedRow.dataset.index;
                            const updatedRetail = {
                                PriceType: document.getElementById('editPriceType').value,
                                Cost: document.getElementById('editCost').value,
                                Barcode: document.getElementById('editRetailBarcode').value,
                                ProductName: document.getElementById('editRetailProductName').value,
                                Measurement: document.getElementById('editRetailUOM').value,
                                MarkupPercent: document.getElementById('editMarkUp').value, // Save as MarkupPercent
                                SRP: document.getElementById('editSRP').value,
                                AppliedSRP: document.getElementById('editAppliedSRP').value,
                                Quantity: retailData[index].Quantity // Preserve quantity
                            };
                            retailData[index] = updatedRetail;

                            // Update the table row
                            selectedRow.innerHTML = `
                                <td>${updatedRetail.PriceType || ''}</td>
                                <td>${updatedRetail.Barcode || ''}</td>
                                <td>${updatedRetail.ProductName || ''}</td>
                                <td>${updatedRetail.Measurement || ''}</td>
                                <td>${updatedRetail.Quantity || ''}</td>
                                <td>${updatedRetail.AppliedSRP || ''}</td>
                            `;
                            selectedRow.style.cursor = 'pointer';
                            selectedRow.addEventListener('click', () => handleRetailRowSelection(selectedRow, index));

                            // Close the modal
                            const modal = bootstrap.Modal.getInstance(document.getElementById('editRetailModal'));
                            modal.hide();
                        }
                    });

                    // Handle form submission
                    document.getElementById('productForm').addEventListener('submit', function (e) {
                        e.preventDefault();
                        const formData = new FormData(this);
                        // Include costing and retail data in the form submission
                        formData.append('costingDetails', JSON.stringify(costingData));
                        formData.append('retailDetails', JSON.stringify(retailData));
                        fetch('edit-product.php', {
                            method: 'POST',
                            body: formData
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    alert(data.message);
                                    window.location.href = 'product-search.php';
                                } else {
                                    alert(data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error updating product:', error);
                                alert('Error updating product');
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

                    #retail-table thead th {
                        font-weight: bold;
                        font-style: italic;
                    }
                    .btn:disabled {
                        border-color:rgb(6, 0, 0); /* Gray border for disabled buttons */
                        color:rgb(6, 1, 1); /* Light gray text for disabled buttons */
                        background-color:rgb(241, 201, 201); /* Light gray background for better visibility */
                        cursor: not-allowed; /* Show "not-allowed" cursor */
                    }

                    /* Additional hover styles for enabled buttons */
                    .btn:not(:disabled):hover {
                        background-color: #007bff; /* Blue background */
                        color: #ffffff; /* White text */
                        border-color: #0056b3; /* Darker blue border */
                    }

                    /* Style for selected row */
                    #costingTableBody tr.selected {
                        background-color: #e0e0e0; /* Light gray background for selected row */
                    }
                </style>

<?php include_once 'footer.php'; ?>