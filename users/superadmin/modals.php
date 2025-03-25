<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Product Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <h6>Product Information</h6>
                    <div class="mb-3">
                        <label for="barcode" class="form-label">Barcode:</label>
                        <input type="text" class="form-control" id="barcode" placeholder="Enter barcode">
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier:</label>
                        <select class="form-select" id="supplier">
                            <option selected>Select supplier</option>
                            <option value="1">Supplier 1</option>
                            <option value="2">Supplier 2</option>
                            <option value="3">Supplier 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="uom" class="form-label">UOM:</label>
                        <select class="form-select" id="uom">
                            <option selected>Select UOM</option>
                            <option value="1">Unit 1</option>
                            <option value="2">Unit 2</option>
                            <option value="3">Unit 3</option>
                        </select>
                    </div>
                    <h6>Cost Details</h6>
                    <div class="mb-3">
                        <label for="costPrice" class="form-label">Cost Price:</label>
                        <input type="text" class="form-control" id="costPrice" placeholder="Enter cost price">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="vatable">
                        <label class="form-check-label" for="vatable">VAT-able</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Product Information -->
                <h6>Product Information</h6>
                <div class="row mb-3">
                    <!-- Price Type -->
                    <div class="col-md-6">
                        <label for="priceType" class="form-label">Price Type:</label>
                        <select class="form-select" id="priceType">
                            <option selected>Select price type</option>
                            <option value="retail">Retail</option>
                            <option value="wholesale">Wholesale</option>
                        </select>
                    </div>
                    <!-- Cost -->
                    <div class="col-md-6">
                        <label for="cost" class="form-label">Cost:</label>
                        <input type="text" class="form-control" id="cost" placeholder="Enter cost">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="barcode" class="form-label">Barcode:</label>
                    <input type="text" class="form-control" id="barcode" placeholder="Enter barcode">
                </div>
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                </div>

                <!-- Product Details -->
                <h6>Product Details</h6>
                <div class="row mb-3">
                    <!-- UOM -->
                    <div class="col-md-6">
                        <label for="uom" class="form-label">UOM:</label>
                        <select class="form-select" id="uom">
                            <option selected>Select unit of measure</option>
                            <option value="pcs">Pieces</option>
                            <option value="box">Box</option>
                            <option value="kg">Kilograms</option>
                        </select>
                    </div>
                    <!-- Mark Up -->
                    <div class="col-md-6">
                        <label for="markup" class="form-label">Mark Up:</label>
                        <input type="text" class="form-control" id="markup" placeholder="Enter mark up percentage">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="srp" class="form-label">SRP:</label>
                    <input type="text" class="form-control" id="srp" placeholder="Enter suggested retail price">
                </div>
                <div class="mb-3">
                    <label for="appliedSrp" class="form-label">Applied SRP:</label>
                    <input type="text" class="form-control" id="appliedSrp" placeholder="Enter applied SRP">
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Item Costing Modal -->
<div class="modal fade" id="editModalcost" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Product Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Product Information -->
                <h6>Product Information</h6>
                <div class="mb-3">
                    <label for="editBarcode" class="form-label">Bar Code:</label>
                    <input type="text" class="form-control" id="editBarcode" placeholder="Enter barcode">
                </div>
                <div class="mb-3">
                    <label for="editSupplier" class="form-label">Supplier:</label>
                    <select class="form-select" id="editSupplier">
                        <option selected>Select supplier</option>
                        <option value="supplier1">Supplier 1</option>
                        <option value="supplier2">Supplier 2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="editUOM" class="form-label">UOM:</label>
                    <select class="form-select" id="editUOM">
                        <option selected>Select unit of measure</option>
                        <option value="pcs">Pieces</option>
                        <option value="box">Box</option>
                        <option value="kg">Kilograms</option>
                    </select>
                </div>

                <!-- Cost Details -->
                <h6>Cost Details</h6>
                <div class="mb-3">
                    <label for="editCostPrice" class="form-label">Cost Price:</label>
                    <input type="text" class="form-control" id="editCostPrice" placeholder="Enter cost price">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="editVATable">
                    <label class="form-check-label" for="editVATable">VAT-able</label>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Price Modal -->
