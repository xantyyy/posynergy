<?php include_once 'header.php'; ?>
<?php include 'sidebar-modals.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!--MENU SIDEBAR CONTENT-->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="../../assets/images/isynergiesinc.png" class="img-fluid"/>
        <div class="ml-auto" id="userInfo">
            <p class="text-right">Cashier Staff</p>
        </div>
    </div>
    <ul class="list-unstyled components">
        <li>
            <a href="#" class="dashboard" accesskey="F1"><i class="material-icons">edit</i><span>Edit Item (F1)</span></a>
        </li>
        <li>
            <a href="#" class="dashboard" accesskey="F2"><i class="material-icons">add</i><span>Add To Pending (F2)</span></a>
        </li>
        <li>
            <a href="#" class="dashboard" data-bs-toggle="modal" data-bs-target="#pendingTransactionModal" accesskey="F3">
                <i class="material-icons">pending</i><span>Pending Transaction (F3)</span>
            </a>
        </li>
        <li>
            <a href="#" class="dashboard" data-bs-toggle="modal" data-bs-target="#searchProductModal" accesskey="F4">
                <i class="material-icons">search</i><span>Search Product (F4)</span>
            </a>
        </li>
        <li>
            <a href="#" class="dashboard" data-bs-toggle="modal" data-bs-target="#returnModal" accesskey="F5">
                <i class="material-icons">keyboard_return</i><span>Return (F5)</span>
            </a>
        </li>
        <li>
            <a href="#" class="dashboard" accesskey="F6"><i class="material-icons">delete</i><span>Void Item (F6)</span></a>
        </li>
        <li>
            <a href="#" class="dashboard" data-bs-toggle="modal" data-bs-target="#cashTenderModal" accesskey="F7"><i class="material-icons">attach_money</i><span>Cash Tender (F7)</span></a>
        </li>
        <li>
            <a href="#" class="dashboard" accesskey="F8"><i class="material-icons">delete_forever</i><span>Void All (F8)</span></a>
        </li>
        <li>
            <a href="#" class="dashboard" data-bs-toggle="modal" data-bs-target="#customerPointsModal" accesskey="F9">
                <i class="material-icons">loyalty</i><span>Customer Points (F9)</span>
            </a>
        </li>
        <li>
            <a href="#" class="dashboard" accesskey="F10"><i class="material-icons">credit_card</i><span>Other Payment Type (F10)</span></a>
        </li>
        <li class="dropdown">
    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <i class="material-icons">discount</i><span>Apply Discount</span>
    </a>
    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
        <li>
            <a href="#" onclick="applyRegularDiscount()">Regular Discount <span class="shortcut-key">Ctrl+D</span></a>
        </li>
        <li>
            <a href="#" onclick="applySoloParent()">Solo Parent <span class="shortcut-key">Ctrl+S</span></a>
        </li>
        <li>
            <a href="#" onclick="showPWDPasswordPrompt()">PWD <span class="shortcut-key">F12</span></a>
        </li>
        <li>
            <a href="#" onclick="showSeniorPasswordPrompt()">Senior Citizen <span class="shortcut-key">F11</span></a>
        </li>
        <li>
            <a href="#" onclick="applyNAAC()">NAAC <span class="shortcut-key">Ctrl+N</span></a>
        </li>
        <li>
            <a href="#" onclick="applyMedalOfValor()">Medal of Valor <span class="shortcut-key">Ctrl+M</span></a>
        </li>
    </ul>
</li>

<!-- Senior Password Modal -->
<div class="modal fade" id="seniorPasswordModal" tabindex="-1" aria-labelledby="seniorPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="seniorPasswordModalLabel">Senior Citizen Discount Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please enter the password to apply the Senior Citizen discount:</p>
                <input type="password" class="form-control" id="seniorPassword" placeholder="Enter password">
                <div id="seniorPasswordError" style="color:red; display:none;">Incorrect password!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="verifySeniorPassword()">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Senior Details Modal -->
<div class="modal fade" id="seniorDetailsModal" tabindex="-1" aria-labelledby="seniorDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="seniorDetailsModalLabel">Senior Citizen Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="seniorForm">
                    <div class="mb-3">
                        <label for="seniorName" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="seniorName" required>
                    </div>
                    <div class="mb-3">
                        <label for="seniorId" class="form-label">Senior Citizen ID Number:</label>
                        <input type="text" class="form-control" id="seniorId" required>
                    </div>
                    <div class="mb-3">
                        <label for="seniorAmountAvailed" class="form-label">Amount Availed:</label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input type="text" class="form-control" id="seniorAmountAvailed" readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="submitSeniorDetails()">Apply Discount</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- PWD Password Modal -->
<div class="modal fade" id="pwdPasswordModal" tabindex="-1" aria-labelledby="pwdPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pwdPasswordModalLabel">PWD Discount Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please enter the password to apply the PWD discount:</p>
                <input type="password" class="form-control" id="pwdPassword" placeholder="Enter password">
                <div id="pwdPasswordError" style="color:red; display:none;">Incorrect password!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="verifyPWDPassword()">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- PWD Details Modal -->
<div class="modal fade" id="pwdDetailsModal" tabindex="-1" aria-labelledby="pwdDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pwdDetailsModalLabel">PWD Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="pwdForm">
                    <div class="mb-3">
                        <label for="pwdName" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="pwdName" required>
                    </div>
                    <div class="mb-3">
                        <label for="pwdId" class="form-label">ID Number:</label>
                        <input type="text" class="form-control" id="pwdId" required>
                    </div>
                    <div class="mb-3">
                        <label for="pwdAmountAvailed" class="form-label">Amount Availed:</label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input type="text" class="form-control" id="pwdAmountAvailed" readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="submitPWDDetails()">Apply Discount</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


        <li>
            <a href="#" class="dashboard" data-bs-toggle="modal" data-bs-target="#priceCheckModal" accesskey="F12">
                <i class="material-icons">price_check</i><span>Price Check (F12)</span>
            </a>
        </li>
        <li class="#" style="margin-top: 30px;">
            <a href="index.php"><i class="material-icons">arrow_back</i><span>Back to Main</span></a>
        </li>
    </ul>
</nav>

<!-- Cash Tender Modal (Using Bootstrap Modal) -->
<div class="modal fade" id="cashTenderModal" tabindex="-1" aria-labelledby="cashTenderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cashTenderModalLabel">CASH TENDER</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Amount Due:</label>
                    <div class="input-group">
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control" id="amountDue" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tender:</label>
                    <div class="input-group">
                        <span class="input-group-text">₱</span>
                        <input type="number" class="form-control" id="tenderInput" step="0.01" placeholder="0.00">
                    </div>
                </div>
                <div class="form-group">
                    <label>Change:</label>
                    <div class="input-group">
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control" id="changeOutput" value="0.00" readonly>
                    </div>
                </div>
                <small class="text-danger">Press F1 to add Points</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="calculateChange()">Submit</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <!--TOP NAVBAR CONTENT-->
    <div class="top-navbar">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">Point of Sale</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
                data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>
        </nav>
    </div>

    <!--DASHBOARD CONTENT-->
    <div class="main-content">
        <div class="row">
            <!-- Left Side - Product Data Entry Form -->
            <div class="col-md-8" style="margin-top: -15px;">
                <div class="card">
                    <div class="card-header bg-success text-white text-center"></div>
                    <div class="card-body" style="padding: 0px; position: relative;">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="margin-bottom: 0;">
                                    <input type="text" class="form-control" id="productSearch" 
                                        placeholder="Search products..." style="padding: 5px; margin: 0;" autocomplete="off">
                                    <div id="searchResults" class="search-results"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card" style="margin-top: -1px; margin-bottom: 0px;">
                        <div class="card-body" style="background-color: black; color: white; font-family: Arial, sans-serif; padding: 10px;">
                            <div class="row">
                                <!-- Left Section: TOTAL and RETAIL -->
                                <div class="col-md-3">
                                    <div style="font-size: 28px; font-weight: bold; color: yellow; margin-left: 10px;">TOTAL</div>
                                    <div class="retail-label" style="font-size: 25px; font-weight: bold; color: white; margin-top: -15px; margin-left: 10px;">RETAIL</div>
                                </div>
                                <!-- Divider -->
                                <div class="col-md-1" style="border-left: 2px solid white; height: 100%;"></div>
                                <!-- Right Section: Value -->
                                <div class="col-md-8 text-right d-flex justify-content-end" style="font-size: 48px; font-weight: bold; color: white;" id="totalRetailDisplay">
                                    ₱0.00 <!-- Changed from ₱900.00 to ₱0.00 as a placeholder -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: -10px; height: calc(80vh - 100px);">
                    <div class="card-body">
                        <div class="table-responsive" style="height: calc(80vh - 130px); overflow-y: auto; margin-top: -15px;">
                            <h6 style="position: sticky; top: 0; background-color: white; z-index: 3; margin-bottom: 0; padding: 10px; border-bottom: 1px solid #ddd; font-weight: bold;">
                                Item Details</h6>
                            <table class="table" style="margin-top: 10px;" id="table-bold">
                                <thead class="card-header bg-dark opacity-60 text-white"
                                    style="position: sticky; top: 42px; z-index: 2; border-top: 2px solid black; border-bottom: 2px solid black;">
                                    <tr>
                                        <th style="width: 50%;">Items</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                    
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Additional Table -->
            <div class="col-md-4" style="margin-top: -15px;">
                <div class="card" style="height: calc(88.5vh);">
                    <div class="card-header bg-success text-white text-center"></div>
                    <div class="card-body">
                        <h5>Transaction Details</h5>
                        <hr>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive" style="height: calc(80vh - 80px); overflow-y: auto; margin-top: -40px; margin-bottom: -15px;">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 50%;">Terminal No:</th>
                                                    <td id="terminal-display"><?php echo isset($_SESSION['terminal_no']) ? $_SESSION['terminal_no'] : 'N/A'; ?></td>
                                                    </tr>
                                                <tr>
                                                    <th style="width: 50%;">Transaction No:</th>
                                                    <td id="transactionNo" style="display: none;"> </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;"># of Item:</th>
                                                    <td id="#"> </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Amount:</th>
                                                    <td id="#"> </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Discount:</th>
                                                    <td id="#"> </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">BSC Points:</th>
                                                    <td id="#"> </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">TOTAL:</th>
                                                    <td id="totalTransactionDisplay">₱0.00</td> <!-- Changed from ₱900.00 to ₱0.00 as a placeholder -->
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 50%;">Tender:</th>
                                                    <td id="tenderDisplay">₱0.00</td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 50%;">Change:</th>
                                                    <td id="changeDisplay">₱0.00</td>
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
</div>

<div class="modal fade" id="pwdPasswordModal" tabindex="-1" aria-labelledby="pwdPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pwdPasswordModalLabel">PWD Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please enter password:</p>
                <input type="password" class="form-control" id="pwdPassword" placeholder="Enter password">
                <div id="pwdPasswordError" style="color:red; display:none;">Incorrect password!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="verifyPWDPassword()">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- PWD Details Modal -->
<div class="modal fade" id="pwdDetailsModal" tabindex="-1" aria-labelledby="pwdDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pwdDetailsModalLabel">PWD Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="pwdForm">
                    <div class="mb-3">
                        <label for="pwdName" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="pwdName" required>
                    </div>
                    <div class="mb-3">
                        <label for="pwdId" class="form-label">ID Number:</label>
                        <input type="text" class="form-control" id="pwdId" required>
                    </div>
                    <div class="mb-3">
                        <label for="pwdAmountAvailed" class="form-label">Amount Availed:</label>
                        <div class="input-group">
                            <span class="input-group-text">₱</span>
                            <input type="text" class="form-control" id="pwdAmountAvailed" readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="submitPWDDetails()">Apply Discount</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Price Check Modal Search Functionality
