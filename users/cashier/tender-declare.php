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
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱500.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱200.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱100.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱50.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱20.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱10.00</td>
                                    <td>X</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱5.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱1.00</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.50</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.25</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.10</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.05</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
                                </tr>
                                <tr>
                                    <td>₱0.01</td>
                                    <td>×</td>
                                    <td><input type="number" class="form-control text-center" min="0" value="0"></td>
                                    <td>=</td>
                                    <td><input type="number" class="form-control text-center" min="0" readonly></td>
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
                            Double-click the payment type to declare amount.
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
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
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
                            <button type="button" class="btn btn-primary me-2">
                                <i class="fas fa-check"></i> Process
                            </button>
                            <button type="button" class="btn btn-danger">
                                <i class="fas fa-times"></i> Cancel
                            </button>
                        </div>
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