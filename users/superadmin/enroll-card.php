<?php include_once 'header.php'; ?>
<?php include_once 'modals.php'; ?>
<?php
	require_once '../../includes/config.php'; // Database connection

	// Check if the transaction is being closed
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['close_transaction'])) {
		$today = date("Y-m-d");
		$closeSql = "UPDATE tbl_openingfund SET Closed = 1 WHERE Username = 'CASHIER' AND DATE(TransDate) = '$today'";
		if ($conn->query($closeSql) === TRUE) {
			echo "<script>alert('Transaction closed successfully!');</script>";
		} else {
			echo "<script>alert('Error: " . $conn->error . "');</script>";
		}
	}

	$conn->close();
?>

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
								<a href="#" data-bs-toggle="modal" data-bs-target="#closeInventoryModal"> Close Today's Transaction</a>
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
						
						<a class="navbar-brand" href="#">Other Transaction</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	  

				<!-- PHP FOR ADDING NEW PRODUCT IN THE DATABASE -->

				<!--MAIN CONTENT HERE!!!!!!!!-->
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 style="margin: 0 20px; margin-top: 15px;">Advantage Card Enrollment Form</h2>
						</div>
					</div>
					<div class="row mb-3">
					<!-- Left Side - Product Data Entry Form -->
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<h6>Personal Information</h6>
								<form id="personalForm">
    <div class="d-flex align-items-center">
        <div class="form-group col-md-3 me-4">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName">
        </div>
        <div class="form-group col-md-3 me-4">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName">
        </div>
        <div class="form-group col-md-3 me-4">
            <label for="middleName">Middle Name:</label>
            <input type="text" class="form-control" id="middleName">
        </div>
    </div>
    <div class="d-flex align-items-center mt-4">
        <div class="form-group col-md-3 me-4">
            <label for="lotHouse">Lot/House/Building/#:</label>
            <input type="text" class="form-control" id="lotHouse">
        </div>
        <div class="form-group col-md-4 me-4">
            <label for="street">Street/Purok:</label>
            <input type="text" class="form-control" id="street">
        </div>
        <div class="form-group col-md-4 me-4">
            <label for="barangay">Barangay:</label>
            <input type="text" class="form-control" id="barangay">
        </div>
    </div>
    <div class="d-flex align-items-center mt-4">
        <div class="form-group col-md-3 me-4">
            <label for="townCity">Town/City:</label>
            <input type="text" class="form-control" id="townCity">
        </div>
        <div class="form-group col-md-4 me-4">
            <label for="province">Province:</label>
            <input type="text" class="form-control" id="province">
        </div>
        <div class="form-group col-md-4 me-4">
            <label for="civilStatus">Civil Status:</label>
            <select class="form-control" id="civilStatus">
                <option value="" selected disabled>Select Civil Status</option>
                <option value="SINGLE">SINGLE</option>
                <option value="MARRIED">MARRIED</option>
                <option value="SEPARATED">SEPARATED</option>
                <option value="WIDOW">WIDOW</option>
            </select>
        </div>
    </div>
    <div class="d-flex align-items-center mt-4">
        <div class="form-group col-md-3 me-4">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" id="birthday">
        </div>
        <label for="gender" class="mr-3 me-3 mt-4">Gender:</label>
        <div class="form-check me-3 mt-4">
            <input class="form-check-input" type="radio" name="gender" id="male" value="MALE" checked>
            <label class="form-check-label" for="male">
                Male
            </label>
        </div>
        <div class="form-check me-4 mt-4">
            <input class="form-check-input" type="radio" name="gender" id="female" value="FEMALE">
            <label class="form-check-label" for="female">
                Female
            </label>
        </div>
        <div class="form-group col-md-4 me-2">
            <label for="cardNumber">Card Details:</label>
            <input type="text" class="form-control" id="cardNumber" placeholder="Card #">
        </div>

        <!-- Buttons -->
        <button type="button" id="btnNew" class="btn btn-outline-primary opacity-50 me-2">
            <i class="fas fa-plus"></i> New
        </button>
        <button type="button" id="btnCancel" class="btn btn-outline-primary opacity-50 me-2">
            <i class="fas fa-save"></i> Cancel
        </button>
        <button type="button" id="btnSave" class="btn btn-outline-primary opacity-50 me-2">
            <i class="fas fa-trash"></i> Save
        </button>
    </div>
