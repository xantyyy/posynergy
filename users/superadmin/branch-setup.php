<?php include_once 'header.php'; ?>
<?php include_once 'modals.php'; ?>
<?php
require_once '../../includes/config.php'; // Database connection

// Check if the transaction is being closed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['close_transaction'])) {
    $today = date("Y-m-d");
    $closeSql = "UPDATE tbl_openingfund SET Closed = 1 WHERE Username = ? AND DATE(TransDate) = ?";
    $stmt = $conn->prepare($closeSql);
    $username = 'CASHIER';
    $stmt->bind_param('ss', $username, $today);
    if ($stmt->execute()) {
        echo "<script>alert('Transaction closed successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
    $stmt->close();
}

$conn->close();
?>

<!--MENU SIDEBAR CONTENT-->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="../../assets/images/isynergies.png" class="img-fluid"/>
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
                <li><a href="incoming.php">Incoming</a></li>
                <li><a href="adjustment-item.php">Adjustment</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">inventory</i><span>Product Profile</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                <li><a href="product-entry.php">Product Entry</a></li>
                <li><a href="product-search.php">Product Search</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">payment</i><span>Other Transaction</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                <li><a href="enroll-card.php">Enroll Card</a></li>
                <li><a href="document-reprinter.php">Document Reprinter</a></li>
                <li><a href="discount-setup.php">Discount Setup</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">search</i><span>Search</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="sales.php">Sales</a></li>
                <li><a href="discounts.php">Discounts</a></li>
                <li><a href="adjustment-incoming.php">Adjustemnt / Incoming</a></li>
                <li><a href="product-SL.php">Product SL</a></li>
                <li><a href="return.php">Return</a></li>
                <li><a href="e-journal.php">E-Journal</a></li>
                <li><a href="voided-transaction.php">Voided Transaction</a></li>
                <li><a href="suki-points.php">Suki Points</a></li>
                <li><a href="system-log.php">System Log</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">settings</i><span>Configuration</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                <li><a href="supplier.php">Supplier</a></li>
                <li><a href="list-maintenance.php">List Maintenance</a></li>
                <li><a href="branch-setup.php">Branch Setup</a></li>
                <li><a href="si-no.-txn-no.php">SI No. & Txn No.</a></li>
                <li><a href="user-accounts.php">User Accounts</a></li>
                <li><a href="permissions.php">Permissions</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">build</i><span>Utilities</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu7">
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#closeInventoryModal"> Close Today's Transaction</a></li>
                <li><a href="data-backup.php">Data Back-up</a></li>
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
        <nav class="navbar navbar-expand-lg">
            <button type="button" id="sidebar-collapse" class="back">
                <span class="material-icons"></span>
            </button>
            <a class="navbar-brand" href="#">Configuration</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
                data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>
        </nav>
    </div>	  

    <!--MAIN CONTENT HERE-->
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- Card for Branch Setup -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Title Section -->
                            <div class="text-center mb-4">
                                <h2>Branch Setup</h2>
                            </div>
                            <!-- Action Buttons -->
                            <div class="d-flex align-items-center mb-3">
                                <button type="button" class="btn btn-outline-primary me-2" style="font-size: 13px;" id="editButton">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button type="button" class="btn btn-outline-primary me-2" style="font-size: 13px;" id="saveButton">
                                    <i class="fas fa-save"></i> Save
                                </button>
                                <button type="button" class="btn btn-outline-primary" style="font-size: 13px;" id="cancelButton">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                            <hr>
                            <!-- Information Sections -->
                            <div class="row">
                                <!-- Supplier Information Section -->
                                <div class="col-md-12 mb-4">
                                    <h6>Supplier Information</h6>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive" style="max-height: 200px; overflow-y: auto;">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr><th style="width: 50%;">Company:</th><td id="company"></td></tr>
                                                        <tr><th>Business Line Trade:</th><td id="businessLineTrade"></td></tr>
                                                        <tr><th>Branch:</th><td id="branch"></td></tr>
                                                        <tr><th>Address:</th><td id="address"></td></tr>
                                                        <tr><th>Telephone No.:</th><td id="telephone"></td></tr>
                                                        <tr><th>TIN No.:</th><td id="tin"></td></tr>
                                                        <tr><th>Permit No.:</th><td id="permit"></td></tr>
                                                        <tr><th>Serial No.:</th><td id="serial"></td></tr>
                                                        <tr><th>Min No.:</th><td id="min"></td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Company Value Section -->
                                <div class="col-md-12 mb-4">
                                    <h6>Company Value</h6>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr><th style="width: 50%;">Vatable:</th><td id="vatable"></td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Minimum Purchase Section -->
                                <div class="col-md-12 mb-4">
                                    <h6>Minimum Purchase to Earn Points</h6>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr><th style="width: 50%;">ST Per Point:</th><td id="stPerPoint"></td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Senior Discount Setup Section -->
                                <div class="col-md-12 mb-4">
                                    <h6>Senior Discount Setup</h6>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr><th style="width: 50%;">Discount Max Amount:</th><td id="discountMaxAmount"></td></tr>
                                                        <tr><th>Discount Scope:</th><td id="discountScope"></td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Discount Percentage Section -->
                                <div class="col-md-12">
                                    <h6>Discount Percentage</h6>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr><th style="width: 50%;">Senior Discount:</th><td id="seniorDiscount"></td></tr>
                                                        <tr><th>PWD Discount:</th><td id="pwdDiscount"></td></tr>
                                                        <tr><th>Solo Parent Discount:</th><td id="soloParentDiscount"></td></tr>
                                                        <tr><th>NAAC Discount:</th><td id="naacDiscount"></td></tr>
                                                        <tr><th>Medal of Valor Discount:</th><td id="medalOfValorDiscount"></td></tr>
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
    </div>
