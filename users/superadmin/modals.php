<!-- Add Costing Modal -->
<div class="modal fade" id="productInfoModal" tabindex="-1" aria-labelledby="productInfoModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" id="barcode" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <select class="form-select" id="supplier" name="supplier">
                            <option selected value="" hidden>Select Supplier</option>
                            <?php
                            foreach ($suppliers as $supplier) {
                                echo "<option value='" . htmlspecialchars($supplier) . "'>" . htmlspecialchars($supplier) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="uom" class="form-label">UOM</label>
                        <select class="form-select" id="uom" name="uom">
                            <option selected value="" hidden>Select UOM</option>
                            <?php
                            foreach ($uoms as $uom) {
                                echo "<option value='" . htmlspecialchars($uom) . "'>" . htmlspecialchars($uom) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <hr>
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
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Costing Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <h6>Product Information</h6>
                    <div class="mb-3">
                        <label for="edit-barcode" class="form-label">Barcode:</label>
                        <input type="text" class="form-control" id="edit-barcode" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="edit-supplier" class="form-label">Supplier</label>
                        <select class="form-select" id="edit-supplier" name="supplier">
                            <option selected value="" hidden>Select Supplier</option>
                            <?php
                            foreach ($suppliers as $supplier) {
                                echo "<option value='" . htmlspecialchars($supplier) . "'>" . htmlspecialchars($supplier) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-uom" class="form-label">UOM</label>
                        <select class="form-select" id="edit-uom" name="uom">
                            <option selected value="" hidden>Select UOM</option>
                            <?php
                            foreach ($uoms as $uom) {
                                echo "<option value='" . htmlspecialchars($uom) . "'>" . htmlspecialchars($uom) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <hr>
                    <h6>Cost Details</h6>
                    <div class="mb-3">
                        <label for="edit-costPrice" class="form-label">Cost Price:</label>
                        <input type="text" class="form-control" id="edit-costPrice" placeholder="Enter cost price">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="edit-vatable">
                        <label class="form-check-label" for="edit-vatable">VAT-able</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit-save-btn">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Product Info Modal (for Add) -->
<div class="modal fade" id="add-editInfoModal" tabindex="-1" aria-labelledby="add-editInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-editInfoModalLabel">Add Product Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProductInfoForm">
                    <h6>Product Information</h6>
                    <div class="mb-3">
                        <label for="addBarcode" class="form-label">Barcode:</label>
                        <input type="text" class="form-control" id="addBarcode" name="barcode" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="addSupplier" class="form-label">Supplier:</label>
                        <select class="form-select" id="addSupplier" name="supplier">
                            <option value="">Select Supplier</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="addUOM" class="form-label">UOM:</label>
                        <select class="form-select" id="addUOM" name="uom">
                            <option value="">Select UOM</option>
                        </select>
                    </div>
                    <hr>
                    <h6>Cost Details</h6>
                    <div class="mb-3">
                        <label for="addCostPrice" class="form-label">Cost Price:</label>
                        <input type="number" class="form-control" id="addCostPrice" name="costPrice">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="addVatAble" name="vatAble">
                        <label class="form-check-label" for="addVatAble">VAT-able</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveProductInfo">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- PRODUCT SEARCH Edit Retail Modal -->
<div class="modal fade" id="editRetailModal" tabindex="-1" aria-labelledby="editRetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editRetailModalLabel">Product Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <h6>Product Information</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="editPriceType" class="form-label">Price Type:</label>
                                            <select class="form-select" id="editPriceType">
                                                <option value="RETAIL">RETAIL</option>
                                                <option value="WHOLESALE">WHOLESALE</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="editCost" class="form-label">Cost:</label>
                                            <input type="number" class="form-control" id="editCost">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="editRetailBarcode" class="form-label">Barcode:</label>
                                            <input type="text" class="form-control" id="editRetailBarcode">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="editRetailProductName" class="form-label">Product Name:</label>
                                            <input type="text" class="form-control" id="editRetailProductName">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6>Product Details</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="editRetailUOM" class="form-label">UOM:</label>
                                            <select class="form-select" id="editRetailUOM">
                                                <option value="PC">PC</option>
                                                <option value="BOX">BOX</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="editMarkUp" class="form-label">Mark Up:</label>
                                            <input type="number" class="form-control" id="editMarkUp">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="editSRP" class="form-label">SRP:</label>
                                            <input type="number" class="form-control" id="editSRP" readonly>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="editAppliedSRP" class="form-label">Applied SRP:</label>
                                            <input type="number" class="form-control" id="editAppliedSRP" placeholder="Enter applied SRP">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveEditRetail">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

<!-- Edit Product Info Modal -->
<div class="modal fade" id="editProductInfoModal" tabindex="-1" aria-labelledby="editProductInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductInfoModalLabel">Edit Product Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductInfoForm">
                    <h6>Product Information</h6>
                    <div class="mb-3">
                        <label for="editBarcode" class="form-label">Barcode:</label>
                        <input type="text" class="form-control" id="editBarcode" name="barcode" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editSupplier" class="form-label">Supplier:</label>
                        <select class="form-select" id="editSupplier" name="supplier">
                            <option selected value="" hidden>Select Supplier</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editUOM" class="form-label">UOM:</label>
                        <select class="form-select" id="editUOM" name="uom">
                            <option selected value="" hidden>Select UOM</option>
                        </select>
                    </div>
                    <hr>
                    <h6>Cost Details</h6>
                    <div class="mb-3">
                        <label for="editCostPrice" class="form-label">Cost Price:</label>
                        <input type="number" class="form-control" id="editCostPrice" name="costPrice">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="editVatAble" name="vatAble">
                        <label class="form-check-label" for="editVatAble">VAT-able</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEditProductInfo">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!--Retails Add Modal -->
<div class="modal fade" id="productModalRetail" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Retail Product Information</h5>
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
                        <select class="form-select" id="retail-priceType" name="retail-priceType">
                            <option selected value="" hidden>Select price type</option>
                            <option value="RETAIL">RETAIL</option>
                            <option value="WHOLESALE">WHOLESALE</option>
                        </select>
                    </div>
                    <!-- Cost -->
                    <div class="col-md-6">
                        <label for="cost" class="form-label">Cost:</label>
                        <input type="text" class="form-control" id="retail-cost" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="barcode" class="form-label">Barcode:</label>
                    <input type="text" class="form-control" id="retailBarcode" readonly>
                </div>
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="retailProductName" readonly>
                </div>
                
                <hr>
                <!-- Product Details -->
                <h6>Product Details</h6>
                <div class="row mb-3">
                    <!-- UOM -->
                    <div class="col-md-6">
                        <label for="uom" class="form-label">UOM:</label>
                        <input type="text" class="form-control" id="retailUOM" readonly>
                    </div>
                    <!-- Mark Up -->
                    <div class="col-md-6">
                        <label for="markup" class="form-label">Mark Up:</label>
                        <input type="text" class="form-control" id="retail-markup" placeholder="Enter mark up percentage">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="srp" class="form-label">SRP:</label>
                    <input type="text" class="form-control" id="retail-srp" placeholder="Enter suggested retail price">
                </div>
                <div class="mb-3">
                    <label for="appliedSrp" class="form-label">Applied SRP:</label>
                    <input type="text" class="form-control" id="retail-appliedSrp" placeholder="Enter applied SRP">
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Retails Edit Modal -->
<div class="modal fade" id="editModalRetail" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
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
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="edit-priceType" class="form-label">Price Type:</label>
                        <select class="form-select" id="edit-priceType">
                            <option selected value hidden>Select price type</option>
                            <option value="retail">RETAIL</option>
                            <option value="wholesale">WHOLESALE</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="edit-cost" class="form-label">Cost:</label>
                        <input type="text" class="form-control" id="edit-cost" placeholder="Enter cost">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="edit-barcode" class="form-label">Barcode:</label>
                    <input type="text" class="form-control" id="edit-barcode" readonly>
                </div>
                <div class="mb-3">
                    <label for="edit-productName" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="edit-productName" readonly>
                </div>

                <!-- Product Details -->
                <h6>Product Details</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="edit-uom" class="form-label">UOM:</label>
                        <select class="form-select" id="edit-uom">
                            <option selected value="" hidden>Select unit of measure</option>
                            <?php
                                foreach ($uoms as $uom) {
                                    echo "<option value=\"$uom\">$uom</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="edit-markup" class="form-label">Mark Up:</label>
                        <input type="text" class="form-control" id="edit-markup" placeholder="Enter mark up percentage">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="edit-srp" class="form-label">SRP:</label>
                    <input type="text" class="form-control" id="edit-srp" placeholder="Enter suggested retail price">
                </div>
                <div class="mb-3">
                    <label for="edit-appliedSrp" class="form-label">Applied SRP:</label>
                    <input type="text" class="form-control" id="edit-appliedSrp" placeholder="Enter applied SRP">
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEditRetail">Save Changes</button>
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

<!-- Close Today's Transaction MODAL -->
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

<!-- SET EXPIRATION MODAL -->
<div class="modal fade" id="expirationModal" tabindex="-1" aria-labelledby="expirationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expirationModalLabel">Set Expiration Date</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="expirationForm">
                    <div class="form-group">
                        <label for="expirationDate">Expiration Date:</label>
                        <input type="date" class="form-control" id="expirationDate" name="expirationDate" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveExpiration">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="backupModal" tabindex="-1" aria-labelledby="backupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="backupModalLabel">Back Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <label for="backupDir" class="form-label">Custom Backup Directory</label>
        <div class="input-group mb-3">
          <input type="text" id="backupDir" class="form-control" placeholder="Select backup directory" readonly>
          <button class="btn btn-outline-secondary" type="button" onclick="browseFolder()">Browse..</button>
        </div>

        <div class="form-text mb-3">
          <strong>Note:</strong> The system saves a backup on a pre-defined directory.<br>
          Choose a save location if you also wish to save a backup copy elsewhere.
        </div>

        <button class="btn btn-secondary w-100" id="startBackupBtn" disabled>Start</button>
      </div>
    </div>
  </div>
</div>




<script>

//Function to start the backup process
async function browseFolder() {
  try {
    // Open the directory picker dialog
    const dirHandle = await window.showDirectoryPicker();
    
    // Get the directory path (note: the File System Access API doesn't expose the full path for security reasons)
    // For display purposes, we can use the directory name or a custom string
    const dirName = dirHandle.name;
    document.getElementById('backupDir').value = dirName || 'Selected Directory';

    // Enable the Start button once a directory is selected
    document.getElementById('startBackupBtn').disabled = false;

    // Store the dirHandle for later use (e.g., during backup)
    window.selectedDirHandle = dirHandle; // Store globally or in a more structured way as needed
  } catch (err) {
    console.error('Error selecting directory:', err);
    // Handle case where user cancels the dialog
    if (err.name === 'AbortError') {
      document.getElementById('backupDir').value = '';
      document.getElementById('startBackupBtn').disabled = true;
    }
  }
}
//Function to start the backup process ends here

// Add this to your existing JavaScript file or in a script tag at the bottom of your page
$(document).ready(function() {
    // Function to load suppliers
    function loadSuppliers() {
        $.ajax({
            url: 'manage-productProfile.php?type=SUPPLIERS',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#supplier').empty();
                $('#supplier').append('<option selected value="" hidden>Select Supplier</option>');
                
                $.each(data, function(index, supplier) {
                    $('#supplier').append('<option value="' + supplier + '">' + supplier + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error loading suppliers:', error);
            }
        });
    }
    
    // Function to load UOM (Units of Measurement)
    function loadUOMs(selector) {
        $.ajax({
            url: 'manage-productProfile.php?type=UOM',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $(selector).empty();
                $(selector).append('<option selected value="" hidden>Select unit of measure</option>');
                
                $.each(data, function(index, uom) {
                    $(selector).append('<option value="' + uom + '">' + uom + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error loading UOMs:', error);
            }
        });
    }
    
    // Load suppliers and UOMs when the product info modal is shown
    $('#productInfoModal').on('show.bs.modal', function(e) {
        loadSuppliers();
        loadUOMs('#uom');
        
        // You can also get the barcode from the button that triggered the modal
        var barcode = $(e.relatedTarget).data('barcode');
        $('#barcode').val(barcode);
    });
    
    // Load UOMs when the retail modal is shown
    $('#productModalRetail').on('show.bs.modal', function(e) {
        loadUOMs('#retail-uom');
        
        // Get the barcode and product name from the button that triggered the modal
        var barcode = $(e.relatedTarget).data('barcode');
        var productName = $(e.relatedTarget).data('product-name');
        var cost = $(e.relatedTarget).data('cost');
        
        $('#retailBarcode').val(barcode);
        $('#retailProductName').val(productName);
        $('#retail-cost').val(cost);
    });
    
    // Add an event handler for the Save button in product info modal
    $('#productInfoModal .btn-primary').click(function() {
        // Get values from form
        var productData = {
            barcode: $('#barcode').val(),
            supplier: $('#supplier').val(),
            uom: $('#uom').val(),
            costPrice: $('#costPrice').val(),
            vatable: $('#vatable').is(':checked')
        };
        
        // Here you would add an AJAX call to save the product information
        console.log('Product data to save:', productData);
    });
    
    // Add an event handler for the Save button in retail modal
    $('#productModalRetail .btn-primary').click(function() {
        // Get values from form
        var retailData = {
            barcode: $('#retailBarcode').val(),
            productName: $('#retailProductName').val(),
            priceType: $('#retail-priceType').val(),
            cost: $('#retail-cost').val(),
            uom: $('#retail-uom').val(),
            markup: $('#retail-markup').val(),
            srp: $('#retail-srp').val(),
            appliedSrp: $('#retail-appliedSrp').val()
        };
        
        // Here you would add an AJAX call to save the retail information
        console.log('Retail data to save:', retailData);
        
        // Example AJAX call (you would need to implement the server-side handler)
        /*
        $.ajax({
            url: 'manage-productProfile.php?type=SAVE_RETAIL_INFO',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(retailData),
            success: function(response) {
                if (response.success) {
                    alert('Retail information saved successfully!');
                } else {
                    alert('Error: ' + response.message);
                }
            }
        });
        */
    });
    
    // Calculate SRP based on cost and markup
    $('#retail-markup').on('input', function() {
        var cost = parseFloat($('#retail-cost').val()) || 0;
        var markup = parseFloat($(this).val()) || 0;
        
        if (cost > 0 && markup > 0) {
            var srp = cost * (1 + (markup / 100));
            $('#retail-srp').val(srp.toFixed(2));
        }
    });
});
</script>