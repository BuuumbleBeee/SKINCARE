<?php
include('handlers/dbHandler.php');
global $productTable;
try {
    $pdo = getPDOConnection();

    $product_id = intval($_GET['id']);

    $sql = "SELECT Products_ID, Products_Name, Products_Description, Products_Price, Product_Image, Stock_Avaibility FROM $productTable WHERE Products_ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product) {
        $product['Product_Image'] = base64_encode($product['Product_Image']);
    }

    header('Content-Type: application/json');
    echo json_encode($product);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
