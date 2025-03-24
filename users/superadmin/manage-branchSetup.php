<?php
require_once '../../includes/config.php'; // Database connection

// Fetch Branch Setup Data
function fetchBranchSetupData($conn) {
    $data = [];

    try {
        // Query updated to match the actual ConfigName values in the database
        $query = "
            SELECT ConfigName, Value 
            FROM tbl_configuration 
            WHERE ConfigOwner = 'BRANCH SETUP' 
            AND ConfigName IN (
                'ORGNAME', 'BRANCHNAME', 'BRANCHADDRESS', 'BRANCHTELNO', 
                'TINNO', 'PERMITNO', 'CURRENTNO', 'CLIENTNOMAX', 
                'PRIV_BANKO', 'ST_PER_POINT', 'DISCOUNT_MAX_AMOUNT', 'DISCOUNT_SCOPE', 
                'SENIOR_DISCOUNT', 'PWD_DISCOUNT', 'SOLO_PARENT_DISCOUNT', 
                'NAAC_DISCOUNT', 'MEDAL_OF_VALOR_DISCOUNT'
            )";
        
        $result = $conn->query($query);

        if (!$result) {
            throw new Exception("Query failed: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // Initialize response sections
            $supplierData = [];
            $discountSetup = [];
            $discountData = [];

            // Process each row and map to the appropriate section
            while ($row = $result->fetch_assoc()) {
                $configName = $row['ConfigName'];
                $value = $row['Value'];

                // Debug: Log each row
                error_log("ConfigName: $configName, Value: $value");

                switch ($configName) {
                    // Supplier Information
                    case 'ORGNAME':
                        $supplierData['Company'] = $value;
                        break;
                    case 'BRANCHNAME':
                        $supplierData['Branch'] = $value;
                        break;
                    case 'BRANCHADDRESS':
                        $supplierData['Address'] = $value;
                        break;
                    case 'BRANCHTELNO':
                        $supplierData['Telephone No.'] = $value;
                        break;
                    case 'TINNO':
                        $supplierData['TIN No.'] = $value;
                        break;
                    case 'PERMITNO':
                        $supplierData['Permit No.'] = $value;
                        break;
                    case 'CURRENTNO':
                        $supplierData['Serial No.'] = $value;
                        break;
                    case 'CLIENTNOMAX':
                        $supplierData['Min No.'] = $value;
                        break;

                    // Company Value
                    case 'PRIV_BANKO':
                        $data['vatable'] = $value;
                        break;

                    // Minimum Purchase
                    case 'ST_PER_POINT':
                        $data['st_per_point'] = $value;
                        break;

                    // Senior Discount Setup
                    case 'DISCOUNT_MAX_AMOUNT':
                        $discountSetup['max_amount'] = $value;
                        break;
                    case 'DISCOUNT_SCOPE':
                        $discountSetup['scope'] = $value;
                        break;

                    // Discount Percentages
                    case 'SENIOR_DISCOUNT':
                        $discountData['Senior Discount'] = $value;
                        break;
                    case 'PWD_DISCOUNT':
                        $discountData['PWD Discount'] = $value;
                        break;
                    case 'SOLO_PARENT_DISCOUNT':
                        $discountData['Solo Parent Discount'] = $value;
                        break;
                    case 'NAAC_DISCOUNT':
                        $discountData['NAAC Discount'] = $value;
                        break;
                    case 'MEDAL_OF_VALOR_DISCOUNT':
                        $discountData['Medal of Valor Discount'] = $value;
                        break;
                }
            }

            // Assign populated sections to the response
            if (!empty($supplierData)) {
                $data['supplier'] = $supplierData;
            }
            if (!empty($discountSetup)) {
                $data['discount_setup'] = $discountSetup;
            }
            if (!empty($discountData)) {
                $data['discounts'] = $discountData;
            }
        } else {
            $data['warning'] = "No data found for BRANCH SETUP configuration.";
            error_log("No data found for BRANCH SETUP configuration.");
        }

    } catch (Exception $e) {
        $data['error'] = "An error occurred while fetching data: " . $e->getMessage();
        error_log("Error: " . $e->getMessage());
    }

    return $data;
}

// Fetch data and encode as JSON for frontend
$data = fetchBranchSetupData($conn);

// Debug: Log the final response
error_log("Final Response: " . json_encode($data));

// Set appropriate header for JSON output
header('Content-Type: application/json');
echo json_encode($data);

// Close database connection
$conn->close();
?>