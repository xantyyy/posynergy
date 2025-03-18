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
                        <!-- Left Column -->
                        <div class="col-md-5 ms-md-5" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
                            <div class="mb-3 row">
                                <label for="date" class="col-sm-4 col-form-label">Report Date:</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="date">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="time" class="col-sm-4 col-form-label">Report Time:</label>
                                <div class="col-sm-8">
                                    <input type="time" class="form-control" id="time">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="startDateTime" class="col-sm-4 col-form-label">Start Date/Time:</label>
                                <div class="col-sm-8">
                                    <input type="datetime-local" class="form-control" id="startDateTime">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="endDateTime" class="col-sm-4 col-form-label">End Date/Time:</label>
                                <div class="col-sm-8">
                                    <input type="datetime-local" class="form-control" id="endDateTime">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="cashierName" class="col-sm-4 col-form-label">Cashier Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="cashierName">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="begSI" class="col-sm-4 col-form-label">Beg. SI#:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="begSI">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="endSI" class="col-sm-4 col-form-label">End. SI#:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="endSI">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="openingFund" class="col-sm-4 col-form-label">Opening Fund:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="openingFund">
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-5 offset-md-1">
                            <!-- Payment Received Section -->
                            <div class="mb-4" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; height: 250px;">
                                <h6 style="font-weight: bold; font-style: italic;">PAYMENT RECEIVED (POS)</h6>
                                <div class="table-responsive" style="max-height: 195px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Payment</th>
                                                <th class="text-center">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sample</td>
                                                <td>Sample</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Transaction Summary Section -->
                            <div style="border: 1px solid #ddd; padding: 15px; border-radius: 5px; height: 250px;">
                                <h6 style="font-weight: bold; font-style: italic;">TRANSACTION SUMMARY (Tender Declared)</h6>
                                <div class="table-responsive" style="max-height: 195px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Payment</th>
                                                <th class="text-center">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sample</td>
                                                <td>Sample</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Lower Left Section -->
                        <div class="col-md-5 mt-4 ms-md-5" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
                            <div class="mb-3 row">
                                <label for="totalPayments" class="col-sm-4 col-form-label">Total Payments:</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="totalPayments">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="void" class="col-sm-4 col-form-label">Void:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="void">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="refund" class="col-sm-4 col-form-label">Refund:</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="refund">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="withdrawal" class="col-sm-4 col-form-label">Withdrawal:</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="withdrawal">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-5 mt-4 offset-md-1" style="border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
                            <div class="mb-3 row">
                                <label for="openingFund2" class="col-sm-4 col-form-label">Opening Fund:</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="openingFund2">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="lessWithdrawal" class="col-sm-4 col-form-label">Less Withdrawal:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="lessWithdrawal">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="paymentReceived" class="col-sm-4 col-form-label">Payment Received:</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="paymentReceived">
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3 row">
                                <label for="short/over" class="col-sm-4 col-form-label">SHROT / OVER:</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="short/over">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-auto">
                <button type="button" class="btn btn-secondary me-2">
                    <i class="fa fa-print"></i> Generate
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-print"></i> Print
                </button>
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

                /* Add 'disabled-link' class to Edit Item and Void Item
                if (link.querySelector('span') && link.querySelector('span').textContent.includes('Edit Item') || 
                    link.querySelector('span') && link.querySelector('span').textContent.includes('Void Item')) {
                        link.classList.add('disabled-link');
                }*/
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
    </style>



<?php include_once 'footer.php'; ?>