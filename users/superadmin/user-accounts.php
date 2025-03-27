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
						
						<a class="navbar-brand" href="#">Configuration</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	  

				<!-- PHP FOR ADDING NEW PRODUCT IN THE DATABASE -->

				<!--MAIN CONTENT HERE!!!!!!!!-->
					<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; margin-top: -30px;">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<div class="card">
										<div class="card-body">
											<div class="col-md-12">
												<h2>User Setup</h2>
											</div>
											<form>
												<div class="d-flex align-items-center mt-3">
													<button type="button" class="btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" id="newBtn">
														<i class="fas fa-plus"></i> New
													</button>	
													<button type="button" class="btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" id="saveBtn" disabled>
														<i class="fas fa-save"></i> Save
													</button>
													<button type="button" class="btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" id="editBtn" disabled>
														<i class="fas fa-edit"></i> Edit
													</button>
													<button type="button" class="btn btn-outline-primary opacity-50 me-2" style="font-size: 13px;" id="disableBtn" disabled>
														<i class="fas fa-ban"></i> Disable
													</button>

												</div>
												<div class="d-flex align-items-center mt-2">
													<h6>Supplier Info:</h6>
													<label for="#" class="mb-2" style="margin-left: 10px; color: red; text-transform: none;">
														Right click user account to set the User Authority Restriction.
													</label>
												</div>
											</form>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<h6>User List</h6>
													<div class="card">
														<div class="card-body">
															<div style="overflow-x: auto; white-space: nowrap;">
																<table class="table table-bordered" style="margin-top: 10px;" id="table-bold">
																	<thead class="card-header bg-dark opacity-60 text-white">
																		<tr>
																			<th>Username</th>
																			<th>Role</th>
																			<th>Status</th>
																			<th>Traning Mode</th>
																		</tr>
																	</thead>
																	<tbody>
																			<tr>
																				<td>ADMIN</td>
																				<td>ADMIN / IT</td>
																				<td>Enabled</td>
																				<td>No</td>
																			</tr>
																			<tr>
																				<td>CASHIER</td>
																				<td>CASHIER</td>
																				<td>Enabled</td>
																				<td>No</td>
																			</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<h6>User Fullname</h6>
													<form>
														<div class="d-flex align-items-center mt-3">
															<input type="text" class="form-control" style="width: 97%; margin-left: 10px;" id="fullName" disabled>
														</div>
													</form>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<h6>Account Details</h6>
													<form>
													<div class="d-flex align-items-center mt-3">
														<label for="roleInput" class="me-2">Role:</label>
														<select class="form-select" style="width: 97%; margin-left: 50px;" id="roleInput" disabled>
															<option value=""></option>
															<option value="ADMIN/IT">ADMIN/IT</option>
															<option value="CASHIER">CASHIER</option>
															<option value="MANAGER">MANAGER</option>
														</select>
													</div>

														<div class="d-flex align-items-center mt-3">
															<label for="usernameInput" class="me-2">Username:</label>
															<input type="text" class="form-control" style="width: 97%; margin-left: 10px;" id="usernameInput" disabled>
														</div>
														<div class="d-flex align-items-center mt-3">
															<label for="passwordInput" class="me-2">Password:</label>
															<input type="text" class="form-control" style="width: 97%; margin-left: 15px;" id="passwordInput" disabled>
														</div>
														<div class="d-flex align-items-center mt-3">
															<label for="confirmInput" class="me-2">Confirm:</label>
															<input type="text" class="form-control" style="width: 97%; margin-left: 23px;" id="confirmInput" disabled>
														</div>
													</form>
													<p style="text-transform: none; font-size: 14px; font-style: italic; margin-left: 95px;" class="mt-2">
														Password are case-sensitive.
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
            	</div>



			<!--JAVASCRIPT FOR USER ACCOUNTS-->
			<script>
	document.addEventListener("DOMContentLoaded", function () {
    let newBtn = document.getElementById("newBtn");
    let saveBtn = document.getElementById("saveBtn");
    let editBtn = document.getElementById("editBtn");
    let disableBtn = document.getElementById("disableBtn");

    let inputs = document.querySelectorAll(".form-control");
    let userFullName = document.getElementById("fullName");
    let passwordInput = document.getElementById("passwordInput");
    let confirmInput = document.getElementById("confirmInput");
    let accountDetails = [
        document.getElementById("roleInput"),
        document.getElementById("usernameInput"),
        passwordInput,
        confirmInput
    ];

    let userTableBody = document.querySelector("#table-bold tbody");
    let form = document.getElementById("userForm");
    let isAddingNewUser = false; // ✅ State para hindi clickable ang list kapag "New" ang naka-click

    passwordInput.type = "password";
    confirmInput.type = "password";

    function loadUsers() {
        let users = JSON.parse(localStorage.getItem("users")) || [];
        userTableBody.innerHTML = ""; // Clear table before adding rows

        users.forEach((user, index) => {
            let newRow = document.createElement("tr");
            newRow.innerHTML = `
                <td>${user.username}</td>
                <td>${user.role}</td>
                <td>Enabled</td>
                <td>No</td>
            `;
            newRow.setAttribute("data-index", index); // Store index for reference
            newRow.addEventListener("click", function () {
                if (!isAddingNewUser) { // ✅ HINDI clickable kapag naka "New"
                    highlightRow(newRow);
                    loadUserData(index);
                }
            });

            userTableBody.appendChild(newRow);
        });

        // ✅ Scrollable user list (max 5 users)
        let tableContainer = document.querySelector("#table-container");
        tableContainer.style.maxHeight = "200px"; // Approx height for 5 rows
        tableContainer.style.overflowY = users.length > 5 ? "auto" : "hidden";
    }

    function highlightRow(selectedRow) {
        document.querySelectorAll("#table-bold tbody tr").forEach(row => {
            row.classList.remove("highlighted-row"); // Remove highlight from all rows
        });

        selectedRow.classList.add("highlighted-row"); // Highlight clicked row
    }

    function addUser(fullName, username, role) {
        let users = JSON.parse(localStorage.getItem("users")) || [];
        users.push({ fullName, username, role });

        localStorage.setItem("users", JSON.stringify(users));
        alert("User successfully added!");

        // ✅ Auto-refresh page after save
        location.reload();
    }

    saveBtn.addEventListener("click", function () {
        let fullName = userFullName.value.trim();
        let username = document.getElementById("usernameInput").value.trim();
        let role = document.getElementById("roleInput").value;
        let password = passwordInput.value;
        let confirmPassword = confirmInput.value;

        if (!fullName || !username || !role || !password || !confirmPassword) {
            alert("Please fill in all fields.");
            return;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return;
        }

        addUser(fullName, username, role);
    });

    function loadUserData(index) {
        let users = JSON.parse(localStorage.getItem("users")) || [];
        let selectedUser = users[index];

        if (selectedUser) {
            document.getElementById("fullName").value = selectedUser.fullName; // ✅ Load Full Name Correctly
            document.getElementById("usernameInput").value = selectedUser.username;
            document.getElementById("roleInput").value = selectedUser.role;

            // ✅ Disable fields but keep values
            document.getElementById("fullName").disabled = true;
            document.getElementById("usernameInput").disabled = true;
            document.getElementById("roleInput").disabled = true;
            document.getElementById("passwordInput").disabled = true;
            document.getElementById("confirmInput").disabled = true;
        }
    }

    function toggleFields(enable) {
        inputs.forEach(input => {
            input.disabled = !enable;
            if (!enable) input.value = "";
        });

        userFullName.disabled = !enable;
        accountDetails.forEach(input => input.disabled = !enable);

        saveBtn.disabled = !enable;
        editBtn.disabled = true;
        disableBtn.disabled = true;
    }

    toggleFields(false);

    newBtn.addEventListener("click", function () {
        if (newBtn.innerHTML.includes("New")) {
            newBtn.innerHTML = '<i class="fas fa-times"></i> Cancel';
            toggleFields(true);
            isAddingNewUser = true; // ✅ Set to true para hindi clickable ang user list
        } else {
            newBtn.innerHTML = '<i class="fas fa-plus"></i> New';
            toggleFields(false);
            form.reset();
            isAddingNewUser = false; // ✅ Reset para clickable ulit ang user list
        }
    });

    // ✅ Load users when page loads
    loadUsers();
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

					#table-container {
    width: 100%;
    max-height: 250px; /* Fixed height */
    overflow-y: hidden; /* Hidden by default */
    display: block;
    border: 1px solid #ddd;
}

/* ✅ Make the header fixed */
#table-bold thead {
    position: sticky;
    top: 0;
    background: #fff;
    z-index: 10;
}

/* ✅ Ensure table rows don't affect layout */
#table-bold tbody {
    display: block;
    max-height: 200px; /* Set height for scroll */
    overflow-y: auto;
}

/* ✅ Ensure columns stay aligned */
#table-bold tr {
    display: table;
    width: 100%;
    table-layout: fixed;
}

#table-bold th, #table-bold td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

#table-container::-webkit-scrollbar {
    width: 6px;
}

#table-container::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 5px;
}

#table-container::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.highlighted-row {
    background-color: #f0f0f0 !important; /* Light gray background */
    font-weight: bold;
    transition: background 0.3s ease-in-out;
}


			</style>
<?php include_once 'footer.php'; ?>