$(document).ready(function() {
    // Handle input for real-time search in #productDetails
    $('#productDetails').on('input', function() {
        const query = $(this).val().trim();
        const $priceCheckResults = $('#priceCheckResults');

        if (query.length >= 2) {
            $.ajax({
                url: 'search_products.php',
                method: 'POST',
                data: { query: query },
                dataType: 'json',
                success: function(response) {
                    $priceCheckResults.empty();
                    if (response.status === 'success' && response.products.length > 0) {
                        response.products.forEach(product => {
                            const item = `
                                <div class="search-item" 
                                     data-price="${product.SRP}" 
                                     data-name="${product.ProductName}" 
                                     data-barcode="${product.Barcode}">
                                    <strong>${product.ProductName}</strong><br>
                                    Barcode: ${product.Barcode} | SRP: ₱${parseFloat(product.SRP).toFixed(2)}
                                </div>
                            `;
                            $priceCheckResults.append(item);
                        });
                        $priceCheckResults.show();
                    } else {
                        $priceCheckResults.append('<div class="search-item">No results found</div>');
                        $priceCheckResults.show();
                    }
                },
                error: function() {
                    $priceCheckResults.html('<div class="search-item">Error fetching products</div>').show();
                }
            });
        } else {
            $priceCheckResults.hide();
            $priceCheckResults.empty();
            $('#productPrice').val('₱0.00');
        }
    });

    // Handle clicking a search result
    $(document).on('click', '#priceCheckResults .search-item', function() {
        const price = parseFloat($(this).data('price')) || 0;
        const productName = $(this).data('name');
        const barcode = $(this).data('barcode');

        // Update the product details and price fields
        $('#productDetails').val(`${productName} (Barcode: ${barcode})`);
        $('#productPrice').val(`₱${price.toFixed(2)}`);
        $('#priceCheckResults').hide();
    });

    // Handle barcode scanner input for Price Check Modal
    $('#productDetails').on('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const query = $(this).val().trim();
            if (query) {
                $.ajax({
                    url: 'search_products.php',
                    method: 'POST',
                    data: { query: query, isBarcode: true },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success' && response.products.length > 0) {
                            const product = response.products[0];
                            $('#productDetails').val(`${product.ProductName} (Barcode: ${product.Barcode})`);
                            $('#productPrice').val(`₱${parseFloat(product.SRP).toFixed(2)}`);
                            $('#priceCheckResults').hide();
                        } else {
                            alert('Product not found for barcode: ' + query);
                            $('#productPrice').val('₱0.00');
                        }
                    },
                    error: function() {
                        alert('Error looking up barcode. Please try again.');
                        $('#productPrice').val('₱0.00');
                    }
                });
            }
        }
    });

    // Hide search results when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#productDetails, #priceCheckResults').length) {
            $('#priceCheckResults').hide();
        }
    });

    // Clear fields when modal is opened
    $('#priceCheckModal').on('shown.bs.modal', function() {
        $('#productDetails').val('');
        $('#productPrice').val('₱0.00');
        $('#priceCheckResults').hide().empty();
        $('#productDetails').focus();
    });
});

    let cart = []; // Array to store cart items
    let currentTransactionNo = '';

    $(document).ready(function() {
        toggleSidebarLinks();
        generateTransactionNo();

        // Prevent form submission and handle barcode scans in #productSearch
        $('#productSearch').on('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent form submission
                const query = $(this).val().trim();
                if (query) {
                    lookupBarcode(query, currentPriceType); // Pass currentPriceType
                }
            }
        });
        
        generateTransactionNo();

        // Function to generate a unique Transaction No
        function generateTransactionNo() {
            $.ajax({
                url: 'get_last_transaction_no.php',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    let lastTransactionNo = response.lastTransactionNo || 'TRX000000';
                    let number = parseInt(lastTransactionNo.replace('TRX', '')) + 1;
                    currentTransactionNo = 'TRX' + number.toString().padStart(6, '0');
                    $('#transactionNo').text(currentTransactionNo);
                },
                error: function() {
                    // Fallback in case of error
                    currentTransactionNo = 'TRX' + Date.now().toString().slice(-6);
                    $('#transactionNo').text(currentTransactionNo);
                }
            });
        }

        // Handle input for real-time search (for manual typing in #productSearch)
        $('#productSearch').on('input', function() {
            var query = $(this).val().trim();
            
            if (query.length >= 2) {
                $.ajax({
                    url: 'search_products.php',
                    method: 'POST',
                    data: { query: query, priceType: currentPriceType },
                    dataType: 'json',
                    success: function(response) {
                        const $searchResults = $('#searchResults');
                        $searchResults.empty();
                        if (response.status === 'success' && response.products.length > 0) {
                            response.products.forEach(product => {
                                const item = `
                                    <div class="search-item" 
                                        data-value="${product.Barcode}" 
                                        data-name="${product.ProductName}" 
                                        data-price="${product.SRP}" 
                                        data-barcode="${product.Barcode}"
                                        data-pricetype="${product.PriceType}">
                                        <strong>${product.ProductName}</strong><br>
                                        Barcode: ${product.Barcode} | SRP: ₱${parseFloat(product.SRP).toFixed(2)} | Type: ${product.PriceType}
                                    </div>
                                `;
                                $searchResults.append(item);
                            });
                            $searchResults.show();
                        } else {
                            $searchResults.append('<div class="search-item">' + (response.message || 'No results found') + '</div>');
                            $searchResults.show();
                        }
                    },
                    error: function() {
                        $('#searchResults').html('<div class="search-item">Error fetching products</div>').show();
                    }
                });
            } else {
                $('#searchResults').hide();
            }
        });

        // Handle clicking a search result
        
        $(document).on('click', '#searchResults .search-item', function() {
            const productBarcode = $(this).data('barcode');
            const productName = $(this).data('name');
            const productPrice = parseFloat($(this).data('price'));
            const productPriceType = $(this).data('pricetype');

            if (productPriceType === currentPriceType) {
                addProductToCart(productBarcode, productName, productPrice, productBarcode);
            } else {
                alert('Product price type (' + productPriceType + ') does not match current mode (' + currentPriceType + ').');
            }
            $('#productSearch').val('');
            $('#searchResults').hide();
        });

        // Global barcode scanner detection
        let barcodeBuffer = '';
        let lastKeyTime = 0;
        const barcodeTimeout = 50; // Time in ms to group keypresses as a barcode
        const keyDelayThreshold = 50;

        $(document).on('keydown', function(e) {
            const currentTime = new Date().getTime();
            const char = e.key;

            // Detect barcode scanner input (rapid keypresses)
            if (currentTime - lastKeyTime > keyDelayThreshold) {
                barcodeBuffer = '';
            }
            lastKeyTime = currentTime;

            if (char === 'Enter') {
                if (barcodeBuffer) {
                    console.log('Barcode scanned:', barcodeBuffer);
                    lookupBarcode(barcodeBuffer);
                    barcodeBuffer = '';
                }
            } else if (char.length === 1) {
                barcodeBuffer += char;
            }
        });

        // Function to lookup barcode and add to cart
        let barcodeProcessing = false;
        function switchPriceType(priceType) {
            currentPriceType = priceType;
            $('.retail-label').text(currentPriceType);
            console.log('Switched to:', currentPriceType);
            cart = []; // Clear cart when switching price types
            updateCartDisplay();
            updateTotals();
        }

        function lookupBarcode(barcode, priceType) {
            if (barcodeProcessing) return;
            barcodeProcessing = true;

            $.ajax({
                url: 'search_products.php',
                method: 'POST',
                data: { query: barcode, isBarcode: true, priceType: priceType },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success' && response.products && response.products.length > 0) {
                        const product = response.products[0];
                        if (product.PriceType === priceType) {
                            addProductToCart(
                                product.Barcode,
                                product.ProductName,
                                parseFloat(product.SRP),
                                product.Barcode,
                                1
                            );
                        } else {
                            alert('Product price type (' + product.PriceType + ') does not match current mode (' + priceType + ').');
                        }
                        $('#productSearch').val('');
                        $('#searchResults').hide();
                    } else {
                        alert(response.message || 'Product not found for barcode: ' + barcode);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error looking up barcode:', status, error);
                    alert('Error looking up barcode. Please try again.');
                },
                complete: function() {
                    barcodeProcessing = false;
                }
            });
        }
    });

    let currentPriceType = 'RETAIL';

     // Toggle between RETAIL and WHOLESALE on Tab key press
    $(document).on('keydown', function(e) {
        if (e.key === 'Tab') {
            e.preventDefault();
            const retailLabel = $('.retail-label');
            if (retailLabel.length > 0) {
                const oldPriceType = currentPriceType;
                currentPriceType = currentPriceType === 'RETAIL' ? 'WHOLESALE' : 'RETAIL';
                retailLabel.text(currentPriceType);
                console.log('Toggled from ' + oldPriceType + ' to:', currentPriceType);

                toggleSidebarLinks();
            } else {
                console.error('retail-label element not found in DOM');
            }
        }
    });

    function updateCartPricesForPriceType() {
        if (cart.length === 0) return;

        const barcodes = cart.map(item => item.barcode);
        $.ajax({
            url: 'search_products.php',
            method: 'POST',
            data: { query: barcodes.join(','), isBarcode: true, priceType: currentPriceType, multiple: true },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success' && response.products.length > 0) {
                    const priceMap = {};
                    response.products.forEach(product => {
                        priceMap[product.Barcode] = parseFloat(product.SRP);
                    });

                    cart.forEach(item => {
                        const newPrice = priceMap[item.barcode] || item.price; // Use new price if available, otherwise keep old price
                        item.price = newPrice;
                        item.totalPrice = item.quantity * newPrice;
                        item.priceType = currentPriceType; // Update price type
                    });
                } else {
                    console.warn('Could not update prices for some items:', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error updating cart prices:', status, error);
            }
        });
    }
    
    function addProductToCart(id, name, price, barcode, quantity = 1) {
        barcode = String(barcode);
        console.log('Adding product to cart:', { id, name, price, barcode, quantity });

        const existingProductIndex = cart.findIndex(item => String(item.barcode) === barcode);

        if (existingProductIndex !== -1) {
            cart[existingProductIndex].quantity += quantity;
            cart[existingProductIndex].totalPrice = cart[existingProductIndex].quantity * cart[existingProductIndex].price;
        } else {
            cart.push({
                id: barcode,
                name: name,
                price: price,
                barcode: barcode,
                quantity: quantity,
                totalPrice: price * quantity,
                priceType: currentPriceType
            });
        }

        updateCartDisplay();
        updateTotals();
        toggleSidebarLinks();

        const rowSelector = `table#table-bold tbody tr[data-barcode="${barcode}"]`;
        $('table#table-bold tbody tr').removeClass('selected');
        $(rowSelector).addClass('selected');
    }
    
    function updateCartDisplay() {
        console.log('Updating cart display, cart:', cart);
        const tableBody = $('table#table-bold tbody');
        tableBody.empty();

        if (cart.length === 0) {
            tableBody.append(`
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            `);
        } else {
            cart.forEach(item => {
                tableBody.append(`
                    <tr data-barcode="${item.barcode}">
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td>₱${item.price.toFixed(2)}</td>
                        <td>₱${item.totalPrice.toFixed(2)}</td>
                    </tr>
                `);
            });
        }

        toggleSidebarLinks();
    }
    
    function updateTotals() {
        let totalAmount = 0;
        let totalItems = 0;
        
        cart.forEach(item => {
            totalAmount += item.totalPrice;
            totalItems += item.quantity;
        });
        
        $('#totalRetailDisplay').text(`₱${totalAmount.toFixed(2)}`);
        $('#totalTransactionDisplay').text(`₱${totalAmount.toFixed(2)}`);
        
        $('th:contains("# of Item:")').next().text(totalItems);
        $('th:contains("Amount:")').next().text(`₱${totalAmount.toFixed(2)}`);
        $('th:contains("TOTAL:")').next().text(`₱${totalAmount.toFixed(2)}`);
    }

    // Function to toggle sidebar links based on cart state
    function toggleSidebarLinks() {
        const editItemLink = $('a[accesskey="F1"]'); // Edit Item (F1)
        const voidItemLink = $('a[accesskey="F6"]'); // Void Item (F6)

        if (cart.length === 0) {
            // Disable links if cart is empty
            editItemLink.addClass('disabled-link');
            voidItemLink.addClass('disabled-link');
        } else {
            // Enable links if cart has items
            editItemLink.removeClass('disabled-link');
            voidItemLink.removeClass('disabled-link');
        }
    }

    // Handle Edit Quantity button click
    $('#editQuantityBtn').on('click', function() {
            const selectedRow = $('table#table-bold tbody tr.selected');
            if (selectedRow.length > 0) {
                const productId = selectedRow.data('product-id');
                const currentQuantity = parseInt(selectedRow.find('td').eq(1).text().trim()) || 1;
                const newQuantity = prompt("Enter new quantity:", currentQuantity);
                if (newQuantity !== null) {
                    updateItemQuantity(productId, parseInt(newQuantity));
                }
            } else {
                alert("Please select an item to edit first");
            }
        });
    
        $('a[accesskey="F1"]').on('click', function(e) {
            e.preventDefault();
            const selectedRow = $('table#table-bold tbody tr.selected');
            if (selectedRow.length > 0) {
                const barcode = String(selectedRow.data('barcode')); // Ensure barcode is a string
                const currentQuantity = parseInt(selectedRow.find('td').eq(1).text()) || 1;
                console.log('F1 triggered, selected barcode:', barcode, 'current quantity:', currentQuantity);
                const newQuantity = prompt("Enter new quantity:", currentQuantity);
                if (newQuantity !== null && !isNaN(newQuantity) && parseInt(newQuantity) >= 0) {
                    updateItemQuantity(barcode, parseInt(newQuantity));
                } else {
                    console.log('Invalid quantity entered:', newQuantity);
                }
            } else {
                console.log('No row selected for F1');
                alert("Please select an item to edit first");
            }
        });
    
    function updateItemQuantity(barcode, newQuantity) {
        // Ensure barcode is a string
        barcode = String(barcode);
        console.log('Updating item quantity:', { barcode, newQuantity });

        const itemIndex = cart.findIndex(item => String(item.barcode) === barcode);
        if (itemIndex !== -1) {
            if (newQuantity <= 0) {
                console.log('Removing item with barcode:', barcode);
                cart.splice(itemIndex, 1); // Remove item if quantity is 0
            } else {
                cart[itemIndex].quantity = newQuantity;
                cart[itemIndex].totalPrice = cart[itemIndex].price * newQuantity;
                console.log('Updated item:', cart[itemIndex]);
            }
            updateCartDisplay();
            updateTotals();

            // Re-select the row after updating
            if (newQuantity > 0) {
                const rowSelector = `table#table-bold tbody tr[data-barcode="${barcode}"]`;
                $('table#table-bold tbody tr').removeClass('selected');
                $(rowSelector).addClass('selected');
                console.log('Re-selected row:', rowSelector);
            }
        } else {
            console.error('Item not found in cart:', barcode);
            alert('Error: Item not found in cart. Please try adding it again.');
        }
    }
    
    function removeItemFromCart(productId) {
        cart = cart.filter(item => item.id !== productId);
        updateCartDisplay();
        updateTotals();
    }
    
    $(document).on('click', 'table#table-bold tbody tr', function() {
        $('table#table-bold tbody tr').removeClass('selected');
        $(this).addClass('selected');
    });
    
    // Modified F6 handler for void item
$('a[accesskey="F6"]').on('click', function(e) {
    e.preventDefault();
    if ($('table#table-bold tbody tr.selected').length > 0) {
        // Show the password modal instead of directly removing the item
        $('#voidPasswordModal').modal('show');
    } else {
        alert("Please select an item to void first");
    }
});

// Add password verification handler
$('#verifyVoidPassword').on('click', function() {
    const password = $('#voidPassword').val();
    
    // Verify password against database
    $.ajax({
        url: 'verify_void_password.php',
        method: 'POST',
        data: {
            password: password,
            type: 'POS'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Password is correct, proceed to reason modal
                $('#voidPasswordModal').modal('hide');
                $('#voidReasonModal').modal('show');
            } else {
                // Password is incorrect, show error
                $('#voidPassword').addClass('is-invalid');
                $('#voidPasswordError').show();
            }
        },
        error: function() {
            alert('Server error. Could not verify password.');
        }
    });
});

