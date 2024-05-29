<?php
include('handlers/dbHandler.php');
global $productTable;
try {
    $pdo = getPDOConnection();

    $sql = "SELECT DISTINCT Products_ID, Products_Name, Products_Description, Products_Price, Product_Image, Stock_Avaibility FROM $productTable";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as &$product) {
        $product['Product_Image'] = base64_encode($product['Product_Image']);
    }

    header('Content-Type: application/json');
    echo json_encode($products);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
