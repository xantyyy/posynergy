<?php
    require_once '../../includes/config.php';

    $sql = "SELECT Supplier, Address, Name, ContactNumber FROM tbl_suppliers ORDER BY Supplier ASC";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    // Fetch Address from tbl_invconfig
    $sqlAddress = "SELECT Value FROM tbl_invconfig WHERE ConfigName = 'ADDRESS'";
    $resultAddress = $conn->query($sqlAddress);
    $addressValue = ($resultAddress && $resultAddress->num_rows > 0) ? $resultAddress->fetch_assoc()['Value'] : '';

    // Fetch Company (Ship To) from tbl_invconfig
    $sqlCompany = "SELECT Value FROM tbl_invconfig WHERE ConfigName = 'COMPANY'";
    $resultCompany = $conn->query($sqlCompany);
    $companyValue = ($resultCompany && $resultCompany->num_rows > 0) ? $resultCompany->fetch_assoc()['Value'] : '';

    // Fetch Company (Purpose) from tbl_invmaintenance
    $sqlPurpose = "SELECT ItemName FROM tbl_invmaintenance WHERE ItemType = 'INCOMING PURPOSE'";
    $resultPurpose = $conn->query($sqlPurpose);
    if (!$resultPurpose) {
        die("Query failed: " . $conn->error);
    }

?>