// Reset password field when modal is hidden
$('#voidPasswordModal').on('hidden.bs.modal', function() {
    $('#voidPassword').val('').removeClass('is-invalid');
    $('#voidPasswordError').hide();
});

$('#confirmVoid').on('click', function() {
    const selectedRow = $('table#table-bold tbody tr.selected');
    if (!selectedRow.length) {
        alert('Please select an item to void.');
        return;
    }

    const barcode = selectedRow.data('barcode'); // Use data-barcode instead of data-product-id
    const reason = $('#voidReason').val();
    const quantity = selectedRow.find('td').eq(1).text().trim();

    // Validate inputs
    if (!barcode) {
        alert('Error: Product barcode is missing.');
        return;
    }
    if (!reason) {
        alert('Please provide a reason for voiding.');
        return;
    }
    if (!quantity || isNaN(quantity) || parseInt(quantity) <= 0) {
        alert('Invalid quantity.');
        return;
    }

    console.log("Barcode: " + barcode);
    console.log("Reason: " + reason);
    console.log("Quantity: " + quantity);

    // Send AJAX request to log the void
    $.ajax({
        url: 'log_void_item.php',
        method: 'POST',
        data: {
            productId: barcode, // Send barcode as productId
            reason: reason,
            quantity: quantity
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Remove the item from the cart
                const itemIndex = cart.findIndex(item => String(item.barcode) === String(barcode));
                if (itemIndex !== -1) {
                    cart.splice(itemIndex, 1); // Remove the item from the cart array
                }

                // Close the modal
                $('#voidReasonModal').modal('hide');

                // Update the table display
                updateCartDisplay();
                updateTotals();

                // Enable/Disable sidebar links
                toggleSidebarLinks();
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', xhr.responseText);
            alert('Server error. Could not log void transaction.');
        }
    });
});

// Function to update the total retail display
function updateTotalRetail() {
    let total = 0;
    $('table#table-bold tbody tr').each(function() {
        const amountText = $(this).find('td').eq(4).text().trim(); // Amount is in the 5th column
        const amount = parseFloat(amountText.replace('₱', '')) || 0; // Remove currency symbol and parse
        total += amount;
    });
    $('#totalRetailDisplay').text(`₱${total.toFixed(2)}`); // Update the total retail display
}
// Function to update the transaction details
function updateTransactionDetails() {
    // Calculate the number of items (exclude empty rows)
    let itemCount = 0;
    $('table#table-bold tbody tr').each(function() {
        const itemName = $(this).find('td').eq(0).text().trim(); // Check if the first column (Items) is not empty
        if (itemName !== '') {
            itemCount++;
        }
    });

    // Update the number of items
    $('table.table-borderless tbody tr').eq(2).find('td').text(itemCount); // "# of Item" is the 3rd row (index 2)

    // Calculate the total amount (same as totalRetailDisplay)
    let total = 0;
    $('table#table-bold tbody tr').each(function() {
        const amountText = $(this).find('td').eq(4).text().trim(); // Amount is in the 5th column
        const amount = parseFloat(amountText.replace('₱', '')) || 0; // Remove currency symbol and parse
        total += amount;
    });

    // Update the Amount field
    $('table.table-borderless tbody tr').eq(3).find('td').text(`₱${total.toFixed(2)}`); // "Amount" is the 4th row (index 3)

    // Update the total transaction display
    $('#totalTransactionDisplay').text(`₱${total.toFixed(2)}`); // Update the TOTAL in transaction details
}

    $('a[accesskey="F8"]').on('click', function(e) {
        e.preventDefault();
            $('#voidPasswordAllModal').modal('show');
    });


// Add password verification handler
$('#verifyVoidPasswordAll').on('click', function() {
    const password = $('#voidPasswordAll').val();
    
    // Verify password against database
    $.ajax({
        url: 'verify_void_password.php',
        method: 'POST',
        data: {
            password: password,
            type: 'POS'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Password is correct, proceed to reason modal
                $('#voidPasswordAllModal').modal('hide');
                $('#voidReasonAllModal').modal('show');
            } else {
                // Password is incorrect, show error
                $('#voidPasswordAll').addClass('is-invalid');
                $('#voidPasswordError').show();
            }
        },
        error: function() {
            alert('Server error. Could not verify password.');
        }
    });
});

