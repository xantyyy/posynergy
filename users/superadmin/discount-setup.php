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
						
						<a class="navbar-brand" href="#">Other Transaction</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
						
					</nav>
				</div>	  

				<!-- PHP FOR ADDING NEW PRODUCT IN THE DATABASE -->

				<!--MAIN CONTENT HERE!!!!!!!!-->
					<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h2 style="margin: 0 20px; margin-top: 15px;">Discount Setup</h2>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-6">
									<div class="card">
										<div class="card-body">
											<h5>Setup</h5>
											<form>
											<div class="form-group col-md-12 mt-2">
											<label for="category">Category:</label>
													<select class="form-select input-field" id="category">
														<option value=""></option>
														<?php
														// Query to fetch only 'Category' items
														$query = "SELECT ID, ItemType, ItemName FROM tbl_invmaintenance WHERE ItemType = 'Category' ORDER BY ItemName";
														$result = mysqli_query($conn, $query);
														
														// Check if query was successful
														if ($result && mysqli_num_rows($result) > 0) {
															// Loop through results and create option elements
															while ($row = mysqli_fetch_assoc($result)) {
																echo '<option value="' . $row['ID'] . '">' . $row['ItemName'] . '</option>';
															}
														}
														
														// Close the database connection
														mysqli_close($conn);
														?>
													</select>
												</div>
												</div>
											</form>
											<hr>
											<div class="row">
												<div class="col-md-6">
													<h5>Discount Category</h5>
													<div class="card">
														<div class="card-body">
															<div class="table-responsive" style="height: calc(94vh - 300px); overflow-y: auto;">
																<table class="table table-bordered" id="table-bold">
																	<thead class="fw-bold fs-6 fst-italic card-header" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
																		<tr>
																			<th>Category</th>
																		</tr>
																	</thead>
																	<tbody>																	
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-4" style="font-size: 16px;">
													<h5>Discount Type</h5>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="overallDiscount" value="overall">
														<label class="form-check-label" for="overallDiscount">Overall</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="seniorDiscount" value="senior">
														<label class="form-check-label" for="seniorDiscount">Senior</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="pwdDiscount" value="pwd">
														<label class="form-check-label" for="pwdDiscount">PWD</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="naacDiscount" value="naac">
														<label class="form-check-label" for="naacDiscount">NAAC</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="soloDiscount" value="solo">
														<label class="form-check-label" for="soloDiscount">Solo Parent</label>
													</div>
													<div class="form-check me-4" style="margin-top: 10px;">
														<input class="form-check-input" type="radio" name="discountType" id="valorDiscount" value="valor">
														<label class="form-check-label" for="valorDiscount">Medal of Valor</label>
													</div>
													
													<div class="d-flex flex-column mt-3">
													<button type="button" class="btn mt-2 btn-outline-primary opacity-50 me-2" style="font-size: 13px;" id="addButton">
														<i class="fas fa-plus"></i> Add
													</button>
													<button type="button" class="btn mt-2 btn-outline-primary opacity-50 me-2" style="font-size: 13px;" id="editButton">
														<i class="fas fa-save"></i> Edit
													</button>
													<button type="button" class="btn mt-2 btn-outline-primary opacity-50 me-2" style="font-size: 13px;" id="deleteButton">
														<i class="fas fa-trash"></i> Delete
													</button>
													<button type="button" class="btn mt-2 btn-outline-primary opacity-50 me-2" style="font-size: 13px;">
														<i class="fas fa-times"></i> Cancel
													</button>

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
				 document.addEventListener("DOMContentLoaded", function () {
    const editButton = document.getElementById("editButton");
    const deleteButton = document.getElementById("deleteButton");
    const discountRadios = document.querySelectorAll('input[name="discountType"]');
    const tbody = document.querySelector("#table-bold tbody"); // Table ng discounted categories
    const addCategoryForm = document.getElementById("addCategoryForm"); // Form for adding new categories
    const categoryInput = document.getElementById("categoryInput"); // Input field for new category
    let isEditMode = false; // Track kung nasa Edit mode
    let selectedRow = null; // Track selected row

    // ❌ Initially disable all discount type radio buttons and delete button
    discountRadios.forEach(radio => radio.disabled = true);
    deleteButton.disabled = true;

    // Clean up localStorage first - remove duplicates
    cleanupLocalStorage();
    
    // Then load categories from localStorage
    loadCategories();

    // Form submission for adding new categories
    if (addCategoryForm) {
        addCategoryForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form from submitting normally
            
            const newCategory = categoryInput.value.trim();
            
            if (newCategory) {
                addCategoryToLocalStorage(newCategory);
                categoryInput.value = ''; // Clear the input field
            }
        });
    }

    // 🔄 Edit button click event
    editButton.addEventListener("click", function () {
        if (!isEditMode) {
            // Change button to Update mode
            editButton.innerHTML = `<i class="fas fa-save"></i> Update`;
            editButton.classList.remove("btn-outline-primary", "opacity-50");
            editButton.classList.add("btn-success");

            isEditMode = true; // Now in Edit mode
        } else {
            // Change button back to Edit
            editButton.innerHTML = `<i class="fas fa-save"></i> Edit`;
            editButton.classList.remove("btn-success");
            editButton.classList.add("btn-outline-primary", "opacity-50");

            // ❌ Disable all radio buttons and reset selection
            discountRadios.forEach(radio => radio.disabled = true);
            deleteButton.disabled = true;

            // ❌ Remove highlight from selected row
            if (selectedRow) {
                selectedRow.classList.remove("table-warning");
                selectedRow = null;
            }

            isEditMode = false; // Exit Edit mode
        }
    });

    // ✅ Enable radio buttons & delete button + Highlight row when clicking a category (only if in Edit mode)
    tbody.addEventListener("click", function (event) {
        if (isEditMode && event.target.tagName === "TD") { 
            // Get the clicked row
            const row = event.target.parentElement;

            // Remove highlight from previously selected row
            if (selectedRow) {
                selectedRow.classList.remove("table-warning");
            }

            // Set the new selected row
            selectedRow = row;
            selectedRow.classList.add("table-warning"); // Highlight selected row

            // Enable discount type radio buttons & delete button
            discountRadios.forEach(radio => radio.disabled = false);
            deleteButton.disabled = false;
        }
    });

    // 🗑 Delete button functionality
    deleteButton.addEventListener("click", function () {
        if (selectedRow) {
            // Get the category text that is being deleted
            const categoryText = selectedRow.cells[0].textContent.trim();

            // Remove the selected row from the table
            selectedRow.remove();

            // ❌ Reset the selection and disable buttons again
            selectedRow = null;
            discountRadios.forEach(radio => radio.disabled = true);
            deleteButton.disabled = true;

            // Remove the deleted category from localStorage
            removeCategoryFromLocalStorage(categoryText);
        }
    });
    
    // Clean up potential duplicate categories in localStorage
    function cleanupLocalStorage() {
        const categories = JSON.parse(localStorage.getItem('categories')) || [];
        
        // Use Set to remove duplicates
        const uniqueCategories = [...new Set(categories)];
        
        // Save back only the unique categories
        localStorage.setItem('categories', JSON.stringify(uniqueCategories));
    }

    // Load categories from localStorage
    function loadCategories() {
        // Get categories from localStorage (already cleaned up)
        const storedCategories = JSON.parse(localStorage.getItem('categories')) || [];
        
        // Clear the table completely
        tbody.innerHTML = '';
        
        // Add each category to the table
        storedCategories.forEach(category => {
            const row = document.createElement("tr");
            row.innerHTML = `<td>${category}</td>`;
            tbody.appendChild(row);
        });
    }

    // Remove category from localStorage
    function removeCategoryFromLocalStorage(categoryText) {
        let categories = JSON.parse(localStorage.getItem('categories')) || [];
        categories = categories.filter(category => category !== categoryText); // Remove the deleted category
        localStorage.setItem('categories', JSON.stringify(categories)); // Save updated list
    }

    // Add new category (only if it's not already in LocalStorage)
    function addCategoryToLocalStorage(newCategory) {
        let categories = JSON.parse(localStorage.getItem('categories')) || [];
        
        // Convert to lowercase for case-insensitive comparison
        const lowerNewCategory = newCategory.toLowerCase();
        const categoryExists = categories.some(cat => cat.toLowerCase() === lowerNewCategory);
        
        // Only add if category does not exist already
        if (!categoryExists) {
            categories.push(newCategory);
            localStorage.setItem('categories', JSON.stringify(categories));
            
            // Add directly to table
            const row = document.createElement("tr");
            row.innerHTML = `<td>${newCategory}</td>`;
            tbody.appendChild(row);
        } else {
            alert("This category already exists!");
        }
    }
});

				// Get references to the DOM elements
				const addButton = document.getElementById('addButton');
				const categoryDropdown = document.querySelector('.form-select#category'); // Your category dropdown

				// Function to create and show the success modal
				function showSuccessModal() {
					// Create modal elements
					const modalOverlay = document.createElement('div');
					modalOverlay.className = 'modal-overlay';
					modalOverlay.style.position = 'fixed';
					modalOverlay.style.top = '0';
					modalOverlay.style.left = '0';
					modalOverlay.style.width = '100%';
					modalOverlay.style.height = '100%';
					modalOverlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
					modalOverlay.style.display = 'flex';
					modalOverlay.style.justifyContent = 'center';
					modalOverlay.style.alignItems = 'center';
					modalOverlay.style.zIndex = '1000';
					
					const modalContent = document.createElement('div');
					modalContent.className = 'modal-content';
					modalContent.style.backgroundColor = 'white';
					modalContent.style.padding = '20px';
					modalContent.style.borderRadius = '5px';
					modalContent.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
					modalContent.style.textAlign = 'center';
					modalContent.style.maxWidth = '400px';
					
					const modalHeader = document.createElement('h4');
					modalHeader.textContent = 'POSynergy';
					modalHeader.style.marginBottom = '15px';
					modalHeader.style.color = '#333';
					
					const modalMessage = document.createElement('p');
					modalMessage.textContent = 'Category successfully added';
					modalMessage.style.marginBottom = '20px';
					
					const closeButton = document.createElement('button');
					closeButton.textContent = 'OK';
					closeButton.className = 'btn btn-primary';
					closeButton.addEventListener('click', function() {
						document.body.removeChild(modalOverlay);
						
						// Reset the form and UI state
						resetSetupSection();
					});
					
					// Assemble the modal
					modalContent.appendChild(modalHeader);
					modalContent.appendChild(modalMessage);
					modalContent.appendChild(closeButton);
					modalOverlay.appendChild(modalContent);
					
					// Add to the DOM
					document.body.appendChild(modalOverlay);
					
					// Auto-close after 2 seconds
					setTimeout(function() {
						if (document.body.contains(modalOverlay)) {
							document.body.removeChild(modalOverlay);
							resetSetupSection();
						}
					}, 2000);
				}
				function handleSaveButtonClick() {
					const selectedCategoryText = categoryDropdown.options[categoryDropdown.selectedIndex].text;

					if (selectedCategoryText.trim() !== '') {
						// Send category to PHP via AJAX
						fetch("add_category.php", {
							method: "POST",
							headers: { "Content-Type": "application/x-www-form-urlencoded" },
							body: `category=${encodeURIComponent(selectedCategoryText)}`
						})
						.then(response => response.json())
						.then(data => {
							if (data.success) {
								showSuccessModal();
								loadCategoriesFromDB(); // Refresh the category list in the table
							} else {
								alert("Error saving category: " + data.message);
							}
						})
						.catch(error => console.error("Error:", error));
					} else {
						alert('Please select a category first');
					}
				}

				// Function to reset the setup section while preserving discount category display
				function resetSetupSection() {
					// Reset the dropdown to initial state
					categoryDropdown.value = '';
					categoryDropdown.disabled = true;
					categoryDropdown.classList.remove('border-primary');
					
					// Reset the Add button
					const saveButton = document.getElementById('saveButton');
					if (saveButton) {
						// Transform back to Add button
						saveButton.innerHTML = '<i class="fas fa-plus"></i> Add';
						saveButton.classList.remove('btn-primary');
						saveButton.classList.add('btn-outline-primary', 'opacity-50');
						
						// Restore the original ID
						saveButton.id = saveButton.dataset.originalId || 'addButton';
						
						// Re-establish the original event listeners
						// This requires a more complex approach to properly restore the event handling
						setupInitialEventListeners();
					}
				}

				// Function to set up the initial event listeners
				function setupInitialEventListeners() {
					// Remove any existing listeners to avoid duplicates
					const addBtn = document.getElementById('addButton');
					
					// Clone the node to remove all event listeners
					const newAddBtn = addBtn.cloneNode(true);
					addBtn.parentNode.replaceChild(newAddBtn, addBtn);
					
					// Set up the add button click handler
					newAddBtn.addEventListener('click', handleAddButtonClick);
				}

				// Handler for Add button click
				function handleAddButtonClick() {
					// Enable the category dropdown
					categoryDropdown.disabled = false;
					
					// Focus on the dropdown to make it obvious it's ready for selection
					categoryDropdown.focus();
					
					// Transform the Add button into a Save button
					this.innerHTML = '<i class="fas fa-save"></i> Save';
					this.classList.remove('btn-outline-primary', 'opacity-50');
					this.classList.add('btn-primary');
					
					// Change the button ID and store the old one as a data attribute
					this.dataset.originalId = this.id;
					this.id = 'saveButton';
					
					// Remove the current click event listener by cloning and replacing
					const saveBtn = this.cloneNode(true);
					this.parentNode.replaceChild(saveBtn, this);
					
					// Add new event listener for the Save button
					saveBtn.addEventListener('click', handleSaveButtonClick);
				}

				// Handler for Save button click
				function handleSaveButtonClick() {
					const selectedCategoryText = categoryDropdown.options[categoryDropdown.selectedIndex].text;
					
					// Only proceed if a category is selected
					if (selectedCategoryText.trim() !== '') {
						// Find the Discount Category section (the box where "BABY CARE" is displayed)
						// This selector needs to be adjusted to match your actual HTML structure
						const discountCategoryBox = document.querySelector('.discount-category-box') || 
												document.querySelector('[data-category-display]');
						
						// If we can't find it by class, look for any element in the Discount Category section
						if (!discountCategoryBox) {
							// This is a more generic approach - try to find the element by its content or position
							const discountCategoryHeading = Array.from(document.querySelectorAll('h2, h3, h4, div'))
								.find(el => el.textContent.includes('Discount Category'));
							
							if (discountCategoryHeading) {
								// Find the element where the category should be displayed
								const categoryDisplayElement = discountCategoryHeading.parentElement.querySelector('table td') || 
															discountCategoryHeading.nextElementSibling;
								
								if (categoryDisplayElement) {
									categoryDisplayElement.textContent = selectedCategoryText;
								}
							}
						} else {
							// If we found the right element, update it
							const categoryValueElement = discountCategoryBox.querySelector('.category-value');
							if (categoryValueElement) {
								categoryValueElement.textContent = selectedCategoryText;
							} else {
								// Direct update as fallback
								discountCategoryBox.textContent = selectedCategoryText;
							}
						}
						
						// Show success modal
						showSuccessModal();
					} else {
						// If no category selected, show an alert
						alert('Please select a category first');
					}
				}

				// Initialize
				document.addEventListener('DOMContentLoaded', function() {
					// Initially disable the category dropdown
					categoryDropdown.disabled = true;
					
					// Set up initial event listeners
					setupInitialEventListeners();
				});
				function handleSaveButtonClick() {
					const selectedCategoryText = categoryDropdown.options[categoryDropdown.selectedIndex].text;

					if (selectedCategoryText.trim() !== '') {
						const tbody = document.querySelector("#table-bold tbody");

						// Get existing categories from localStorage
						let savedCategories = JSON.parse(localStorage.getItem("categories")) || [];

						if (!savedCategories.includes(selectedCategoryText)) {
							// Add new category to the table
							const row = document.createElement("tr");
							row.innerHTML = `<td>${selectedCategoryText}</td>`;
							tbody.appendChild(row);

							// Save updated categories list to localStorage
							savedCategories.push(selectedCategoryText);
							localStorage.setItem("categories", JSON.stringify(savedCategories));
						}

						// Show success modal
						showSuccessModal();
					} else {
						alert('Please select a category first');
					}
				}

				// Function to load saved categories from localStorage
				function loadCategories() {
					const tbody = document.querySelector("#table-bold tbody");
					let savedCategories = JSON.parse(localStorage.getItem("categories")) || [];

					savedCategories.forEach(category => {
						const row = document.createElement("tr");
						row.innerHTML = `<td>${category}</td>`;
						tbody.appendChild(row);
					});
				}

				// Load categories when the page loads
				document.addEventListener("DOMContentLoaded", loadCategories);


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

					#table-bold thead th {
						font-weight: bold;
						font-style: italic;
					}
				</style>
<?php include_once 'footer.php'; ?>