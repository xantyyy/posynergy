<?php include_once 'header.php'; ?>
<?php include_once 'modals.php'; ?>

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
					<div class="d-flex justify-content-center align-items-center">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<div class="card">
										<div class="card-body">
											<div class="col-md-12">
												<h2>List Maintenance</h2>
											</div>
											<form>
												<div class="d-flex align-items-center mt-3">
													<button type="button" class="btn btn-primary mb-2 me-2" id="newListButton" style="font-size: 13px;">
														<i class="fas fa-plus"></i> New List
													</button>
													<button type="button" class="btn btn-success mb-2 me-2" id="editListButton" style="font-size: 13px;" disabled data-bs-toggle="modal" data-bs-target="#editListModal">
														<i class="fas fa-edit"></i> Edit List Name
													</button>
													<button type="button" class="btn btn-danger mb-2" style="font-size: 13px;" id="deleteListButton" disabled>
														<i class="fas fa-trash"></i> Delete
													</button>
												</div>
												<h6>Common Lists:</h6>
												<div class="d-flex align-items-center mt-2">
													<label for="itemTypeDropdown" class="me-2">Select:</label>
													<select class="form-select" id="itemTypeDropdown">
														<!-- Options will be dynamically added here -->
													</select>
												</div>
											</form>
											<hr>
											<div class="row">
												<div class="col-md-12">
													<h6>Item Name</h6>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(90vh - 375px); overflow-y: auto;">
																<table class="table">
																	<tbody>
																		<!-- Dynamic rows will be inserted here -->
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="d-flex justify-content-end">
												<button type="button" class="btn btn-primary mb-2 me-2" style="font-size: 13px;" id="addItemButton" disabled>
													<i class="fas fa-plus"></i>
												</button>
												<button type="button" class="btn btn-danger mb-2 me-2" style="font-size: 13px;" id="removeItemButton" disabled>
													<i class="fas fa-times"></i>
												</button>
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
					/* Load ItemType Dropdown */
					function loadItemTypeDropdown() {
						$.ajax({
							url: 'manage-listMaintenance.php',
							type: 'GET',
							dataType: 'json',
							success: function (response) {
								if (response.success) {
									let options = '<option value="" selected hidden>Select a List</option>';
									response.data.forEach(function (itemType) {
										options += `<option value="${itemType}">${itemType}</option>`;
									});
									$('#itemTypeDropdown').html(options);
								} else {
									alert(response.message);
								}
							},
							error: function () {
								alert('An error occurred while loading the dropdown data.');
							}
						});
					}

					/* Load dropdown on page load */
					loadItemTypeDropdown();

					/* Handle Add Item Modal */
					$('#addItemButton').click(function () {
						const selectedType = $('#itemTypeDropdown').val(); // Get the selected ItemType from dropdown

						if (selectedType) {
							$('#selectedItemType').val(selectedType); // Set the selected ItemType in the hidden field
							$('#addItemModal').modal('show'); // Show the modal
						} else {
							alert('Please select a list to add an item.');
						}
					});

					/* Handle Add Item Form Submission */
					$('#addItemForm').submit(function (e) {
						e.preventDefault(); // Prevent default form submission

						const formData = {
							selectedItemType: $('#selectedItemType').val(), // Selected ItemType
							newItemName: $('#newItemName').val() // New item name
						};

						$.ajax({
							url: 'manage-listMaintenance.php', // Backend script
							type: 'POST',
							data: formData,
							dataType: 'json',
							success: function (response) {
								if (response.success) {
									alert(response.message);
									$('#addItemModal').modal('hide'); // Close the modal
									$('#addItemForm')[0].reset(); // Reset the form

									// Refresh the table to include the newly added item
									const selectedType = $('#itemTypeDropdown').val();
									if (selectedType) {
										fetchItemNames(selectedType);
									}
								} else {
									alert(response.message);
								}
							},
							error: function () {
								alert('An error occurred while adding the item.');
							}
						});
					});

					/* Handle Delete List Button Click */
					$('#deleteListButton').click(function () {
						const selectedType = $('#itemTypeDropdown').val(); // Get the selected list type

						if (selectedType) {
							// Populate the modal with the selected list type
							$('#deleteListName').text(selectedType); // Update modal content dynamically
							$('#deleteListModal').modal('show'); // Show the confirmation modal
						} else {
							alert('Please select a list to delete.');
						}
					});

					/* Handle Delete List Confirmation */
					$('#confirmDeleteListButton').click(function () {
						const selectedType = $('#itemTypeDropdown').val(); // Get the selected list type

						if (selectedType) {
							$.ajax({
								url: 'manage-listMaintenance.php', // Backend script to handle deletion
								type: 'POST',
								data: { deleteListType: selectedType },
								dataType: 'json',
								success: function (response) {
									if (response.success) {
										alert(response.message);

										// Refresh the dropdown and table after deletion
										loadItemTypeDropdown();
										$('table tbody').html(''); // Clear the table
										toggleButtons(false); // Disable all buttons

										$('#deleteListModal').modal('hide'); // Close the modal
									} else {
										alert(response.message);
									}
								},
								error: function () {
									alert('An error occurred while deleting the list.');
								}
							});
						} else {
							alert('No list selected for deletion.');
						}
					});

					/* Handle Remove Selected Button Click */
					$('#removeItemButton').click(function () {
						const selectedItems = [];
						$('.item-checkbox:checked').each(function () {
							selectedItems.push($(this).val()); // Collect all checked item names
						});

						if (selectedItems.length > 0) {
							// Populate the confirmation modal with the selected items
							let itemsList = '';
							selectedItems.forEach(function (item) {
								itemsList += `<li>${item}</li>`;
							});
							$('#selectedItemsList').html(itemsList);

							// Show the confirmation modal
							$('#confirmDeleteModal').modal('show');

							// Attach selected items to the confirm button
							$('#confirmDeleteButton').data('itemsToDelete', selectedItems);
						} else {
							alert('Please select at least one item to remove.');
						}
					});

					/* Handle Confirmation of Deletion */
					$('#confirmDeleteButton').click(function () {
						const itemsToDelete = $(this).data('itemsToDelete'); // Get the selected items to delete

						if (itemsToDelete && itemsToDelete.length > 0) {
							$.ajax({
								url: 'manage-listMaintenance.php',
								type: 'POST',
								data: { itemsToDelete: itemsToDelete },
								dataType: 'json',
								success: function (response) {
									if (response.success) {
										alert(response.message);

										// Refresh the table to exclude removed items
										const selectedType = $('#itemTypeDropdown').val();
										if (selectedType) {
											fetchItemNames(selectedType);
										}

										// Hide the modal
										$('#confirmDeleteModal').modal('hide');
									} else {
										alert(response.message);
									}
								},
								error: function () {
									alert('An error occurred while removing items.');
								}
							});
						} else {
							alert('No items to delete.');
						}
					});

					/* Handle "Select All" Checkbox */
					$('#selectAllCheckbox').click(function () {
						const isChecked = $(this).prop('checked');
						$('.item-checkbox').prop('checked', isChecked); // Check/uncheck all checkboxes
					});

					/* Handle "New List" Modal and Add List */
					$('#newListButton').click(function () {
						$('#newListModal').modal('show'); // Show the modal
					});

					$('#addListForm').submit(function (e) {
						e.preventDefault();

						$.ajax({
							url: 'manage-listMaintenance.php',
							type: 'POST',
							data: $(this).serialize(),
							dataType: 'json',
							success: function (response) {
								if (response.success) {
									alert(response.message);
									$('#newListModal').modal('hide'); // Close the modal
									$('#addListForm')[0].reset(); // Reset the form
									loadItemTypeDropdown(); // Reload the dropdown
								} else {
									alert(response.message);
								}
							},
							error: function () {
								alert('An error occurred while adding the list.');
							}
						});
					});

					/* Handle ItemType Selection */
					$('#itemTypeDropdown').on('change', function () {
						const selectedType = $(this).val(); // Get the selected dropdown value

						if (selectedType) {
							fetchItemNames(selectedType); // Fetch associated items
							toggleButtons(true); // Enable buttons
						} else {
							$('table tbody').html(''); // Clear the table
							toggleButtons(false); // Disable buttons
						}
					});

					/* Fetch ItemNames Based on Selected ItemType */
					function fetchItemNames(itemType) {
						$.ajax({
							url: 'manage-listMaintenance.php',
							type: 'POST',
							data: { itemType: itemType },
							dataType: 'json',
							success: function (response) {
								if (response.success) {
									// Build the table rows dynamically for tbody
									let tableRows = '';
									response.data.forEach(function (itemName) {
										tableRows += `
											<tr>
												<td>
													<input type="checkbox" class="item-checkbox" value="${itemName}" />
												</td>
												<td>${itemName}</td>
											</tr>
										`;
									});

									// Populate tbody
									$('table tbody').html(tableRows);
								} else {
									// If no data found, clear the table and show a "No data" message
									const noDataMessage = `
										<tr>
											<td colspan="2">No items found for the selected type.</td>
										</tr>
									`;

									$('table tbody').html(noDataMessage);
								}
							},
							error: function () {
								alert('An error occurred while fetching item names.');
							}
						});
					}

					/* Handle "Edit List Name" Modal */
					$('#editListButton').click(function () {
						const selectedType = $('#itemTypeDropdown').val();

						if (selectedType) {
							$('#oldItemType').val(selectedType); // Set the old ItemType in the hidden field
							$('#newItemType').val(selectedType); // Pre-fill the new ItemType input
							$('#editListModal').modal('show'); // Show the modal
						} else {
							alert('Please select a list to edit.');
						}
					});

					/* Handle Edit List Name Submission */
					$('#editListForm').submit(function (e) {
						e.preventDefault();

						const formData = {
							oldItemType: $('#oldItemType').val(),
							newItemType: $('#newItemType').val()
						};

						$.ajax({
							url: 'manage-listMaintenance.php',
							type: 'POST',
							data: formData,
							dataType: 'json',
							success: function (response) {
								if (response.success) {
									alert(response.message);
									$('#editListModal').modal('hide'); // Close the modal
									$('#editListForm')[0].reset(); // Reset the form
									loadItemTypeDropdown(); // Reload the dropdown
								} else {
									alert(response.message);
								}
							},
							error: function () {
								alert('Error updating the list name.');
							}
						});
					});

					/* Toggle Buttons Based on Selection */
					function toggleButtons(enable) {
						const buttons = [
							'#addItemButton',    // Add Item button
							'#removeItemButton', // Remove Item button
							'#editListButton',   // Edit List Name button
							'#deleteListButton'  // Delete button
						];
						buttons.forEach(function (button) {
							$(button).prop('disabled', !enable); // Enable or disable buttons
						});
					}

					// Initially disable the buttons
					toggleButtons(false);
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