// Reset password field when modal is hidden
$('#voidPasswordAllModal').on('hidden.bs.modal', function() {
    $('#voidPassword').val('').removeClass('is-invalid');
    $('#voidPasswordError').hide();
});
// Update the void all function to collect products from the table
$('#confirmVoidAll').on('click', function() {
    const reason = $('#voidAllReason').val();
    
    if (!reason) {
        $('#voidAllReason').addClass('is-invalid');
        return;
    }
    
    // Collect all items from the cart array instead of the table
    // This ensures we have all the necessary data
    const items = cart.map(item => ({
        Barcode: item.barcode,
        ProductName: item.name,
        Quantity: item.quantity,
        SRP: item.price
    }));
    
    // If cart is empty, show error or handle accordingly
    if (items.length === 0) {
        console.log('No items to void');
        $('#voidReasonAllModal').modal('hide');
        return;
    }
    
    // Send request to void all items
    $.ajax({
        url: 'void_all.php',
        method: 'POST',
        data: {
            reason: reason,
            items: JSON.stringify(items)
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Close the modal
                $('#voidReasonAllModal').modal('hide');
                
                // Clear the cart array
                cart = [];
                
                // Update the display
                updateCartDisplay();
                updateTotals();
                toggleSidebarLinks();
                
                console.log('Transaction voided successfully:', response.transaction_number);
            } else {
                // Log error to console only
                console.error(response.message);
                console.error(response.errors);
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText); // Debugging
        }
    });
});


    $('a[accesskey="F2"]').on('click', function(e) {
    e.preventDefault();
    if (cart.length > 0) {
        const transactionNo = 'TRX' + Date.now().toString().slice(-6);
        const transactionDate = new Date().toISOString().slice(0, 10);
        const totalQty = cart.reduce((total, item) => total + item.quantity, 0);
        const totalAmount = cart.reduce((total, item) => total + item.totalPrice, 0);
        
        const pendingTransaction = {
            transactionNo: transactionNo,
            transactionDate: transactionDate,
            items: cart,
            totalQty: totalQty,
            totalAmount: totalAmount
        };
        
        savePendingTransaction(pendingTransaction);
        location.reload();

    } else {
        alert("No items in cart to save");
    }
});
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            table#table-bold tbody tr.selected {
                background-color: #e0f7fa;
            }
        `)
        .appendTo('head');

        function updateCartDisplay() {
            const tableBody = $('table#table-bold tbody');
            tableBody.empty();

            if (cart.length === 0) {
                tableBody.append(`
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                `);
                return;
            }

            cart.forEach(item => {
                tableBody.append(`
                    <tr data-barcode="${item.barcode}">
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td>₱${item.price.toFixed(2)}</td>
                        <td>₱${item.totalPrice.toFixed(2)}</td>
                    </tr>
                `);
            });
        }

        function updateTotals() {
            console.log('Updating totals, cart:', cart);
            let totalAmount = 0;
            let totalItems = 0;

            cart.forEach(item => {
                totalAmount += item.totalPrice;
                totalItems += item.quantity;
            });

            $('#totalRetailDisplay').text(`₱${totalAmount.toFixed(2)}`);
            $('#totalTransactionDisplay').text(`₱${totalAmount.toFixed(2)}`);

            $('th:contains("# of Item:")').next().text(totalItems);
            $('th:contains("Amount:")').next().text(`₱${totalAmount.toFixed(2)}`);
            $('th:contains("TOTAL:")').next().text(`₱${totalAmount.toFixed(2)}`);
        }
    

function savePendingTransaction(transaction) {
    $.ajax({
    url: 'save_pending_transaction.php',
    method: 'POST',
    data: {
        transaction: JSON.stringify(transaction)
    },
    dataType: 'json', // Add this line
    success: function(response) {
        if (response.status === 'success') {
            alert('Transaction saved successfully!');
            cart = [];
            updateCartDisplay();
            updateTotals();
            $('.card-header.bg-success').first().text("");
            toggleSidebarLinks();
        } else {
            alert('Error: ' + response.message);
        }
    },
    error: function() {
        alert('Server error. Could not save transaction.');
    }
});
}

function loadPendingTransactions() {
    $.ajax({
        url: 'get_pending_transactions.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                $('#pendingTransactionModal tbody').empty();
                
                if (response.transactions.length > 0) {
                    response.transactions.forEach(function(transaction) {
                        let row = `
                            <tr data-transaction-no="${transaction.transactionNo}" class="transaction-row">
                                <td>${transaction.transactionNo}</td>
                                <td>${transaction.transactionDate}</td>
                                <td>${transaction.totalQty}</td>
                                <td>₱${parseFloat(transaction.totalAmount).toFixed(2)}</td>
                            </tr>
                        `;
                        $('#pendingTransactionModal tbody').append(row);
                    });
                } else {
                    $('#pendingTransactionModal tbody').html('<tr><td colspan="4" class="text-center">No pending transactions found.</td></tr>');
                }
            } else {
                $('#pendingTransactionModal tbody').html('<tr><td colspan="4" class="text-center text-danger">Error: ' + response.message + '</td></tr>');
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("Response:", xhr.responseText);
            $('#pendingTransactionModal tbody').html('<tr><td colspan="4" class="text-center text-danger">Server error. Could not load transactions.</td></tr>');
        }
    });
}

// Make sure this runs when the document is ready
$(document).ready(function() {
    // This will attach the click handler to all transaction rows, even ones added dynamically
    $(document).on('click', '.transaction-row', function() {
        $('.transaction-row').removeClass('table-primary');
        $(this).addClass('table-primary');
        console.log("Selected transaction:", $(this).attr('data-transaction-no'));
    });
    
    // When the modal is shown, load the transactions
    $('#pendingTransactionModal').on('show.bs.modal', function() {
        console.log("Modal opened, loading transactions...");
        loadPendingTransactions();
    });
    
    $('#pendingTransactionModal .btn-primary').off('click').on('click', function() {
        let selectedRow = $('#pendingTransactionModal tbody tr.table-primary');
        
        if (selectedRow.length > 0) {
            let transactionNo = selectedRow.data('transaction-no');
            console.log("Attempting to load transaction:", transactionNo);
            if (transactionNo) {
                loadTransactionToCart(transactionNo);
                $('#pendingTransactionModal').modal('hide');
            } else {
                alert('Error: Transaction number not found.');
            }
        } else {
            alert('Please select a transaction to load.');
        }
    });

    // Clean up event listeners when modal is hidden
    $('#pendingTransactionModal').on('hidden.bs.modal', function() {
        $('#pendingTransactionModal .btn-primary').off('click');
        $('#pendingTransactionModal .btn-danger').off('click');
    });
    
    // Fix the Delete button click handler as well
    $('#pendingTransactionModal .btn-danger').click(function() {
        let selectedRow = $('#pendingTransactionModal tbody tr.table-primary');
        
        if (selectedRow.length > 0) {
            if (confirm('Are you sure you want to delete this transaction?')) {
                let transactionNo = selectedRow.attr('data-transaction-no');
                removePendingTransaction(transactionNo);
            }
        } else {
            alert('Please select a transaction to delete.');
        }
    });
});

function loadPendingTransactions() {
    $.ajax({
        url: 'get_pending_transactions.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                $('#pendingTransactionModal tbody').empty();
                
                if (response.transactions.length > 0) {
                    response.transactions.forEach(function(transaction) {
                        let row = `
                            <tr data-transaction-no="${transaction.transactionNo}" class="transaction-row">
                                <td>${transaction.transactionNo}</td>
                                <td>${transaction.transactionDate}</td>
                                <td>${transaction.totalQty}</td>
                                <td>₱${parseFloat(transaction.totalAmount).toFixed(2)}</td>
                            </tr>
                        `;
                        $('#pendingTransactionModal tbody').append(row);
                    });
                } else {
                    $('#pendingTransactionModal tbody').html('<tr><td colspan="4" class="text-center">No pending transactions found.</td></tr>');
                }
            } else {
                $('#pendingTransactionModal tbody').html('<tr><td colspan="4" class="text-center text-danger">Error: ' + response.message + '</td></tr>');
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("Response:", xhr.responseText);
            $('#pendingTransactionModal tbody').html('<tr><td colspan="4" class="text-center text-danger">Server error. Could not load transactions.</td></tr>');
        }
    });
}

function loadTransactionToCart(transactionNo) {
    $.ajax({
        url: 'get_transaction_items.php',
        method: 'GET',
        data: {
            transactionNo: transactionNo
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Clear the cart
                cart = [];

                // Load the exact items from the pending transaction
                response.items.forEach(function(item) {
                    cart.push({
                        id: item.Barcode,
                        barcode: item.Barcode,
                        name: item.ProductName,
                        price: parseFloat(item.SRP),
                        quantity: parseFloat(item.Quantity),
                        totalPrice: parseFloat(item.Amount)
                    });
                });

                // Update the display, totals, and sidebar links
                updateCartDisplay();
                updateTotals();
                toggleSidebarLinks(); // Add this line to enable F1 and F6 buttons

                // Update the transaction number display
                $('#transactionNo').text(transactionNo);

                // Remove the pending transaction and show a single alert
                removePendingTransaction(transactionNo, function() {
                    alert('Transaction loaded successfully and removed from pending list!');
                });
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("Response:", xhr.responseText);
            alert('Server error. Could not load transaction items.');
        }
    });
}

function removePendingTransaction(transactionNo, callback) {
    $.ajax({
        url: 'remove_pending_transaction.php',
        method: 'POST',
        data: {
            transactionNo: transactionNo,
            action: 'remove_after_load'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Execute callback to show alert in the parent function
                if (callback) callback();
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
            console.log("Response:", xhr.responseText);
            alert('Server error. Could not remove pending transaction.');
        }
    });
}

function updatePendingTransactionsTable(transactions) {
    const tableBody = $('#pendingTransactionModal tbody');
    tableBody.empty();
    
    if (transactions.length === 0) {
        tableBody.append('<tr><td colspan="4" class="text-center">No pending transactions found</td></tr>');
        return;
    }
    
    transactions.forEach(transaction => {
        const row = `
            <tr data-transaction-no="${transaction.id}" class="transaction-row">
                <td>${transaction.transactionNo}</td>
                <td>${transaction.transactionDate}</td>
                <td>${transaction.totalQty}</td>
                <td>₱${parseFloat(transaction.totalAmount).toFixed(2)}</td>
            </tr>
        `;
        tableBody.append(row);
    });
}
// Senior Citizen Discount Functions
function showSeniorPasswordPrompt() {
    $('#seniorPasswordModal').modal('show');  // Show the password modal
    $('#seniorPassword').val('');  // Clear the password input field
    $('#passwordError').hide();  // Hide the error message initially
}

function verifySeniorPassword() {
    const password = $('#seniorPassword').val();  // Get the entered password
    if (password === '123') {  // Check if the entered password matches the correct one
        $('#seniorPasswordModal').modal('hide');  // Hide the password modal
        $('#seniorDetailsModal').modal('show');  // Show the details modal
    } else {
        $('#passwordError').show();  // Show the error message if the password is incorrect
        $('#seniorPassword').addClass('is-invalid');  // Add invalid class to input
    }
}

function submitSeniorDetails() {
    const name = $('#seniorName').val();
    const idNumber = $('#seniorId').val();
    const amountAvailed = $('#seniorAmountAvailed').val();

    if (name && idNumber) {
        const discountData = {
            name: name,
            idNumber: idNumber,
            amountAvailed: amountAvailed,
            discountType: 'Senior Citizen'
        };

        console.log('Applying Senior Citizen discount:', discountData);
        alert(`Senior Citizen discount applied for:\nName: ${name}\nID: ${idNumber}\nAmount Availed: ₱${amountAvailed}`);

        $('#seniorDetailsModal').modal('hide');
        $('#seniorForm')[0].reset();
        updateTransactionWithDiscount(discountData);
    } else {
        alert('Please fill all required fields!');
    }
}

function updateTransactionWithDiscount(discountData) {
    const totalAmount = parseFloat($('#totalTransactionDisplay').text().replace('₱', '')) || 0;

    // AJAX call to fetch the SENIORDISCOUNT value from the server
    $.ajax({
        url: 'fetch_discount.php', // Replace with your server endpoint
        method: 'GET',
        data: { configName: 'SENIORDISCOUNT' },
        success: function(response) {
            const discountRate = parseFloat(response) || 0.05; // Fallback to 0.05 if the fetch fails
            const discountAmount = totalAmount * discountRate;

            // Update the Discount row in Transaction Details
            $('th:contains("Discount:")').next().text(`₱${discountAmount.toFixed(2)} (${discountData.discountType})`);

            // Calculate the final total after discount
            const finalTotal = totalAmount - discountAmount;

            // Update the TOTAL in Transaction Details
            $('#totalTransactionDisplay').text(`₱${finalTotal.toFixed(2)}`);
            $('#totalRetailDisplay').text(`₱${finalTotal.toFixed(2)}`);
            $('#amountDue').val(finalTotal.toFixed(2));
        },
        error: function() {
            console.error('Failed to fetch discount rate, using default 0.05');
            const discountRate = 0.05; // Fallback value
            const discountAmount = totalAmount * discountRate;

            $('th:contains("Discount:")').next().text(`₱${discountAmount.toFixed(2)} (${discountData.discountType})`);
            const finalTotal = totalAmount - discountAmount;
            $('#totalTransactionDisplay').text(`₱${finalTotal.toFixed(2)}`);
            $('#totalRetailDisplay').text(`₱${finalTotal.toFixed(2)}`);
            $('#amountDue').val(finalTotal.toFixed(2));
        }
    });
}

function verifySeniorPassword() {
    const password = $('#seniorPassword').val();
    if (password === 'cashier') {
        $('#seniorPasswordModal').modal('hide');
        $('#seniorDetailsModal').modal('show');
    } else {
        $('#passwordError').show();
        $('#seniorPassword').addClass('is-invalid');
    }
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'F11') {
        event.preventDefault();
        showSeniorPasswordPrompt();
    }
});

// PWD Discount Functions
function showPWDPasswordPrompt() {
    $('#pwdPasswordModal').modal('show');
    $('#pwdPassword').val('');
    $('#pwdPasswordError').hide();

    // Calculate Amount Availed based on the transaction total
    const totalAmount = parseFloat($('#totalTransactionDisplay').text().replace('₱', '')) || 0;
    
    // Fetch PWDDISCOUNT from the database
    $.ajax({
        url: 'fetch_discount.php', // Same endpoint as Senior Citizen
        method: 'GET',
        data: { configName: 'PWDDISCOUNT' },
        success: function(response) {
            const discountRate = parseFloat(response) || 0.05; // Fallback to 0.05 if the fetch fails
            const amountAvailed = totalAmount * discountRate;

            // Set the Amount Availed field when the details modal is about to show
            $('#pwdDetailsModal').on('show.bs.modal', function () {
                $('#pwdAmountAvailed').val(amountAvailed.toFixed(2));
            });
        },
        error: function() {
            console.error('Failed to fetch PWD discount rate, using default 0.05');
            const discountRate = 0.05; // Fallback value
            const amountAvailed = totalAmount * discountRate;

            $('#pwdDetailsModal').on('show.bs.modal', function () {
                $('#pwdAmountAvailed').val(amountAvailed.toFixed(2));
            });
        }
    });
}

function verifyPWDPassword() {
    const password = $('#pwdPassword').val();
    if (password === '1234') {
        $('#pwdPasswordModal').modal('hide');
        $('#pwdDetailsModal').modal('show');
    } else {
        $('#pwdPasswordError').show();
        $('#pwdPassword').addClass('is-invalid');
    }
}

function submitPWDDetails() {
    const name = $('#pwdName').val();
    const idNumber = $('#pwdId').val();
    const amountAvailed = $('#pwdAmountAvailed').val();

    if (name && idNumber) {
        const discountData = {
            name: name,
            idNumber: idNumber,
            amountAvailed: amountAvailed,
            discountType: 'PWD'
        };

        console.log('Applying PWD discount:', discountData);
        alert(`PWD discount applied for:\nName: ${name}\nID: ${idNumber}\nAmount Availed: ₱${amountAvailed}`);

        $('#pwdDetailsModal').modal('hide');
        $('#pwdForm')[0].reset();
        updateTransactionWithDiscount(discountData);
    } else {
        alert('Please fill all required fields!');
    }
}

// Add F12 key listener for PWD discount
document.addEventListener('keydown', function(event) {
    if (event.key === 'F12') {
        event.preventDefault();
        showPWDPasswordPrompt();
    }
});



function applyRegularDiscount() { alert('Regular discount applied'); }
function applySoloParent() { alert('Solo Parent discount applied'); }
function applyPWD() { alert('PWD discount applied'); }
function applyNAAC() { alert('NAAC discount applied'); }
function applyMedalOfValor() { alert('Medal of Valor discount applied'); }
    document.addEventListener("keydown", function(event) {
        switch (event.key) {
            case "F1":
                event.preventDefault();
                document.querySelector('a[accesskey="F1"]').click();
                break;
            case "F2":
                event.preventDefault();
                document.querySelector('a[accesskey="F2"]').click();
                break;
            case "F3":
                event.preventDefault();
                document.querySelector('a[accesskey="F3"]').click();
                break;
            case "F4":
                event.preventDefault();
                document.querySelector('a[accesskey="F4"]').click();
                break;
            case "F5":
                event.preventDefault();
                document.querySelector('a[accesskey="F5"]').click();
                break;
            case "F6":
                event.preventDefault();
                document.querySelector('a[accesskey="F6"]').click();
                break;
            case "F7":
                event.preventDefault();
                document.querySelector('a[accesskey="F7"]').click();
                if (document.getElementById('cashTenderModal').classList.contains('show')) {
                    calculateChange();
                }
                break;
            case "F8":
                event.preventDefault();
                document.querySelector('a[accesskey="F8"]').click();
                break;
            case "F9":
                event.preventDefault();
                document.querySelector('a[accesskey="F9"]').click();
                break;
            case "F10":
                event.preventDefault();
                document.querySelector('a[accesskey="F10"]').click();
                break;
            case "F11":
                event.preventDefault();
                let discountBtn = document.getElementById("discountDropdown");
                let discountMenu = new bootstrap.Dropdown(discountBtn);
                if (discountBtn.getAttribute("aria-expanded") === "true") {
                    discountMenu.hide();
                } else {
                    discountMenu.show();
                }
                break;
            case "F12":
                event.preventDefault();
                document.querySelector('a[accesskey="F12"]').click();
                break;
            default:
                break;
        }
    });
    $(document).ready(function() {
    // Function to handle F10 key press and click on payment type menu item
    function handlePaymentTypeAction(e) {
        if (e) e.preventDefault();
        showPaymentTypeModal();
    }

    // Attach click handler to the payment type menu item
    $('.dashboard[accesskey="F10"]').on('click', handlePaymentTypeAction);

    // Attach F10 key handler
    $(document).on('keydown', function(e) {
        if (e.which === 121) { // F10 key code
            handlePaymentTypeAction(e);
        }
    });

    // Function to get the current transaction total
    function getCurrentTransactionTotal() {
        return parseFloat($('#totalAmount').text().replace(/,/g, '')) || 0.00;
    }

    // Function to format currency amount
    function formatCurrency(amount) {
        return parseFloat(amount).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    // Function to show the Payment Type modal
    function showPaymentTypeModal() {
        const paymentTypeModal = $('<div>', {
            class: 'modal payment-type-modal',
            html: `
                <div style="background-color: #ffffff; border-radius: 12px; width: 90%; max-width: 400px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); overflow: hidden; animation: slideIn 0.3s ease-out; margin: auto;">
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; border-bottom: 1px solid #e5e7eb; background-color: #f9fafb;">
                        <h2 style="margin: 0; font-size: 20px; font-weight: 600; color: #1f2937;">Payment Type</h2>
                        <span class="close" style="font-size: 24px; color: #6b7280; cursor: pointer; transition: color 0.2s ease;">×</span>
                    </div>
                    <div class="payment-options" style="padding: 20px; display: flex; flex-direction: column; gap: 12px;">
                        <button class="payment-option" id="singlePayment" style="padding: 12px 16px; font-size: 16px; font-weight: 500; color: #ffffff; background-color: #10b981; border: none; border-radius: 8px; cursor: pointer; transition: background-color 0.2s ease, transform 0.1s ease;">SINGLE PAYMENT</button>
                        <button class="payment-option" id="multiplePayment" style="padding: 12px 16px; font-size: 16px; font-weight: 500; color: #ffffff; background-color: #3b82f6; border: none; border-radius: 8px; cursor: pointer; transition: background-color 0.2s ease, transform 0.1s ease;">MULTIPLE PAYMENT</button>
                    </div>
                </div>
            `,
            style: 'display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; display: flex; justify-content: center; align-items: center;'
        });

        // Add inline keyframes for animation
        const styleSheet = $('<style>').html(`
            @keyframes slideIn {
                from { transform: translateY(-20px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }
        `);
        $('head').append(styleSheet);

        // Add hover and active effects using jQuery
        paymentTypeModal.find('#singlePayment').on('mouseenter', function() {
            $(this).css({'background-color': '#059669', 'transform': 'translateY(-1px)'});
        }).on('mouseleave', function() {
            $(this).css({'background-color': '#10b981', 'transform': 'translateY(0)'});
        }).on('mousedown', function() {
            $(this).css('transform', 'translateY(0)');
        });

        paymentTypeModal.find('#multiplePayment').on('mouseenter', function() {
            $(this).css({'background-color': '#2563eb', 'transform': 'translateY(-1px)'});
        }).on('mouseleave', function() {
            $(this).css({'background-color': '#3b82f6', 'transform': 'translateY(0)'});
        }).on('mousedown', function() {
            $(this).css('transform', 'translateY(0)');
        });

        paymentTypeModal.find('.close').on('mouseenter', function() {
            $(this).css('color', '#1f2937');
        }).on('mouseleave', function() {
            $(this).css('color', '#6b7280');
        });

        // Add the modal to the body
        $('body').append(paymentTypeModal);
        paymentTypeModal.show();

        // Close modal when clicking the X
        paymentTypeModal.find('.close').on('click', function() {
            paymentTypeModal.remove();
        });

        // Handle Single Payment option
        $('#singlePayment').on('click', function() {
            paymentTypeModal.remove();
            showSinglePaymentModal();
        });

        // Handle Multiple Payment option
        $('#multiplePayment').on('click', function() {
            paymentTypeModal.remove();
            showMultiplePaymentModal();
        });
    }

    // Function to show the Single Payment modal
    // Function to show the Single Payment modal
function showSinglePaymentModal() {
    const currentTotal = getCurrentTransactionTotal();
    const formattedTotal = formatCurrency(currentTotal);
    const totalRetailValue = document.getElementById('totalRetailDisplay').innerText;

    const singlePaymentModal = $('<div>', {
        class: 'modal single-payment-modal',
        html: `
            <div style="background-color: #ffffff; border-radius: 12px; width: 90%; max-width: 400px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); overflow: hidden; animation: slideIn 0.3s ease-out; margin: auto;">
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; border-bottom: 1px solid #e5e7eb; background-color: #f9fafb;">
                    <h2 style="margin: 0; font-size: 20px; font-weight: 600; color: #1f2937;">Single Payment</h2>
                    <span class="close" style="font-size: 24px; color: #6b7280; cursor: pointer; transition: color 0.2s ease;">×</span>
                </div>
                <div style="padding: 20px; display: flex; flex-direction: column; gap: 16px;">
                    <div style="display: flex; align-items: center; background-color: #f3f4f6; padding: 10px; border-radius: 8px;">
                        <div style="font-size: 24px; color: #1f2937; margin-right: 8px;">₱</div>
                        <div style="font-size: 28px; font-weight: 500; color: #1f2937; flex-grow: 1;">${totalRetailValue.replace('₱', '')}</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <p style="margin: 0; font-size: 14px; color: #4b5563;">Press F1 to add Points</p>
                        <input type="text" class="points-input" style="width: 100px; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none;">
                    </div>
                    <div style="width: 100%;">
                        <select class="payment-method-select" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 16px; background-color: #ffffff; cursor: pointer;">
                            <option value="CASH">CASH</option>
                            <option value="CREDIT CARD">CREDIT CARD</option>
                            <option value="GIFT CARD">GIFT CARD</option>
                        </select>
                    </div>
                    <div class="payment-details" style="display: flex; flex-direction: column; gap: 12px;"></div>
                    <div style="display: flex; justify-content: flex-end; gap: 8px;">
                        <button class="confirm-btn" style="padding: 10px; background-color: #10b981; border: none; border-radius: 6px; cursor: pointer; transition: background-color 0.2s ease, transform 0.1s ease;">
                            <i class="material-icons" style="color: #ffffff; font-size: 24px;">check</i>
                        </button>
                        <button class="cancel-btn" style="padding: 10px; background-color: #ef4444; border: none; border-radius: 6px; cursor: pointer; transition: background-color 0.2s ease, transform 0.1s ease;">
                            <i class="material-icons" style="color: #ffffff; font-size: 24px;">close</i>
                        </button>
                    </div>
                </div>
            </div>
        `,
        style: 'display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; display: flex; justify-content: center; align-items: center;'
    });

    // Add the modal to the body
    $('body').append(singlePaymentModal);
    singlePaymentModal.show();

    // Add hover and active effects
    singlePaymentModal.find('.close').on('mouseenter', function() {
        $(this).css({'color': '#1f2937'});
    }).on('mouseleave', function() {
        $(this).css({'color': '#6b7280'});
    });

    singlePaymentModal.find('.confirm-btn').on('mouseenter', function() {
        $(this).css({'background-color': '#059669', 'transform': 'translateY(-1px)'});
    }).on('mouseleave', function() {
        $(this).css({'background-color': '#10b981', 'transform': 'translateY(0)'});
    }).on('mousedown', function() {
        $(this).css('transform', 'translateY(0)');
    });

    singlePaymentModal.find('.cancel-btn').on('mouseenter', function() {
        $(this).css({'background-color': '#dc2626', 'transform': 'translateY(-1px)'});
    }).on('mouseleave', function() {
        $(this).css({'background-color': '#ef4444', 'transform': 'translateY(0)'});
    }).on('mousedown', function() {
        $(this).css('transform', 'translateY(0)');
    });

    // Function to update payment details based on payment method
    function updatePaymentDetails() {
        const paymentMethod = singlePaymentModal.find('.payment-method-select').val();
        const $paymentDetails = singlePaymentModal.find('.payment-details');
        const amountDue = parseFloat(totalRetailValue.replace('₱', '')) || 0;

        $paymentDetails.empty();

        if (paymentMethod === 'CREDIT CARD') {
            $paymentDetails.append(`
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Card Name:</label>
                    <input type="text" class="card-name-input" placeholder="Enter cardholder name" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none;">
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Card Number:</label>
                    <input type="text" class="card-number-input" placeholder="Enter card number" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none;">
                </div>
            `);
        } else if (paymentMethod === 'CASH') {
            $paymentDetails.append(`
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Tender Amount:</label>
                    <div style="display: flex; align-items: center;">
                        <span style="background-color: #e0e0e0; border: 1px solid #d1d5db; border-right: none; padding: 8px; border-radius: 6px 0 0 6px; font-size: 14px; color: #1f2937;">₱</span>
                        <input type="number" class="tender-amount-input" step="0.01" placeholder="0.00" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-left: none; border-radius: 0 6px 6px 0; font-size: 14px; outline: none; background-color: #ffffff;">
                    </div>
                    <div class="tender-error" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;">Insufficient tender amount. Please enter at least ₱${amountDue.toFixed(2)}.</div>
                </div>
            `);

            // Real-time validation for tender amount
            singlePaymentModal.find('.tender-amount-input').on('input', function() {
                const tender = parseFloat($(this).val()) || 0;
                const $errorMessage = singlePaymentModal.find('.tender-error');
                const $confirmButton = singlePaymentModal.find('.confirm-btn');

                if (tender < amountDue) {
                    $errorMessage.show();
                    $(this).css({'border-color': '#dc3545', 'background-color': '#fff5f5'});
                    $confirmButton.prop('disabled', true).css({
                        'background-color': '#6c757d',
                        'cursor': 'not-allowed',
                        'opacity': '0.65'
                    });
                } else {
                    $errorMessage.hide();
                    $(this).css({'border-color': '#d1d5db', 'background-color': '#ffffff'});
                    $confirmButton.prop('disabled', false).css({
                        'background-color': '#10b981',
                        'cursor': 'pointer',
                        'opacity': '1'
                    });
                }
            });
        } else if (paymentMethod === 'GIFT CARD') {
            $paymentDetails.append(`
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Gift Card Number:</label>
                    <input type="text" class="gift-card-number-input" placeholder="Enter gift card number" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none;">
                </div>
            `);
        }
    }

    // Initial call to set up payment details
    updatePaymentDetails();

    // Update payment details when payment method changes
    singlePaymentModal.find('.payment-method-select').on('change', updatePaymentDetails);

    // Close modal when clicking the X or cancel button
    singlePaymentModal.find('.close, .cancel-btn').on('click', function() {
        singlePaymentModal.remove();
        $(document).off('keydown.pointsHandler');
    });

    // Confirm button handler
    singlePaymentModal.find('.confirm-btn').on('click', function() {
        const paymentMethod = singlePaymentModal.find('.payment-method-select').val();
        const amountDue = parseFloat(totalRetailValue.replace('₱', '')) || 0;

        // Validation based on payment method
        if (paymentMethod === 'CREDIT CARD') {
            const cardName = singlePaymentModal.find('.card-name-input').val().trim();
            const cardNumber = singlePaymentModal.find('.card-number-input').val().trim();
            if (!cardName || !cardNumber) {
                alert('Please enter both Card Name and Card Number.');
                return;
            }
        } else if (paymentMethod === 'CASH') {
            const tender = parseFloat(singlePaymentModal.find('.tender-amount-input').val()) || 0;
            if (tender < amountDue) {
                alert('Insufficient tender amount. Please enter at least ₱' + amountDue.toFixed(2) + '.');
                return;
            }
            // Update tender and change displays for receipt
            $('#tenderDisplay').text(`₱${tender.toFixed(2)}`);
            $('#changeDisplay').text(`₱${(tender - amountDue).toFixed(2)}`);
        } else if (paymentMethod === 'GIFT CARD') {
            const giftCardNumber = singlePaymentModal.find('.gift-card-number-input').val().trim();
            if (!giftCardNumber) {
                alert('Please enter the Gift Card Number.');
                return;
            }
            // For simplicity, set tender and change to 0 for non-cash payments
            $('#tenderDisplay').text(`₱0.00`);
            $('#changeDisplay').text(`₱0.00`);
        }

        console.log('Processing payment of ' + formattedTotal + ' with ' + paymentMethod);
        singlePaymentModal.remove();
        $(document).off('keydown.pointsHandler');

        // Print receipt and reload page
        printReceipt();
        setTimeout(() => {
            location.reload();
        }, 500); // Delay to ensure print dialog closes
    });

    // F1 key handler for adding points
    $(document).on('keydown.pointsHandler', function(e) {
        if (e.which === 112) { // F1 key code
            singlePaymentModal.find('.points-input').focus();
        }
    });
}

    // Function to show the Multiple Payment modal
// Function to show the Multiple Payment modal
function showMultiplePaymentModal() {
    const currentTotal = getCurrentTransactionTotal();
    const formattedTotal = formatCurrency(currentTotal);
    const totalRetailValue = document.getElementById('totalRetailDisplay').innerText;
    const amountDue = parseFloat(totalRetailValue.replace('₱', '')) || 0;
    let totalPaid = 0; // Track total paid amount
    const payments = []; // Store payment details

    const multiplePaymentModal = $('<div>', {
        class: 'modal multiple-payment-modal',
        html: `
            <div style="background-color: #ffffff; border-radius: 12px; width: 90%; max-width: 450px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); overflow: hidden; animation: slideIn 0.3s ease-out; margin: auto;">
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; border-bottom: 1px solid #e5e7eb; background-color: #f9fafb;">
                    <h2 style="margin: 0; font-size: 20px; font-weight: 600; color: #1f2937;">Multiple Payment</h2>
                    <span class="close" style="font-size: 24px; color: #6b7280; cursor: pointer; transition: color 0.2s ease;">×</span>
                </div>
                <div style="padding: 20px; display: flex; flex-direction: column; gap: 16px;">
                    <div style="display: flex; align-items: center; background-color: #f3f4f6; padding: 10px; border-radius: 8px;">
                        <div style="font-size: 24px; color: #1f2937; margin-right: 8px;">₱</div>
                        <div class="amount-due" style="font-size: 28px; font-weight: 500; color: #1f2937; flex-grow: 1;">${totalRetailValue.replace('₱', '')}</div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <p style="margin: 0; font-size: 14px; color: #4b5563;">Remaining Balance:</p>
                        <p class="remaining-balance" style="margin: 0; font-size: 14px; font-weight: 500; color: #1f2937;">₱${amountDue.toFixed(2)}</p>
                    </div>
                    <div style="width: 100%;">
                        <select class="payment-method-select" style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 16px; background-color: #ffffff; cursor: pointer;">
                            <option value="CASH">CASH</option>
                            <option value="CREDIT CARD">CREDIT CARD</option>
                            <option value="GIFT CARD">GIFT CARD</option>
                        </select>
                    </div>
                    <div class="payment-details" style="display: flex; flex-direction: column; gap: 12px;"></div>
                    <button class="add-payment-btn" style="padding: 10px; background-color: #3b82f6; border: none; border-radius: 6px; cursor: pointer; color: #ffffff; font-size: 14px; transition: background-color 0.2s ease, transform 0.1s ease;">Add Payment</button>
                    <div class="payment-list" style="max-height: 150px; overflow-y: auto; border: 1px solid #d1d5db; border-radius: 6px; padding: 10px; display: flex; flex-direction: column; gap: 8px;"></div>
                    <div style="display: flex; justify-content: flex-end; gap: 8px;">
                        <button class="confirm-btn" disabled style="padding: 10px; background-color: #6c757d; border: none; border-radius: 6px; cursor: not-allowed; opacity: 0.65; transition: background-color 0.2s ease, transform 0.1s ease;">
                            <i class="material-icons" style="color: #ffffff; font-size: 24px;">check</i>
                        </button>
                        <button class="cancel-btn" style="padding: 10px; background-color: #ef4444; border: none; border-radius: 6px; cursor: pointer; transition: background-color 0.2s ease, transform 0.1s ease;">
                            <i class="material-icons" style="color: #ffffff; font-size: 24px;">close</i>
                        </button>
                    </div>
                </div>
            </div>
        `,
        style: 'display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; display: flex; justify-content: center; align-items: center;'
    });

    // Add the modal to the body
    $('body').append(multiplePaymentModal);
    multiplePaymentModal.show();

    // Add hover and active effects
    multiplePaymentModal.find('.close').on('mouseenter', function() {
        $(this).css({'color': '#1f2937'});
    }).on('mouseleave', function() {
        $(this).css({'color': '#6b7280'});
    });

    multiplePaymentModal.find('.confirm-btn').on('mouseenter', function() {
        if (!$(this).prop('disabled')) {
            $(this).css({'background-color': '#059669', 'transform': 'translateY(-1px)'});
        }
    }).on('mouseleave', function() {
        if (!$(this).prop('disabled')) {
            $(this).css({'background-color': '#10b981', 'transform': 'translateY(0)'});
        }
    }).on('mousedown', function() {
        if (!$(this).prop('disabled')) {
            $(this).css('transform', 'translateY(0)');
        }
    });

    multiplePaymentModal.find('.cancel-btn').on('mouseenter', function() {
        $(this).css({'background-color': '#dc2626', 'transform': 'translateY(-1px)'});
    }).on('mouseleave', function() {
        $(this).css({'background-color': '#ef4444', 'transform': 'translateY(0)'});
    }).on('mousedown', function() {
        $(this).css('transform', 'translateY(0)');
    });

    multiplePaymentModal.find('.add-payment-btn').on('mouseenter', function() {
        if (!$(this).prop('disabled')) {
            $(this).css({'background-color': '#2563eb', 'transform': 'translateY(-1px)'});
        }
    }).on('mouseleave', function() {
        if (!$(this).prop('disabled')) {
            $(this).css({'background-color': '#3b82f6', 'transform': 'translateY(0)'});
        }
    }).on('mousedown', function() {
        if (!$(this).prop('disabled')) {
            $(this).css('transform', 'translateY(0)');
        }
    });

    // Function to update payment details based on payment method
    function updatePaymentDetails() {
        const paymentMethod = multiplePaymentModal.find('.payment-method-select').val();
        const $paymentDetails = multiplePaymentModal.find('.payment-details');
        const remainingBalance = amountDue - totalPaid;
        const minAmount = remainingBalance > 0 ? remainingBalance : 0; // Minimum amount to cover remaining balance

        $paymentDetails.empty();

        if (paymentMethod === 'CREDIT CARD') {
            $paymentDetails.append(`
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Card Name:</label>
                    <input type="text" class="card-name-input" placeholder="Enter cardholder name" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none;">
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Card Number:</label>
                    <input type="text" class="card-number-input" placeholder="Enter card number" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none;">
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Amount:</label>
                    <div style="display: flex; align-items: center;">
                        <span style="background-color: #e0e0e0; border: 1px solid #d1d5db; border-right: none; padding: 8px; border-radius: 6px 0 0 6px; font-size: 14px; color: #1f2937;">₱</span>
                        <input type="number" class="payment-amount-input" step="0.01" placeholder="0.00" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-left: none; border-radius: 0 6px 6px 0; font-size: 14px; outline: none; background-color: #ffffff;">
                    </div>
                </div>
            `);

            // Enable Add Payment button for non-CASH methods
            multiplePaymentModal.find('.add-payment-btn').prop('disabled', false).css({
                'background-color': '#3b82f6',
                'cursor': 'pointer',
                'opacity': '1'
            });
        } else if (paymentMethod === 'CASH') {
            $paymentDetails.append(`
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Tender Amount:</label>
                    <div style="display: flex; align-items: center;">
                        <span style="background-color: #e0e0e0; border: 1px solid #d1d5db; border-right: none; padding: 8px; border-radius: 6px 0 0 6px; font-size: 14px; color: #1f2937;">₱</span>
                        <input type="number" class="tender-amount-input" step="0.01" placeholder="0.00" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-left: none; border-radius: 0 6px 6px 0; font-size: 14px; outline: none; background-color: #ffffff;">
                    </div>
                    <div class="tender-error" style="color: #dc3545; font-size: 12px; margin-top: 5px; display: none;">Insufficient tender amount. Please enter at least ₱${minAmount.toFixed(2)}.</div>
                </div>
            `);

            // Real-time validation for tender amount
            multiplePaymentModal.find('.tender-amount-input').on('input', function() {
                const tender = parseFloat($(this).val()) || 0;
                const $errorMessage = multiplePaymentModal.find('.tender-error');
                const $addButton = multiplePaymentModal.find('.add-payment-btn');

                if (tender < minAmount) {
                    $errorMessage.show();
                    $(this).css({'border-color': '#dc3545', 'background-color': '#fff5f5'});
                    $addButton.prop('disabled', true).css({
                        'background-color': '#6c757d',
                        'cursor': 'not-allowed',
                        'opacity': '0.65'
                    });
                } else {
                    $errorMessage.hide();
                    $(this).css({'border-color': '#d1d5db', 'background-color': '#ffffff'});
                    $addButton.prop('disabled', false).css({
                        'background-color': '#3b82f6',
                        'cursor': 'pointer',
                        'opacity': '1'
                    });
                }
            });
        } else if (paymentMethod === 'GIFT CARD') {
            $paymentDetails.append(`
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Gift Card Number:</label>
                    <input type="text" class="gift-card-number-input" placeholder="Enter gift card number" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; font-size: 14px; outline: none;">
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <label style="font-size: 14px; color: #4b5563;">Amount:</label>
                    <div style="display: flex; align-items: center;">
                        <span style="background-color: #e0e0e0; border: 1px solid #d1d5db; border-right: none; padding: 8px; border-radius: 6px 0 0 6px; font-size: 14px; color: #1f2937;">₱</span>
                        <input type="number" class="payment-amount-input" step="0.01" placeholder="0.00" style="width: 100%; padding: 8px; border: 1px solid #d1d5db; border-left: none; border-radius: 0 6px 6px 0; font-size: 14px; outline: none; background-color: #ffffff;">
                    </div>
                </div>
            `);

            // Enable Add Payment button for non-CASH methods
            multiplePaymentModal.find('.add-payment-btn').prop('disabled', false).css({
                'background-color': '#3b82f6',
                'cursor': 'pointer',
                'opacity': '1'
            });
        }
    }

    // Initial call to set up payment details
    updatePaymentDetails();

    // Update payment details when payment method changes
    multiplePaymentModal.find('.payment-method-select').on('change', function() {
        updatePaymentDetails();
        // Reset Add Payment button state when switching methods
        const $addButton = multiplePaymentModal.find('.add-payment-btn');
        if ($(this).val() !== 'CASH') {
            $addButton.prop('disabled', false).css({
                'background-color': '#3b82f6',
                'cursor': 'pointer',
                'opacity': '1'
            });
        }
    });

    // Add payment button handler
    multiplePaymentModal.find('.add-payment-btn').on('click', function() {
        const paymentMethod = multiplePaymentModal.find('.payment-method-select').val();
        let paymentDetails = {};
        let amount = 0;
        const remainingBalance = amountDue - totalPaid;

        // Validate and collect payment details
        if (paymentMethod === 'CREDIT CARD') {
            const cardName = multiplePaymentModal.find('.card-name-input').val().trim();
            const cardNumber = multiplePaymentModal.find('.card-number-input').val().trim();
            amount = parseFloat(multiplePaymentModal.find('.payment-amount-input').val()) || 0;

            if (!cardName || !cardNumber || amount <= 0) {
                alert('Please enter Card Name, Card Number, and a valid amount.');
                return;
            }
            paymentDetails = {
                method: 'CREDIT CARD',
                cardName: cardName,
                cardNumber: cardNumber,
                amount: amount
            };
        } else if (paymentMethod === 'CASH') {
            amount = parseFloat(multiplePaymentModal.find('.tender-amount-input').val()) || 0;
            const minAmount = remainingBalance > 0 ? remainingBalance : 0;
            if (amount < minAmount) {
                alert('Insufficient tender amount. Please enter at least ₱' + minAmount.toFixed(2) + '.');
                return;
            }
            paymentDetails = {
                method: 'CASH',
                amount: amount
            };
        } else if (paymentMethod === 'GIFT CARD') {
            const giftCardNumber = multiplePaymentModal.find('.gift-card-number-input').val().trim();
            amount = parseFloat(multiplePaymentModal.find('.payment-amount-input').val()) || 0;

            if (!giftCardNumber || amount <= 0) {
                alert('Please enter Gift Card Number and a valid amount.');
                return;
            }
            paymentDetails = {
                method: 'GIFT CARD',
                giftCardNumber: giftCardNumber,
                amount: amount
            };
        }

        // Add payment to the list
        payments.push(paymentDetails);
        totalPaid += amount;

        // Update payment list display
        const $paymentList = multiplePaymentModal.find('.payment-list');
        $paymentList.append(`
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 5px; border-bottom: 1px solid #e5e7eb;">
                <span style="font-size: 14px; color: #1f2937;">${paymentDetails.method} - ₱${amount.toFixed(2)}</span>
                <button class="remove-payment-btn" style="background: none; border: none; color: #ef4444; cursor: pointer; font-size: 12px;">Remove</button>
            </div>
        `);

        // Update remaining balance
        multiplePaymentModal.find('.remaining-balance').text(`₱${remainingBalance.toFixed(2)}`);

        // Enable Confirm button if total paid is sufficient
        const $confirmButton = multiplePaymentModal.find('.confirm-btn');
        if (totalPaid >= amountDue) {
            $confirmButton.prop('disabled', false).css({
                'background-color': '#10b981',
                'cursor': 'pointer',
                'opacity': '1'
            });
        } else {
            $confirmButton.prop('disabled', true).css({
                'background-color': '#6c757d',
                'cursor': 'not-allowed',
                'opacity': '0.65'
            });
        }

        // Reset input fields
        updatePaymentDetails();
    });

    // Remove payment handler
    multiplePaymentModal.on('click', '.remove-payment-btn', function() {
        const $paymentEntry = $(this).closest('div');
        const index = $paymentEntry.index();
        const payment = payments[index];
        totalPaid -= payment.amount;
        payments.splice(index, 1);
        $paymentEntry.remove();

        // Update remaining balance
        const remainingBalance = amountDue - totalPaid;
        multiplePaymentModal.find('.remaining-balance').text(`₱${remainingBalance.toFixed(2)}`);

        // Update Confirm button state
        const $confirmButton = multiplePaymentModal.find('.confirm-btn');
        if (totalPaid >= amountDue) {
            $confirmButton.prop('disabled', false).css({
                'background-color': '#10b981',
                'cursor': 'pointer',
                'opacity': '1'
            });
        } else {
            $confirmButton.prop('disabled', true).css({
                'background-color': '#6c757d',
                'cursor': 'not-allowed',
                'opacity': '0.65'
            });
        }

        // Update payment details to reflect new remaining balance
        updatePaymentDetails();
    });

    // Close modal when clicking the X or cancel button
    multiplePaymentModal.find('.close, .cancel-btn').on('click', function() {
        multiplePaymentModal.remove();
    });

    // Confirm button handler
    multiplePaymentModal.find('.confirm-btn').on('click', function() {
        if (totalPaid < amountDue) {
            alert('Total payments are insufficient. Please add more payments to cover ₱' + amountDue.toFixed(2) + '.');
            return;
        }

        // Calculate total cash for tender and change (if any)
        let totalCash = payments
            .filter(p => p.method === 'CASH')
            .reduce((sum, p) => sum + p.amount, 0);
        let change = totalCash > amountDue ? totalCash - amountDue : 0;

        // Update tender and change displays for receipt
        $('#tenderDisplay').text(`₱${totalCash.toFixed(2)}`);
        $('#changeDisplay').text(`₱${change.toFixed(2)}`);

        console.log('Processing multiple payments:', payments);
        multiplePaymentModal.remove();

        // Print receipt and reload page
        printReceipt();
        setTimeout(() => {
            location.reload();
        }, 500); // Delay to ensure print dialog closes
    });
}
});

function syncAmountDue() {
    const finalTotal = parseFloat($('#totalTransactionDisplay').text().replace('₱', '')) || 0;
    $('#amountDue').val(finalTotal.toFixed(2));
    $('#tenderInput').val('');
    $('#changeOutput').val('0.00');
}$('#cashTenderModal').on('shown.bs.modal', syncAmountDue);

let submitClickCount = 0; // Counter for Submit button clicks

// Real-time change calculation on tender input
$('#tenderInput').on('input', function() {
    calculateChange();
});

// Function to calculate change in real-time
// Function to calculate change in real-time and validate tender
function calculateChange() {
    const amountDue = parseFloat($('#amountDue').val()) || 0; // Get the amount due
    const tender = parseFloat($('#tenderInput').val()) || 0; // Get the tender amount
    const $changeOutput = $('#changeOutput');
    const $tenderInput = $('#tenderInput');
    const $submitButton = $('#cashTenderModal .btn-success');
    const $errorMessage = $('#tenderErrorMessage');

    // Calculate the change
    const change = tender - amountDue;

    // Update the change output field
    $changeOutput.val(change.toFixed(2));

    // Validate tender amount
    if (tender < amountDue) {
        // Show error message
        if ($errorMessage.length === 0) {
            // Create error message element if it doesn't exist
            $('#cashTenderModal .modal-body').append(
                '<div id="tenderErrorMessage" style="color: red; font-size: 12px; margin-top: 5px;">Insufficient tender amount. Please enter at least ₱' +
                amountDue.toFixed(2) +
                '.</div>'
            );
        }
        // Style tender input to indicate error
        $tenderInput.addClass('is-invalid');
        // Disable submit button
        $submitButton.prop('disabled', true);
    } else {
        // Clear error message and styling
        $errorMessage.remove();
        $tenderInput.removeClass('is-invalid');
        // Enable submit button
        $submitButton.prop('disabled', false);
    }
}

// Event listener for the Submit button to print receipt
$('#cashTenderModal .btn-success').on('click', function() {
    const amountDue = parseFloat($('#amountDue').val()) || 0;
    const tender = parseFloat($('#tenderInput').val()) || 0;
    const change = parseFloat($('#changeOutput').val()) || 0;

    // Double-check tender amount
    if (tender < amountDue) {
        alert('Error: Insufficient tender amount. Please enter at least ₱' + amountDue.toFixed(2) + '.');
        return;
    }

    // Update the Transaction Details section with tender and change
    $('#tenderDisplay').text(`₱${tender.toFixed(2)}`);
    $('#changeDisplay').text(`₱${change.toFixed(2)}`);

    // Close the modal
    $('#cashTenderModal').modal('hide');

    // Call the function to print the receipt
    printReceipt();
});

// Sync amount due when modal is shown and initialize fields
$('#cashTenderModal').on('shown.bs.modal', function() {
    syncAmountDue();
    $('#tenderInput').val('').focus();
    $('#changeOutput').val('0.00');
    $('#tenderErrorMessage').remove(); // Clear any existing error message
    $('#tenderInput').removeClass('is-invalid'); // Clear invalid styling
    $('#cashTenderModal .btn-success').prop('disabled', false); // Ensure submit button is enabled initially
});

    document.getElementById('cashTenderModal').addEventListener('shown.bs.modal', function () {
        const totalElement = document.querySelector('.col-md-8.text-right.d-flex.justify-content-end');
        const totalValue = totalElement.textContent.replace('₱', '').trim();
        document.getElementById('amountDue').value = totalValue || '0.00';
        document.getElementById('tenderInput').value = '';
        document.getElementById('changeOutput').value = '0.00';
        document.getElementById('tenderInput').focus();
    });

    function generateReceipt() {
    const cart = window.cart || []; // Access the cart array (ensure it's globally accessible)
    const totalAmount = parseFloat($('#totalTransactionDisplay').text().replace('₱', '')) || 0;
    const tender = parseFloat(document.getElementById('tenderDisplay').textContent.replace('₱', '')) || 0;
    const change = parseFloat(document.getElementById('changeDisplay').textContent.replace('₱', '')) || 0;
    const terminalNo = document.getElementById('terminal-display').textContent || 'N/A';
    const transactionNo = '000-0000108'; // You can dynamically generate this
    const cashier = 'ADMIN'; // Replace with actual cashier name if available
    const dateTime = new Date().toLocaleString('en-US', { 
        year: 'numeric', month: 'numeric', day: 'numeric', 
        hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true 
    });

    let receiptContent = `
        <div style="font-family: monospace; text-align: center; padding: 20px;">
            <h4>AAA GROCERY</h4>
            <p>101 SAN PASCUAL, TALAVERA, N.E.</p>
            <p>VAT-REG - TIN 000-000-000-000</p>
            <p>MIN 123456781011213</p>
            <hr>
            <p style="text-align: left;">SI No.: 0000000036</p>
            <p style="text-align: left;">Date-Time: ${dateTime}</p>
            <p style="text-align: left;">Name: __________________________</p>
            <p style="text-align: left;">TIN: __________________________</p>
            <hr>
    `;

    cart.forEach(item => {
        receiptContent += `
            <p style="text-align: left;">${item.name} ${item.quantity} x ₱${item.price.toFixed(2)}</p>
            <p style="text-align: right;">₱${item.totalPrice.toFixed(2)}</p>
        `;
    });

    receiptContent += `
            <hr>
            <p style="text-align: left;">No. of Items: ${cart.length}</p>
            <hr>
            <p style="text-align: left;">TOTAL ₱${totalAmount.toFixed(2)}</p>
            <p style="text-align: left;">CASH ₱${tender.toFixed(2)}</p>
            <p style="text-align: left;">CHANGE ₱${change.toFixed(2)}</p>
            <hr>
            <p style="text-align: left;">Cashier: ${cashier}</p>
            <p style="text-align: left;">Terminal No.: ${terminalNo}</p>
            <p style="text-align: left;">Txn No.: ${transactionNo}</p>
            <hr>
            <p style="text-align: left;">VATABLE Sale (T) ₱${totalAmount.toFixed(2)}</p>
            <p style="text-align: left;">VAT-Exempt Sale (X) ₱0.00</p>
            <p style="text-align: left;">VAT Zero Rated Sale (Z) ₱0.00</p>
            <p style="text-align: left;">VAT ₱0.00</p>
            <p style="text-align: left;">Total ₱${totalAmount.toFixed(2)}</p>
            <hr>
            <p>THANK YOU!!!</p>
            <p>THIS SERVES AS YOUR INVOICE</p>
            <hr>
            <p>ISYNERGIES, INCORPORATED</p>
            <p>105 MAHARLIKA HIGHWAY, CABANATUAN CITY</p>
            <p>VAT-REG TIN 429-357-807-000</p>
            <p>ACCR # 000-000000000-0000</p>
            <p>ACCR DATE: 01/01/0001</p>
        </div>
    `;

    const receiptModal = `
        <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="receiptModalLabel">Transaction Receipt</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ${receiptContent}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="printReceipt()">Print</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    $('body').append(receiptModal);
    $('#receiptModal').modal('show');
    $('#receiptModal').on('hidden.bs.modal', function () {
        $(this).remove();
    });
}

// LYKA ITO YUNG RESIBO
function printReceipt() {
    // Function to clean and parse numeric values
    const parseNumber = (text) => {
        if (!text) return 0;
        const cleanedText = text.replace(/[^0-9.]/g, '');
        const number = parseFloat(cleanedText);
        return isNaN(number) ? 0 : number;
    };

    // Gather transaction details
    const transactionNo = $('table.table-borderless tbody tr').eq(1).find('td').text().trim(); // Transaction No
    const total = parseNumber($('#totalTransactionDisplay').text().trim()); // TOTAL
    const tender = parseNumber($('#tenderDisplay').text().trim()); // Tender
    const change = parseNumber($('#changeDisplay').text().trim()); // Change
    const terminalNo = $('table.table-borderless tbody tr').eq(0).find('td').text().trim(); // Terminal No

    // Gather items from the cart (only for printing the receipt)
    let items = [];
    cart.forEach(item => {
        items.push({
            barcode: item.barcode,
            name: item.name,
            quantity: item.quantity,
            price: item.price,
            totalPrice: item.totalPrice
        });
    });

    // Prepare transaction data to send to the server (only the required fields)
    const transactionData = {
        transactionNo: transactionNo,
        transactionDateTime: new Date().toISOString(), // Current date and time in ISO format
        cashier: "CASHIER", // Static value as requested
        totalAmount: total, // Needed for printing receipt
        tender: tender, // Needed for printing receipt
        change: change, // Needed for printing receipt
        items: items, // Needed for printing receipt
        terminalNo: terminalNo // Needed for printing receipt
    };

    // Save the transaction to the database via AJAX
    $.ajax({
        url: 'save_transaction.php', // The PHP script to handle database insertion
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(transactionData),
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Proceed with printing the receipt after successful save
                printReceiptContent(transactionData);

                // Reset the transaction and reload the page
                resetTransaction();
                setTimeout(() => {
                    location.reload();
                }, 500); // Delay to ensure print dialog closes
            } else {
                alert('Error saving transaction: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error saving transaction:', xhr.responseText);
            alert('Server error. Could not save transaction.');
        }
    });
}

