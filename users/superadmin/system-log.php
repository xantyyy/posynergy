<?php include_once 'header.php'; ?>

<!--MENU SIDEBAR CONTENT-->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="../../assets/images/isynergiesinc.png" class="img-fluid"/>
        
        <div class="ml-auto" id="userInfo">
            <p class="text-right">Admin</p>
            <p class="text-right">Main Branch</p>
        </div>
    </div>
    <ul class="list-unstyled components">
        <li class="">
            <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="material-icons">warehouse</i><span>Inventory</span></a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                <li>
                    <a href="incoming.php">Incoming</a>
                </li>
                <li>
                    <a href="adjustment-item.php">Adjustment</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="material-icons">inventory</i><span>Product Profile</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                <li>
                    <a href="product-entry.php">Product Entry</a>
                </li>
                <li>
                    <a href="product-search.php">Product Search</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="material-icons">payment</i><span>Other Transaction</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                <li>
                    <a href="enroll-card.php">Enroll Card</a>
                </li>
                <li>
                    <a href="document-reprinter.php">Document Reprinter</a>
                </li>
                <li>
                    <a href="discount-setup.php">Discount Setup</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="material-icons">search</i><span>Search</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                <li>
                    <a href="inventory.php">Inventory</a>
                </li>
                <li>
                    <a href="sales.php">Sales</a>
                </li>
                <li>
                    <a href="discounts.php">Discounts</a>
                </li>
                <li>
                    <a href="adjustment-incoming.php">Adjustemnt / Incoming</a>
                </li>
                <li>
                    <a href="product-SL.php">Product SL</a>
                </li>
                <li>
                    <a href="return.php">Return</a>
                </li>
                <li>
                    <a href="e-journal.php">E-Journal</a>
                </li>
                <li>
                    <a href="voided-transaction.php">Voided Transaction</a>
                </li>
                <li>
                    <a href="suki-points.php">Suki Points</a>
                </li>
                <li>
                    <a href="system-log.php">System Log</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="material-icons">settings</i><span>Configuration</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                <li>
                    <a href="supplier.php">Supplier</a>
                </li>
                <li>
                    <a href="list-maintenance.php">List Maintenance</a>
                </li>
                <li>
                    <a href="branch-setup.php">Branch Setup</a>
                </li>
                <li>
                    <a href="si-no.-txn-no.php">SI No. & Txn No.</a>
                </li>
                <li>
                    <a href="user-accounts.php">User Accounts</a>
                </li>
                <li>
                    <a href="permissions.php">Permissions</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="material-icons">build</i><span>Utilities</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu7">
                <li>
                    <a href="close-todays-transaction.php">Close Today's Transaction</a>
                </li>
                <li>
                    <a href="data-backup.php">Data Back-up</a>
                </li>
            </ul>
        </li>
        <li class="logout">
            <a href="?logout='1'"><i class="material-icons">logout</i><span>Logout</span></a>
        </li>
    </ul>
