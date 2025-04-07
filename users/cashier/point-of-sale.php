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
                    <a href="#">Solo Parent</a>
                </li>
                <li>
                    <a href="#">PWD</a>
                </li>
                <li>
                    <a href="#">Senior Citizen</a>
                </li>
                <li>
                    <a href="#">NAAC</a>
                </li>
                <li>
                    <a href="#">Medal of Valor</a>
                </li>
            </ul>
        </li>
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
                    <div class="card-body" style="padding: 0px;">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="margin-bottom: 0;">
                                    <input type="text" class="form-control" id="#" style="padding: 5px; margin: 0;">
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
                                                    <td id="#"> </td>
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
                // If the modal is open, F7 can also trigger the calculateChange function
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
                // Kunin ang Apply Discount button
                let discountBtn = document.getElementById("discountDropdown");
                // I-toggle ang dropdown gamit ang Bootstrap API
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

    // Function to calculate the change and update the transaction details
    function calculateChange() {
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

        // Update the Transaction Details table with the tender and change values
        document.getElementById('tenderDisplay').textContent = `₱${tender.toFixed(2)}`;
        document.getElementById('changeDisplay').textContent = `₱${change.toFixed(2)}`;

        // Optionally, close the modal after submission
        bootstrap.Modal.getInstance(document.getElementById('cashTenderModal')).hide();
    }

    // Fetch the total amount and reset the modal fields when it is shown
    document.getElementById('cashTenderModal').addEventListener('shown.bs.modal', function () {
        // Fetch the total amount from the transaction details or the top display
        const totalElement = document.querySelector('.col-md-8.text-right.d-flex.justify-content-end');
        const totalValue = totalElement.textContent.replace('₱', '').trim();
        document.getElementById('amountDue').value = totalValue || '0.00';
        document.getElementById('tenderInput').value = '';
        document.getElementById('changeOutput').value = '0.00';
        document.getElementById('tenderInput').focus();
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
</style>

<?php include_once 'footer.php'; ?>