// Helper function to handle the actual printing of the receipt
function printReceiptContent(transactionData) {
    const { transactionNo, totalAmount, tender, change, items, terminalNo, cashier } = transactionData;

    // Function to center text within a 40-character width
    const centerText = (text, width = 40) => {
        const padding = Math.floor((width - text.length) / 2);
        return ' '.repeat(padding) + text + ' '.repeat(padding);
    };

    // Format the receipt content
    let receiptContent = `
${centerText('AAA COMPANY')}
${centerText('#101 SAN PASCUAL, TALAVERA, N.E.')}
${centerText('VAT-REG - TIN 000-000-000-000')}
${centerText('MIN 12345678910111213')}
----------------------------------------
SI No. 0000000036
Date-Time: ${new Date().toLocaleString('en-US', { year: 'numeric', month: 'numeric', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true })}
Name: ___________________________
Address: ________________________
TIN: ___________________________
`;

    // Add items
    items.forEach((item) => {
        receiptContent += `${item.name.padEnd(36, ' ')} ${item.totalPrice.toFixed(2).padStart(7, ' ')}\n`;
        receiptContent += `SEASONING ${Math.floor(item.quantity).toString().padStart(3, '0')}X${item.price.toFixed(2).padStart(5, ' ')} ${item.totalPrice.toFixed(2).padStart(7, ' ')}\n`;
    });

    // Add summary and footer
    receiptContent += `
No. of Items: ${items.length.toString().padStart(2, ' ')}
----------------------------------------
TOTAL                                 P${totalAmount.toFixed(2).padStart(7, ' ')}
CASH                                  P${tender.toFixed(2).padStart(7, ' ')}
CHANGE                                P${change.toFixed(2).padStart(7, ' ')}
----------------------------------------
Cashier: ${cashier}
Terminal No. ${terminalNo}
Txn No.: ${transactionNo}
----------------------------------------
VATable Sale                           P${totalAmount.toFixed(2).padStart(7, ' ')}
VAT-Exempt Sale (X)                   P0.00
VAT Zero Rated Sale (Z)               P0.00
VAT                                   P0.00
----------------------------------------
TOTAL                                 P${totalAmount.toFixed(2).padStart(7, ' ')}
----------------------------------------
${centerText('THANK YOU!!!')}
${centerText('THIS SERVES AS YOUR INVOICE')}
----------------------------------------
${centerText('ISYNERGIES, INCORPORATED')}
${centerText('105 MAHARLIKA HIGHWAY, CABANATUAN CITY')}
${centerText('VAT-REG-TIN 429-387-807-000')}
${centerText('ACCR.# 000-000000000-00000')}
${centerText('DATE: 01/01/0001')}
${centerText('PTU#: 0000000-000000-00000')}
----------------------------------------
${centerText('PLEASE BRING THIS RECEIPT IF')}
${centerText('YOU WISH TO EXCHANGE THIS ITEM')}
${centerText('SUBJECT TO THE ACCEPTANCE')}
${centerText('POLICY OF THE COMPANY')}
`;

    // Open a new window and print the receipt
    const printWindow = window.open('', '_blank');
    printWindow.document.write('<pre style="font-family: monospace; font-size: 12px; white-space: pre;">' + receiptContent + '</pre>');
    printWindow.document.close();
    printWindow.print();
    printWindow.close();

    // Call resetTransaction and reload the page with a slight delay
    resetTransaction();
    setTimeout(() => {
        location.reload();
    }, 500); // Delay of 500ms to ensure print dialog closes
}

