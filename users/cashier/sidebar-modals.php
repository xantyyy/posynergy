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
                                <input class="form-check-input" type="radio" name="customerSearchType" id="cardNoRadio" value="cardNo" checked>
                                <label class="form-check-label" for="cardNoRadio">Card No.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="customerSearchType" id="customerNameRadio" value="customerName">
                                <label class="form-check-label" for="customerNameRadio">Customer Name</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="customerSearch" placeholder="Enter Card No. or Customer Name" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="middleName" class="form-label">Middle Name:</label>
                            <input type="text" class="form-control" id="middleName" placeholder="Enter Middle Name" readonly>
                        </div>
                        <div class="border p-3">
                            <label for="currentPoints" class="form-label">Current Points Earned:</label>
                            <input type="text" class="form-control" id="currentPoints" placeholder="0" readonly>
                            <input type="hidden" id="customerId" value="">
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
                                        <th>Card No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Customer data will be populated here -->
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
                        <button type="button" id="saveCustomerBtn" class="btn btn-warning" style="font-size: 12px;">
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
                        <input type="text" class="form-control" id="productDetails" placeholder="Enter product name or barcode" autocomplete="off">
                        <div id="priceCheckResults" class="search-results"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="productPrice" class="form-label d-block">Product Price:</label>
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

<!-- Password Modal for Void Item -->
<div class="modal fade" id="voidPasswordModal" tabindex="-1" aria-labelledby="voidPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="voidPasswordModalLabel">Enter Void Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="voidPassword">Password:</label>
                    <input type="password" class="form-control" id="voidPassword" placeholder="Enter password">
                    <div class="invalid-feedback" id="voidPasswordError">
                        Incorrect password. Please try again.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="verifyVoidPassword">Verify</button>
            </div>
        </div>
    </div>
</div>

<!-- Password Modal for Void Item -->
<div class="modal fade" id="voidPasswordAllModal" tabindex="-1" aria-labelledby="voidPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="voidPasswordModalLabel">Enter Void Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="voidPassword">Password:</label>
                    <input type="password" class="form-control" id="voidPasswordAll" placeholder="Enter password">
                    <div class="invalid-feedback" id="voidPasswordError">
                        Incorrect password. Please try again.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="verifyVoidPasswordAll">Verify</button>
            </div>
        </div>
    </div>
</div>

<!-- Void Reason Modal -->
<div class="modal fade" id="voidReasonModal" tabindex="-1" aria-labelledby="voidReasonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="voidReasonModalLabel">Enter Void Reason</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="voidReason">Reason:</label>
                    <select class="form-control" id="voidReason">
                        <option value="My Reason 1">My Reason 1</option>
                        <option value="My Reason 2">My Reason 2</option>
                        <option value="My Reason 3">My Reason 3</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmVoid">Void Item</button>
            </div>
        </div>
    </div>
</div>

<!-- Void Reason Modal -->
<div class="modal fade" id="voidReasonAllModal" tabindex="-1" aria-labelledby="voidReasonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="voidReasonModalLabel">Enter Void Reason</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="voidReason">Reason:</label>
                    <select class="form-control" id="voidAllReason">
                        <option value="My Reason 1">My Reason 1</option>
                        <option value="My Reason 2">My Reason 2</option>
                        <option value="My Reason 3">My Reason 3</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmVoidAll">Void Item</button>
            </div>
        </div>
    </div>
</div>

<div id="notification-area" style="position: fixed; top: 80px; right: 20px; z-index: 9999; width: 300px;"></div>

<!-- Senior Citizen Password Verification Modal -->
<div class="modal fade" id="seniorPasswordModal" tabindex="-1" aria-labelledby="seniorPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="seniorPasswordModalLabel">Password Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="seniorPassword">Please enter password:</label>
                    <input type="password" class="form-control" id="seniorPassword" placeholder="Enter password">
                    <div id="passwordError" class="invalid-feedback">Incorrect password!</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="verifySeniorPassword()">Submit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Senior Citizen Details Modal -->
<div class="modal fade" id="seniorDetailsModal" tabindex="-1" aria-labelledby="seniorDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="seniorDetailsModalLabel">Senior Citizen Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="seniorForm">
                    <div class="form-group">
                        <label for="seniorName">Name:</label>
                        <input type="text" class="form-control" id="seniorName" required>
                    </div>
                    <div class="form-group">
                        <label for="seniorId">ID No:</label>
                        <input type="text" class="form-control" id="seniorId" required>
                    </div>
                    <div class="form-group">
                        <label for="amountAvailed">Amount Availed:</label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input type="number" class="form-control" id="amountAvailed" step="0.01" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="submitSeniorDetails()">OK</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- PWD Password Verification Modal -->