<!-- Modal -->
<div class="modal fade" id="inventoryModal" tabindex="-1" aria-labelledby="inventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inventoryModalLabel">Incoming Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Toast Notification -->
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto">Success</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Item successfully submitted!
                        </div>
                    </div>
                    <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto">Error</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Failed to submit item. Please try again.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Left Side - Product Data Entry Form -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-no" style="width: 150px; white-space: nowrap;">Inventory No:</label>
                                        <input type="text" class="form-control" id="invItem-no" style="flex: 1;" readonly>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-date" style="width: 150px; white-space: nowrap;">Inventory Date:</label>
                                        <input type="date" class="form-control" id="invItem-date" style="flex: 1;" readonly>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-supplier" style="width: 150px; white-space: nowrap;">Supplier:</label>
                                        <select class="form-select" id="invItem-supplier" style="flex: 1;">
                                            <option value="" selected hidden>Select Supplier</option>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    // Idagdag ang data-* attributes sa bawat option
                                                    echo '<option value="' . htmlspecialchars($row['Supplier']) . '" 
                                                        data-address="' . htmlspecialchars($row['Address']) . '" 
                                                        data-contact-person="' . htmlspecialchars($row['Name']) . '" 
                                                        data-contact-no="' . htmlspecialchars($row['ContactNumber']) . '">
                                                        ' . htmlspecialchars($row['Supplier']) . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">No Suppliers Available</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-address" style="width: 150px; white-space: nowrap;">Address:</label>
                                        <textarea class="form-control" id="invItem-address" rows="2" style="flex: 1;" disabled></textarea>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-contactPerson" style="width: 150px; white-space: nowrap;">Contact Person:</label>
                                        <input type="text" class="form-control" id="invItem-contactPerson" style="flex: 1;" disabled>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-contactNo" style="width: 150px; white-space: nowrap;">Contact No:</label>
                                        <input type="text" class="form-control" id="invItem-contactNo" style="flex: 1;" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Additional Table -->
                    <div class="col-md-6">
                        <div class="card" style="height: 93%;">
                            <div class="card-body">
                                <form>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-ship" style="width: 150px; white-space: nowrap;">Ship To:</label>
                                        <input type="text" class="form-control" id="invItem-ship" style="flex: 1;" value="<?php echo htmlspecialchars($companyValue); ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-address2" style="width: 150px; white-space: nowrap;">Address:</label>
                                        <textarea class="form-control" id="invItem-address2" rows="2" style="flex: 1;" readonly><?php echo htmlspecialchars($addressValue); ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-purpose" style="width: 150px; white-space: nowrap;">Purpose:</label>
                                        <select class="form-select" id="invItem-purpose" style="flex: 1;" required>
                                            <option value="" selected hidden>Select Purpose</option>
                                            <?php
                                            if ($resultPurpose->num_rows > 0) {
                                                while ($row = $resultPurpose->fetch_assoc()) {
                                                    echo '<option value="' . htmlspecialchars($row['ItemName']) . '">' . htmlspecialchars($row['ItemName']) . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">No Purpose Available</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-remarks" style="width: 150px; white-space: nowrap;">Remarks:</label>
                                        <textarea class="form-control" id="invItem-remarks" placeholder="Description" rows="2" style="flex: 1;" required></textarea>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-terms" style="width: 150px; white-space: nowrap;">Terms:</label>
                                        <input type="text" class="form-control" id="invItem-terms" style="flex: 1;" required>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Left side: Barcode and Description -->
                                    <div class="col-md-5">
                                        <form style="margin-top: 50px;">
                                            <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                                <label for="invItem-barcode" style="width: 100px; white-space: nowrap;">Barcode:</label>
                                                <input type="number" class="form-control" id="invItem-barcode" style="flex: 1;" required>
                                            </div>
                                            <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                                <label for="invItem-description" style="width: 100px; white-space: nowrap;">Product:</label>
                                                <input type="text" class="form-control" id="invItem-description" style="flex: 1;" readonly>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Right side: Add Quantity -->
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6>Add Quantity</h6>
                                                <form>
                                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                                        <input type="number" class="form-control" min="1" step="1" id="invItem-quantity" style="flex: 1;" required disabled>
                                                    </div>
                                                    <button type="button" id="add-button" class="btn btn-outline-primary" style="font-size: 13px;" disabled>
                                                        <i class="fas fa-plus"></i> Add
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Details Table (moved outside the inner row) -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive" style="height: calc(40vh - 100px); overflow-y: auto;">
                                                    <table class="table table-bordered" id="table-product-details">
                                                        <thead class="fw-bold fs-6 fst-italic" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                                                            <tr>
                                                                <th>Shelf</th>
                                                                <th>Category</th>
                                                                <th>UOM</th>
                                                                <th>Cost</th>
                                                                <th>Vatable</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="5" class="text-center">No Data Available</td>
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
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive" style="height: calc(40vh - 100px); overflow-y: auto;">
                                    <table class="table table-bordered" id="table-product-discount">
                                        <thead class="fw-bold fs-6 fst-italic" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                                            <tr>
                                                <th>Barcode</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>UOM</th>
                                                <th>Unit Price</th>
                                                <th>Amount</th>
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

                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="total-qty" style="width: 150px; white-space: nowrap;">Total Quantity:</label>
                                        <input type="text" class="form-control" id="total-qty" style="flex: 1;" disabled>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="prod-disc" style="width: 150px; white-space: nowrap;">Less Discount:</label>
                                        <input type="text" class="form-control" id="prod-disc" style="flex: 1;" disabled>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="net-amt" style="width: 150px; white-space: nowrap;">Net Amount:</label>
                                        <input type="text" class="form-control" id="net-amt" style="flex: 1;" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group d-flex align-items-center justify-content-start mt-4">
                            <button type="button" class="btn btn-outline-primary me-2" style="font-size: 13px;">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button type="button" class="btn btn-outline-primary me-2" style="font-size: 13px;">
                                <i class="fas fa-times"></i> Delete
                            </button>
                            <button type="button" class="btn btn-outline-primary me-2" style="font-size: 13px;">
                                <i class="fas fa-trash"></i> Delete All
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submit-button" class="btn btn-outline-primary" data-bs-dismiss="modal" style="font-size: 13px;">
                    <i class="fas fa-save"></i> Submit
                </button>
                <button type="button" class="btn btn-outline-secondary" style="font-size: 13px;" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Product Discount Modal -->
<div class="modal fade" id="addDiscountModal" tabindex="-1" aria-labelledby="addDiscountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDiscountModalLabel">Add Product Discount</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="productName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="productName" name="productName" disabled>
          <input type="hidden" id="productId" name="productId">
        </div>
        <div class="mb-3">
          <label for="discountPercentage" class="form-label">Discount Percentage (%)</label>
          <input type="number" class="form-control" id="discountPercentage" name="discountPercentage" min="0" max="100" step="0.01" placeholder="Enter discount percentage">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveDiscount">Save Discount</button>
      </div>
    </div>
  </div>
</div> 

<script>
// Add event listener for the "Submit" button
document.getElementById('submit-button').addEventListener('click', function() {
    console.log('Submit button clicked');

    // Collect form data
    let poNumber = document.getElementById('invItem-no').value;
    let poDate = document.getElementById('invItem-date').value;
    let supplier = document.getElementById('invItem-supplier').value;
    let supAddress = document.getElementById('invItem-address').value;
    let contactPerson = document.getElementById('invItem-contactPerson').value;
    let contactNo = document.getElementById('invItem-contactNo').value;
    let shipTo = document.getElementById('invItem-ship').value;
    let address = document.getElementById('invItem-address2').value;
    let purpose = document.getElementById('invItem-purpose').value;
    let remarks = document.getElementById('invItem-remarks').value;
    let terms = document.getElementById('invItem-terms').value;
    let tableDiscountBody = document.querySelector('#table-product-discount tbody');
    let rows = tableDiscountBody.querySelectorAll('tr');

    console.log('Form data collected:', { poNumber, poDate, supplier, purpose, remarks, terms, rows: rows.length });

    // Validate required fields
    if (!supplier || !purpose || !remarks || !terms) {
        console.log('Validation failed: Missing required fields');
        alert('Please fill in all required fields (Supplier, Purpose, Remarks, Terms).');
        return;
    }

    // Check if there are items in the table
    if (rows.length === 0 || tableDiscountBody.querySelector('tr td').textContent === 'No Data Available') {
        console.log('Validation failed: No items in the table');
        alert('Please add at least one item to the table.');
        return;
    }

    // Collect items from the table
    let items = [];
    rows.forEach(row => {
        let barcode = row.cells[0].textContent;
        let productName = row.cells[1].textContent;
        let quantity = row.cells[2].textContent;
        let uom = row.cells[3].textContent;
        let appliedSRP = parseFloat(row.cells[4].textContent);
        let totalAmount = parseFloat(row.cells[5].textContent);

        items.push({
            barcode: barcode,
            category: '',
            productName: productName,
            quantity: parseInt(quantity),
            unit: uom,
            appliedSRP: appliedSRP, // Use AppliedSRP instead of costPrice
            totalCostPrice: totalAmount, // Rename to totalAmount for clarity
            shelf: '',
            shelfDescription: '',
            productCode: '',
            isVat: 'No'
        });
    });

    console.log('Items collected:', items);

    // Fetch ProductCode, ProductName, and ShelfDescription for each item
    let fetchPromises = items.map(item => {
        console.log('Fetching product details for barcode:', item.barcode);
        return fetch('getProductDetails.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'barcode=' + encodeURIComponent(item.barcode)
        })
        .then(response => {
            console.log('Response status for barcode', item.barcode, ':', response.status);
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            console.log('Product details for barcode', item.barcode, ':', data);
            if (data.success) {
                item.productCode = data.productCode || '';
                item.productName = data.productName || item.productName;
                item.shelf = data.shelf || '';
                item.shelfDescription = data.shelfDescription || '';
                item.category = data.category || '';
                item.isVat = data.isVat || 'No';
            } else {
                throw new Error('Failed to fetch product details for barcode: ' + item.barcode + ' - ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Fetch error for barcode', item.barcode, ':', error);
            throw error;
        });
    });

    // Wait for all fetch requests to complete
    Promise.all(fetchPromises)
        .then(() => {
            console.log('All product details fetched, updated items:', items);

            // Prepare data to send to the backend
            let data = {
                poNumber: poNumber,
                poDate: poDate,
                supplier: supplier,
                supAddress: supAddress,
                contactPerson: contactPerson,
                contactNo: contactNo,
                shipTo: shipTo,
                address: address,
                purpose: purpose,
                remarks: remarks,
                terms: terms,
                receivingNo: poNumber,
                user: 'ADMIN',
                location: '',
                companyVat: '',
                items: items
            };

            console.log('Data to send to backend:', data);

            // Send data to the backend
            fetch('savePurchasePending.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                console.log('Save response status:', response.status);
                if (!response.ok) {
                    throw new Error('Network response was not ok: ' + response.statusText);
                }
                return response.json();
            })
            .then(result => {
                console.log('Save result:', result);
                if (result.success) {
                    alert('Item successfully submitted!');

                    // Reset the form and table
                    document.getElementById('invItem-supplier').value = '';
                    document.getElementById('invItem-address').value = '';
                    document.getElementById('invItem-contactPerson').value = '';
                    document.getElementById('invItem-contactNo').value = '';
                    document.getElementById('invItem-purpose').value = '';
                    document.getElementById('invItem-remarks').value = '';
                    document.getElementById('invItem-terms').value = '';
                    document.getElementById('invItem-barcode').value = '';
                    document.getElementById('invItem-description').value = '';
                    document.getElementById('invItem-quantity').value = '';
                    document.getElementById('total-qty').value = '';
                    document.getElementById('net-amt').value = '';
                    tableDiscountBody.innerHTML = '<tr><td colspan="6" class="text-center">No Data Available</td></tr>';
                    document.querySelector('#table-product-details tbody').innerHTML = '<tr><td colspan="5" class="text-center">No Data Available</td></tr>';
                } else {
                    alert(result.message || 'Failed to submit item. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error submitting data:', error);
                alert('Error submitting data: ' + error.message);
            });
        })
        .catch(error => {
            console.error('Error fetching product details:', error);
            alert('Error fetching product details: ' + error.message);
        });
});

    document.getElementById('invItem-barcode').addEventListener('input', function() {
    let barcode = this.value;
    let selectedSupplier = document.getElementById('invItem-supplier').value;
    let quantityField = document.getElementById('invItem-quantity');
    let addButton = document.getElementById('add-button');
    let productNameField = document.getElementById('invItem-description');
    let tableBody = document.querySelector('#table-product-details tbody');

    console.log('Barcode entered:', barcode);
    console.log('Selected Supplier:', selectedSupplier);

    // Reset fields if barcode or supplier is empty
    if (!barcode || !selectedSupplier) {
        productNameField.value = '';
        quantityField.disabled = true;
        addButton.disabled = true;
        tableBody.innerHTML = '<tr><td colspan="5" class="text-center">No Data Available</td></tr>';
        return;
    }

    fetch('getProduct.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'barcode=' + encodeURIComponent(barcode)
    })
    .then(response => {
        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers.get('Content-Type'));
        return response.text().then(text => {
            console.log('Raw response:', text);
            try {
                return JSON.parse(text);
            } catch (e) {
                console.error('Error parsing JSON:', e);
                throw new Error('Invalid JSON response');
            }
        });
    })
    .then(data => {
        console.log('Parsed data:', data);

        if (data.success) {
            productNameField.value = data.productName;

            // Store AppliedSRP in a data attribute for later use
            document.getElementById('invItem-barcode').dataset.appliedSRP = data.appliedSRP;

            // Check if the supplier matches
            if (data.supplier === selectedSupplier) {
                // Display product details if supplier matches
                tableBody.innerHTML = `
                    <tr>
                        <td>${data.shelf || 'N/A'}</td>
                        <td>${data.category || 'N/A'}</td>
                        <td>${data.uom || 'N/A'}</td>
                        <td>${data.cost || 'N/A'}</td>
                        <td>${data.vatable || 'No'}</td>
                    </tr>
                `;
                quantityField.disabled = false;
                addButton.disabled = false;
            } else {
                tableBody.innerHTML = '<tr><td colspan="5" class="text-center">No Data Available</td></tr>';
                quantityField.disabled = true;
                addButton.disabled = true;
                console.log('Supplier mismatch:', data.supplier, '!=', selectedSupplier);
            }
        } else {
            productNameField.value = 'Product not found';
            quantityField.disabled = true;
            addButton.disabled = true;
            tableBody.innerHTML = '<tr><td colspan="5" class="text-center">No Data Available</td></tr>';
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        productNameField.value = 'Error fetching product';
        quantityField.disabled = true;
        addButton.disabled = true;
        tableBody.innerHTML = '<tr><td colspan="5" class="text-center">Error loading data</td></tr>';
    });
});

    // Add event listener for the "Add" button
document.getElementById('add-button').addEventListener('click', function() {
    // Get the values
    let barcode = document.getElementById('invItem-barcode').value;
    let productName = document.getElementById('invItem-description').value;
    let quantity = document.getElementById('invItem-quantity').value;
    let tableBody = document.querySelector('#table-product-details tbody');
    let tableDiscountBody = document.querySelector('#table-product-discount tbody');

    // Get UOM and AppliedSRP from the fetched product data
    let productDetailsRow = tableBody.querySelector('tr');
    let uom = productDetailsRow.cells[2].textContent;
    let appliedSRP = parseFloat(document.getElementById('invItem-barcode').dataset.appliedSRP || 0);

    // Validate quantity
    if (!quantity || quantity <= 0) {
        alert('Please enter a valid quantity greater than 0.');
        return;
    }

    // Calculate the amount (quantity * AppliedSRP)
    let amount = quantity * appliedSRP;

    // Check if the table currently says "No Data Available"
    if (tableDiscountBody.querySelector('tr td').textContent === 'No Data Available') {
        tableDiscountBody.innerHTML = ''; // Clear the "No Data Available" row
    }

    // Add a new row to the table-product-discount
    let newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${barcode}</td>
        <td>${productName}</td>
        <td>${quantity}</td>
        <td>${uom}</td>
        <td>${appliedSRP.toFixed(2)}</td>
        <td>${amount.toFixed(2)}</td>
    `;
    tableDiscountBody.appendChild(newRow);

    // Disable the supplier dropdown after adding an item
    document.getElementById('invItem-supplier').disabled = true;

    // Show success alert
    alert('Item successfully added!');

    // Clear the quantity field after adding
    document.getElementById('invItem-quantity').value = '';

    // Update Total Quantity and Net Amount
    let totalQtyField = document.getElementById('total-qty');
    let netAmountField = document.getElementById('net-amt');
    let rows = tableDiscountBody.querySelectorAll('tr');
    let totalQty = 0;
    let totalAmount = 0;

    rows.forEach(row => {
        let qty = parseInt(row.cells[2].textContent);
        let amount = parseFloat(row.cells[5].textContent);
        totalQty += qty;
        totalAmount += amount;
    });

    totalQtyField.value = totalQty;
    netAmountField.value = totalAmount.toFixed(2);
});

    // Function to set current date
    function setCurrentDate() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const currentDate = `${year}-${month}-${day}`;
        
        document.getElementById('invItem-date').value = currentDate;
    }

    // Function to generate inventory number
    function generateInventoryNumber() {
        const today = new Date();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const year = today.getFullYear();
        
        const randomNum = String(Math.floor(10000 + Math.random() * 90000));
        const baseNumber = `II${month}${day}${year}${randomNum}`;
        
        let inventoryNumber = baseNumber;
        const usedNumbers = JSON.parse(localStorage.getItem('usedInventoryNumbers') || '[]');
        
        while (usedNumbers.includes(inventoryNumber)) {
            const newRandomNum = String(Math.floor(10000 + Math.random() * 90000));
            inventoryNumber = `II${month}${day}${year}${newRandomNum}`;
        }
        
        usedNumbers.push(inventoryNumber);
        localStorage.setItem('usedInventoryNumbers', JSON.stringify(usedNumbers));
        
        return inventoryNumber;
    }

    // Combine both functions in a single window.onload
    window.onload = function() {
        setCurrentDate();
        document.getElementById('invItem-no').value = generateInventoryNumber();
        document.getElementById('invItem-quantity').disabled = true;
    };

    // Supplier selection handler
    document.getElementById('invItem-supplier').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const address = selectedOption.getAttribute('data-address') || '';
        const contactPerson = selectedOption.getAttribute('data-contact-person') || '';
        const contactNo = selectedOption.getAttribute('data-contact-no') || '';
        
        document.getElementById('invItem-address').value = address;
        document.getElementById('invItem-contactPerson').value = contactPerson;
        document.getElementById('invItem-contactNo').value = contactNo;

        // Trigger barcode input check when supplier changes
        document.getElementById('invItem-barcode').dispatchEvent(new Event('input'));
    });
</script>