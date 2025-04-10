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
                                        <select class="form-select" id="invItem-purpose" style="flex: 1;">
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
                                        <textarea class="form-control" id="invItem-remarks" placeholder="Description" rows="2" style="flex: 1;"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-terms" style="width: 150px; white-space: nowrap;">Terms:</label>
                                        <input type="text" class="form-control" id="invItem-terms" style="flex: 1;">
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
                                                <input type="number" class="form-control" id="invItem-barcode" style="flex: 1;">
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
                                                        <input type="number" class="form-control" min="1" step="1" id="invItem-quantity" style="flex: 1;">
                                                    </div>
                                                    <button type="button" class="btn btn-outline-primary" style="font-size: 13px;">
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
                                                <th>Description</th>
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
                <button type="button" class="btn btn-outline-primary" style="font-size: 13px;">
                    <i class="fas fa-save"></i> Submit
                </button>
                <button type="button" class="btn btn-outline-secondary" style="font-size: 13px;" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('invItem-barcode').addEventListener('input', function() {
        let barcode = this.value;
        console.log('Barcode entered:', barcode); // Debug

        // Clear the table if barcode is empty
        if (!barcode) {
            document.getElementById('invItem-description').value = '';
            // Reset table to "No Data Available"
            document.querySelector('#table-product-details tbody').innerHTML = 
                '<tr><td colspan="5" class="text-center">No Data Available</td></tr>';
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
            // Log the raw response
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
            let productNameField = document.getElementById('invItem-description');
            
            if (data.success) {
                // Set product name
                productNameField.value = data.productName;
                
                // Update the table with product details
                let tableBody = document.querySelector('#table-product-details tbody');
                tableBody.innerHTML = `
                    <tr>
                        <td>${data.shelf || 'N/A'}</td>
                        <td>${data.category || 'N/A'}</td>
                        <td>${data.uom || 'N/A'}</td>
                        <td>${data.cost || 'N/A'}</td>
                        <td>${data.vatable || 'No'}</td>
                    </tr>
                `;
            } else {
                productNameField.value = 'Product not found';
                // Reset table to "No Data Available"
                document.querySelector('#table-product-details tbody').innerHTML = 
                    '<tr><td colspan="5" class="text-center">No Data Available</td></tr>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('invItem-description').value = 'Error fetching product';
            // Reset table in case of error
            document.querySelector('#table-product-details tbody').innerHTML = 
                '<tr><td colspan="5" class="text-center">Error loading data</td></tr>';
        });
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
        setCurrentDate();  // Set the current date
        document.getElementById('invItem-no').value = generateInventoryNumber();  // Set the inventory number
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
    });
</script>