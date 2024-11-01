<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин - Продукты</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }

        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .product-table th {
            background-color: #f2f2f2;
        }

        .product {
            position: relative;
            margin: 10px;
            display: inline-block;
        }

        .product img {
            width: 200px;
            height: auto;
        }

        .details-button {
            display: none;
            position: absolute;
            top: 5px;
            left: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .product:hover .details-button {
            display: block;
        }
    </style>
</head>
<body>

<header class="navbar">
    <a href="index.php">Главная</a>
    <a href="shop.php">Магазин</a>
    <a href="contacts.html">Контакты</a>
    <a href="login.php">Вход</a>
</header>

<main>
    <h2>Наш ассортимент</h2>
    
    <!-- Режим таблицы -->
    <h3>Продукты в таблице</h3>
    <table class="product-table">
        <tr>
            <th>Изображение</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
        </tr>
        <?php
        include 'database.php'; // Подключаем базу данных

        $result = $conn->query("SELECT * FROM products");
        
/*echo "<form method='post' action='add_to_cart.php'>";
echo "<input type='hidden' name='products_id' value='" . $row['id'] . "'>";
echo "<button type='submit'>Добавить в корзину</button>";
echo "</form>";*/

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>"; // Добавляем строку таблицы
                echo "<td><img src='\PK2".$row['image']."' title='".$row['name']."' alt='".$row['name']."' width='300'></td></tr>";
                echo "<td>" . $row['name'] . "</td>"; // Название продукта
                echo "<td>" . $row['price'] . " руб.</td>"; // Цена продукта
                echo "<td>" . $row['description'] . "</td>"; // Описание продукта
                echo "</tr>"; // Закрываем строку таблицы
            }
        } else {
            echo "<tr><td colspan='4'>Нет доступных товаров.</td></tr>"; // Сообщение, если нет товаров
        }
        ?>
        
    </table>
</main>

<footer>
    <p>Контактная информация | Копирайт © 2024 Магазин</p>
</footer>

</body>
</html>