// HANGGANG DITO LYKAAAAAAAAAAAAAAAAAAAAAAAAAAAA

// Function to reset the transaction after printing (optional)
function resetTransaction() {
    // Clear the table
    $('table#table-bold tbody').empty();
    $('table#table-bold tbody').append(`
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    `);

    // Reset transaction details
    $('table.table-borderless tbody tr').eq(1).find('td').text(''); // Transaction No
    $('table.table-borderless tbody tr').eq(2).find('td').text('0'); // # of Item
    $('table.table-borderless tbody tr').eq(3).find('td').text('₱0.00'); // Amount
    $('table.table-borderless tbody tr').eq(6).find('td').text('₱0.00'); // TOTAL
    $('#tenderDisplay').text('₱0.00'); // Tender
    $('#changeDisplay').text('₱0.00'); // Change

    // Reset retail display
    $('#totalRetailDisplay').text('₱0.00');

    // Reset tender modal inputs
    $('#tenderInput').val('');
    $('#changeOutput').val('0.00');
}
// SEARCH PRODUCT F4

$(document).ready(function() {
    // Search functionality for product filter in F4 modal
    $('#productFilter').on('input', function() {
        const query = $(this).val().trim();
        const $filterResults = $('#filterResults');
        
        if (query.length >= 2) {
            $.ajax({
                url: 'search.php', // Ensure this points to the correct endpoint
                method: 'POST',
                data: { query: query },
                dataType: 'json',
                success: function(response) {
                    $filterResults.empty();
                    if (response.status === 'success' && response.products.length > 0) {
                        response.products.forEach(product => {
                            const item = `
                                <div class="search-item" 
                                     data-value="${product.Barcode}" 
                                     data-name="${product.ProductName}" 
                                     data-price="${product.SRP}" 
                                     data-barcode="${product.Barcode}"
                                     data-quantity="${product.Quantity || 0}"
                                     style="padding: 10px; cursor: pointer; border-bottom: 1px solid #eee;">
                                    ${product.ProductName} (Barcode: ${product.Barcode})
                                </div>
                            `;
                            $filterResults.append(item);
                        });
                        $filterResults.show();
                    } else {
                        $filterResults.append('<div style="padding: 10px;">No products found</div>');
                        $filterResults.show();
                    }
                },
                error: function() {
                    $filterResults.html('<div style="padding: 10px; color: red;">Error fetching products</div>');
                    $filterResults.show();
                }
            });
        } else {
            $filterResults.hide();
            $filterResults.empty();
        }
    });

    // Hide filter results when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#productFilter, #filterResults').length) {
            $('#filterResults').hide();
        }
    });

    // Handle selection from filter results
    $(document).on('click', '#filterResults .search-item', function() {
        const barcode = $(this).data('barcode');
        const name = $(this).data('name');
        const price = parseFloat($(this).data('price'));
        const quantity = parseInt($(this).data('quantity'));

        // Update table in the modal with the selected product
        const $tableBody = $('#productTable tbody');
        $tableBody.empty();
        $tableBody.append(`
            <tr class="product-row" 
                data-barcode="${barcode}" 
                data-name="${name}" 
                data-price="${price}" 
                data-quantity="${quantity}">
                <td>${name}</td>
                <td>${barcode}</td>
            </tr>
        `);

        // Populate right section fields in the modal
        $('#productBarcode').val(barcode);
        $('#quantityAvailable').val(quantity);
        $('#quantity').val(1);
        $('#priceType').val('retail');
        $('#sellingPrice').val(price.toFixed(2));
        $('#total').val(price.toFixed(2));

        $('#filterResults').hide();
        $('#productFilter').val('');
    });

    // Handle table row click to populate right section
    $(document).on('click', '#productTable .product-row', function() {
        const $row = $(this);
        $('#productTable tbody tr').removeClass('table-primary');
        $row.addClass('table-primary');

        const barcode = $row.data('barcode');
        const name = $row.data('name');
        const price = parseFloat($row.data('price'));
        const quantity = parseInt($row.data('quantity'));

        $('#productBarcode').val(barcode);
        $('#quantityAvailable').val(quantity);
        $('#quantity').val(1);
        $('#priceType').val('retail');
        $('#sellingPrice').val(price.toFixed(2));
        $('#total').val(price.toFixed(2));
    });

    // Update total when quantity or price type changes
    function updateTotal() {
        const quantity = parseInt($('#quantity').val()) || 1;
        const priceType = $('#priceType').val();
        let price = parseFloat($('#sellingPrice').val()) || 0;

        if (priceType === 'wholesale') {
            price *= 0.9; // Example: 10% discount for wholesale
        }

        const total = quantity * price;
        $('#total').val(total.toFixed(2));
    }

    $('#quantity').on('input', updateTotal);
    $('#priceType').on('change', updateTotal);

    // Add product to cart
    $('#addProductBtn').on('click', function() {
        const barcode = $('#productBarcode').val();
        const name = $('#productTable tbody tr').data('name');
        const price = parseFloat($('#sellingPrice').val());
        const quantity = parseInt($('#quantity').val());
        const quantityAvailable = parseInt($('#quantityAvailable').val()) || 0;

        if (!barcode || !name || !price) {
            alert('Please select a product first.');
            return;
        }

        if (quantity <= 0) {
            alert('Please enter a valid quantity.');
            return;
        }

        if (quantity > quantityAvailable) {
            alert('Quantity to add exceeds available quantity.');
            return;
        }

        // Add to cart
        addProductToCart(barcode, name, price, barcode, quantity);
        $('#searchProductModal').modal('hide');
        resetModal();
    });

    // Reset modal fields when closed
    function resetModal() {
        $('#productFilter').val('');
        $('#filterResults').hide();
        $('#productTable tbody').empty();
        $('#productBarcode').val('');
        $('#quantityAvailable').val('');
        $('#quantity').val('');
        $('#priceType').val('retail');
        $('#sellingPrice').val('');
        $('#total').val('');
    }

    $('#searchProductModal').on('hidden.bs.modal', resetModal);

    // Modified addProductToCart to handle quantity
    function addProductToCart(id, name, price, barcode, quantity = 1) {
        barcode = String(barcode);
        console.log('Adding product to cart:', { id, name, price, barcode, quantity });

        const existingProductIndex = cart.findIndex(item => String(item.barcode) === barcode);

        if (existingProductIndex !== -1) {
            // If the product already exists in the cart, only update quantity and totalPrice
            cart[existingProductIndex].quantity += quantity;
            cart[existingProductIndex].totalPrice = cart[existingProductIndex].quantity * cart[existingProductIndex].price;
        } else {
            // Add a new item with the current price type
            cart.push({
                id: barcode,
                name: name,
                price: price,
                barcode: barcode,
                quantity: quantity,
                totalPrice: price * quantity,
                priceType: currentPriceType // Store the price type used when adding the item
            });
        }

        updateCartDisplay();
        updateTotals();
        toggleSidebarLinks();

        const rowSelector = `table#table-bold tbody tr[data-barcode="${barcode}"]`;
        $('table#table-bold tbody tr').removeClass('selected');
        $(rowSelector).addClass('selected');
    }
});

