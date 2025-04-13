<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Pending Transaction Modal -->
<div class="modal fade" id="pendingTransactionModal" tabindex="-1" aria-labelledby="pendingTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: rgb(65, 165, 232); color: #fff;">
                <h5 class="modal-title" id="pendingTransactionModalLabel">Pending Transaction Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Transaction No.</th>
                                <th>Transaction Date</th>
                                <th>Total Qty</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Transaction data will be loaded here -->
                            <tr>
                                <td colspan="4" class="text-center">Loading transactions...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Load Transaction</button>
                <button type="button" class="btn btn-danger">Delete Transaction</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Search Product Modal -->
<div class="modal fade" id="searchProductModal" tabindex="-1" aria-labelledby="searchProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: rgb(65, 165, 232); color: #fff;">
                <h5 class="modal-title" id="searchProductModalLabel">Search Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Filter Section -->
                <div class="mb-3 position-relative">
                    <label for="productFilter" class="form-label">Filter:</label>
                    <input type="text" class="form-control" id="productFilter" placeholder="Enter product name or barcode">
                    <div id="filterResults" class="search-results" style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%; max-height: 200px; overflow-y: auto;"></div>
                </div>

                <!-- Main Content -->
                <div class="row">
                    <!-- Left Section: Details Table -->
                    <div class="col-lg-8">
                        <div class="table-responsive" style="max-height: 560px; overflow-y: auto;">
                            <table class="table table-bordered table-hover" id="productTable">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Barcode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dynamically populated -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Right Section: Product Values -->
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="productBarcode" class="form-label">Barcode:</label>
                            <input type="text" class="form-control" id="productBarcode" placeholder="Enter barcode" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="quantityAvailable" class="form-label">Stocks Available:</label>
                            <input type="text" class="form-control" id="quantityAvailable" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity to Add:</label>
                            <input type="number" class="form-control" id="quantity" placeholder="Enter quantity to add" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="priceType" class="form-label">Price Type:</label>
                            <select class="form-select" id="priceType">
                                <option value="retail">Retail</option>
                                <option value="wholesale">Wholesale</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sellingPrice" class="form-label">Selling Price:</label>
                            <input type="text" class="form-control" id="sellingPrice" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total:</label>
                            <input type="text" class="form-control" id="total" readonly>
                        </div>
                        <button type="button" class="btn btn-primary" id="addProductBtn">Add</button>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Return Modal -->
<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: rgb(65, 165, 232); color: #fff;">
                <h5 class="modal-title" id="returnModalLabel">Return Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left: 10px;"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Left Side -->
                    <div class="col-lg-6">
                        <div class="mb-3 d-flex align-items-center">
                            <label for="tin" class="form-label mb-0 me-2" style="white-space: nowrap;">TIN:</label>
                            <input type="text" class="form-control" id="tin" placeholder="Enter TIN" style="flex: 1;">
                            <button type="button" class="btn btn-primary ms-2">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="mb-3">
                            <label for="cashier" class="form-label">Cashier:</label>
                            <select class="form-select" id="cashier">
                                <option value="">Select Cashier</option>
                                <option value="cashier1">Cashier 1</option>
                                <option value="cashier2">Cashier 2</option>
                                <option value="cashier3">Cashier 3</option>
                            </select>
                        </div>
                        <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                            <table class="table table-bordered table-hover" style="border-left: 2px solid #dee2e6; border-right: 2px solid #dee2e6;">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>Product Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sample Product 1</td>
                                    </tr>
                                    <tr>
                                        <td>Sample Product 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="border-left: 2px solid #dee2e6; border-right: 2px solid #dee2e6;">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th style="width: 30%;">Details</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Barcode:</th>
                                        <td id="#"> </td>
                                    </tr>
                                    <tr>
                                        <th>SRP:</th>
                                        <td id="#"> </td>
                                    </tr>
                                    <tr>
                                        <th>Quantity</th>
                                        <td id="#"> </td>
                                    </tr>
                                    <tr>
                                        <th>Gross Amount:</th>
                                        <td id="#"> </td>
                                    </tr>
                                    <tr>
                                        <th>Discount:</th>
                                        <td id="#"> </td>
                                    </tr>
                                    <tr>
                                        <th>Net Amount:</th>
                                        <td id="#"> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <button type="button" class="btn btn-danger w-100">Return Item</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Senior Citizen Password Modal -->