</div>

<script>
$(document).ready(function () {
    // Initially disable Save and Cancel buttons
    $('#saveButton').prop('disabled', true);
    $('#cancelButton').prop('disabled', true);
    $('#editButton').prop('disabled', false);

    function updateButtonOpacity() {
        $('#saveButton').toggleClass('opacity-50', $('#saveButton').prop('disabled'));
        $('#cancelButton').toggleClass('opacity-50', $('#cancelButton').prop('disabled'));
        $('#editButton').toggleClass('opacity-50', $('#editButton').prop('disabled'));
    }
    updateButtonOpacity();

    let originalData = {};
    const editableFields = [
        'company', 'businessLineTrade', 'branch', 'address', 'telephone', 
        'tin', 'permit', 'serial', 'min', 'vatable', 'stPerPoint',
        'discountMaxAmount', 'discountScope', 'seniorDiscount', 'pwdDiscount',
        'soloParentDiscount', 'naacDiscount', 'medalOfValorDiscount'
    ];

    function enableEditMode() {
        editableFields.forEach(field => {
            originalData[field] = $(`#${field}`).text().trim();
            let value = originalData[field] === 'N/A' ? '' : originalData[field];
            let inputType = 'text';
            let inputClass = 'form-control form-control-sm';

            if (['seniorDiscount', 'pwdDiscount', 'soloParentDiscount', 'naacDiscount', 'medalOfValorDiscount'].includes(field)) {
                inputType = 'number';
                inputClass += ' text-end';
            }
            if (['discountMaxAmount', 'stPerPoint'].includes(field)) {
                inputType = 'number';
                inputClass += ' text-end';
            }

            $(`#${field}`).html(`<input type="${inputType}" class="${inputClass}" value="${value}" id="input_${field}">`);
        });

        $('#editButton').prop('disabled', true);
        $('#saveButton').prop('disabled', false);
        $('#cancelButton').prop('disabled', false);
        updateButtonOpacity();
    }

    function saveChanges() {
        let newData = {};
        let formValid = true;

        editableFields.forEach(field => {
            let $input = $(`#input_${field}`);
            let value = $input.val().trim();
            
            if (['company', 'branch', 'address'].includes(field) && value === '') {
                alert(`${field.charAt(0).toUpperCase() + field.slice(1)} cannot be empty!`);
                $input.focus();
                formValid = false;
                return false;
            }
            newData[field] = value || 'N/A';
        });

        if (!formValid) return;

        console.log("Saving data:", newData);

        $.ajax({
            url: 'manage-branchSetup.php',
            method: 'POST',
            data: { action: 'update', data: newData },
            dataType: 'json',
            success: function(response) {
                console.log("Response:", response);
                if (response.success) {
                    editableFields.forEach(field => {
                        $(`#${field}`).text(newData[field]);
                    });
                    $('#editButton').prop('disabled', false);
                    $('#saveButton').prop('disabled', true);
                    $('#cancelButton').prop('disabled', true);
                    updateButtonOpacity();
                    alert('Branch setup updated successfully!');
                } else {
                    alert('Error: ' + (response.message || 'Failed to update branch setup'));
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error, xhr.responseText);
                alert('Failed to save changes. Check console for details.');
            }
        });
    }

    function cancelEdit() {
        editableFields.forEach(field => {
            $(`#${field}`).text(originalData[field]);
        });
        $('#editButton').prop('disabled', false);
        $('#saveButton').prop('disabled', true);
        $('#cancelButton').prop('disabled', true);
        updateButtonOpacity();
    }

    $('#editButton').click(enableEditMode);
    $('#saveButton').click(saveChanges);
    $('#cancelButton').click(cancelEdit);

    // Fetch Branch Setup Data
    $.ajax({
        url: 'manage-branchSetup.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log("Fetch Response:", response);
            if (response.error) {
                alert("Error: " + response.error);
                return;
            }
            if (response.warning) {
                alert("Warning: " + response.warning);
            }

            $('#company').text(response.supplier?.Company ?? 'N/A');
            $('#businessLineTrade').text(response.supplier?.['Business Line Trade'] ?? 'N/A');
            $('#branch').text(response.supplier?.Branch ?? 'N/A');
            $('#address').text(response.supplier?.Address ?? 'N/A');
            $('#telephone').text(response.supplier?.['Telephone No.'] ?? 'N/A');
            $('#tin').text(response.supplier?.['TIN No.'] ?? 'N/A');
            $('#permit').text(response.supplier?.['Permit No.'] ?? 'N/A');
            $('#serial').text(response.supplier?.['Serial No.'] ?? 'N/A');
            $('#min').text(response.supplier?.['Min No.'] ?? 'N/A');
            $('#vatable').text(response.vatable ?? 'N/A');
            $('#stPerPoint').text(response.st_per_point ?? 'N/A');
            $('#discountMaxAmount').text(response.discount_setup?.max_amount ?? 'N/A');
            $('#discountScope').text(response.discount_setup?.scope ?? 'N/A');
            $('#seniorDiscount').text(response.discounts?.['Senior Discount'] ?? 'N/A');
            $('#pwdDiscount').text(response.discounts?.['PWD Discount'] ?? 'N/A');
            $('#soloParentDiscount').text(response.discounts?.['Solo Parent Discount'] ?? 'N/A');
            $('#naacDiscount').text(response.discounts?.['NAAC Discount'] ?? 'N/A');
            $('#medalOfValorDiscount').text(response.discounts?.['Medal of Valor Discount'] ?? 'N/A');
        },
        error: function (xhr, status, error) {
            console.error("Fetch Error:", status, error, xhr.responseText);
            alert("Failed to fetch data. Check server or network.");
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const currentUrl = window.location.pathname.split('/').pop();
    
    document.querySelectorAll('.list-unstyled a').forEach(link => {
        const linkHref = link.getAttribute('href');
        const parentMenu = link.closest('.collapse');
        const dropdownToggle = parentMenu ? parentMenu.previousElementSibling : null;

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

    document.getElementById('confirmCloseInventory')?.addEventListener('click', function () {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '';
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'close_transaction';
        input.value = '1';
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
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

/* 🔹 HOVER EFFECT ON DROPDOWN BUTTONS */
.dropdown-toggle:hover, 
.dropdown-toggle.highlighted-dropdown {
    background: rgb(65, 165, 232) !important; /* Navy Blue Background */
    color: #ffffff !important; /* White Text */
    transform: scale(1.05);
}
#table-bold thead th {
    font-weight: bold;
    font-style: italic;
}
</style>
<?php include_once 'footer.php'; ?>