<div class="modal fade" id="pwdPasswordModal" tabindex="-1" aria-labelledby="pwdPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pwdPasswordModalLabel">Password Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pwdPassword">Please enter password:</label>
                    <input type="password" class="form-control" id="pwdPassword" placeholder="Enter password">
                    <div id="pwdPasswordError" class="invalid-feedback">Incorrect password!</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="verifyPwdPassword()">Submit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- PWD Details Modal -->
<div class="modal fade" id="pwdDetailsModal" tabindex="-1" aria-labelledby="pwdDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pwdDetailsModalLabel">PWD Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="pwdForm">
                    <div class="form-group">
                        <label for="pwdName">Name:</label>
                        <input type="text" class="form-control" id="pwdName" required>
                    </div>
                    <div class="form-group">
                        <label for="pwdId">ID No:</label>
                        <input type="text" class="form-control" id="pwdId" required>
                    </div>
                    <div class="form-group">
                        <label for="pwdAmountAvailed">Amount Availed:</label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input type="number" class="form-control" id="pwdAmountAvailed" step="0.01" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="submitPwdDetails()">OK</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#voidAllReason').on('change', function() {
            if ($(this).val() === 'Other') {
                $('#otherReasonDiv').show();
            } else {
                $('#otherReasonDiv').hide();
            }
        });
        
        // When confirming void with "Other" selected, use the text input value
        $('#confirmVoidAll').on('click', function() {
            if ($('#voidAllReason').val() === 'Other') {
                const otherReason = $('#otherReason').val();
                if (otherReason) {
                    $('#voidAllReason').val(otherReason);
                } else {
                    $('#otherReason').addClass('is-invalid');
                    return false;
                }
            }
        });
    });

    function verifySeniorPassword() {
        const password = $('#seniorPassword').val();
        console.log('Input password:', password);

        // Reset the error state
        $('#seniorPassword').removeClass('is-invalid');
        $('#passwordError').hide();

        $.ajax({
            url: 'verify_senior_password.php',
            method: 'POST',
            data: { password: password },
            dataType: 'json',
            success: function(response) {
                console.log('Response from verify_senior_password.php:', response);
                if (response.status === 'success') {
                    console.log('Hiding seniorPasswordModal...');
                    $('#seniorPasswordModal').modal('hide');
                    // Add a slight delay to ensure the modal hides before showing the next one
                    setTimeout(function() {
                        console.log('Showing seniorDetailsModal...');
                        $('#seniorDetailsModal').modal('show');
                        $('#seniorForm')[0].reset();
                        const totalAmount = parseFloat($('#totalTransactionDisplay').text().replace('₱', '')) || 0;
                        console.log('Total Amount:', totalAmount);
                        $('#amountAvailed').val(totalAmount.toFixed(2));
                    }, 500); // 500ms delay
                } else {
                    console.log('Verification failed:', response.message);
                    $('#seniorPassword').addClass('is-invalid');
                    $('#passwordError').show();
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
                console.error('Response text:', xhr.responseText);
                alert('Server error. Could not verify password. Check the console for details.');
            }
        });
    }

    // Verify the PWD password
function verifyPwdPassword() {
    const password = $('#pwdPassword').val();

    $('#pwdPassword').removeClass('is-invalid');
    $('#pwdPasswordError').hide();

    $.ajax({
        url: 'verify_pwd_password.php',
        method: 'POST',
        data: { password: password },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                $('#pwdPasswordModal').modal('hide');
                setTimeout(function() {
                    $('#pwdDetailsModal').modal('show');
                    $('#pwdForm')[0].reset();
                    const totalAmount = parseFloat($('#totalTransactionDisplay').text().replace('₱', '')) || 0;
                    $('#pwdAmountAvailed').val(totalAmount.toFixed(2));
                }, 500);
            } else {
                $('#pwdPassword').addClass('is-invalid');
                $('#pwdPasswordError').show();
            }
        },
        error: function(xhr, status, error) {
            alert('Server error. Could not verify password.');
        }
    });
}

// Submit PWD Details
function submitPwdDetails() {
    const pwdName = $('#pwdName').val();
    const pwdId = $('#pwdId').val();
    const amountAvailed = parseFloat($('#pwdAmountAvailed').val()) || 0;

    if (!pwdName || !pwdId || amountAvailed <= 0) {
        alert('Please fill in all fields with valid values.');
        return;
    }

    const discountData = {
        name: pwdName,
        idNumber: pwdId,
        amountAvailed: amountAvailed,
        discountType: 'PWD'
    };

    updateTransactionWithDiscount(discountData);

    $('#pwdDetailsModal').modal('hide');
    alert(`PWD discount applied for:\nName: ${pwdName}\nID: ${pwdId}\nAmount Availed: ₱${amountAvailed.toFixed(2)}`);
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