//F9 CARD POINTS

// When document is ready
$(document).ready(function() {
    // Set default search type
    $('#cardNoRadio').prop('checked', true);
    
    // Handle the search input keyup event
    $('#customerSearch').on('keyup', function() {
        const searchTerm = $(this).val().trim();
        const searchType = $('input[name="customerSearchType"]:checked').val();
        
        if (searchTerm.length >= 3) {
            searchCustomer(searchTerm, searchType);
        } else {
            // Clear the results if search term is too short
            clearCustomerFields();
        }
    });
    
    // Function to search for customer
    function searchCustomer(searchTerm, searchType) {
        console.log('Searching for:', searchTerm, 'using type:', searchType);

        $.ajax({
            url: 'search_customer.php',
            method: 'POST',
            data: {
                searchTerm: searchTerm,
                searchType: searchType
            },
            dataType: 'json',
            success: function(response) {
                console.log('Search response:', response);

                if (response.status === 'success' && response.data) {
                    // Populate the fields with customer data
                    $('#lastName').val(response.data.LastName);
                    $('#firstName').val(response.data.FirstName);
                    $('#middleName').val(response.data.MiddleName);
                    $('#currentPoints').val(response.data.PointsEarned);
                    
                    // Update customer list if needed
                    updateCustomerTable(response.customers);
                } else {
                    // Clear fields if no matching customer found
                    clearCustomerFields();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error searching for customer:', error);
                clearCustomerFields();
            }
        });
    }
    
    // Function to update the customer list table
    function updateCustomerTable(customers) {
        const tbody = $('.table-bordered tbody');
        tbody.empty();
        
        if (customers && customers.length > 0) {
            customers.forEach(function(customer) {
                tbody.append(`
                    <tr class="customer-row" data-id="${customer.ID}" data-cardno="${customer.CardNumber}">
                        <td>${customer.LastName}, ${customer.FirstName} ${customer.MiddleName || ''}</td>
                        <td>${customer.CardNumber}</td>
                    </tr>
                `);
            });
            
            // Add click event for customer rows
            $('.customer-row').on('click', function() {
                const cardNo = $(this).data('cardno');
                searchCustomer(cardNo, 'cardNo');
            });
        } else {
            tbody.append('<tr><td colspan="2">No customers found</td></tr>');
        }
    }
    
    // Function to clear customer fields
    function clearCustomerFields() {
        $('#lastName').val('');
        $('#firstName').val('');
        $('#middleName').val('');
        $('#currentPoints').val('0');
    }

    $('#saveCustomerBtn').on('click', function() {
        // Explicitly target fields within the modal
        const lastNameVal = $('#enrollCustomerModal #lastName').val();
        const firstNameVal = $('#enrollCustomerModal #firstName').val();
        
        console.log("Direct element check:");
        console.log("lastName field exists:", $('#enrollCustomerModal #lastName').length);
        console.log("firstName field exists:", $('#enrollCustomerModal #firstName').length);
        console.log("lastName value:", lastNameVal);
        console.log("firstName value:", firstNameVal);
        
        // Collect data from the form
        const customerData = {
            lastName: lastNameVal,
            firstName: firstNameVal,
            middleName: $('#enrollCustomerModal #middleName').val() || '',
            lotHouse: $('#enrollCustomerModal #lotNumber').val(),
            street: $('#enrollCustomerModal #street').val(),
            barangay: $('#enrollCustomerModal #barangay').val(),
            townCity: $('#enrollCustomerModal #townCity').val(),
            province: $('#enrollCustomerModal #province').val(),
            civilStatus: $('#enrollCustomerModal #civilStatus').val(),
            birthday: $('#enrollCustomerModal #birthday').val(),
            gender: $('#enrollCustomerModal input[name="gender"]:checked').val(),
            cardNumber: $('#enrollCustomerModal #cardNumber').val(),
            pointsEarned: 0,
            pointsUsed: 0,
            balance: 0
        };
        
        console.log("Form data collected:", customerData);
        
        // Validate required fields
        const requiredFields = [
            'lastName', 'firstName', 'lotHouse', 'street', 
            'barangay', 'townCity', 'province', 'civilStatus', 
            'birthday', 'gender', 'cardNumber'
        ];
        
        let missingFields = [];
        for (const field of requiredFields) {
            if (customerData[field] === undefined || customerData[field] === null || customerData[field] === '') {
                missingFields.push(field);
            }
        }
        
        if (missingFields.length > 0) {
            alert('Please fill in all required fields: ' + 
                  missingFields.map(field => field.replace(/([A-Z])/g, ' $1').toLowerCase()).join(', '));
            return;
        }
        
        // Send data to server
        $.ajax({
            url: 'enroll_Card.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(customerData),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert('Customer enrolled successfully!');
                    // Clear the form
                    $('#enrollCustomerModal input, #enrollCustomerModal select').val('');
                    $('#enrollCustomerModal input[name="gender"]').prop('checked', false);
                    // Close the modal
                    $('#enrollCustomerModal').modal('hide');
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Save error:', xhr.responseText);
                alert('Error saving customer. Please try again.');
            }
        });
    });
    
    // Function to refresh customer list after adding new customer
    function refreshCustomerList() {
        // If you have a function to reload the customer table, call it here
        // For example, you might want to run a search with empty parameters
        searchCustomer('', 'customerName');
    }
});

