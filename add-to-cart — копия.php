<?php
session_start();

$product_id = $_POST['product_id'];

// Здесь вы должны получить данные о товаре из базы данных по ID
include 'database.php';
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if ($product) {
    $_SESSION['cart'][] = $product; // Добавление товара в корзину
    header("Location: shop.php"); // Перенаправление обратно в магазин
} else {
    echo "Товар не найден.";
}
?>
