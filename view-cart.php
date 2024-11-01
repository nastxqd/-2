<?php
include 'database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Пожалуйста, авторизуйтесь для просмотра корзины.");
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT products.name, products.price, cart.quantity 
        FROM cart 
        JOIN products ON cart.product_id = products.id 
        WHERE cart.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
</head>
<body>
    <h2>Ваша корзина</h2>
    <table>
        <tr>
            <th>Товар</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Сумма</th>
        </tr>
        <?php
        $total = 0;
        while ($row = $result->fetch_assoc()) {
            $sum = $row['price'] * $row['quantity'];
            $total += $sum;
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['price']} руб.</td>
                    <td>{$row['quantity']}</td>
                    <td>{$sum} руб.</td>
                  </tr>";
        }
        ?>
    </table>
    <p>Итоговая сумма: <?php echo $total; ?> руб.</p>
    <a href="checkout.php">Оформить заказ</a>
</body>
</html>
