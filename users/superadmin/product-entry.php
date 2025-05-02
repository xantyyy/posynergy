<?php include_once 'header.php'; ?>
<?php include_once 'modals.php'; ?>
<?php
	require_once '../../includes/config.php'; // Database connection

	// Check if the transaction is being closed
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['close_transaction'])) {
		$today = date("Y-m-d");
		$closeSql = "UPDATE tbl_openingfund SET Closed = 1 WHERE Username = 'CASHIER' AND DATE(TransDate) = '$today'";
		if ($conn->query($closeSql) === TRUE) {
			echo "<script>alert('Transaction closed successfully!');</script>";
		} else {
			echo "<script>alert('Error: " . $conn->error . "');</script>";
		}
	}

	$conn->close();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                        <button type="button" class="btn me-2 new-btn btn-outline-primary" style="font-size: 13px;">
                                            <i class="fas fa-plus"></i> New
                                        </button>
                                        <button type="button" class="btn save-btn btn-outline-primary" style="font-size: 13px;" disabled>
                                            <i class="fas fa-save"></i> Save
                                        </button>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="barCode">Barcode:</label>
                                                <input type="text" class="form-control input-field" id="barCode" placeholder="Enter Barcode" disabled>
                                            </div>
                                            <div class="form-group col-md-12 mt-2">
                                                <label for="pluCode">PLU Code:</label>
                                                <input type="text" class="form-control input-field" id="pluCode" placeholder="Enter PLU Code" readonly>
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
                                            <textarea class="form-control input-field" id="productDetails" placeholder="Description" rows="3" disabled></textarea>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for="productCode">Product Code:</label>
                                            <input type="text" class="form-control input-field" id="productCode" placeholder="Enter Product Code" readonly>
                                            <input type="hidden" id="productCodeNo"> <!-- For raw number -->
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for="productName">Product Name:</label>
                                            <input type="text" class="form-control input-field" id="productName" placeholder="Enter Product Name" name="productName"disabled>
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
                                    <button type="button" class="btn addCosting-btn btn-outline-primary me-2" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#productInfoModal" id="addButton">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                    <button type="button" class="btn edit-btn btn-outline-primary me-2" style="font-size: 13px;" disabled>
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
                                            <tbody>
                                                <tr>
                                                    <td>No Data Available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h5>Retail Details</h5>
                                    <button type="button" class="btn addRetail-btn btn-outline-primary me-2" style="font-size: 13px;" data-bs-toggle="modal" data-bs-target="#productModalRetail" id="addRetailButton">
                                        <i class="fas fa-plus"></i> Add
                                    </button>
                                    <button type="button" class="btn editRetail-btn btn-outline-primary me-2" style="font-size: 13px;" disabled>
                                        <i class="fas fa-save"></i> Edit
                                    </button>
                                    <button type="button" class="btn deleteRetail-btn btn-outline-primary" style="font-size: 13px;" disabled>
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
                                            <tbody>
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
                document.addEventListener('DOMContentLoaded', function () {
                    // ================== ELEMENT REFERENCES ====================
                    const costPriceInput = document.getElementById('costPrice');
                    const retailCostInput = document.getElementById('retail-cost');
                    const retailMarkupInput = document.getElementById('retail-markup');
                    const retailSrpInput = document.getElementById('retail-srp');
                    const retailAppliedSrpInput = document.getElementById('retail-appliedSrp');
                    const productInfoModal = document.getElementById('productInfoModal');
                    const productModalRetail = document.getElementById('productModalRetail');
                    const addRetailButton = document.getElementById('addRetailButton');
                    const saveRetailButton = document.querySelector('#productModalRetail .modal-footer .btn-primary');
                    const editRetailButton = document.querySelector('#saveEditRetail');
                    const tableRetailBody = document.querySelector('#retail-table tbody');
                    const editRetailBtn = document.querySelector('.edit-retail-btn');
                    const deleteRetailBtn = document.querySelector('.delete-retail-btn');
                    const saveButton = document.querySelector('#productInfoModal .modal-footer .btn-primary');
                    const tableBody = document.querySelector('#table-bold tbody');
                    const editButton = document.querySelector('.edit-btn');
                    const deleteButton = document.querySelector('.delete-btn');

                    // Debugging: Log if elements are found
                    console.log('Elements found:', {
                        costPriceInput: !!costPriceInput,
                        retailCostInput: !!retailCostInput,
                        retailMarkupInput: !!retailMarkupInput,
                        retailSrpInput: !!retailSrpInput,
                        productInfoModal: !!productInfoModal,
                        productModalRetail: !!productModalRetail,
                        saveRetailButton: !!saveRetailButton,
                        tableRetailBody: !!tableRetailBody,
                        tableBody: !!tableBody
                    });

                    // ================== SHARED VARIABLES ====================
                    window.sharedCostPrice = ''; // Global variable to store the cost value between modals
                    let savedRetailCost = ''; // Store retail cost for persistence between modal openings

                    // ================== MARKUP CALCULATION FUNCTIONS ====================
                    function calculateMarkup() {
                        console.log('Calculating markup...');
                        const cost = parseFloat(retailCostInput.value) || 0;
                        const srp = parseFloat(retailSrpInput.value.replace(/[^0-9.]/g, '')) || 0;

                        console.log('Cost:', cost, 'SRP:', srp);

                        if (cost > 0 && srp > 0) {
                            const markup = ((srp - cost) / cost) * 100;
                            retailMarkupInput.value = isNaN(markup) ? '' : markup.toFixed(2);
                            console.log('Calculated Markup:', markup.toFixed(2));
                        } else {
                            retailMarkupInput.value = '';
                            console.log('Invalid input: Cost or SRP is zero or invalid');
                        }

                        retailAppliedSrpInput.value = srp > 0 ? srp.toFixed(2) : '';
                    }

                    function calculateSrpFromMarkup() {
                        const cost = parseFloat(retailCostInput.value) || 0;
                        const markup = parseFloat(retailMarkupInput.value.replace(/[^0-9.]/g, '')) || 0;

                        if (cost > 0 && markup >= 0) {
                            const srp = cost + (cost * (markup / 100));
                            retailSrpInput.value = srp.toFixed(2);
                            retailAppliedSrpInput.value = srp.toFixed(2);
                            console.log('Calculated SRP from Markup:', srp.toFixed(2));
                        } else {
                            retailSrpInput.value = '';
                            retailAppliedSrpInput.value = '';
                            console.log('Invalid input: Cost or Markup is zero or invalid');
                        }
                    }

                    if (retailSrpInput) {
                        retailSrpInput.addEventListener('input', calculateMarkup);
                    } else {
                        console.error('retail-srp input not found');
                    }

                    if (retailMarkupInput) {
                        retailMarkupInput.addEventListener('input', calculateSrpFromMarkup);
                    } else {
                        console.error('retail-markup input not found');
                    }

                    // ================== COSTING AND RETAIL COST SYNC ====================
                    if (costPriceInput) {
                        costPriceInput.addEventListener('input', function () {
                            window.sharedCostPrice = this.value;
                            savedRetailCost = this.value;
                            console.log('Updated shared cost price:', window.sharedCostPrice);
                        });
                    }

                    if (retailCostInput) {
                        retailCostInput.addEventListener('input', function () {
                            window.sharedCostPrice = this.value;
                            savedRetailCost = this.value;
                            console.log('Updated shared cost price from retail:', window.sharedCostPrice);
                            calculateMarkup();
                        });
                    }

                    if (productModalRetail) {
                        productModalRetail.addEventListener('show.bs.modal', function () {
                            if (retailCostInput && window.sharedCostPrice) {
                                retailCostInput.value = window.sharedCostPrice;
                                console.log('Set retail cost to:', window.sharedCostPrice);
                            }
                            if (retailSrpInput.value) {
                                calculateMarkup();
                            }
                        });
                    }

                    if (productInfoModal) {
                        productInfoModal.addEventListener('show.bs.modal', function () {
                            if (costPriceInput && window.sharedCostPrice) {
                                costPriceInput.value = window.sharedCostPrice;
                                console.log('Set cost price to:', window.sharedCostPrice);
                            }
                        });
                    }

                    if (saveButton) {
                        saveButton.addEventListener('click', function () {
                            if (costPriceInput && costPriceInput.value) {
                                window.sharedCostPrice = costPriceInput.value;
                                savedRetailCost = costPriceInput.value;
                                console.log('Saved cost price on costing save:', window.sharedCostPrice);
                            }
                        });
                    }

                    if (saveRetailButton) {
                        saveRetailButton.addEventListener('click', function () {
                            if (retailCostInput && retailCostInput.value) {
                                window.sharedCostPrice = retailCostInput.value;
                                savedRetailCost = retailCostInput.value;
                                console.log('Saved cost price on retail save:', window.sharedCostPrice);
                            }
                        });
                    }

                    // ================== RETAIL TABLE FUNCTIONS ====================
                    function checkAndUpdateEmptyRetailTable() {
                        if (
                            tableRetailBody.children.length === 0 ||
                            (tableRetailBody.children.length === 1 &&
                                tableRetailBody.querySelector('tr td').textContent === 'No Data Available')
                        ) {
                            tableRetailBody.innerHTML = `
                                <tr class="no-data-row">
                                    <td colspan="6" class="text-center">No Data Available</td>
                                </tr>
                            `;
                        }
                    }

                    function clearRetailModal() {
                        document.getElementById('retail-priceType').selectedIndex = 0;
                        document.getElementById('retail-cost').value = '';
                        document.getElementById('retailBarcode').value = '';
                        document.getElementById('retailProductName').value = '';
                        document.getElementById('retailUOM').value = ''; // Changed from retail-uom to retailUOM
                        document.getElementById('retail-markup').value = '';
                        document.getElementById('retail-srp').value = '';
                        document.getElementById('retail-appliedSrp').value = '';
                        saveRetailButton.removeAttribute('data-editing-row');
                    }

                    if (saveRetailButton) {
                        saveRetailButton.addEventListener('click', function () {
                            const priceType = document.getElementById('retail-priceType').value;
                            const cost = document.getElementById('retail-cost').value;
                            const barcode = document.getElementById('retailBarcode').value;
                            const productName = document.getElementById('retailProductName').value;
                            const uom = document.getElementById('retailUOM').value; // Changed from retail-uom to retailUOM
                            const markup = document.getElementById('retail-markup').value;
                            const srp = document.getElementById('retail-srp').value;
                            const appliedSrp = document.getElementById('retail-appliedSrp').value;

                            console.log('Retail data to save:', { priceType, cost, barcode, productName, uom, markup, srp, appliedSrp });

                            if (!priceType || !cost || !productName || !uom || !markup || !srp || !appliedSrp) {
                                alert('Please fill in all required fields (Price Type, Cost, Product Name, UOM, Markup, SRP, Applied SRP).');
                                return;
                            }

                            const editingRowIndex = saveRetailButton.getAttribute('data-editing-row');
                            if (editingRowIndex !== null) {
                                const editingRow = tableRetailBody.children[editingRowIndex];
                                editingRow.cells[0].textContent = priceType;
                                editingRow.cells[1].textContent = barcode;
                                editingRow.cells[2].textContent = productName;
                                editingRow.cells[3].textContent = uom;
                                editingRow.cells[4].textContent = '1';
                                editingRow.cells[5].textContent = appliedSrp;

                                saveRetailButton.removeAttribute('data-editing-row');
                                alert('Data successfully updated!');
                            } else {
                                const newRow = document.createElement('tr');
                                newRow.innerHTML = `
                                    <td>${priceType}</td>
                                    <td>${barcode}</td>
                                    <td>${productName}</td>
                                    <td>${uom}</td>
                                    <td>1</td>
                                    <td>${appliedSrp}</td>
                                `;

                                newRow.addEventListener('click', function () {
                                    document.querySelectorAll('#retail-table tbody tr').forEach((row) => {
                                        row.classList.remove('selected-row');
                                    });

                                    this.classList.add('selected-row');
                                    editRetailBtn.disabled = false;
                                    editRetailBtn.classList.remove('opacity-50');
                                    deleteRetailBtn.disabled = false;
                                    deleteRetailBtn.classList.remove('opacity-50');
                                });

                                const noDataRow = tableRetailBody.querySelector('.no-data-row');
                                if (noDataRow) {
                                    tableRetailBody.innerHTML = '';
                                }

                                tableRetailBody.appendChild(newRow);
                                alert('Data successfully saved!');
                            }

                            clearRetailModal();
                            const modalElement = document.getElementById('productModalRetail');
                            const modalInstance = bootstrap.Modal.getInstance(modalElement);
                            if (modalInstance) {
                                modalInstance.hide();
                            } else {
                                console.error('Modal instance not found for productModalRetail');
                            }
                        });
                    }

                    if (editRetailBtn) {
                        editRetailBtn.addEventListener('click', function () {
                            const selectedRow = document.querySelector('#retail-table tbody tr.selected-row');

                            if (selectedRow) {
                                document.getElementById('edit-priceType').value = selectedRow.cells[0].textContent;
                                document.getElementById('edit-barcode').value = selectedRow.cells[1].textContent;
                                document.getElementById('edit-productName').value = selectedRow.cells[2].textContent;
                                document.getElementById('edit-uom').value = selectedRow.cells[3].textContent;
                                document.getElementById('edit-quantity').value = selectedRow.cells[4].textContent;
                                document.getElementById('edit-appliedSrp').value = selectedRow.cells[5].textContent;

                                const editModal = document.getElementById('editModalRetail');
                                const editModalInstance = new bootstrap.Modal(editModal);
                                editModalInstance.show();

                                if (editRetailButton) {
                                    editRetailButton.onclick = function () {
                                        selectedRow.cells[0].textContent = document.getElementById('edit-priceType').value;
                                        selectedRow.cells[1].textContent = document.getElementById('edit-barcode').value;
                                        selectedRow.cells[2].textContent = document.getElementById('edit-productName').value;
                                        selectedRow.cells[3].textContent = document.getElementById('edit-uom').value;
                                        selectedRow.cells[4].textContent = document.getElementById('edit-quantity').value;
                                        selectedRow.cells[5].textContent = document.getElementById('edit-appliedSrp').value;

                                        editModalInstance.hide();
                                        alert('Changes saved successfully!');
                                    };
                                }
                            }
                        });
                    }

                    if (deleteRetailBtn) {
                        deleteRetailBtn.addEventListener('click', function () {
                            const selectedRow = document.querySelector('#retail-table tbody tr.selected-row');

                            if (selectedRow) {
                                if (confirm('Are you sure you want to delete this item?')) {
                                    selectedRow.remove();

                                    editRetailBtn.disabled = true;
                                    editRetailBtn.classList.add('opacity-50');
                                    deleteRetailBtn.disabled = true;
                                    deleteRetailBtn.classList.add('opacity-50');

                                    checkAndUpdateEmptyRetailTable();
                                }
                            }
                        });
                    }

                    // Initial check for retail table
                    checkAndUpdateEmptyRetailTable();

                    // ================== COSTING TABLE FUNCTIONS ====================
                    function checkAndUpdateEmptyTable() {
                        if (
                            tableBody.children.length === 0 ||
                            (tableBody.children.length === 1 &&
                                tableBody.querySelector('tr td').textContent === 'No Data Available')
                        ) {
                            tableBody.innerHTML = `
                                <tr class="no-data-row">
                                    <td colspan="4" class="text-center">No Data Available</td>
                                </tr>
                            `;
                        }
                    }

                    function clearModal() {
                        document.getElementById('barcode').value = '';
                        document.getElementById('supplier').selectedIndex = 0;
                        document.getElementById('uom').selectedIndex = 0;
                        document.getElementById('costPrice').value = '';
                        document.getElementById('vatable').checked = false;
                        saveButton.removeAttribute('data-editing-row');
                    }

                    if (saveButton) {
                        saveButton.addEventListener('click', function () {
                            const barcode = document.getElementById('barcode').value;
                            const supplier = document.getElementById('supplier').value;
                            const uom = document.getElementById('uom').value;
                            const costPrice = document.getElementById('costPrice').value;
                            const vatable = document.getElementById('vatable').checked;

                            console.log('Costing data to save:', { barcode, supplier, uom, costPrice, vatable });

                            if (!supplier || !uom || !costPrice) {
                                alert('Please fill in all required fields (Supplier, UOM, Cost Price).');
                                return;
                            }

                            const editingRowIndex = saveButton.getAttribute('data-editing-row');
                            if (editingRowIndex !== null) {
                                const editingRow = tableBody.children[editingRowIndex];
                                editingRow.cells[0].textContent = supplier;
                                editingRow.cells[1].textContent = costPrice + (vatable ? ' (VAT-able)' : '');
                                editingRow.cells[2].textContent = uom;
                                editingRow.cells[3].textContent = barcode;

                                saveButton.removeAttribute('data-editing-row');
                                alert('Data successfully updated!');
                            } else {
                                const newRow = document.createElement('tr');
                                newRow.innerHTML = `
                                    <td>${supplier}</td>
                                    <td>${costPrice}${vatable ? ' (VAT-able)' : ''}</td>
                                    <td>${uom}</td>
                                    <td>${barcode}</td>
                                `;

                                newRow.addEventListener('click', function () {
                                    document.querySelectorAll('#table-bold tbody tr').forEach((row) => {
                                        row.classList.remove('selected-row');
                                    });

                                    this.classList.add('selected-row');
                                    editButton.disabled = false;
                                    editButton.classList.remove('opacity-50');
                                    deleteButton.disabled = false;
                                    deleteButton.classList.remove('opacity-50');
                                });

                                const noDataRow = tableBody.querySelector('.no-data-row');
                                if (noDataRow) {
                                    tableBody.innerHTML = '';
                                }

                                tableBody.appendChild(newRow);
                                alert('Data successfully saved!');
                            }

                            clearModal();
                            const modalElement = document.getElementById('productInfoModal');
                            const modalInstance = bootstrap.Modal.getInstance(modalElement);
                            if (modalInstance) {
                                modalInstance.hide();
                            } else {
                                console.error('Modal instance not found for productInfoModal');
                            }
                        });
                    }

                    if (editButton) {
                        editButton.addEventListener('click', function () {
                            const selectedRow = document.querySelector('#table-bold tbody tr.selected-row');

                            if (selectedRow) {
                                const supplier = selectedRow.cells[0].textContent;
                                const costText = selectedRow.cells[1].textContent;
                                const uom = selectedRow.cells[2].textContent;
                                const barcode = selectedRow.cells[3].textContent;

                                const vatable = costText.includes('(VAT-able)');
                                const costPrice = vatable ? costText.replace(' (VAT-able)', '') : costText;

                                document.getElementById('edit-barcode').value = barcode;
                                document.getElementById('edit-supplier').value = supplier;
                                document.getElementById('edit-uom').value = uom;
                                document.getElementById('edit-costPrice').value = costPrice;
                                document.getElementById('edit-vatable').checked = vatable;

                                const editModal = document.getElementById('editProductModal');
                                const editModalInstance = new bootstrap.Modal(editModal);
                                editModalInstance.show();

                                document.getElementById('edit-save-btn').onclick = function () {
                                    selectedRow.cells[0].textContent = document.getElementById('edit-supplier').value;
                                    selectedRow.cells[1].textContent =
                                        document.getElementById('edit-costPrice').value +
                                        (document.getElementById('edit-vatable').checked ? ' (VAT-able)' : '');
                                    selectedRow.cells[2].textContent = document.getElementById('edit-uom').value;
                                    selectedRow.cells[3].textContent = document.getElementById('edit-barcode').value;

                                    editModalInstance.hide();
                                    alert('Changes saved successfully!');
                                };

                                const editCloseButton = editModal.querySelector('.btn-secondary[data-bs-dismiss="modal"]');
                                if (editCloseButton) {
                                    editCloseButton.addEventListener('click', function () {
                                        editModalInstance.hide();
                                    });
                                }
                            }
                        });
                    }

                    if (deleteButton) {
                        deleteButton.addEventListener('click', function () {
                            const selectedRow = document.querySelector('#table-bold tbody tr.selected-row');

                            if (selectedRow) {
                                if (confirm('Are you sure you want to delete this item?')) {
                                    selectedRow.remove();

                                    editButton.disabled = true;
                                    editButton.classList.add('opacity-50');
                                    deleteButton.disabled = true;
                                    deleteButton.classList.add('opacity-50');

                                    checkAndUpdateEmptyTable();
                                }
                            }
                        });
                    }

                    // Initial check for costing table
                    checkAndUpdateEmptyTable();

                    // Add style for selected row
                    const style = document.createElement('style');
                    style.textContent = `
                        .selected-row {
                            background-color: #e9ecef;
                        }
                    `;
                    document.head.appendChild(style);

                    // ================== TRANSFER DATA TO RETAIL MODAL ====================
                    function transferToRetailModal() {
                        const barcodeValue = document.getElementById('barCode').value;
                        const productNameValue = document.getElementById('productName').value;

                        document.getElementById('retailBarcode').value = barcodeValue;
                        document.getElementById('retailProductName').value = productNameValue;
                    }

                    document.getElementById('addButton')?.addEventListener('click', function () {
                        const barcodeValue = document.getElementById('barCode').value;
                        document.getElementById('barcode').value = barcodeValue;
                    });

                    if (addRetailButton) {
                        addRetailButton.addEventListener('click', function () {
                            transferToRetailModal();

                            const costingTableBody = document.querySelector('#table-bold tbody');
                            const lastCostingRow = costingTableBody.querySelector('tr:not(.no-data-row):last-child');
                            console.log('Last costing row:', lastCostingRow); // Debug log
                            if (lastCostingRow) {
                                const uom = lastCostingRow.cells[2].textContent; // UOM is in column 2
                                const costText = lastCostingRow.cells[1].textContent.replace(' (VAT-able)', '');
                                const cost = parseFloat(costText) || 0;
                                document.getElementById('retailUOM').value = uom; // Changed to retailUOM
                                retailCostInput.value = cost.toFixed(2);
                                window.sharedCostPrice = cost.toFixed(2);
                                console.log('Set retail cost to:', cost.toFixed(2), 'and UOM to:', uom);
                            } else {
                                console.warn('No valid costing row found to fetch UOM and cost');
                            }
                        });
                    }

                    // ================== NAVIGATION AND UI EFFECTS ====================
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

                    // ================== JQUERY SECTION ====================
                    $(document).ready(function () {
                        let lastProductCode = null;
                        let lastPLUCode = null;
                        let codesGenerated = false;

                        const discountTypeMapping = {
                            'SD': 'Senior Citizen',
                            'SP': 'Solo Parent',
                            'PWD': 'PWD'
                        };

                        const setCurrentDate = () => {
                            const today = new Date().toISOString().split('T')[0];
                            $('#date').val(today);
                        };

                        const initializeFormState = () => {
                            $('.addCosting-btn, .addRetail-btn').prop('disabled', true);
                            $('.input-field').prop('disabled', true);
                            $('#category, #shellOptions').prop('disabled', true);
                            $('.costing-table, .retail-table').css('pointer-events', 'none').find('tbody tr').addClass('disabled-row');
                        };

                        const enableFormElements = () => {
                            $('.addCosting-btn, .addRetail-btn').prop('disabled', false);
                            $('.input-field').not('.date-field').prop('disabled', false);
                            $('#category, #shellOptions').prop('disabled', false);
                            $('.costing-table, .retail-table').css('pointer-events', 'auto').find('tbody tr').removeClass('disabled-row');
                        };

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

                        const saveCodes = () => {
                            const saveBtn = $('.save-btn');
                            saveBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

                            const formData = {
                                barcode: $('#barCode').val(),
                                pluCode: $('#pluCode').val(),
                                pluCodeNo: $('#pluCodeNo').val(),
                                date: $('#date').val(),
                                category: $('#category').val(),
                                productDetails: $('#productDetails').val(),
                                productCode: $('#productCode').val(),
                                productCodeNo: $('#productCodeNo').val(),
                                productName: $('#productName').val(),
                                shelf: $('#shellOptions').val(),
                                shelfDescription: $('#shelfTextbox').val(),
                            };

                            if (!formData.productName || !formData.category || !formData.date) {
                                alert('Please fill in all required fields in the form (Product Name, Category, Date).');
                                saveBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Save');
                                return;
                            }

                            const costingData = [];
                            $('#table-bold tbody tr').each(function () {
                                if (!$(this).hasClass('no-data-row')) {
                                    const supplier = $(this).find('td:eq(0)').text();
                                    const cost = $(this).find('td:eq(1)').text().replace(' (VAT-able)', '');
                                    const uom = $(this).find('td:eq(2)').text();
                                    const barcode = $(this).find('td:eq(3)').text();
                                    const isVat = $(this).find('td:eq(1)').text().includes('(VAT-able)') ? 'YES' : 'NO';

                                    if (!supplier || !cost || !uom) {
                                        alert('Please ensure all costing details (Supplier, Cost, UOM) are filled.');
                                        saveBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Save');
                                        return;
                                    }

                                    costingData.push({
                                        supplier: supplier,
                                        cost: cost,
                                        uom: uom,
                                        barcode: barcode,
                                        isVat: isVat
                                    });
                                }
                            });

                            const retailData = [];
                            $('#retail-table tbody tr').each(function () {
                                if (!$(this).hasClass('no-data-row')) {
                                    const priceType = $(this).find('td:eq(0)').text();
                                    const barcode = $(this).find('td:eq(1)').text();
                                    const productName = $(this).find('td:eq(2)').text();
                                    const uom = $(this).find('td:eq(3)').text();
                                    const quantity = $(this).find('td:eq(4)').text();
                                    const appliedSrp = $(this).find('td:eq(5)').text();

                                    retailData.push({
                                        priceType: priceType,
                                        barcode: barcode,
                                        productName: productName,
                                        uom: uom,
                                        quantity: quantity,
                                        appliedSrp: appliedSrp
                                    });
                                }
                            });

                            if (costingData.length === 0) {
                                alert('Please add at least one costing entry.');
                                saveBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Save');
                                return;
                            }
                            if (retailData.length === 0) {
                                alert('Please add at least one retail entry.');
                                saveBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Save');
                                return;
                            }

                            const allData = {
                                form: formData,
                                costing: costingData,
                                retail: retailData
                            };

                            console.log('Data being sent to save-product.php:', allData);

                            fetch('save-product.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify(allData)
                            })
                            .then(response => {
                                return response.text().then(text => {
                                    console.log('Raw response from save-product.php:', text);
                                    return JSON.parse(text);
                                });
                            })
                            .then(data => {
                                if (data.success) {
                                    alert('Product saved successfully!');
                                    location.reload();
                                } else {
                                    throw new Error(data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Save error:', error);
                                alert('Error saving product: ' + error.message);
                                saveBtn.prop('disabled', false).html('<i class="fas fa-save"></i> Save');
                            });
                        };

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

                        initializeFormState();
                        setCurrentDate();
                    });

                    // Ensure initial calculation if cost is already set
                    if (retailCostInput && retailCostInput.value) {
                        calculateMarkup();
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
                </style>

<?php include_once 'footer.php'; ?>