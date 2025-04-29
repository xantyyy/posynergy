<?php
require_once '../../includes/config.php'; // Database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set JSON header
header('Content-Type: application/json');

// Map frontend field names to database ConfigName values
$fieldMapping = [
    'company' => 'COMPANY',
    'businessLineTrade' => 'BUSINESSLINE',
    'branch' => 'BRANCH',
    'address' => 'ADDRESS',
    'telephone' => 'TELNO',
    'tin' => 'TINNO',
    'permit' => 'PERMITNO',
    'serial' => 'SERIALNO',
    'min' => 'MINNO',
    'vatable' => 'IFVATABLE',
    'stPerPoint' => 'POINTS',
    'discountMaxAmount' => 'SENIORDISCOUNTMAXIMUMAMOUNT',
    'discountScope' => 'DISCOUNTSCOPE',
    'seniorDiscount' => 'SENIORDISCOUNT',
    'pwdDiscount' => 'PWDDISCOUNT',
    'soloParentDiscount' => 'SOLOPARENTDISCOUNT',
    'naacDiscount' => 'NAACDISCOUNT',
    'medalOfValorDiscount' => 'MEDALOFVALOR'
];

// Function to fetch Branch Setup Data
function fetchBranchSetupData($conn) {
    $data = [];

    try {
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
            $supplierData = [];
            $discountSetup = [];
            $discountData = [];

            while ($row = $result->fetch_assoc()) {
                $configName = $row['ConfigName'];
                $value = $row['Value'] ?: 'N/A'; // Ensure no null values

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
                    // Company Value
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

// Function to update Branch Setup Data
function updateBranchSetupData($conn, $data, $fieldMapping) {
    try {
        // Prepare the update query
        $sql = "UPDATE tbl_invconfig SET Value = ? WHERE ConfigOwner = 'BRANCH SETUP' AND ConfigName = ?";
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        // Iterate through the data and update each field
        foreach ($data as $field => $value) {
            if (isset($fieldMapping[$field])) {
                $configName = $fieldMapping[$field];
                $value = $value === 'N/A' ? '' : $value; // Convert 'N/A' to empty string for DB
                $stmt->bind_param('ss', $value, $configName);
                
                if (!$stmt->execute()) {
                    throw new Exception("Update failed for $configName: " . $stmt->error);
                }
                error_log("Updated $configName to $value");
            }
        }

        $stmt->close();
        return ['success' => true];
    } catch (Exception $e) {
        error_log("Update Error: " . $e->getMessage());
        return ['success' => false, 'message' => $e->getMessage()];
    }
}

// Handle GET or POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    // Handle update request
    $newData = $_POST['data'] ?? [];
    $response = updateBranchSetupData($conn, $newData, $fieldMapping);
    echo json_encode($response);
} else {
    // Handle fetch request (GET or default)
    $data = fetchBranchSetupData($conn);
    echo json_encode($data);
}

// Close database connection
$conn->close();
?>