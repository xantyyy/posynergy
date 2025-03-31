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
                    <a href="#" onclick="checkPassword('shift-reading.php')">Shift Reading</a>
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
                        <img src="../../assets/images/cashierbg.jpg" class="img-fluid" style="border-left: 200px solid black; margin-top: -20px;"/>    
                    </div>  
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
                        function checkPassword(redirectUrl) {
                            const passwordInput = document.createElement('input');
                            passwordInput.type = 'password';
                            passwordInput.placeholder = 'Enter password';
                            const modal = document.createElement('div');
                            modal.style.position = 'fixed';
                            modal.style.top = '50%';
                            modal.style.left = '50%';
                            modal.style.transform = 'translate(-50%, -50%)';
                            modal.style.padding = '20px';
                            modal.style.backgroundColor = 'Gainsboro';
                            modal.style.boxShadow = '0 4px 6px rgba(99, 225, 245)';
                            modal.style.zIndex = '1000';
                            const confirmButton = document.createElement('button');
                            confirmButton.textContent = 'Submit';
                            confirmButton.style.marginTop = '10px';
                            confirmButton.onclick = function() {
                                if (passwordInput.value === '123') {
                                    document.body.removeChild(modal);
                                    window.location.href = redirectUrl;
                                } else {
                                    alert('Incorrect password. Access denied.');
                                }
                            };
                            modal.appendChild(passwordInput);
                            modal.appendChild(confirmButton);
                            document.body.appendChild(modal);
                        }
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