</nav>
<div id="content">

    <!--TOP NAVBAR CONTENT-->
    <div class="top-navbar">
        <nav class="navbar  navbar-expand-lg">
            <button type="button" id="sidebar-collapse" class="back">
            <span class="material-icons"></span>
            </button>
            
            <a class="navbar-brand" href="#">Search</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>
            
        </nav>
    </div>  

    <!--MAIN CONTENT HERE!!!!!!!!-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="margin: 0 20px; margin-top: 15px;">Log Viewer</h2>
            </div>
        </div>
    </div>
    <!-- Table Here -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="logType">Logs</label>
                        <select class="form-select" id="logType">
                            <option value="">Select Type</option>
                            <option value="OVERALL">OVERALL</option>
                            <option value="POS">POS</option>
                            <option value="INVENTORY">INVENTORY</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Date Filter:</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" id="startDate" placeholder="MM DD YYYY">
                            <span class="input-group-text">-</span>
                            <input type="text" class="form-control datepicker" id="endDate" placeholder="MM DD YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 align-self-end">
                        <button type="button" class="btn btn-outline-secondary" id="searchLogs">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
                <hr>
                <div class="table-responsive mt-2" style="height: calc(100vh - 300px); overflow-y: auto;">
                    <table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
                        <thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                            <tr>
                                <th>Timestamp</th>
                                <th>Remarks</th>
                                <th>Control</th>
                                <th>User</th>
                                <th>Application</th>
                            </tr>
                        </thead>
                        <tbody id="logTableBody">
                            <!-- Logs will be populated here via JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

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

        // Apply hover effect for menu items
        link.addEventListener("mouseenter", function () {
            this.classList.add("hover-effect");
        });

        link.addEventListener("mouseleave", function () {
            this.classList.remove("hover-effect");
        });
    });
    
    document.querySelectorAll('.dropdown-toggle').forEach(dropdown => {
        const parentMenu = dropdown.nextElementSibling;
        if (parentMenu && parentMenu.querySelector('.active')) {
            dropdown.classList.add('highlighted-dropdown', 'active');
            dropdown.setAttribute('aria-expanded', 'true');
        }
        
        dropdown.addEventListener("mouseenter", function () {
            this.classList.add('hovered-dropdown');
        });

        dropdown.addEventListener("mouseleave", function () {
            this.classList.remove("hovered-dropdown");
        });
    });

    // Initialize flatpickr for date pickers with custom format
    flatpickr(".datepicker", {
        dateFormat: "M d Y", // Month Day Year format (e.g., "May 07 2025")
        allowInput: true,
        onChange: function(selectedDates, dateStr, instance) {
            // Ensure the date is in the correct format when changed
            if (selectedDates.length > 0) {
                instance.setDate(selectedDates[0], true);
            }
        }
    });

    // Fetch and display logs
    function fetchLogs(startDate = '', endDate = '', logType = '') {
        // Convert date to YYYY-MM-DD for backend compatibility
        const formatDateForBackend = (dateStr) => {
            if (!dateStr) return '';
            const [month, day, year] = dateStr.split(' ');
            return `${year}-${new Date(Date.parse(month + " 1, " + year)).toLocaleString('default', { month: '2-digit' })}-${day.padStart(2, '0')}`;
        };

        const startDateBackend = formatDateForBackend(startDate);
        const endDateBackend = formatDateForBackend(endDate);

        $.ajax({
            url: 'fetch_logs.php',
            method: 'POST',
            data: {
                startDate: startDateBackend,
                endDate: endDateBackend,
                logType: logType,
                user: 'ADMIN'
            },
            dataType: 'json',
            success: function(response) {
                const tbody = $('#logTableBody');
                tbody.empty();
                if (response.status === 'success' && response.logs.length > 0) {
                    response.logs.forEach(log => {
                        tbody.append(`
                            <tr>
                                <td>${log.Timestamp}</td>
                                <td>${log.Remarks}</td>
                                <td>${log.Control}</td>
                                <td>${log.User}</td>
                                <td>${log.Application}</td>
                            </tr>
                        `);
                    });
                } else {
                    tbody.append('<tr><td colspan="5">No logs found</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX error: " + error);
                $('#logTableBody').html('<tr><td colspan="5">Error fetching logs</td></tr>');
            }
        });
    }

    // Initial load of logs
    fetchLogs();

    // Search button functionality
    $('#searchLogs').on('click', function() {
        const startDate = $('#startDate').val();
        const endDate = $('#endDate').val();
        const logType = $('#logType').val();

        if ((startDate && !endDate) || (!startDate && endDate)) {
            alert('Please select both start and end dates or leave both empty.');
            return;
        }

        fetchLogs(startDate, endDate, logType);
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
    .dropdown-toggle, 
    .list-unstyled a {
        color: #333;
        font-size: 16px;
        transition: all 0.3s ease-in-out;
    }

    /* 🔹 HOVER EFFECT - NAV-LINK, DROPDOWN BUTTON, & DROPDOWN LIST ITEMS */
    .nav-link:hover, 
    .list-unstyled a:hover, 
    .dropdown-toggle:hover,
    .hovered-dropdown, .hover-effect {
        background: rgb(65, 165, 232) !important; /* Navy Blue */
        color: #ffffff !important; /* White Text */
        transform: scale(1.05);
    }

    /* 🔹 ACTIVE LINK STYLE (For Clicked Items) */
    .nav-link.active, 
    .list-unstyled a.active, 
    .dropdown-toggle.active {
        color: rgb(0, 0, 0) !important; /* Black */
        font-weight: bold !important;
        background: transparent !important;
    }

    /* 🔹 WHEN DROPDOWN IS EXPANDED */
    .dropdown-toggle[aria-expanded="true"], 
    .dropdown-toggle.highlighted-dropdown {
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
    .dropdown-toggle:hover *, 
    .dropdown-toggle.highlighted-dropdown:hover * {
        color: white !important;
    }

    /* 🔹 SIDEBAR STYLE */
    .sidebar {
        width: 250px;
        background: rgb(65, 165, 232) !important; /* Navy Blue */
        overflow: visible !important;
    }

    .sidebar .collapse {
        display: none;
    }

    .sidebar .collapse.show {
        display: block !important;
    }

    #table-bold thead th {
        font-weight: bold;
        font-style: italic;
    }
</style>
<?php include_once 'footer.php'; ?>