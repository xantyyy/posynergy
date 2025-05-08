<?php
header('Content-Type: application/json');

require_once '../../includes/config.php';

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    if ($type === 'currentInv' && isset($conn)) {
        try {
            // Fetch total Cost Price and total Selling Price with JOIN
            $query = "
                SELECT 
                    SUM(CAST(tp.Cost AS DECIMAL(15,2)) * COALESCE(CAST(il.Quantity AS DECIMAL(15,2)), 0)) as totalCostPrice,
                    SUM(CAST(tp.AppliedSRP AS DECIMAL(15,2)) * COALESCE(CAST(il.Quantity AS DECIMAL(15,2)), 0)) as totalSellingPrice,
                    SUM(CAST(tp.Cost AS DECIMAL(15,2))) as totalCost,
                    SUM(CAST(tp.AppliedSRP AS DECIMAL(15,2))) as totalAppliedSRP
                FROM tbl_productprice tp
                LEFT JOIN tbl_invprodlist il ON tp.Barcode = il.Barcode
            ";
            $result = $conn->query($query);
            if ($result === false) {
                throw new Exception("Query failed: " . $conn->error);
            }
            $data = $result->fetch_assoc();
            $totalCostPrice = floatval($data['totalCostPrice'] ?? 0);
            $totalSellingPrice = floatval($data['totalSellingPrice'] ?? 0);
            $totalCost = floatval($data['totalCost'] ?? 0);
            $totalAppliedSRP = floatval($data['totalAppliedSRP'] ?? 0);

            // Fetch total Quantity from tbl_invprodlist
            $quantityQuery = "SELECT SUM(CAST(Quantity AS DECIMAL(15,2))) as totalQuantity FROM tbl_invprodlist";
            $quantityResult = $conn->query($quantityQuery);
            if ($quantityResult === false) {
                throw new Exception("Quantity query failed: " . $conn->error);
            }
            $quantity = floatval($quantityResult->fetch_assoc()['totalQuantity'] ?? 0);

            $response = [
                'success' => true,
                'quantity' => number_format($quantity, 2),
                'costPrice' => number_format($totalCost, 2),
                'sellingPrice' => number_format($totalAppliedSRP, 2),
                'totalCostPrice' => number_format($totalCostPrice, 2),
                'totalSellingPrice' => number_format($totalSellingPrice, 2)
            ];
        } catch (Exception $e) {
            $response['message'] = $e->getMessage();
        }
    } else {
        $response['message'] = 'Invalid type or database connection not available';
    }
} else {
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);
if (isset($conn)) {
    $conn->close();
}
?>