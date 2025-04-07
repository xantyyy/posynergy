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
                <i class="material-icons">report</i><span>POS Reports</span>
            </a>
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
        <div class="card">
            <div class="card-body">
                <div class="receipt-container">
                    <div class="receipt-header">Z-Reading</div>

                    <div class="receipt-row">
                        <span class="receipt-label">Report Date:</span>
                        <span class="receipt-value" id="reportDate"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Report Time:</span>
                        <span class="receipt-value" id="reportTime"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Start Date / Time:</span>
                        <span class="receipt-value" id="startDateTime"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">End Date / Time:</span>
                        <span class="receipt-value" id="endDateTime"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Beg. SI #:</span>
                        <span class="receipt-value" id="begSI"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">End. SI #:</span>
                        <span class="receipt-value" id="endSI"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Beg. VOID #:</span>
                        <span class="receipt-value" id="begVoid"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">End. VOID #:</span>
                        <span class="receipt-value" id="endVoid"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Beg. RETURN #:</span>
                        <span class="receipt-value" id="begReturn"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">End. RETURN #:</span>
                        <span class="receipt-value" id="endReturn"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Reset Counter No:</span>
                        <span class="receipt-value" id="resetCounter"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Z Counter No:</span>
                        <span class="receipt-value" id="zCounter"></span>
                    </div>

                    <div class="dashed-line"></div>

                    <div class="receipt-row">
                        <span class="receipt-label">Present Accumulated Sales:</span>
                        <span class="receipt-value" id="presentSale"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Previous Accumulated Sales:</span>
                        <span class="receipt-value" id="previousSale"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Sales for the Day:</span>
                        <span class="receipt-value" id="salesDay"></span>
                    </div>

                    <div class="dashed-line"></div>

                    <div class="section-title">BREAKDOWN OF SALES</div>
                    <div class="receipt-row">
                        <span class="receipt-label">Vatable Sales:</span>
                        <span class="receipt-value" id="vatSales"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">VAT Amount:</span>
                        <span class="receipt-value" id="vatAmount"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">VAT Exempt Sales:</span>
                        <span class="receipt-value" id="exemptSales"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Zero Rated Sales:</span>
                        <span class="receipt-value" id="zeroRated"></span>
                    </div>

                    <div class="dashed-line"></div>

                    <div class="receipt-row">
                        <span class="receipt-label">Gross Amount:</span>
                        <span class="receipt-value" id="grossAmount"></span>
                    </div>
                    <div class="receipt-row">
                        <span class="receipt-label">Less Discount:</span>
                        <span class="receipt-value" id="lessDiscount"></span>
                    </div>

                    <div class="buttons">
                        <button type="button" class="btn btn-secondary me-2 btn-generate" id="generateButton">
                            <i class="fa fa-print"></i> Generate
                        </button>
                        <button type="button" class="btn btn-primary btn-print" id="printButton">
                            <i class="fa fa-print"></i> Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
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

        // Handle Generate button click
        document.getElementById('generateButton').addEventListener('click', function () {
            // Get the current date and time
            const now = new Date();

            // Format the date as "Month DD, YYYY" (e.g., "December 13, 2023")
            const monthNames = ["January", "February", "March", "April", "May", "June", 
                                "July", "August", "September", "October", "November", "December"];
            const reportDate = `${monthNames[now.getMonth()]} ${String(now.getDate()).padStart(2, '0')}, ${now.getFullYear()}`;

            // Format the time as "HH:MM AM/PM" (e.g., "08:42 AM")
            let hours = now.getHours();
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // If hours is 0, set it to 12 (for 12 AM/PM)
            const reportTime = `${hours}:${minutes} ${ampm}`;

            // Populate the fields
            document.getElementById('reportDate').textContent = reportDate;
            document.getElementById('reportTime').textContent = reportTime;
            document.getElementById('startDateTime').textContent = '12/13/2023 08:35:22 AM';
            document.getElementById('endDateTime').textContent = '12/13/2023 08:42:00 AM';
            document.getElementById('begSI').textContent = '00000000000000000000';
            document.getElementById('endSI').textContent = '00000000000000000000';
            document.getElementById('begVoid').textContent = '00000000000000000000';
            document.getElementById('endVoid').textContent = '';
            document.getElementById('begReturn').textContent = '';
            document.getElementById('endReturn').textContent = '';
            document.getElementById('resetCounter').textContent = '0';
            document.getElementById('zCounter').textContent = '0';
            document.getElementById('presentSale').textContent = '27,803.80';
            document.getElementById('previousSale').textContent = '26,896.42';
            document.getElementById('salesDay').textContent = '247.50';
            document.getElementById('vatSales').textContent = '0.00';
            document.getElementById('vatAmount').textContent = '0.00';
            document.getElementById('exemptSales').textContent = '22,321.67';
            document.getElementById('zeroRated').textContent = '0.00';
            document.getElementById('grossAmount').textContent = '27,834.80';
            document.getElementById('lessDiscount').textContent = '621.35';
        });

        // Handle Print button click
        document.getElementById('printButton').addEventListener('click', function () {
            // Check if the Generate button has been clicked (i.e., fields are populated)
            const reportDate = document.getElementById('reportDate').textContent;
            if (!reportDate) {
                alert('Please click "Generate" to populate the report before printing.');
                return;
            }

            // Hide the sidebar and navbar for printing
            document.getElementById('sidebar').style.display = 'none';
            document.querySelector('.top-navbar').style.display = 'none';

            // Trigger the print dialog
            window.print();

            // Restore the sidebar and navbar after printing
            document.getElementById('sidebar').style.display = '';
            document.querySelector('.top-navbar').style.display = '';
        });
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

    /* Receipt-specific styles */
    .receipt-container {
        background-color: white;
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-family: 'Courier New', Courier, monospace;
        font-size: 14px;
        line-height: 1.5;
    }
    .receipt-header {
        text-align: center;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .receipt-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }
    .receipt-label {
        font-weight: bold;
    }
    .receipt-value {
        text-align: right;
    }
    .dashed-line {
        border-top: 1px dashed #000;
        margin: 10px 0;
    }
    .section-title {
        font-weight: bold;
        font-style: italic;
        text-align: center;
        margin: 10px 0;
    }
    .buttons {
        text-align: center;
        margin-top: 20px;
    }
    .buttons button {
        padding: 10px 20px;
        margin: 0 5px;
        border: none;
        cursor: pointer;
    }
    .btn-generate {
        background-color: #6c757d;
        color: white;
    }
    .btn-print {
        background-color: #007bff;
        color: white;
    }

    /* Print-specific styles */
    @media print {
        body * {
            visibility: hidden;
        }
        .receipt-container, .receipt-container * {
            visibility: visible;
        }
        .receipt-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            box-shadow: none;
            border: none;
        }
        .buttons {
            display: none; /* Hide buttons during printing */
        }
    }
</style>

<?php include_once 'footer.php'; ?>