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
        <li class="">
            <a href="point-of-sale.php" class="dashboard"><i class="material-icons">point_of_sale</i><span>Point of Sale</span></a>
        </li>
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
                    <a href="#" id="openFundBtn">Opening Fund</a>
                </li>
			</ul>
		</li>
        <li class="logout" style="margin-top: 30px;">
            <a href="?logout='1'"><i class="material-icons">logout</i><span>Logout</span></a>
        </li>
    </ul>
</nav>

           <!-- First Modal: Password Input -->
            <div id="passwordModal" class="modal">
                <div class="modal-content">
                    <h2>Enter Password</h2>
                    <input type="password" id="passwordInput" placeholder="Enter password">
                    <div class="modal-actions">
                        <button id="submitPassword">Submit</button>
                        <button id="closePasswordModal">Cancel</button>
                    </div>
                </div>
            </div>

            <!-- Second Modal: Declare Opening Fund -->
            <div id="fundModal" class="modal">
                <div class="modal-content">
                    <h2>Declare Opening Fund</h2>
                    <input type="number" id="fundAmount" placeholder="Enter amount">
                    <div class="modal-actions">
                        <button id="nextToConfirm">Submit</button>
                        <button id="closeFundModal">Cancel</button>
                    </div>
                </div>
            </div>
            <!-- Declare Opening Fund Modal -->
            <div id="openingFundModal" class="modal">
                <div class="modal-content">
                    <h2>Declare Opening Fund</h2>
                    <label for="fundAmount">Enter Amount:</label>
                    <input type="number" id="fundAmount" required>
                    <button id="submitFund">Submit</button>
                </div>
            </div>

            <!-- Third Modal: Confirmation -->
            <div id="confirmModal" class="modal">
                <div class="modal-content">
                    <h2>Are you sure you want to submit the opening fund?</h2>
                    <div class="modal-actions">
                        <button id="confirmSubmit">Yes</button>
                        <button id="closeConfirmModal">No</button>
                    </div>
                </div>
            </div>
            <!-- Confirmation Modal -->
            <div id="confirmModal" class="modal">
                <div class="modal-content">
                    <h2>Are you sure you want to submit the opening fund?</h2>
                    <div class="modal-actions">
                        <button id="confirmSubmit">Yes</button>
                        <button id="closeConfirmModal">No</button>
                    </div>
                </div>
            </div>

            
<div id="content">

    <!--TOP NAVBAR CONTENT-->
    <div class="top-navbar">
        <nav class="navbar  navbar-expand-lg">
            </button>
            
            <a class="navbar-brand" href="#">POSynergy</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>        
        </nav>
    </div>	  
    <div>
                        <img src="../../assets/images/cashierbg.jpg" class="img-fluid" style=" margin-top: -20px;"/>    
                    </div>  
    <!--DASHBOARD CONTENT-->
    <div class="main-content">
        <div class="row">
            <!-- Left Side - Product Data Entry Form -->
            

            <!-- Right Side - Additional Table -->
            <!--<div class="col-md-4" style="margin-top: -15px;">
                
            </div>-->
        </div>
    </div>
</div>

    <script>
        
        document.getElementById("submitFund").addEventListener("click", function () {
        let amount = document.getElementById("fundAmount").value;

        if (amount.trim() === "" || amount <= 0) {
            alert("Please enter a valid amount.");
            return;
        }

        // Send to PHP via AJAX
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "save_opening_fund.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText); // Show response message
                closeModal("openingFundModal");
            }
        };
        xhr.send("amount=" + amount);
    })
    // Final Submit
