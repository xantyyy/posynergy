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
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">POS Reports</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>        
        </nav>
    </div>	  

    <!--DASHBOARD CONTENT-->
    <div class="main-content">
        <div class="row">
            <!-- Left Side: Tender Declaration Table -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center mb-1" style="font-weight: bold;">Tender Declaration</h5>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>₱1,000.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="1000" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱500.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="500" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱200.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="200" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱100.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="100" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱50.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="50" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱20.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="20" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱10.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="10" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱5.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="5" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱1.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="1" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.50</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.5" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.25</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.25" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.10</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.1" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.05</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.05" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.01</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.01" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Side: Other Payment Type Table -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center mb-3" style="font-weight: bold;">Other Payment Type</h5>
                        <p class="text-center" style="text-transform: none; color: red; font-style: italic;">
                            Double-click the amount to declare value.
                        </p>
                        <div class="table-responsive mb-3" style="max-height: 360px; overflow-y: auto;">
                            <table class="table table-bordered table-hover" id="table-bold">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>GCash</td>
                                        <td><input type="number" class="form-control text-center payment-amount" data-type="GCash" min="0" value="0" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Credit Card</td>
                                        <td><input type="number" class="form-control text-center payment-amount" data-type="Credit Card" min="0" value="0" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Gift Card</td>
                                        <td><input type="number" class="form-control text-center payment-amount" data-type="Gift Card" min="0" value="0" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="otherPaymentTotal" class="form-label">Other Payment Total:</label>
                                <input type="text" class="form-control text-center" id="otherPaymentTotal" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="totalCash" class="form-label">Total Cash:</label>
                                <input type="text" class="form-control text-center" id="totalCash" readonly>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-primary me-2" id="processBtn">
                                <i class="fas fa-check"></i> Process
                            </button>
                            <button type="button" class="btn btn-danger" id="cancelBtn">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Other Payment Amount Input -->
    <div class="modal fade" id="paymentAmountModal" tabindex="-1" aria-labelledby="paymentAmountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentAmountModalLabel">Declare Payment Amount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="paymentAmountForm">
                        <div class="mb-3">
                            <label for="paymentType" class="form-label">Payment Type</label>
                            <input type="text" class="form-control" id="paymentType" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="paymentAmountInput" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="paymentAmountInput" min="0" step="0.01" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="savePaymentAmount">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Calculate Tender Declaration totals
    function calculateTenderTotals() {
        const rows = document.querySelectorAll('.quantity');
        let totalCash = 0;

        rows.forEach(input => {
            const value = parseFloat(input.dataset.value);
            const qty = parseFloat(input.value) || 0;
            const rowTotal = value * qty;

            const totalInput = input.closest('tr').querySelector('.total');
            totalInput.value = rowTotal.toFixed(2);

            totalCash += rowTotal;
        });

        const totalCashField = document.getElementById('totalCash');
        if (totalCashField) {
            totalCashField.value = totalCash.toFixed(2);
        }

        return totalCash;
    }

    // Calculate Other Payment totals
    function calculateOtherPaymentTotals() {
        const paymentInputs = document.querySelectorAll('.payment-amount');
        let totalOther = 0;

        paymentInputs.forEach(input => {
            const amount = parseFloat(input.value) || 0;
            totalOther += amount;
        });

        const otherPaymentTotalField = document.getElementById('otherPaymentTotal');
        if (otherPaymentTotalField) {
            otherPaymentTotalField.value = totalOther.toFixed(2);
        }

        return totalOther;
    }

    // Initialize modal
    const paymentModal = new bootstrap.Modal(document.getElementById('paymentAmountModal'), {
        keyboard: true,
        backdrop: 'static'
    });

    // Handle double-click to show modal
    let currentInput = null;
    document.querySelectorAll('.payment-amount').forEach(input => {
        input.addEventListener('dblclick', function () {
            currentInput = input;
            const paymentType = input.dataset.type;
            const currentAmount = input.value || '0';

            // Set modal fields
            document.getElementById('paymentType').value = paymentType;
            document.getElementById('paymentAmountInput').value = currentAmount;

            // Show modal
            paymentModal.show();
        });
    });

    // Handle modal save
    document.getElementById('savePaymentAmount').addEventListener('click', function () {
        const amountInput = document.getElementById('paymentAmountInput');
        const amount = parseFloat(amountInput.value);
        if (currentInput && !isNaN(amount) && amount >= 0) {
            currentInput.value = amount.toFixed(2);
            calculateOtherPaymentTotals();
            paymentModal.hide();
        } else {
            amountInput.classList.add('is-invalid');
            amountInput.addEventListener('input', function () {
                amountInput.classList.remove('is-invalid');
            }, { once: true });
        }
    });

    // Handle modal cancel
    document.querySelector('#paymentAmountModal .btn-secondary').addEventListener('click', function () {
        document.getElementById('paymentAmountInput').classList.remove('is-invalid');
        paymentModal.hide();
    });

    // Handle modal close button
    document.querySelector('#paymentAmountModal .btn-close').addEventListener('click', function () {
        document.getElementById('paymentAmountInput').classList.remove('is-invalid');
        paymentModal.hide();
    });

    // Add input listeners for quantity fields
    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('input', calculateTenderTotals);
    });

    // Initial calculations
    calculateTenderTotals();
    calculateOtherPaymentTotals();

    // Cancel Button Logic
    const cancelBtn = document.getElementById('cancelBtn');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function () {
            // Reset Tender Declaration
            document.querySelectorAll('.quantity').forEach(input => {
                input.value = 0;
            });
            document.querySelectorAll('.total').forEach(input => {
                input.value = '';
            });
            const totalCashField = document.getElementById('totalCash');
            if (totalCashField) {
                totalCashField.value = '';
            }

            // Reset Other Payments
            document.querySelectorAll('.payment-amount').forEach(input => {
                input.value = 0;
            });
            const otherPaymentTotalField = document.getElementById('otherPaymentTotal');
            if (otherPaymentTotalField) {
                otherPaymentTotalField.value = '';
            }
        });
    }

    // Process Button Logic
    const processBtn = document.getElementById('processBtn');
    if (processBtn) {
        processBtn.addEventListener('click', function () {
            const totalCash = calculateTenderTotals();
            const totalOther = calculateOtherPaymentTotals();

            // Collect Tender Declaration data
            const tenderRows = document.querySelectorAll('.quantity');
            const tenderData = [];
            tenderRows.forEach(input => {
                const value = parseFloat(input.dataset.value);
                const qty = parseFloat(input.value) || 0;
                const rowTotal = value * qty;
                tenderData.push({ denomination: value, qty: qty, total: rowTotal });
            });

            // Collect Other Payment data
            const paymentInputs = document.querySelectorAll('.payment-amount');
            const otherPaymentData = [];
            paymentInputs.forEach(input => {
                const type = input.dataset.type;
                const amount = parseFloat(input.value) || 0;
                if (amount > 0) {
                    otherPaymentData.push({ type: type, amount: amount });
                }
            });

            // Get current date and time
            const now = new Date();
            const dateTime = now.toLocaleString();

            // Generate the report content
            let reportContent = `
                <html>
                <head>
                    <title>Tender Declaration Report</title>
                    <style>
                        body { 
                            font-family: Arial, sans-serif; 
                            margin: 10px; 
                            font-size: 12px; 
                            line-height: 1.2; 
                        }
                        .header { 
                            display: flex; 
                            justify-content: space-between; 
                            align-items: center; 
                            border-bottom: 1px solid #ccc; 
                            padding-bottom: 5px; 
                            margin-bottom: 10px; 
                            font-size: 10px; 
                        }
                        .header span { 
                            margin: 0 10px; 
                        }
                        .header .nav-icons { 
                            font-size: 12px; 
                        }
                        h1 { 
                            text-align: center; 
                            font-size: 14px; 
                            margin: 5px 0; 
                        }
                        h2 { 
                            text-align: center; 
                            font-size: 10px; 
                            margin: 2px 0; 
                        }
                        p { 
                            text-align: center; 
                            font-size: 10px; 
                            margin: 5px 0; 
                        }
                        table { 
                            width: 300px; 
                            margin: 10px auto; 
                            border-collapse: collapse; 
                            font-size: 10px; 
                        }
                        th, td { 
                            border: 1px solid black; 
                            padding: 4px; 
                            text-align: center; 
                        }
                        th { 
                            background-color: #f2f2f2; 
                            font-size: 10px; 
                        }
                        .total { 
                            font-weight: bold; 
                        }
                        .footer { 
                            text-align: center; 
                            margin-top: 10px; 
                            font-size: 10px; 
                        }
                        .buttons { 
                            text-align: center; 
                            margin-top: 10px; 
                        }
                        .buttons button { 
                            padding: 5px 10px; 
                            margin: 0 5px; 
                            font-size: 10px; 
                            cursor: pointer; 
                        }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <span>REPORT</span>
                        <span class="nav-icons">
                            <span><</span> 1 of 1 <span>></span>
                        </span>
                        <span>100%</span>
                    </div>
                    <h1>AAA COMPANY</h1>
                    <h2>SAN PASCUAL, TALAVERA, N.E.</h2>
                    <h2>VAT REG. TIN: 000-000-000-000</h2>
                    <h2>MIN: 1245678910111213</h2>
                    <h2>SN: 122ABCD</h2>
                    <h1>TENDER DECLARATION</h1>
                    <p>${dateTime}</p>
                    <table>
                        <tr>
                            <th>Value</th>
                            <th>Cash</th>
                            <th>Total</th>
                        </tr>
            `;

            // Add Tender Declaration rows
            tenderData.forEach(data => {
                reportContent += `
                    <tr>
                        <td>P ${data.denomination.toFixed(2)}</td>
                        <td>${data.qty}</td>
                        <td>${data.total.toFixed(2)}</td>
                    </tr>
                `;
            });

            // Add Tender Declaration totals
            reportContent += `
                <tr>
                    <td colspan="2" class="total">CASH</td>
                    <td class="total">${totalCash.toFixed(2)}</td>
                </tr>
            `;

            // Add Other Payment section if there are non-zero amounts
            if (otherPaymentData.length > 0) {
                reportContent += `
                    <tr><td colspan="3" class="total">OTHER PAYMENTS</td></tr>
                    <tr><th>Type</th><th colspan="2">Amount</th></tr>
                `;
                otherPaymentData.forEach(data => {
                    reportContent += `
                        <tr>
                            <td>${data.type}</td>
                            <td colspan="2">${data.amount.toFixed(2)}</td>
                        </tr>
                    `;
                });
                reportContent += `
                    <tr><td class="total">TOTAL OTHER</td><td colspan="2" class="total">${totalOther.toFixed(2)}</td></tr>
                `;
            }

            // Add grand total
            const grandTotal = totalCash + totalOther;
            reportContent += `
                        <tr>
                            <td colspan="2" class="total">GRAND TOTAL</td>
                            <td class="total">${grandTotal.toFixed(2)}</td>
                        </tr>
                    </table>
                    <p class="footer">CASHIER NAME: CASHIER</p>
                    <p class="footer">***END OF REPORT***</p>
                    <div class="buttons">
                        <button onclick="window.print()">Print</button>
                        <button onclick="window.close()">Close</button>
                    </div>
                </body>
                </html>
            `;

            // Open a new window and display the report
            const reportWindow = window.open('', '_blank', 'width=400,height=600');
            reportWindow.document.write(reportContent);
            reportWindow.document.close();
        });
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
    background: transparent  

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
    font-style: italic;<?php include_once 'header.php'; ?>
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
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">POS Reports</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>        
        </nav>
    </div>	  

    <!--DASHBOARD CONTENT-->
    <div class="main-content">
        <div class="row">
            <!-- Left Side: Tender Declaration Table -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center mb-1" style="font-weight: bold;">Tender Declaration</h5>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>₱1,000.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="1000" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱500.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="500" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱200.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="200" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱100.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="100" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱50.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="50" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱20.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="20" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱10.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="10" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱5.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="5" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱1.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="1" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.50</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.5" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.25</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.25" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.10</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.1" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.05</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.05" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.01</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center quantity" data-value="0.01" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center total" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Right Side: Other Payment Type Table -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center mb-3" style="font-weight: bold;">Other Payment Type</h5>
                        <p class="text-center" style="text-transform: none; color: red; font-style: italic;">
                            Double-click the amount to declare value.
                        </p>
                        <div class="table-responsive mb-3" style="max-height: 360px; overflow-y: auto;">
                            <table class="table table-bordered table-hover" id="table-bold">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>GCash</td>
                                        <td><input type="number" class="form-control text-center payment-amount" data-type="GCash" min="0" value="0" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Credit Card</td>
                                        <td><input type="number" class="form-control text-center payment-amount" data-type="Credit Card" min="0" value="0" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>Gift Card</td>
                                        <td><input type="number" class="form-control text-center payment-amount" data-type="Gift Card" min="0" value="0" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="otherPaymentTotal" class="form-label">Other Payment Total:</label>
                                <input type="text" class="form-control text-center" id="otherPaymentTotal" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="grandTotal" class="form-label">Grand Total:</label>
                                <input type="text" class="form-control text-center" id="grandTotal" readonly>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-primary me-2" id="processBtn">
                                <i class="fas fa-check"></i> Process
                            </button>
                            <button type="button" class="btn btn-danger" id="cancelBtn">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Other Payment Amount Input -->
    <div class="modal fade" id="paymentAmountModal" tabindex="-1" aria-labelledby="paymentAmountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentAmountModalLabel">Declare Payment Amount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="paymentAmountForm">
                        <div class="mb-3">
                            <label for="paymentType" class="form-label">Payment Type</label>
                            <input type="text" class="form-control" id="paymentType" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="paymentAmountInput" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="paymentAmountInput" min="0" step="0.01" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="savePaymentAmount">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Calculate Tender Declaration totals
    function calculateTenderTotals() {
        const rows = document.querySelectorAll('.quantity');
        let totalCash = 0;

        rows.forEach(input => {
            const value = parseFloat(input.dataset.value);
            const qty = parseFloat(input.value) || 0;
            const rowTotal = value * qty;

            const totalInput = input.closest('tr').querySelector('.total');
            totalInput.value = rowTotal.toFixed(2);

            totalCash += rowTotal;
        });

        return totalCash;
    }

    // Calculate Other Payment totals
    function calculateOtherPaymentTotals() {
        const paymentInputs = document.querySelectorAll('.payment-amount');
        let totalOther = 0;

        paymentInputs.forEach(input => {
            const amount = parseFloat(input.value) || 0;
            totalOther += amount;
        });

        const otherPaymentTotalField = document.getElementById('otherPaymentTotal');
        if (otherPaymentTotalField) {
            otherPaymentTotalField.value = totalOther.toFixed(2);
        }

        return totalOther;
    }

    // Calculate Grand Total (Cash + Other Payments)
    function calculateGrandTotal() {
        const totalCash = calculateTenderTotals();
        const totalOther = calculateOtherPaymentTotals();
        const grandTotal = totalCash + totalOther;

        const grandTotalField = document.getElementById('grandTotal');
        if (grandTotalField) {
            grandTotalField.value = grandTotal.toFixed(2);
        }

        return grandTotal;
    }

    // Initialize modal
    const paymentModal = new bootstrap.Modal(document.getElementById('paymentAmountModal'), {
        keyboard: true,
        backdrop: 'static'
    });

    // Handle double-click to show modal
    let currentInput = null;
    document.querySelectorAll('.payment-amount').forEach(input => {
        input.addEventListener('dblclick', function () {
            currentInput = input;
            const paymentType = input.dataset.type;
            const currentAmount = input.value || '0';

            // Set modal fields
            document.getElementById('paymentType').value = paymentType;
            document.getElementById('paymentAmountInput').value = currentAmount;

            // Show modal
            paymentModal.show();
        });
    });

    // Handle modal save
    document.getElementById('savePaymentAmount').addEventListener('click', function () {
        const amountInput = document.getElementById('paymentAmountInput');
        const amount = parseFloat(amountInput.value);
        if (currentInput && !isNaN(amount) && amount >= 0) {
            currentInput.value = amount.toFixed(2);
            calculateGrandTotal();
            paymentModal.hide();
        } else {
            amountInput.classList.add('is-invalid');
            amountInput.addEventListener('input', function () {
                amountInput.classList.remove('is-invalid');
            }, { once: true });
        }
    });

    // Handle modal cancel
    document.querySelector('#paymentAmountModal .btn-secondary').addEventListener('click', function () {
        document.getElementById('paymentAmountInput').classList.remove('is-invalid');
        paymentModal.hide();
    });

    // Handle modal close button
    document.querySelector('#paymentAmountModal .btn-close').addEventListener('click', function () {
        document.getElementById('paymentAmountInput').classList.remove('is-invalid');
        paymentModal.hide();
    });

    // Add input listeners for quantity fields
    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('input', calculateGrandTotal);
    });

    // Initial calculations
    calculateGrandTotal();

    // Cancel Button Logic
    const cancelBtn = document.getElementById('cancelBtn');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function () {
            // Reset Tender Declaration
            document.querySelectorAll('.quantity').forEach(input => {
                input.value = 0;
            });
            document.querySelectorAll('.total').forEach(input => {
                input.value = '';
            });

            // Reset Other Payments
            document.querySelectorAll('.payment-amount').forEach(input => {
                input.value = 0;
            });
            const otherPaymentTotalField = document.getElementById('otherPaymentTotal');
            if (otherPaymentTotalField) {
                otherPaymentTotalField.value = '';
            }

            // Reset Grand Total
            const grandTotalField = document.getElementById('grandTotal');
            if (grandTotalField) {
                grandTotalField.value = '';
            }
        });
    }

    // Process Button Logic
    const processBtn = document.getElementById('processBtn');
    if (processBtn) {
        processBtn.addEventListener('click', function () {
            const totalCash = calculateTenderTotals();
            const totalOther = calculateOtherPaymentTotals();
            const grandTotal = totalCash + totalOther;

            // Collect Tender Declaration data
            const tenderRows = document.querySelectorAll('.quantity');
            const tenderData = [];
            tenderRows.forEach(input => {
                const value = parseFloat(input.dataset.value);
                const qty = parseFloat(input.value) || 0;
                const rowTotal = value * qty;
                tenderData.push({ denomination: value, qty: qty, total: rowTotal });
            });

            // Collect Other Payment data
            const paymentInputs = document.querySelectorAll('.payment-amount');
            const otherPaymentData = [];
            paymentInputs.forEach(input => {
                const type = input.dataset.type;
                const amount = parseFloat(input.value) || 0;
                if (amount > 0) {
                    otherPaymentData.push({ type: type, amount: amount });
                }
            });

            // Get current date and time
            const now = new Date();
            const dateTime = now.toLocaleString();

            // Generate the report content
            let reportContent = `
                <html>
                <head>
                    <title>Tender Declaration Report</title>
                    <style>
                        body { 
                            font-family: Arial, sans-serif; 
                            margin: 10px; 
                            font-size: 12px; 
                            line-height: 1.2; 
                        }
                        .header { 
                            display: flex; 
                            justify-content: space-between; 
                            align-items: center; 
                            border-bottom: 1px solid #ccc; 
                            padding-bottom: 5px; 
                            margin-bottom: 10px; 
                            font-size: 10px; 
                        }
                        .header span { 
                            margin: 0 10px; 
                        }
                        .header .nav-icons { 
                            font-size: 12px; 
                        }
                        h1 { 
                            text-align: center; 
                            font-size: 14px; 
                            margin: 5px 0; 
                        }
                        h2 { 
                            text-align: center; 
                            font-size: 10px; 
                            margin: 2px 0; 
                        }
                        p { 
                            text-align: center; 
                            font-size: 10px; 
                            margin: 5px 0; 
                        }
                        table { 
                            width: 300px; 
                            margin: 10px auto; 
                            border-collapse: collapse; 
                            font-size: 10px; 
                        }
                        th, td { 
                            border: 1px solid black; 
                            padding: 4px; 
                            text-align: center; 
                        }
                        th { 
                            background-color: #f2f2f2; 
                            font-size: 10px; 
                        }
                        .total { 
                            font-weight: bold; 
                        }
                        .footer { 
                            text-align: center; 
                            margin-top: 10px; 
                            font-size: 10px; 
                        }
                        .buttons { 
                            text-align: center; 
                            margin-top: 10px; 
                        }
                        .buttons button { 
                            padding: 5px 10px; 
                            margin: 0 5px; 
                            font-size: 10px; 
                            cursor: pointer; 
                        }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <span>REPORT</span>
                        <span class="nav-icons">
                            <span>&lt;</span> 1 of 1 <span>&gt;</span>
                        </span>
                        <span>100%</span>
                    </div>
                    <h1>AAA COMPANY</h1>
                    <h2>SAN PASCUAL, TALAVERA, N.E.</h2>
                    <h2>VAT REG. TIN: 000-000-000-000</h2>
                    <h2>MIN: 1245678910111213</h2>
                    <h2>SN: 122ABCD</h2>
                    <h1>TENDER DECLARATION</h1>
                    <p>${dateTime}</p>
                    <table>
                        <tr>
                            <th>Value</th>
                            <th>Cash</th>
                            <th>Total</th>
                        </tr>
            `;

            // Add Tender Declaration rows
            tenderData.forEach(data => {
                reportContent += `
                    <tr>
                        <td>P ${data.denomination.toFixed(2)}</td>
                        <td>${data.qty}</td>
                        <td>${data.total.toFixed(2)}</td>
                    </tr>
                `;
            });

            // Add Tender Declaration totals
            reportContent += `
                <tr>
                    <td colspan="2" class="total">CASH</td>
                    <td class="total">${totalCash.toFixed(2)}</td>
                </tr>
            `;

            // Add Other Payment section if there are non-zero amounts
            if (otherPaymentData.length > 0) {
                reportContent += `
                    <tr><td colspan="3" class="total">OTHER PAYMENTS</td></tr>
                    <tr><th>Type</th><th colspan="2">Amount</th></tr>
                `;
                otherPaymentData.forEach(data => {
                    reportContent += `
                        <tr>
                            <td>${data.type}</td>
                            <td colspan="2">${data.amount.toFixed(2)}</td>
                        </tr>
                    `;
                });
                reportContent += `
                    <tr><td class="total">TOTAL OTHER</td><td colspan="2" class="total">${totalOther.toFixed(2)}</td></tr>
                `;
            }

            // Add grand total
            reportContent += `
                <tr>
                    <td colspan="2" class="total">GRAND TOTAL</td>
                    <td class="total">${grandTotal.toFixed(2)}</td>
                </tr>
            </table>
            <p class="footer">CASHIER NAME: CASHIER</p>
            <p class="footer">***END OF REPORT***</p>
            <div class="buttons">
                <button onclick="window.print()">Print</button>
                <button onclick="window.close()">Close</button>
            </div>
        </body>
        </html>
    `;

            // Open a new window and display the report
            const reportWindow = window.open('', '_blank', 'width=400,height=600');
            reportWindow.document.write(reportContent);
            reportWindow.document.close();
        });
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
}
.disabled-link {
    pointer-events: none; /* Disable click interactions */
    opacity: 0.7; /* Make the text appear faded */
    filter: blur(0.8px); /* Optionally add blur effect */
    cursor: not-allowed; /* Change cursor to indicate it's disabled */
}
</style>

<?php include_once 'footer.php'; ?>