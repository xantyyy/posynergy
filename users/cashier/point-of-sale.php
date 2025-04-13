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
            <a href="#" onclick="applyPWD()">PWD <span class="shortcut-key">F12</span></a>
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

<div id="passwordModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Senior Citizen Discount</h3>
        <p>Please enter password:</p>
        <input type="password" id="seniorPassword" placeholder="Enter password (123)">
        <button onclick="verifySeniorPassword()">Submit</button>
        <p id="passwordError" style="color:red; display:none;">Incorrect password!</p>
    </div>
</div>

<!-- Client Details Modal -->
<div id="clientModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3>Senior Citizen Details</h3>
        <form id="seniorForm">
            <div>
                <label>Full Name:</label>
                <input type="text" id="seniorName" required>
            </div>
            <div>
                <label>ID Number:</label>
                <input type="text" id="seniorId" required>
            </div>
            <div>
                <label>Birthdate:</label>
                <input type="date" id="seniorBirthdate" required>
            </div>
            <button type="button" onclick="submitSeniorDetails()">Apply Discount</button>
        </form>
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
                <small class="text-danger">Press F7 to add Tender</small>
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
                                        placeholder="Search products..." style="padding: 5px; margin: 0;">
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
                                    <div style="font-size: 28px; font-weight: bold; color: white; margin-top: -15px; margin-left: 10px;">RETAIL</div>
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
                                        <th>Price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
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
                                                    <td id="#"> </td>
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

<script>
let cart = []; // Array to store cart items

