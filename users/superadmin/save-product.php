<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); // Still log errors
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/your/php_error.log'); // Adjust this path

require_once '../../includes/config.php'; // Database connection

// Set the content type to JSON
header('Content-Type: application/json; charset=UTF-8');

// Get the JSON data
$data = json_decode(file_get_contents('php://input'), true);

// Debug: Log the received data
error_log("Received data: " . print_r($data, true));

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
    exit;
}

$formData = $data['form'];
$costingData = $data['costing'];
$retailData = $data['retail'];

// Debug: Log the form data
error_log("Form data: " . print_r($formData, true));
error_log("Costing data: " . print_r($costingData, true));
error_log("Retail data: " . print_r($retailData, true));

// Validate required data
if (empty($costingData[0]['supplier'])) {
    echo json_encode(['success' => false, 'message' => 'Supplier is missing in costing data.']);
    exit;
}
if (empty($retailData)) {
    echo json_encode(['success' => false, 'message' => 'Retail data is missing.']);
    exit;
}

// Start a transaction to ensure data consistency
$conn->begin_transaction();

try {
    // 1. Insert into tbl_productprofile
    $stmt = $conn->prepare("INSERT INTO tbl_productprofile (TransactionDate, Barcode, PLUCode, Category, ProductCode, ProductName, Shelf, ShelfDescription) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $formData['date'], $formData['barcode'], $formData['pluCode'], $formData['category'], $formData['productCode'], $formData['productName'], $formData['shelf'], $formData['shelfDescription']);
    
    // Debug: Log the values being inserted into tbl_productprofile
    error_log("Inserting into tbl_productprofile: " . print_r([
        'TransactionDate' => $formData['date'],
        'Barcode' => $formData['barcode'],
        'PLUCode' => $formData['pluCode'],
        'Category' => $formData['category'],
        'ProductCode' => $formData['productCode'],
        'ProductName' => $formData['productName'],
        'Shelf' => $formData['shelf'],
        'ShelfDescription' => $formData['shelfDescription']
    ], true));

    $stmt->execute();
    $productProfileId = $conn->insert_id;

    // 2. Insert into tbl_productcost for each costing entry
    foreach ($costingData as $index => $costing) {
        // Set isDefault to 'Yes' for the first entry, 'No' for others
        $isDefault = ($index === 0) ? 'Yes' : 'No';
        $currentDate = date('Y-m-d H:i:s');
        
        // Calculate landed cost - you may need to adjust this formula based on your business logic
        // For now, I'm assuming it's the same as cost, but you might need to add shipping, taxes, etc.
        $landedCost = $costing['cost'];
        
        // Determine VAT value (assuming standard 12% VAT if IsVAT is 'YES')
        $vatValue = ($costing['isVat'] === 'YES') ? ($costing['cost'] * 0.12) : '0';
        
        // Insert into tbl_productcost
        $stmt = $conn->prepare("INSERT INTO tbl_productcost (DateAdded, isDefault, SupplierName, Cost, Measurement, Barcode, IsVAT, VAT, LandedCost) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $currentDate,
            $isDefault,
            $costing['supplier'],
            $costing['cost'],
            $costing['uom'],
            $costing['barcode'],
            $costing['isVat'],
            $vatValue,
            $landedCost
        ]);
        
        // Debug: Log the values being inserted into tbl_productcost
        error_log("Inserting into tbl_productcost: " . print_r([
            'DateAdded' => $currentDate,
            'isDefault' => $isDefault,
            'SupplierName' => $costing['supplier'],
            'Cost' => $costing['cost'],
            'Measurement' => $costing['uom'],
            'Barcode' => $costing['barcode'],
            'IsVAT' => $costing['isVat'],
            'VAT' => $vatValue,
            'LandedCost' => $landedCost
        ], true));
    }

    // 3. Insert into tbl_invprodlist
    /*$batch = "BATCH-" . time(); // Generate a unique batch number
    $asOf = date('Y/m/d');
    $location = "Main Branch"; // You can make this dynamic if needed
    $threshold = "10"; // Default threshold, adjust as needed
    $reference = "REF-" . time(); // Generate a unique reference
    $purpose = "Initial Stock"; // Default purpose, adjust as needed
    $tag = "NEW"; // Default tag, adjust as needed
    $companyVat = "VAT-123"; // Placeholder for CompanyVat, adjust as needed

    foreach ($retailData as $retail) {
        $totalCostPrice = (float)($costingData[0]['cost'] ?? 0) * (int)($retail['quantity'] ?? 1);
        $totalSellingPrice = (float)($retail['appliedSrp'] ?? 0) * (int)($retail['quantity'] ?? 1);

        $stmt = $conn->prepare("INSERT INTO tbl_invprodlist (Batch, Barcode, ProductDescription, ProductCode, ProductName, Supplier, Category, Unit, Quantity, RetailCostPrice, RetailSellingPrice, TotalCostPrice, TotalSellingPrice, Threshold, Reference, Tag, Shelf, ShelfDescription, AsOf, Location, IsVat, CompanyVat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([
            $batch, 
            $retail['barcode'], 
            $formData['productDetails'], 
            $formData['productCode'],
            $formData['productName'], 
            $costingData[0]['supplier'] ?? '', 
            $formData['category'], 
            $retail['uom'], 
            $retail['quantity'], 
            $costingData[0]['cost'] ?? '0', 
            $retail['appliedSrp'], 
            $totalCostPrice, 
            $totalSellingPrice, 
            $threshold, 
            $reference, 
            $tag, 
            $formData['shelf'], 
            $formData['shelfDescription'], 
            $asOf, 
            $location, 
            $costingData[0]['isVat'] ?? 'NO', 
            $companyVat
        ]);

        // Debug: Log the values being inserted into tbl_invprodlist
        error_log("Inserting into tbl_invprodlist: " . print_r([
            'Batch' => $batch,
            'Barcode' => $retail['barcode'],
            'ProductDescription' => $formData['productDetails'],
            'ProductCode' => $formData['productCode'],
            'ProductName' => $formData['productName'],
            'Supplier' => $costingData[0]['supplier'] ?? '',
            'Category' => $formData['category'],
            'Unit' => $retail['uom'],
            'Quantity' => $retail['quantity'],
            'RetailCostPrice' => $costingData[0]['cost'] ?? '0',
            'RetailSellingPrice' => $retail['appliedSrp'],
            'TotalCostPrice' => $totalCostPrice,
            'TotalSellingPrice' => $totalSellingPrice,
            'Threshold' => $threshold,
            'Reference' => $reference,
            'Tag' => $tag,
            'Shelf' => $formData['shelf'],
            'ShelfDescription' => $formData['shelfDescription'],
            'AsOf' => $asOf,
            'Location' => $location,
            'IsVat' => $costingData[0]['isVat'] ?? 'NO',
            'CompanyVat' => $companyVat
        ], true));
    }*/

    // Inside your try block, after handling tbl_invprodlist insertion
// Add insertion into tbl_productprice for each retail entry
foreach ($retailData as $retail) {
    $currentDate = date('Y/m/d');
    
    // Get PriceType from form submission, with validation
    $priceType = isset($_POST['retail-priceType']) && in_array($_POST['retail-priceType'], ['retail', 'wholesale'])
        ? $_POST['retail-priceType']
        : 'Retail'; // Default to 'Retail' if invalid or not provided
    
    // Calculate markup percentage if not directly provided
    $cost = (float)($costingData[0]['cost'] ?? 0);
    $appliedSrp = (float)($retail['appliedSrp'] ?? 0);
    $markupPercent = ($cost > 0) ? (($appliedSrp - $cost) / $cost * 100) : 0;
    $markupPercent = number_format($markupPercent, 2); // Format to 2 decimal places
    
    // Determine VAT value (assuming standard 12% VAT if IsVAT is 'YES')
    $isVat = $costingData[0]['isVat'] ?? 'NO';
    $vatValue = ($isVat === 'YES') ? ($cost * 0.12) : '0';
    
    $stmt = $conn->prepare("INSERT INTO tbl_productprice (DateAdded, PriceType, Barcode, ProductName, Measurement, Quantity, Cost, MarkupPercent, SRP, IsVAT, VAT, AppliedSRP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("ssssssssssss", 
        $currentDate,
        $priceType,
        $retail['barcode'],
        $formData['productName'],
        $retail['uom'],
        $retail['quantity'],
        $cost,
        $markupPercent,
        $retail['appliedSrp'], // Using appliedSrp as SRP
        $isVat,
        $vatValue,
        $retail['appliedSrp']
    );
    
    $stmt->execute();
    
    // Debug: Log the values being inserted into tbl_productprice
    error_log("Inserting into tbl_productprice: " . print_r([
        'DateAdded' => $currentDate,
        'PriceType' => $priceType,
        'Barcode' => $retail['barcode'],
        'ProductName' => $formData['productName'],
        'Measurement' => $retail['uom'],
        'Quantity' => $retail['quantity'],
        'Cost' => $cost,
        'MarkupPercent' => $markupPercent,
        'SRP' => $retail['appliedSrp'],
        'IsVAT' => $isVat,
        'VAT' => $vatValue,
        'AppliedSRP' => $retail['appliedSrp']
    ], true));
}
    // Commit the transaction
    $conn->commit();
    echo json_encode(['success' => true, 'message' => 'Product saved successfully in all tables']);
} catch (Exception $e) {
    // Log detailed error information
    error_log("Database error: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    
    // Rollback the transaction on error
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => 'Error saving product: ' . $e->getMessage()]);
}

$conn->close();
?>