<div class="modal fade" id="seniorPasswordModal" tabindex="-1" aria-labelledby="seniorPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="seniorPasswordModalLabel">Input Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="seniorPassword" class="form-label">Password</label>
                    <input type="password" id="seniorPassword" class="form-control" placeholder="Enter password">
                    <div id="passwordError" class="invalid-feedback" style="display:none;">Incorrect password!</div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="verifySeniorPassword()">Submit</button>
            </div>
        </div>
    </div>
</div>


<!-- Senior Citizen Details Modal -->
<div class="modal fade" id="seniorDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Senior Citizen Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="seniorForm">
                    <div class="form-group mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" id="seniorName" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">ID Number</label>
                        <input type="text" id="seniorId" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Birthdate</label>
                        <input type="date" id="seniorBirthdate" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="submitSeniorDetails()">Apply Discount</button>
            </div>
        </div>
    </div>
</div>


<!-- Customer Points Modal -->
<div class="modal fade" id="customerPointsModal" tabindex="-1" aria-labelledby="customerPointsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: rgb(65, 165, 232); color: #fff;">
                <h5 class="modal-title" id="customerPointsModalLabel">Customer Points</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row">
                    <!-- Left Side -->
                    <div class="col-md-6 border-end">
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="customerSearchType" id="cardNoRadio" value="cardNo">
                                <label class="form-check-label" for="cardNoRadio">Card No.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="customerSearchType" id="customerNameRadio" value="customerName">
                                <label class="form-check-label" for="customerNameRadio">Customer Name</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Enter Card No. or Customer Name">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
                        </div>
                        <div class="mb-3">
                            <label for="middleName" class="form-label">Middle Name:</label>
                            <input type="text" class="form-control" id="middleName" placeholder="Enter Middle Name">
                        </div>
                        <div class="border p-3">
                            <label for="currentPoints" class="form-label">Current Points Earned:</label>
                            <input type="text" class="form-control" id="currentPoints" placeholder="0" readonly>
                        </div>
                    </div>
                    <!-- Right Side -->
                    <div class="col-md-6">
                        <h6 style="font-weight: bold;">Customer List</h6>
                        <div class="table-responsive" style="max-height: 420px; overflow-y: auto;">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Card Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sample Customer 1</td>
                                        <td>Card 1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mt-2">
                            <a href="#" class="text-primary fw-bold text-decoration-none" data-bs-toggle="modal" data-bs-target="#enrollCustomerModal">
                                <i class="bi bi-person-plus me-1"></i> Enroll Customer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Enroll Customer Modal -->
