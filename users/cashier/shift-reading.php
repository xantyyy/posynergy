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
        <li class="dropdown">
			<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
			<i class="material-icons">report</i><span>POS Reports</span></a>
			<ul class="collapse list-unstyled menu" id="homeSubmenu1">
				<li>
					<a href="tender-declare.php">Tender Declaration</a>
				</li>
				<li>
					<a href="shift-reading.php">Shift Reading</a>
				</li>
                <li>
					<a href="x-reading.php">X Reading</a>
				</li>
                <li>
					<a href="z-reading.php">Z Reading</a>
				</li>
                <li>
					<a href="opening-fund.php">Opening Fund</a>
				</li>
			</ul>
		</li>
        <li class="#">
            <a href="index.php"><i class="material-icons">arrow_back</i><span>Back to Main</span></a>
        </li>
    </ul>
</nav>
<div id="content">

    <!--TOP NAVBAR CONTENT-->
    <div class="top-navbar">
        <nav class="navbar  navbar-expand-lg">
            </button>
            
            <a class="navbar-brand" href="#">POS Reports</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>        
        </nav>
    </div>	  

    <!--DASHBOARD CONTENT-->
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row g-4">
                        <!-- Left Side -->
                        <div class="col-md-5 ms-md-5" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
                            <div class="mb-3 row">
                                <label for="date" class="col-sm-4 col-form-label">Date:</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="date" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="transactionNo" class="col-sm-4 col-form-label">Transaction No.:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="transactionNo">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="cashierName" class="form-label">Cashier Name:</label>
                                <div class="col-sm-12 d-flex">
                                    <input type="text" class="form-control me-2" id="cashierName" value="Cashier Staff" disabled>
                                    <!-- Process button -->
                                    <button type="button" class="btn btn-success" id="btn-process">
                                        <i class="fa fa-cogs"></i> 
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="openingFund" class="col-sm-4 col-form-label">Opening Fund:</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="openingFund" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side -->
                        <div class="col-md-5 offset-md-1" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
                            <div class="mb-2 row">
                                <label for="gross" class="col-sm-4 col-form-label">Gross:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="gross" readonly>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="pointsAvailed" class="col-sm-4 col-form-label">Points Availed:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="pointsAvailed" readonly>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="totalDiscount" class="col-sm-4 col-form-label">Total Discount:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="totalDiscount" readonly>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="totalSales" class="col-sm-4 col-form-label">Total Sales:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="totalSales" readonly>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="lessSalesReturn" class="col-sm-4 col-form-label">Less Sales Return:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="lessSalesReturn" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label for="net" class="col-sm-4 col-form-label">NET:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="net" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row" style="margin-top: -10px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                        <table class="table table-bordered" id="modal-transaction-table">
                                <thead>
                                    <tr>
                                        <th>POS Type</th>
                                        <th>Transactions</th>
                                        <th>POS Amount</th>
                                        <th>Cashier Amount</th>
                                        <th>Short/Over</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Will be populated on Process -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-auto">
            <button type="button" class="btn btn-primary" id="btn-print">
                <i class="fa fa-print"></i> Print
            </button>
            <button type="button" class="btn btn-danger" id="btn-exit">
                <i class="fa fa-arrow-left"></i> Exit
            </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Set today's date
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date').value = today;

        // Highlight active sidebar link
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

            /* Add 'disabled-link' class to Edit Item and Void Item
            if (link.querySelector('span') && link.querySelector('span').textContent.includes('Edit Item') || 
                link.querySelector('span') && link.querySelector('span').textContent.includes('Void Item')) {
                    link.classList.add('disabled-link');
            }*/
        });

        // Check if btn-process exists
        const processButton = document.getElementById('btn-process');
        if (!processButton) {
            console.error("Process button with ID 'btn-process' not found in the DOM.");
        }
    });

    document.getElementById('btn-process').addEventListener('click', function () {
        console.log("Process button clicked!"); // Debugging to confirm click

        // Sample fixed data (can be replaced with dynamic values later)
        const transactionData = {
            posType: 'CASH',
            transaction: '1',
            posAmount: '352.50',
            cashierAmount: '352.50',
            shortOver: '0.00'
        };

        // Set opening fund value
        const openingFundInput = document.getElementById('openingFund');
        if (openingFundInput) {
            openingFundInput.value = 1000;
        } else {
            console.error("Opening Fund input not found!");
        }

        // Set right side field values
        const grossInput = document.getElementById('gross');
        const pointsAvailedInput = document.getElementById('pointsAvailed');
        const totalDiscountInput = document.getElementById('totalDiscount');
        const totalSalesInput = document.getElementById('totalSales');
        const lessSalesReturnInput = document.getElementById('lessSalesReturn');
        const netInput = document.getElementById('net');

        if (grossInput) grossInput.value = '352.50';
        else console.error("Gross input not found!");
        if (pointsAvailedInput) pointsAvailedInput.value = '0.00';
        else console.error("Points Availed input not found!");
        if (totalDiscountInput) totalDiscountInput.value = '0.00';
        else console.error("Total Discount input not found!");
        if (totalSalesInput) totalSalesInput.value = '352.50';
        else console.error("Total Sales input not found!");
        if (lessSalesReturnInput) lessSalesReturnInput.value = '0.00';
        else console.error("Less Sales Return input not found!");
        if (netInput) netInput.value = '352.50';
        else console.error("NET input not found!");

        // Target the table inside the modal
        const tbody = document.querySelector('#modal-transaction-table tbody');
        if (!tbody) {
            console.error("Table body for modal-transaction-table not found!");
            return;
        }

        // Clear old data (optional)
        tbody.innerHTML = '';

        // Create and append new row
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${transactionData.posType}</td>
            <td>${transactionData.transaction}</td>
            <td>${transactionData.posAmount}</td>
            <td>${transactionData.cashierAmount}</td>
            <td>${transactionData.shortOver}</td>
        `;
        tbody.appendChild(row);
    });

    document.getElementById('btn-print').addEventListener('click', function () {
        // Sample data (you can later make these dynamic)
        const date = document.getElementById('date').value;
        const transactionNo = document.getElementById('transactionNo').value || '0001';
        const cashierName = document.getElementById('cashierName').value;
        const gross = document.getElementById('gross').value || '352.50';
        const discount = document.getElementById('totalDiscount').value || '0.00';
        const returns = document.getElementById('lessSalesReturn').value || '0.00';
        const net = document.getElementById('net').value || '352.50';
        const openingFund = document.getElementById('openingFund').value || '0';

        const transactionData = {
            posType: 'CASH',
            transaction: '1',
            posAmount: '352.50',
            cashierAmount: '352.50',
            shortOver: '0.00'
        };

        // Create printable content
        const printWindow = window.open('', '', 'height=800,width=600');
        printWindow.document.write('<html><head><title>Shift Reading Report</title>');
        printWindow.document.write('<style>');
        printWindow.document.write(`
            body { font-family: monospace; padding: 20px; }
            .center { text-align: center; }
            .bold { font-weight: bold; }
            table { width: 100%; border-collapse: collapse; margin-top: 10px; }
            td, th { border-bottom: 1px dashed #000; padding: 5px 0; }
        `);
        printWindow.document.write('</style></head><body>');

        printWindow.document.write(`<div class="center bold">AAA COMPANY</div>`);
        printWindow.document.write(`<div class="center">123 Main St.,</div>`);
        printWindow.document.write(`<div class="center">City, PH</div><hr>`);

        printWindow.document.write(`<div class="center bold">SHIFT READING REPORT</div><br>`);
        printWindow.document.write(`Date: ${date}<br>`);
        printWindow.document.write(`Transaction No: ${transactionNo}<br>`);
        printWindow.document.write(`Cashier: ${cashierName}<br>`);
        printWindow.document.write(`Opening Fund: ${openingFund}<br><br>`);

        printWindow.document.write(`<table>`);
        printWindow.document.write(`<tr><td>Gross</td><td style="text-align:right">${gross}</td></tr>`);
        printWindow.document.write(`<tr><td>Total Discount</td><td style="text-align:right">${discount}</td></tr>`);
        printWindow.document.write(`<tr><td>Less Sales Return</td><td style="text-align:right">${returns}</td></tr>`);
        printWindow.document.write(`<tr><td><b>NET</b></td><td style="text-align:right"><b>${net}</b></td></tr>`);
        printWindow.document.write(`</table><br>`);

        printWindow.document.write(`<div class="bold">CASHIER ACCOUNTABILITY</div>`);
        printWindow.document.write(`<table>`);
        printWindow.document.write(`<tr>
            <td>${transactionData.posType}</td>
            <td>${transactionData.transaction}</td>
            <td style="text-align:right">${transactionData.posAmount}</td>
            <td style="text-align:right">${transactionData.cashierAmount}</td>
            <td style="text-align:right">${transactionData.shortOver}</td>
        </tr>`);
        printWindow.document.write(`</table><br><br>`);

        printWindow.document.write(`<div class="center">*** END OF REPORT ***</div>`);

        printWindow.document.write('</body></html>');
        printWindow.document.close();

        // Wait for content to load before printing
        printWindow.onload = function () {
            printWindow.print();
        };
    });

    // Exit button redirect to index.php
    document.getElementById('btn-exit').addEventListener('click', function () {
        window.location.href = 'index.php';
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
</style>

<?php include_once 'footer.php'; ?>