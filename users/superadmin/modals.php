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
