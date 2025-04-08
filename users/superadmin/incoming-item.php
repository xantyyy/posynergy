<!-- Modal -->
<div class="modal fade" id="inventoryModal" tabindex="-1" aria-labelledby="inventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inventoryModalLabel">Incoming Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Left Side - Product Data Entry Form -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-no" style="width: 150px; white-space: nowrap;">Inventory No:</label>
                                        <input type="text" class="form-control" id="invItem-no" style="flex: 1;">
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-date" style="width: 150px; white-space: nowrap;">Inventory Date:</label>
                                        <input type="date" class="form-control" id="invItem-date" style="flex: 1;">
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-supplier" style="width: 150px; white-space: nowrap;">Supplier:</label>
                                        <select class="form-select" id="invItem-supplier" style="flex: 1;">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-address" style="width: 150px; white-space: nowrap;">Address:</label>
                                        <textarea class="form-control" id="invItem-address" rows="2" style="flex: 1;" disabled></textarea>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-contactPerson" style="width: 150px; white-space: nowrap;">Contact Person:</label>
                                        <input type="text" class="form-control" id="invItem-contactPerson" style="flex: 1;" disabled>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-contactNo" style="width: 150px; white-space: nowrap;">Contact No:</label>
                                        <input type="text" class="form-control" id="invItem-contactNo" style="flex: 1;" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Additional Table -->
                    <div class="col-md-6">
                        <div class="card" style="height: 93%;">
                            <div class="card-body">
                                <form>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-ship" style="width: 150px; white-space: nowrap;">Ship To:</label>
                                        <input type="text" class="form-control" id="invItem-ship" style="flex: 1;">
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-address2" style="width: 150px; white-space: nowrap;">Address:</label>
                                        <textarea class="form-control" id="invItem-address2" rows="2" style="flex: 1;"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-purpose" style="width: 150px; white-space: nowrap;">Purpose:</label>
                                        <select class="form-select" id="invItem-purpose" style="flex: 1;">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-remarks" style="width: 150px; white-space: nowrap;">Remarks:</label>
                                        <textarea class="form-control" id="invItem-remarks" placeholder="Description" rows="2" style="flex: 1;"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="invItem-terms" style="width: 150px; white-space: nowrap;">Terms:</label>
                                        <input type="text" class="form-control" id="invItem-terms" style="flex: 1;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Left side: Barcode and Description -->
                                    <div class="col-md-5">
                                        <form style="margin-top: 50px;">
                                            <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                                <label for="invItem-barcode" style="width: 100px; white-space: nowrap;">Barcode:</label>
                                                <input type="text" class="form-control" id="invItem-barcode" style="flex: 1;">
                                            </div>
                                            <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                                <label for="invItem-description" style="width: 100px; white-space: nowrap;">Description:</label>
                                                <input type="text" class="form-control" id="invItem-description" style="flex: 1;">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Right side: Add Quantity -->
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6>Add Quantity</h6>
                                                <form>
                                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                                        <input type="text" class="form-control" id="invItem-quantity" style="flex: 1;">
                                                    </div>
                                                    <button type="button" class="btn btn-outline-primary" style="font-size: 13px;">
                                                        <i class="fas fa-plus"></i> Add
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Details Table (moved outside the inner row) -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive" style="height: calc(40vh - 100px); overflow-y: auto;">
                                                    <table class="table table-bordered" id="table-product-details">
                                                        <thead class="fw-bold fs-6 fst-italic" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                                                            <tr>
                                                                <th>Shelf</th>
                                                                <th>Category</th>
                                                                <th>UOM</th>
                                                                <th>Cost</th>
                                                                <th>Vatable</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="5" class="text-center">No Data Available</td>
                                                            </tr>
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive" style="height: calc(40vh - 100px); overflow-y: auto;">
                                    <table class="table table-bordered" id="table-product-discount">
                                        <thead class="fw-bold fs-6 fst-italic" style="background-color: #cbd1d3; color: black; position: sticky; top: 0; z-index: 1;">
                                            <tr>
                                                <th>Barcode</th>
                                                <th>Description</th>
                                                <th>Qty</th>
                                                <th>UOM</th>
                                                <th>Unit Price</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="6" class="text-center">No Data Available</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="total-qty" style="width: 150px; white-space: nowrap;">Total Quantity:</label>
                                        <input type="text" class="form-control" id="total-qty" style="flex: 1;" disabled>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="prod-disc" style="width: 150px; white-space: nowrap;">Less Discount:</label>
                                        <input type="text" class="form-control" id="prod-disc" style="flex: 1;" disabled>
                                    </div>
                                    <div class="form-group col-md-12 d-flex align-items-center mb-3">
                                        <label for="net-amt" style="width: 150px; white-space: nowrap;">Net Amount:</label>
                                        <input type="text" class="form-control" id="net-amt" style="flex: 1;" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group d-flex align-items-center justify-content-start mt-4">
                            <button type="button" class="btn btn-outline-primary me-2" style="font-size: 13px;">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button type="button" class="btn btn-outline-primary me-2" style="font-size: 13px;">
                                <i class="fas fa-times"></i> Delete
                            </button>
                            <button type="button" class="btn btn-outline-primary me-2" style="font-size: 13px;">
                                <i class="fas fa-trash"></i> Delete All
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" style="font-size: 13px;">
                    <i class="fas fa-save"></i> Submit
                </button>
                <button type="button" class="btn btn-outline-secondary" style="font-size: 13px;" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>