<div class="modal fade" id="editModalprice" tabindex="-1" aria-labelledby="editModalpriceLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="editModalpriceLabel">Edit Product Price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Price Information -->
                <h6>Price Information</h6>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="editPriceType" class="form-label">Price Type:</label>
                        <select class="form-select" id="editPriceType">
                            <option selected>Select price type</option>
                            <option value="retail">Retail</option>
                            <option value="wholesale">Wholesale</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="editCost" class="form-label">Cost:</label>
                        <input type="text" class="form-control" id="editCost" placeholder="Enter cost">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="editBarcode" class="form-label">Barcode:</label>
                    <input type="text" class="form-control" id="editBarcode" placeholder="Enter barcode">
                </div>
                <div class="mb-3">
                    <label for="editProductName" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="editProductName" placeholder="Enter product name">
                </div>

                <!-- Price Details -->
                <h6>Price Details</h6>
                <div class="mb-3">
                    <label for="editUOM" class="form-label">UOM:</label>
                    <select class="form-select" id="editUOM">
                        <option selected>Select unit of measure</option>
                        <option value="pcs">Pieces</option>
                        <option value="box">Box</option>
                        <option value="kg">Kilograms</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="editMarkUp" class="form-label">Mark Up:</label>
                    <input type="text" class="form-control" id="editMarkUp" placeholder="Enter mark up percentage">
                </div>
                <div class="mb-3">
                    <label for="editSRP" class="form-label">SRP:</label>
                    <input type="text" class="form-control" id="editSRP" placeholder="Enter suggested retail price">
                </div>
                <div class="mb-3">
                    <label for="editAppliedSRP" class="form-label">Applied SRP:</label>
                    <input type="text" class="form-control" id="editAppliedSRP" placeholder="Enter applied SRP">
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Cost Confirmation Modal -->
<div class="modal fade" id="deleteModalcost" tabindex="-1" aria-labelledby="deleteModalcostLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalcostLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                Are you sure you want to delete this item? This action cannot be undone.
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete SRP Confirmation Modal -->
<div class="modal fade" id="deleteModalsrp" tabindex="-1" aria-labelledby="deleteModalcostLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalcostLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                Do you want to delete the selected SRP for this item?
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- close today's transaction MODAL -->
<div class="modal fade" id="closeInventoryModal" tabindex="-1" aria-labelledby="closeInventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="closeInventoryModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to close today's Inventory?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmCloseInventory">Confirm</button>
            </div>
        </div>
    </div>
</div>


<!-- ADD NEW SUPPLIER MODAL -->
<div class="modal fade" id="newSupplierModal" tabindex="-1" aria-labelledby="newSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSupplierModalLabel">Add New Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="newSupplierForm" method="POST" action="supplier.php">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" required>
                    </div>
                    <div class="mb-3">
                        <label for="tin" class="form-label">TIN</label>
                        <input type="text" class="form-control" id="tin" name="tin" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary opacity-50 me-2" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary opacity-50 me-2" name="add_supplier">Save Supplier</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT SUPPLIER MODAL -->
<div class="modal fade" id="editSupplierModal" tabindex="-1" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSupplierModalLabel">Edit Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editSupplierForm" method="POST" action="supplier.php">
                <div class="modal-body">
                    <input type="hidden" id="editSupplierId" name="id">
                    <div class="mb-3">
                        <label for="editSupplier" class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" id="editSupplier" name="supplier">
                    </div>
                    <div class="mb-3">
                        <label for="editTin" class="form-label">TIN</label>
                        <input type="text" class="form-control" id="editTin" name="tin" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="editAddress" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="editName" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editContactNumber" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="editContactNumber" name="contactNumber" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary opacity-50 me-2" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary opacity-50 me-2" name="update_supplier">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ADD LIST MODAL -->
<div class="modal fade" id="newListModal" tabindex="-1" aria-labelledby="newListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newListModalLabel">Add New List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addListForm">
                    <div class="mb-3">
                        <label for="listName" class="form-label">Enter New List Name</label>
                        <input type="text" class="form-control" id="listName" name="listName" placeholder="New list name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add List</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- EDIT LIST MODAL -->
<div class="modal fade" id="editListModal" tabindex="-1" aria-labelledby="editListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editListModalLabel">Edit List Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editListForm">
                    <input type="hidden" id="oldItemType" name="oldItemType"> <!-- Hidden field for the current ItemType -->
                    <div class="mb-3">
                        <label for="newItemType" class="form-label">New List Name</label>
                        <input type="text" class="form-control" id="newItemType" name="newItemType" placeholder="Enter new list name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update List Name</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete List Confirmation Modal -->
<div class="modal fade" id="deleteListModal" tabindex="-1" aria-labelledby="deleteListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteListModalLabel">Delete List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-transform: none;">
                Are you sure you want to delete the list: <strong id="deleteListName"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteListButton">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- ADD ITEM MODAL -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel" style="text-transform: none;">Enter New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addItemForm">
                    <input type="hidden" id="selectedItemType" name="selectedItemType"> <!-- Hidden field for selected ItemType -->
                    <div class="mb-3">
                        <label for="newItemName" class="form-label">New Item</label>
                        <input type="text" class="form-control" id="newItemName" name="newItemName" placeholder="Enter new item" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Item</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- DELETE ITEMNAME LIST -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel" style="text-transform: none;">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-transform: none;">
                <p>Are you sure you want to delete the following items?</p>
                <ul id="selectedItemsList">
                    <!-- Dynamically populated list of selected items -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
            </div>
        </div>
    </div>
</div>