</script>

<style>
    /* Styling for invalid tender input */
        #tenderInput.is-invalid {
            border-color: #dc3545;
            background-color: #fff5f5;
        }

        /* Styling for the error message */
        #tenderErrorMessage {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }

        /* Optional: Style for disabled submit button */
        #cashTenderModal .btn-success:disabled {
            background-color: #6c757d;
            border-color: #6c757d;
            cursor: not-allowed;
            opacity: 0.65;
        }
    /* 🔹 SEARCH BAR STYLES */
    .search-results {
            position: absolute; 
            background-color: white;
            width: 100%;
            border: 1px solid #ddd;
            z-index: 1000;
            max-height: 300px;
            overflow-y: auto;
            display: none;
    }
        .search-item {
            padding: 8px 12px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
        }
        .search-item:hover {
            background-color: #f5f5f5;
        }
    .senior-container {
    width: 350px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
    font-family: 'Segoe UI', Arial, sans-serif;
}

.senior-header {
    background: #4CAF50;
    color: white;
    padding: 15px 20px;
}

.senior-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

.senior-body {
    padding: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-size: 14px;
    font-weight: 500;
}

.form-input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

.form-input:focus {
    outline: none;
    border-color: #4CAF50;
}

.senior-footer {
    padding: 15px 20px;
    background: #f9f9f9;
    text-align: right;
    border-top: 1px solid #eee;
}

.apply-btn {
    background: #4CAF50;
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 4px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
}

.apply-btn:hover {
    background: #45a049;
}

    .shortcut-key {
    float: right;
    color: #999;
    font-size: 0.8em;
    margin-left: 10px;
}
/* Add these styles to your existing CSS */
.shortcut-key {
    float: right;
    color: #888;
    font-size: 0.85em;
    margin-left: 10px;
}

/* Modal styling to match your existing design */
.modal-header {
    padding: 10px 15px;
    border-bottom: 1px solid #dee2e6;
}

.modal-title {
    font-size: 1.1rem;
    font-weight: 500;
}

.modal-body {
    padding: 15px;
}

.form-label {
    font-weight: 500;
    margin-bottom: 5px;
    color: #555;
}

.form-control {
    border-radius: 4px;
    padding: 8px 12px;
}

.invalid-feedback {
    display: none;
    font-size: 0.85em;
}

.is-invalid {
    border-color: #dc3545;
}

.btn {
    padding: 6px 12px;
    font-size: 0.9rem;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}
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
    .list-unstyled a {
        color: #333;
        font-size: 16px;
        transition: all 0.3s ease-in-out;
    }

    /* 🔹 HOVER EFFECT - NAV-LINK, DROPDOWN BUTTON, & DROPDOWN LIST ITEMS */
    .nav-link:hover,
    .list-unstyled a:hover,
    .hovered-dropdown, .hover-effect {
        background: rgb(65, 165, 232) !important; /* Navy Blue */
        color: #ffffff !important; /* White Text */
        transform: scale(1.05);
    }

    /* 🔹 ACTIVE LINK STYLE (For Clicked Items) */
    .nav-link.active,
    .list-unstyled a.active {
        color: rgb(0, 0, 0) !important; /* Black */
        font-weight: bold !important;
        background: transparent !important;
    }

    /* 🔹 WHEN DROPDOWN IS EXPANDED */
    .list-unstyled a[aria-expanded="true"], 
    .list-unstyled a.highlighted-dropdown {
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
    .list-unstyled a:hover *, 
    .list-unstyled a.highlighted-dropdown:hover * {
        color: white !important;
    }

    /* 🔹 SIDEBAR STYLE */
    .sidebar {
        width: 250px;
        background: rgb(65, 165, 232) !important;
        overflow: visible !important;
    }

    .sidebar .collapse {
        display: none;
    }

    .sidebar .collapse.show {
        display: block !important;
    }

    /* 🔹 MAKE Edit Item and Void Item links unclickable */
    .list-unstyled a.disabled-link {
        pointer-events: none; /* Disable click events */
        color: #b0b0b0; /* Gray out the text */
        cursor: not-allowed; /* Show the not-allowed cursor */
    }

    /* Optionally, make the background color appear disabled as well */
    .list-unstyled a.disabled-link:hover {
        background-color: transparent;
    }

    /* 🔹 STYLE FOR NAVBAR */
    .navbar {
        background: linear-gradient(to right, rgb(235, 110, 110), rgb(142, 188, 225), rgb(128, 135, 141));
        background-size: 1550px 870px;
        background-position: center;
        background-repeat: no-repeat;
    }

    /* STYLE FOR TABLE HEADER */
    #table-bold thead th {
        font-weight: bold;
        font-style: italic;
    }

    .disabled-link {
        pointer-events: none; /* Disable click interactions */
        opacity: 0.7; /* Make the text appear faded */
        filter: blur(0.8px); /* Optionally add blur effect */
        cursor: not-allowed; /* Change cursor to indicate it's disabled */
    }

    /* Styling for the Cash Tender Modal */
    #cashTenderModal .modal-content {
        background-color: #f5f5f5;
        border-radius: 10px;
        font-family: Arial, sans-serif;
    }

    #cashTenderModal .modal-header {
        background-color: #e0e0e0;
        padding: 10px;
        text-align: center;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-bottom: none;
    }

    #cashTenderModal .modal-title {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    #cashTenderModal .modal-body {
        padding: 15px;
    }

    #cashTenderModal .form-group {
        margin-bottom: 10px;
    }

    #cashTenderModal .form-group label {
        font-size: 14px;
        color: #333;
        margin-bottom: 5px;
        display: block;
    }

    #cashTenderModal .input-group {
        display: flex;
        align-items: center;
    }

    #cashTenderModal .input-group-text {
        background-color: #e0e0e0;
        border: 1px solid #ccc;
        border-right: none;
        padding: 5px 10px;
        font-size: 14px;
        color: #333;
    }

    #cashTenderModal .form-control {
        border: 1px solid #ccc;
        border-left: none;
        padding: 5px;
        font-size: 14px;
        color: #333;
        text-align: right;
    }

    #cashTenderModal .form-control[readonly] {
        background-color: #e0e0e0;
    }

    #cashTenderModal .modal-body small {
        font-size: 12px;
        color: #ff0000;
    }

    #cashTenderModal .modal-footer {
        padding: 10px;
        border-top: 1px solid #ccc;
    }

    #cashTenderModal .modal-footer .btn {
        padding: 5px 15px;
        font-size: 14px;
    }

    #cashTenderModal .modal-footer .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    #cashTenderModal .modal-footer .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    /* CSS for the search results */
.search-results {
    position: absolute;
    width: 100%;
    max-height: 300px;
    overflow-y: auto;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    z-index: 1000;
    display: none;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.search-item {
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.search-item:hover {
    background-color: #f5f5f5;
}

/* Styles for the selected row in the table */
table#table-bold tbody tr.selected {
    background-color: #e0f7fa;
}

table#table-bold tbody tr {
    cursor: pointer;
}

/* Style for the total display */
#totalRetailDisplay, #totalTransactionDisplay {
    font-weight: bold;
}

/* Better styling for the transaction details */
.table-borderless th {
    font-weight: bold;
    color: #333;
}

/* Animation for adding items to cart */
@keyframes highlight {
    0% { background-color: #e0f7fa; }
    100% { background-color: transparent; }
}

.highlight-row {
    animation: highlight 1s ease-in-out;
}

.search-results {
    position: absolute;
    z-index: 1000;
    background: white;
    border: 1px solid #ccc;
    width: 100%;
    max-height: 200px;
    overflow-y: auto;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.search-item:hover {
    background-color: #f0f0f0;
}

#productTable tbody tr:hover {
    cursor: pointer;
}
</style>

<?php include_once 'footer.php'; ?>