document.getElementById("confirmSubmit").addEventListener("click", function () {
    let amount = document.getElementById("fundAmount").value;
    
    // Send data to server to update database
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "save_opening_fund.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Close the confirmation modal first
                closeModal("confirmModal");
                
                // Show success message
                //alert("Opening Fund Successfully Declared: " + amount);
                
                // Generate receipt - using your working code pattern
                let receiptWindow = window.open("", "_blank");
                receiptWindow.document.write(`
                    <html>
                    <head>
                        <title>Receipt</title>
                        <style>
                            body { font-family: Arial, sans-serif; text-align: center; }
                            .receipt { border: 1px solid #000; padding: 20px; width: 300px; margin: auto; }
                        </style>
                    </head>
                    <body onload="window.print(); window.onafterprint = window.close;">
                        <div class="receipt">
                            <h2>AM COMPANY</h2>
                            <p>Owned & Operated By: AM Company Inc.</p>
                            <p>#101 SAN PASCUAL, TALAVERA, N.E.</p>
                            <p>VAT REG: TIN 000-000-000-000</p>
                            <p>MIN: 12345678910111213</p>
                            <p>SN: 1234BCD</p>
                            <hr>
                            <h3>OPENING FUND</h3>
                            <p><b>DATE-TIME:</b> ${new Date().toLocaleString()}</p>
                            <p><b>CASHIER NAME:</b> CASHIER</p>
                            <p><b>AMOUNT:</b> ₱${parseFloat(amount).toLocaleString()}</p>
                            <hr>
                            <p>==============================</p>
                        </div>
                    </body>
                    </html>
                `);
                
            } else {
                alert("Error saving opening fund data.");
            }
        }
    };
    xhr.send("amount=" + amount);
});
            function showModal(modalId) {
        console.log("Showing modal:", modalId);
        document.getElementById(modalId).style.display = "flex";
    }

    function closeModal(modalId) {
        console.log("Closing modal:", modalId);
        document.getElementById(modalId).style.display = "none";
    }

    // Show Password Modal
    document.getElementById("openFundBtn").addEventListener("click", function (event) {
        event.preventDefault();
        showModal("passwordModal");
    });

    // Close Password Modal
    document.getElementById("closePasswordModal").addEventListener("click", function () {
        closeModal("passwordModal");
    });

    // Check Password
    document.getElementById("submitPassword").addEventListener("click", function () {
        let password = document.getElementById("passwordInput").value;
        if (password === "123") { // Password mo na "123"
            closeModal("passwordModal"); // Close first modal
            showModal("fundModal"); // Show second modal
        } else {
            alert("Incorrect password!");
        }
    });

    // Close Fund Modal
    document.getElementById("closeFundModal").addEventListener("click", function () {
        closeModal("fundModal");
    });

    // Show Confirmation Modal
    document.getElementById("nextToConfirm").addEventListener("click", function () {
        let amount = document.getElementById("fundAmount").value;
        if (amount.trim() === "" || isNaN(amount) || amount <= 0) {
            alert("Please enter a valid amount!");
        } else {
            closeModal("fundModal"); // Close second modal
            showModal("confirmModal"); // Show confirmation modal
        }
    });

    // Close Confirmation Modal
    document.getElementById("closeConfirmModal").addEventListener("click", function () {
        closeModal("confirmModal");
    });

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
            /* Modal Overlay */
            .modal {
                display: none; /* Hidden by default */
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1000;
                justify-content: center;
                align-items: center;
            }

            /* Modal Content */
            .modal-content {
                background-color: #fff;
                padding: 20px;
                border-radius: 12px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                width: 300px;
                text-align: center;
            }

            /* Modal Title */
            .modal-title {
                font-size: 1.5em;
                margin-bottom: 15px;
                color: #333;
            }

            /* Input Field */
            .modal-input {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 1em;
            }

            /* Modal Actions */
            .modal-actions {
                display: flex;
                gap: 10px;
                justify-content: center;
            }

            /* Buttons */
            .modal-button {
                padding: 10px 20px;
                font-size: 1em;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .modal-button.primary {
                background-color: #007bff;
                color: #fff;
            }

            .modal-button.primary:hover {
                background-color: #0056b3;
            }

            .modal-button.secondary {
                background-color: #f8f9fa;
                color: #333;
            }

            .modal-button.secondary:hover {
                background-color: #e2e6ea;
            }
            .modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                justify-content: center;
                align-items: center;
            }
            .modal-content {
                background: white;
                padding: 20px;
                border-radius: 10px;
                text-align: center;
                width: 300px;
            }
            .modal-actions {
                margin-top: 15px;
            }
            .modal-actions button {
                margin: 5px;
            }
            .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
        }
        .modal-actions {
            margin-top: 15px;
        }
        .modal-actions button {
            margin: 5px;
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
    </style>



<?php include_once 'footer.php'; ?>