<div class="modal fade" id="enrollCustomerModal" tabindex="-1" aria-labelledby="enrollCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: rgb(65, 165, 232); color: #fff;">
                <h5 class="modal-title" id="enrollCustomerModalLabel">Enroll Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <h6 style="font-weight: bold;">Personal Information</h6>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="lastName" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
                    </div>
                    <div class="col-md-4">
                        <label for="firstName" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
                    </div>
                    <div class="col-md-4">
                        <label for="middleName" class="form-label">Middle Name:</label>
                        <input type="text" class="form-control" id="middleName" placeholder="Enter Middle Name">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="lotNumber" class="form-label">Lot/House/Bldg #:</label>
                        <input type="text" class="form-control" id="lotNumber" placeholder="Enter Lot/House/Bldg #">
                    </div>
                    <div class="col-md-4">
                        <label for="street" class="form-label">Street/Purok:</label>
                        <input type="text" class="form-control" id="street" placeholder="Enter Street/Purok">
                    </div>
                    <div class="col-md-4">
                        <label for="barangay" class="form-label">Barangay:</label>
                        <input type="text" class="form-control" id="barangay" placeholder="Enter Barangay">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="townCity" class="form-label">Town/City:</label>
                        <input type="text" class="form-control" id="townCity" placeholder="Enter Town/City">
                    </div>
                    <div class="col-md-4">
                        <label for="province" class="form-label">Province:</label>
                        <input type="text" class="form-control" id="province" placeholder="Enter Province">
                    </div>
                    <div class="col-md-4">
                        <label for="civilStatus" class="form-label">Civil Status:</label>
                        <select class="form-select" id="civilStatus">
                            <option selected disabled>Select Civil Status</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
                            <option>Divorced</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="birthday" class="form-label">Birthday:</label>
                        <input type="date" class="form-control" id="birthday">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gender:</label>
                        <div class="d-flex align-items-center">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <h6 style="font-weight: bold;">Card Details</h6>
                <div class="row">
                    <div class="col-md-8">
                        <label for="cardNumber" class="form-label">Card #:</label>
                        <input type="text" class="form-control" id="cardNumber" placeholder="Enter Card Number">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="button" class="btn btn-primary me-2" style="font-size: 12px;">
                            <i class="fas fa-plus"></i> New
                        </button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger me-2" style="font-size: 12px;">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button type="button" class="btn btn-warning" style="font-size: 12px;">
                            <i class="fas fa-save"></i> Save
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Price Check Modal -->
<div class="modal fade" id="priceCheckModal" tabindex="-1" aria-labelledby="priceCheckModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background: rgb(65, 165, 232); color: #fff;">
                <h5 class="modal-title" id="priceCheckModalLabel">Price Check</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="productDetails" class="form-label">Product Details:</label>
                        <input type="text" class="form-control" id="productDetails" placeholder="Enter product details">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="productPrice" class="form-label d-block"></label>
                        <input type="text" class="form-control text-center fs-1 fw-bold" id="productPrice" placeholder="₱0.00" readonly>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script>

$('#pendingTransactionModal .btn-primary').off('click').on('click', function() {
    // Find the selected row
    let selectedRow = $('#pendingTransactionModal tbody tr.table-primary');
    
    if (selectedRow.length > 0) {
        // Use .attr() instead of .data() to avoid jQuery caching issues
        let transactionNo = selectedRow.attr('data-transaction-no');
        console.log("Load button clicked, selected transactionNo:", transactionNo);
        
        if (transactionNo) {
            loadTransactionToCart(transactionNo);
            $('#pendingTransactionModal').modal('hide');
        } else {
            console.error("Transaction number not found on selected row");
            alert('Error: Transaction number not found.');
        }
    } else {
        console.log("No row selected when Load button was clicked");
        alert('Please select a transaction to load.');
    }
});
// Function to load a transaction into the cart
function loadTransactionIntoCart(transactionId) {
    $.ajax({
        url: 'get_pending_transaction_details.php',
        method: 'GET',
        data: { id: transactionId },
        success: function(response) {
            try {
                const transaction = JSON.parse(response);
                
                // Clear current cart
                cart = [];
                
                // Add items from pending transaction to cart
                transaction.items.forEach(item => {
                    cart.push({
                        id: item.id,
                        name: item.name,
                        price: parseFloat(item.price),
                        barcode: item.barcode,
                        quantity: parseInt(item.quantity),
                        totalPrice: parseFloat(item.totalPrice)
                    });
                });
                
                // Update display
                updateCartDisplay();
                updateTotals();
                
                // Close the modal
                $('#pendingTransactionModal').modal('hide');
                
                // Show success message
                alert('Transaction loaded successfully!');
                
            } catch (e) {
                console.error('Error parsing transaction details', e);
                alert('Could not load transaction details');
            }
        },
        error: function() {
            alert('Server error. Could not load transaction details.');
        }
    });
}
</script>
<style>
    #pendingTransactionModal table tbody tr.selected-row {
        background-color: #e0f7fa;
    }
    #pendingTransactionModal table tbody tr {
        cursor: pointer;
    }
</style>