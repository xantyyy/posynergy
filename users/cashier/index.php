<?php
// Set the timezone to Asia/Manila
date_default_timezone_set('Asia/Manila');

include_once 'header.php'; ?>
<?php include 'sidebar-modals.php'; ?>

<?php
require_once '../../includes/config.php'; // Database connection

$showReceipt = false; // Flag to determine if the receipt should be shown
$receiptData = []; // To store receipt data

// Check if the form is submitted for declaring opening fund
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['opening_fund_amount']) && isset($_POST['password'])) {
    $cashier = "CASHIER"; // Hardcoded as per your table
    $amount = $_POST['opening_fund_amount'];
    $password = $_POST['password'];
    $transDate = date("Y-m-d H:i:s"); // Current date and time

    // Verify the password (assuming passwords are stored in a `tbl_users` table)
    $sql = "SELECT Password FROM tbl_users WHERE Username = '$cashier'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['Password'];

        // Verify password (assuming passwords are hashed, e.g., using password_hash())
        if (password_verify($password, $storedPassword)) {
            // Insert into tbl_openingfund with Closed set to 0 (open) by default
            $sql = "INSERT INTO tbl_openingfund (Username, Amount, TransDate, Closed) VALUES ('$cashier', '$amount', '$transDate', 0)";
            
            if ($conn->query($sql) === TRUE) {
                // Set flag to show receipt and store receipt data
                $showReceipt = true;
                $receiptData = [
                    'cashier' => $cashier,
                    'amount' => $amount,
                    'transDate' => $transDate
                ];
            } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Invalid password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('User not found.');</script>";
    }
}

// Check if an opening fund entry exists for today
$today = date("Y-m-d");
$checkSql = "SELECT * FROM tbl_openingfund WHERE Username = 'CASHIER' AND DATE(TransDate) = '$today'";
$result = $conn->query($checkSql);
$showModal = $result->num_rows == 0; // Show modal if no entry exists for today

// Check if the transaction for today is closed
$isTransactionClosed = false;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $isTransactionClosed = $row['Closed'] == 1;
}

// Check if yesterday's transaction is closed to allow opening fund declaration
$yesterday = date("Y-m-d", strtotime("-1 day"));
$yesterdaySql = "SELECT Closed FROM tbl_openingfund WHERE Username = 'CASHIER' AND DATE(TransDate) = '$yesterday'";
$yesterdayResult = $conn->query($yesterdaySql);
$canDeclareToday = true; // Default to true
if ($yesterdayResult->num_rows > 0) {
    $yesterdayRow = $yesterdayResult->fetch_assoc();
    $canDeclareToday = $yesterdayRow['Closed'] == 1; // Can declare only if yesterday's transaction is closed
}

$showModal = $showModal && $canDeclareToday; // Show modal only if no entry for today and yesterday's transaction is closed

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--MENU SIDEBAR CONTENT-->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="../../assets/images/isynergiesinc.png" class="img-fluid"/>
        <div class="ml-auto" id="userInfo">
            <p class="text-right">Cashier Staff</p>
        </div>
    </div>
    <ul class="list-unstyled components">
        <li class="">
            <a href="point-of-sale.php" class="dashboard <?php echo $isTransactionClosed ? 'disabled-link' : ''; ?>"><i class="material-icons">point_of_sale</i><span>Point of Sale</span></a>
        </li>
        <li class="dropdown">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle <?php echo $isTransactionClosed ? 'disabled-link' : ''; ?>">
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
        <li class="logout">
            <a href="?logout='1'"><i class="material-icons">logout</i><span>Logout</span></a>
        </li>
    </ul>
</nav>

<!--TOP NAVBAR CONTENT-->
<div class="top-navbar">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">POSynergy</a>
        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
            <span class="material-icons">menu</span>
        </button>        
    </nav>
</div>

<div>
    <img src="../../assets/images/cashierbg.jpg" class="img-fluid" style="border-left: 200px solid black; margin-top: -20px;"/>
</div>

<!-- Modal for Opening Fund Declaration -->
<div class="modal fade" id="openingFundModal" tabindex="-1" aria-labelledby="openingFundModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="openingFundModalLabel">Declare Opening Fund</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="openingFundForm">
                    <div class="mb-3">
                        <label for="openingFundAmount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="openingFundAmount" name="opening_fund_amount" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="declareButton">Declare</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Receipt Display (No Modal) -->
