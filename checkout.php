<?php
include 'database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Пожалуйста, авторизуйтесь для оформления заказа.");
}

$user_id = $_SESSION['user_id'];
$conn->query("DELETE FROM cart WHERE user_id = $user_id");
echo "Заказ успешно оформлен! Спасибо за покупку.";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Оформление заказа</title>
</head>
<body>
    <h2>Оформление заказа</h2>
    <p>Ваш заказ был успешно оформлен. Благодарим за покупку!</p>
    <a href="shop.html">Вернуться в магазин</a>
</body>
</html>
