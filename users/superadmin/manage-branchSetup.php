<?php
require_once '../../includes/config.php'; // Database connection

// Fetch Branch Setup Data
function fetchBranchSetupData($conn) {
    $data = [];

    try {
        // Query to fetch data from tbl_invconfig
        $query = "
            SELECT ConfigName, Value 
            FROM tbl_invconfig 
            WHERE ConfigOwner = 'BRANCH SETUP' 
            AND ConfigName IN (
                'COMPANY', 'BUSINESSLINE', 'BRANCH', 'ADDRESS', 
                'TELNO', 'TINNO', 'PERMITNO', 'SERIALNO', 
                'MINNO', 'IFVATABLE', 'POINTS', 'SENIORDISCOUNTMAXIMUMAMOUNT', 
                'DISCOUNTSCOPE', 'SENIORDISCOUNT', 'PWDDISCOUNT', 'SOLOPARENTDISCOUNT', 
                'NAACDISCOUNT', 'MEDALOFVALOR'
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

                // Debug: Log each row (optional, for debugging only)
                error_log("ConfigName: $configName, Value: $value");

                switch ($configName) {
                    // Supplier Information
                    case 'COMPANY':
                        $supplierData['Company'] = $value;
                        break;
                    case 'BUSINESSLINE':
                        $supplierData['Business Line Trade'] = $value;
                        break;
                    case 'BRANCH':
                        $supplierData['Branch'] = $value;
                        break;
                    case 'ADDRESS':
                        $supplierData['Address'] = $value;
                        break;
                    case 'TELNO':
                        $supplierData['Telephone No.'] = $value;
                        break;
                    case 'TINNO':
                        $supplierData['TIN No.'] = $value;
                        break;
                    case 'PERMITNO':
                        $supplierData['Permit No.'] = $value;
                        break;
                    case 'SERIALNO':
                        $supplierData['Serial No.'] = $value;
                        break;
                    case 'MINNO':
                        $supplierData['Min No.'] = $value;
                        break;

                    // Company Value (VAT Status)
                    case 'IFVATABLE':
                        $data['vatable'] = $value;
                        break;

                    // Minimum Purchase Points
                    case 'POINTS':
                        $data['st_per_point'] = $value;
                        break;

                    // Senior Discount Setup
                    case 'SENIORDISCOUNTMAXIMUMAMOUNT':
                        $discountSetup['max_amount'] = $value;
                        break;
                    case 'DISCOUNTSCOPE':
                        $discountSetup['scope'] = $value;
                        break;

                    // Discount Percentages
                    case 'SENIORDISCOUNT':
                        $discountData['Senior Discount'] = $value;
                        break;
                    case 'PWDDISCOUNT':
                        $discountData['PWD Discount'] = $value;
                        break;
                    case 'SOLOPARENTDISCOUNT':
                        $discountData['Solo Parent Discount'] = $value;
                        break;
                    case 'NAACDISCOUNT':
                        $discountData['NAAC Discount'] = $value;
                        break;
                    case 'MEDALOFVALOR':
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

// Debug: Log the final response (optional)
error_log("Final Response: " . json_encode($data));

// Set appropriate header for JSON output
header('Content-Type: application/json');
echo json_encode($data);

// Close database connection
$conn->close();
?>