<?php if ($showReceipt): ?>
    <div id="receiptContainer" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border: 1px solid #000; box-shadow: 0 0 10px rgba(0,0,0,0.5); z-index: 1050;">
        <div id="receiptContent" style="font-family: monospace; text-align: center; padding: 20px; width: 300px; margin: 0 auto;">
            <p style="font-weight: bold; margin-bottom: 5px;">AAA COMPANY</p>
            <p style="margin: 0;">OWNED & OPERATED BY: AAA Company Inc.</p>
            <p style="margin: 0;">#101 SAN PASCUAL, TALAVERA, N.E.</p>
            <p style="margin: 0;">VAT REG - TIN 000-000-000-000</p>
            <p style="margin: 0;">MIN: 12345678910111213</p>
            <p style="margin: 0;">--------------------------------</p>
            <p style="font-weight: bold; margin: 10px 0;">OPENING FUND</p>
            <p style="margin: 0; text-align: left;">
                DATE-TIME   : 
                <?php echo date('m/d/Y h:i:s A', strtotime($receiptData['transDate'])); ?>
            </p>
            <p style="margin: 0; text-align: left;">
                CASHIER NAME : 
                <?php echo $receiptData['cashier']; ?>
            </p>
            <p style="margin: 0; text-align: left;">
                AMOUNT      : 
                <?php echo number_format($receiptData['amount'], 2); ?>
            </p>
            <p style="margin: 0;">--------------------------------</p>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <button type="button" class="btn btn-primary" onclick="printReceipt()">Print Receipt</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Close</button>
        </div>
    </div>
<?php endif; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Debug the time
        <?php if ($showReceipt): ?>
            console.log('Raw transDate: <?php echo $receiptData['transDate']; ?>');
            console.log('Formatted time: <?php echo date('m/d/Y h:i:s A', strtotime($receiptData['transDate'])); ?>');
        <?php endif; ?>

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
        });

        const form = document.getElementById('openingFundForm');
        const declareButton = document.getElementById('declareButton');

        if (form) {
            form.addEventListener('submit', function (event) {
                const amount = document.getElementById('openingFundAmount').value;
                const password = document.getElementById('password').value;

                // Client-side validation
                if (!amount || amount <= 0) {
                    event.preventDefault();
                    alert('Please enter a valid amount.');
                    return;
                }

                if (!password) {
                    event.preventDefault();
                    alert('Please enter your password.');
                    return;
                }
            });
        }

        // Show the opening fund modal only if no entry exists for today and yesterday's transaction is closed
        <?php if ($showModal && !$showReceipt): ?>
        var openingFundModal = new bootstrap.Modal(document.getElementById('openingFundModal'), {
            backdrop: 'static', // Prevent closing by clicking outside
            keyboard: false // Prevent closing with ESC key
        });
        openingFundModal.show();
        <?php endif; ?>
    });

    // Function to print the receipt
    function printReceipt() {
        try {
            const receiptContent = document.getElementById('receiptContent').innerHTML;
            if (!receiptContent) {
                console.error('Receipt content not found');
                alert('Error: Unable to print receipt. Content not found.');
                return;
            }

            const printWindow = window.open('', '_blank');
            if (!printWindow) {
                console.error('Failed to open print window. Popup blocker might be enabled.');
                alert('Error: Unable to open print window. Please allow popups and try again.');
                return;
            }

            printWindow.document.write(`
                <html>
                    <head>
                        <title>Opening Fund Receipt</title>
                        <style>
                            body { 
                                font-family: monospace; 
                                text-align: center; 
                                padding: 20px; 
                                width: 300px; 
                                margin: 0 auto; 
                            }
                            p { margin: 0; }
                            @media print {
                                .no-print { display: none; }
                            }
                        </style>
                    </head>
                    <body onload="window.print(); setTimeout(() => window.close(), 100);">
                        ${receiptContent}
                    </body>
                </html>
            `);
            printWindow.document.close();
        } catch (e) {
            console.error('Error during printing:', e);
            alert('Error: Unable to print receipt. Check the console for details.');
        }
    }
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
    body {
        background-image: url('../../assets/images/cashierbg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed; /* Para hindi mag-scroll */
        background-repeat: no-repeat;
        margin: 0;
        height: 100vh; /* Full height ng screen */
        overflow: hidden; /* Tatanggalin ang scrollbar */
    }
</style>

<?php include_once 'footer.php'; ?>