</form>
							</div>
						</div>
					</div>
				</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
    // Get the save button
    const saveButton = document.getElementById('btnSave');
    
    // Function to check if all required fields are filled
    function validateForm() {
        const inputs = document.querySelectorAll('#personalForm input');
        let isValid = true;

        // Check each input field
        inputs.forEach(input => {
            if (input.type !== 'radio' && !input.value.trim()) {
                isValid = false;
            }
        });

        // Check if gender is selected
        const genderSelected = document.querySelector('input[name="gender"]:checked');
        if (!genderSelected) {
            isValid = false;
        }

        // Check if civil status is selected
        const civilStatus = document.querySelector('#civilStatus');
        if (!civilStatus.value) {
            isValid = false;
        }

        return isValid;
    }

    // Add click event to save button
    saveButton.addEventListener('click', function(e) {
        e.preventDefault();

        if (validateForm()) {
            // Get all form data
            saveButton.addEventListener('click', function(e) {
    e.preventDefault();

    if (validateForm()) {
        // Get all form data
        const formData = {
            lastName: document.getElementById('lastName').value,
            firstName: document.getElementById('firstName').value,
            middleName: document.getElementById('middleName').value,
            lotHouse: document.getElementById('lotHouse').value,
            street: document.getElementById('street').value,
            barangay: document.getElementById('barangay').value,
            townCity: document.getElementById('townCity').value,
            province: document.getElementById('province').value,
            civilStatus: document.getElementById('civilStatus').value,
            birthday: document.getElementById('birthday').value,
            gender: document.querySelector('input[name="gender"]:checked').value,
            cardNumber: document.getElementById('cardNumber').value,
            pointsEarned: 1000, // Default value as per your database
            pointsUsed: 0,      // Default value as per your database
            balance: 1000       // Default value as per your database
        };

        // Log the formData to the console for debugging
        console.log('Form Data being sent:', formData);

        // Send data to PHP script via AJAX
        fetch('save-cardholder.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Cardholder saved successfully!');
                document.getElementById('personalForm').reset();
            } else {
                alert('Error saving cardholder: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while saving the cardholder.');
        });
    } else {
        alert('Please fill in all required fields!');
    }
});

            // Send data to PHP script via AJAX
            fetch('save-cardholder.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Cardholder saved successfully!');
                    document.getElementById('personalForm').reset();
                } else {
                    alert('Error saving cardholder: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while saving the cardholder.');
            });
        } else {
            alert('Please fill in all required fields!');
        }
    });

    // Existing code for sidebar and form enable/disable
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

    // Handle the close transaction confirmation
    document.getElementById('confirmCloseInventory')?.addEventListener('click', function () {
		// Submit a form to close the transaction
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

    // Disable all form fields initially
    const form = document.getElementById('personalForm');
    if (form) {
        const fields = form.querySelectorAll('input, select, textarea');
        fields.forEach(field => field.disabled = true);
    }

    // Enable all fields when New button is clicked
    const newBtn = document.getElementById('btnNew');
    if (newBtn) {
        newBtn.addEventListener('click', function () {
            const fields = form.querySelectorAll('input, select, textarea');
            fields.forEach(field => field.disabled = false);
        });
    }

    // Reset fields & disable when Cancel button is clicked
    const cancelBtn = document.getElementById('btnCancel');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function () {
            const fields = form.querySelectorAll('input, select, textarea');
            fields.forEach(field => {
                field.disabled = true;
                field.value = ''; // Reset value to empty
            });

            // Reset radio buttons
            const radioButtons = form.querySelectorAll('input[type="radio"]');
            radioButtons.forEach(radio => radio.checked = false);
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
				</style>

<?php include_once 'footer.php'; ?>