$(document).ready(function() {
    
    $('#productSearch').on('input', function() {
        var query = $(this).val();
        
        if(query.length >= 2) {
            $.ajax({
                url: 'search_products.php',
                method: 'POST',
                data: { query: query },
                success: function(data) {
                    $('#searchResults').html(data);
                    $('#searchResults').show();
                }
            });
        } else {
            $('#searchResults').hide();
        }
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('#productSearch, #searchResults').length) {
            $('#searchResults').hide();
        }
    });
    
    $(document).on('click', '.search-item', function() {
        const productId = $(this).data('value');
        const productName = $(this).data('name');
        const productPrice = parseFloat($(this).data('price'));
        const productBarcode = $(this).data('barcode');
        addProductToCart(productId, productName, productPrice, productBarcode);
        $('#productSearch').val('');
        $('#searchResults').hide();
    });
    
    function addProductToCart(id, name, price, barcode) {
    const existingProductIndex = cart.findIndex(item => item.barcode === barcode); // Use barcode for comparison
    
    if (existingProductIndex !== -1) {
        cart[existingProductIndex].quantity += 1;
        cart[existingProductIndex].totalPrice = cart[existingProductIndex].quantity * cart[existingProductIndex].price;
    } else {
        cart.push({
            id: barcode, // Use barcode as the ID for consistency
            name: name,
            price: price,
            barcode: barcode,
            quantity: 1,
            totalPrice: price
        });
    }
    
    updateCartDisplay();
    updateTotals();
}
    
    function updateCartDisplay() {
    const tableBody = $('table#table-bold tbody');
    tableBody.empty(); // Clear existing rows
    
    cart.forEach(item => {
        const row = `
            <tr data-product-id="${item.id}">
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>₱${item.price.toFixed(2)}</td>
                <td>₱${item.price.toFixed(2)}</td>
                <td>₱${item.totalPrice.toFixed(2)}</td>
            </tr>
        `;
        tableBody.append(row);
    });
    
    if (cart.length > 0) {
        const lastItem = cart[cart.length - 1];
        const productInfoDisplay = `${lastItem.name} Barcode: ${lastItem.barcode} | SRP: ₱${lastItem.price.toFixed(2)}`;
        $('.card-header.bg-success').first().text(productInfoDisplay);
    }
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
    
    $('a[accesskey="F1"]').on('click', function(e) {
        e.preventDefault();
        if ($('table#table-bold tbody tr.selected').length > 0) {
            const selectedRow = $('table#table-bold tbody tr.selected');
            const productId = selectedRow.data('product-id');
            
            const newQuantity = prompt("Enter new quantity:", "1");
            if (newQuantity !== null) {
                updateItemQuantity(productId, parseInt(newQuantity));
            }
        } else {
            alert("Please select an item to edit first");
        }
    });
    
    function updateItemQuantity(productId, newQuantity) {
        if (newQuantity <= 0) {
            removeItemFromCart(productId);
            return;
        }
        
        const itemIndex = cart.findIndex(item => item.id === productId);
        if (itemIndex !== -1) {
            cart[itemIndex].quantity = newQuantity;
            cart[itemIndex].totalPrice = cart[itemIndex].price * newQuantity;
            updateCartDisplay();
            updateTotals();
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
    
    $('a[accesskey="F6"]').on('click', function(e) {
        e.preventDefault();
        if ($('table#table-bold tbody tr.selected').length > 0) {
            const selectedRow = $('table#table-bold tbody tr.selected');
            const productId = selectedRow.data('product-id');
            removeItemFromCart(productId);
        } else {
            alert("Please select an item to void first");
        }
    });

    $('a[accesskey="F8"]').on('click', function(e) {
        e.preventDefault();
        if (cart.length > 0) {
            if (confirm("Are you sure you want to void all items?")) {
                cart = [];
                updateCartDisplay();
                updateTotals();
                $('.card-header.bg-success').first().text("");
            }
        } else {
            alert("Cart is already empty");
        }
    });
    
    window.calculateChange = function() {
        const amountDue = parseFloat(document.getElementById('amountDue').value);
        const tender = parseFloat(document.getElementById('tenderInput').value);

        if (isNaN(tender)) {
            alert('Please enter a valid amount.');
            return;
        }

        if (tender < amountDue) {
            alert('Tendered amount is less than the amount due.');
            return;
        }

        const change = tender - amountDue;
        document.getElementById('changeOutput').value = change.toFixed(2);

        document.getElementById('tenderDisplay').textContent = `₱${tender.toFixed(2)}`;
        document.getElementById('changeDisplay').textContent = `₱${change.toFixed(2)}`;

        bootstrap.Modal.getInstance(document.getElementById('cashTenderModal')).hide();
    };
    
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
});

function updateCartDisplay() {
    const tableBody = $('table#table-bold tbody');
    tableBody.empty(); // Clear existing rows
    
    cart.forEach(item => {
        const row = `
            <tr data-product-id="${item.barcode}"> <!-- Use barcode as the ID -->
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>₱${item.price.toFixed(2)}</td>
                <td>₱${item.price.toFixed(2)}</td>
                <td>₱${item.totalPrice.toFixed(2)}</td>
            </tr>
        `;
        tableBody.append(row);
    });
    
    if (cart.length > 0) {
        const lastItem = cart[cart.length - 1];
        const productInfoDisplay = `${lastItem.name} Barcode: ${lastItem.barcode} | SRP: ₱${lastItem.price.toFixed(2)}`;
        $('.card-header.bg-success').first().text(productInfoDisplay);
    }
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
        // First remove the selection class from all rows
        $('.transaction-row').removeClass('table-primary');
        // Then add it to the clicked row
        $(this).addClass('table-primary');
        console.log("Selected transaction:", $(this).attr('data-transaction-no'));
    });
    
    // When the modal is shown, load the transactions
    $('#pendingTransactionModal').on('show.bs.modal', function() {
    console.log("Modal opened, loading transactions...");
    loadPendingTransactions();
});
    
    $('#pendingTransactionModal .btn-primary').click(function() {
    let selectedRow = $('#pendingTransactionModal tbody tr.table-primary');
    
    if (selectedRow.length > 0) {
        let transactionNo = selectedRow.data('transaction-no'); // Use .data() for reliability
        console.log("Attempting to load transaction:", transactionNo); // Debug log
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
                // Do not clear the cart; append instead
                response.items.forEach(function(item) {
                    const existingProductIndex = cart.findIndex(cartItem => cartItem.barcode === item.Barcode);
                    if (existingProductIndex !== -1) {
                        // If the item already exists in the cart, update its quantity and totalPrice
                        cart[existingProductIndex].quantity += parseFloat(item.Quantity);
                        cart[existingProductIndex].totalPrice = cart[existingProductIndex].quantity * cart[existingProductIndex].price;
                    } else {
                        // Add the new item to the cart
                        cart.push({
                            id: item.Barcode, // Use barcode as the ID for consistency
                            barcode: item.Barcode,
                            name: item.ProductName,
                            price: parseFloat(item.SRP),
                            quantity: parseFloat(item.Quantity),
                            totalPrice: parseFloat(item.Amount)
                        });
                    }
                });
                
                updateCartDisplay();
                updateTotals();
                removePendingTransaction(transactionNo);
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

function removePendingTransaction(transactionNo) {
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
                alert('Transaction loaded successfully and removed from pending list!');
                $('#pendingTransactionModal').modal('hide');
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
    const name = $('#seniorName').val();  // Get the name value
    const idNumber = $('#seniorId').val();  // Get the ID number value
    const birthdate = $('#seniorBirthdate').val();  // Get the birthdate value
    
    if (name && idNumber && birthdate) {
        const discountData = {
            name: name,
            idNumber: idNumber,
            birthdate: birthdate,
            discountType: 'Senior Citizen'
        };
        
        console.log('Applying discount:', discountData);
        alert(`Senior Citizen discount applied for:\nName: ${name}\nID: ${idNumber}\nBirthdate: ${birthdate}`);
        
        $('#seniorDetailsModal').modal('hide');
        $('#seniorForm')[0].reset();  
        updateTransactionWithDiscount(discountData);
    } else {
        alert('Please fill all required fields!');  // Alert if any field is missing
    }
}

function updateTransactionWithDiscount(discountData) {
    const totalAmount = parseFloat($('#totalTransactionDisplay').text().replace('₱', '')) || 0;
    const discountAmount = totalAmount * 0.20; 
    $('th:contains("Discount:")').next().text(`₱${discountAmount.toFixed(2)} (${discountData.discountType})`);

    const finalTotal = totalAmount - discountAmount;
    $('#totalTransactionDisplay').text(`₱${finalTotal.toFixed(2)}`);
    $('#totalRetailDisplay').text(`₱${finalTotal.toFixed(2)}`);
    $('#amountDue').val(finalTotal.toFixed(2));
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'F11') {
        event.preventDefault();
        showSeniorPasswordPrompt();
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

    function syncAmountDue() {
    const finalTotal = parseFloat($('#totalTransactionDisplay').text().replace('₱', '')) || 0;
    $('#amountDue').val(finalTotal.toFixed(2));
    $('#tenderInput').val('');
    $('#changeOutput').val('0.00');
}
$('#cashTenderModal').on('shown.bs.modal', syncAmountDue);
    let submitClickCount = 0; // Counter for Submit button clicks

   function calculateChange() {
    const amountDue = parseFloat(document.getElementById('amountDue').value) || 0;
    const tender = parseFloat(document.getElementById('tenderInput').value) || 0;

    if (isNaN(tender) || tender <= 0) {
        alert('Please enter a valid amount.');
        return;
    }

    if (tender < amountDue) {
        alert('Tendered amount is less than the amount due.');
        return;
    }

    const change = tender - amountDue;
    document.getElementById('changeOutput').value = change.toFixed(2);
    document.getElementById('tenderDisplay').textContent = `₱${tender.toFixed(2)}`;
    document.getElementById('changeDisplay').textContent = `₱${change.toFixed(2)}`;
    submitClickCount++;

    if (submitClickCount === 1) {
        bootstrap.Modal.getInstance(document.getElementById('cashTenderModal')).hide();
    } else if (submitClickCount === 2) {
        generateReceipt();
        submitClickCount = 0;
        resetTransaction();
    }
}
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

function printReceipt() {
    const receiptContent = document.querySelector('#receiptModal .modal-body').innerHTML;
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Transaction Receipt</title>
            <style>
                body { font-family: monospace; text-align: center; padding: 20px; }
                p { margin: 5px 0; }
            </style>
        </head>
        <body onload="window.print(); window.close();">
            ${receiptContent}
        </body>
        </html>
    `);
    printWindow.document.close();
}

function resetTransaction() {
    window.cart = [];
    
    updateCartDisplay();
    updateTotals();

    $('th:contains("# of Item:")').next().text('0');
    $('th:contains("Amount:")').next().text('₱0.00');
    $('th:contains("Discount:")').next().text('₱0.00');
    $('th:contains("BSC Points:")').next().text('₱0.00');
    $('th:contains("TOTAL:")').next().text('₱0.00');
    $('#tenderDisplay').text('₱0.00');
    $('#changeDisplay').text('₱0.00');
    $('.card-header.bg-success').first().text('');
}
    
</script>

<style>
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
</style>

<?php include_once 'footer.php'; ?>