<?php
header('Content-Type: application/json');

require_once '../../includes/config.php';

$response = ['success' => false, 'data' => []];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    if ($type === 'currentInv' && isset($conn)) {
        try {
            // Join tbl_invprodlist and tbl_productprice on Barcode
            $query = "
                SELECT 
                    il.Barcode,
                    il.ProductName,
                    COALESCE(CAST(il.Quantity AS DECIMAL(15,2)), 0) as Quantity,
                    COALESCE(CAST(tp.Cost AS DECIMAL(15,2)), 0) as Cost,
                    COALESCE(CAST(tp.AppliedSRP AS DECIMAL(15,2)), 0) as AppliedSRP,
                    (COALESCE(CAST(tp.Cost AS DECIMAL(15,2)), 0) * COALESCE(CAST(il.Quantity AS DECIMAL(15,2)), 0)) as TotalCostPrice,
                    (COALESCE(CAST(tp.AppliedSRP AS DECIMAL(15,2)), 0) * COALESCE(CAST(il.Quantity AS DECIMAL(15,2)), 0)) as TotalSellingPrice
                FROM tbl_invprodlist il
                LEFT JOIN tbl_productprice tp ON il.Barcode = tp.Barcode
                ORDER BY il.Barcode
            ";
            $result = $conn->query($query);
            if ($result === false) {
                throw new Exception("Query failed: " . $conn->error);
            }

            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = [
                    'Barcode' => $row['Barcode'] ?? 'N/A',
                    'ProductName' => $row['ProductName'] ?? 'N/A',
                    'Quantity' => number_format($row['Quantity'], 2),
                    'CostPrice' => number_format($row['Cost'], 2),
                    'SellingPrice' => number_format($row['AppliedSRP'], 2),
                    'TotalCostPrice' => number_format($row['TotalCostPrice'], 2),
                    'TotalSellingPrice' => number_format($row['TotalSellingPrice'], 2)
                ];
            }

            $response = [
                'success' => true,
                'data' => $products
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