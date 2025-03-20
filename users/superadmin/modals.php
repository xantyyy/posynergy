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

<!-- Add New Supplier -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSupplierModalLabel">Add New Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSupplierForm">
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" id="supplier" name="Supplier" required>
                    </div>
                    <div class="mb-3">
                        <label for="tin" class="form-label">TIN</label>
                        <input type="text" class="form-control" id="tin" name="TIN">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="Address">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Contact Name</label>
                        <input type="text" class="form-control" id="name" name="Name">
                    </div>
                    <div class="mb-3">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="contactNumber" name="ContactNumber">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveSupplierBtn">Save Supplier</button>
            </div>
        </div>
    </div>
</div>