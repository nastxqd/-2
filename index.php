<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Магазин товаров</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <nav class="navbar">
      <a href="index.php">Главная</a>
      <a href="shop.php">Магазин</a>
      <a href="contacts.html">Контакты</a>
      <a href="login.php">Вход</a>
    </nav>
  </header>

  <main>
    <h1>Добро пожаловать в наш магазин!</h1>
    <h2>Наш ассортимент</h2>

    <div class="products">
        <?php
        include 'database.php'; // Подключение к базе данных

        // Выполнение запроса к базе данных
        $result = $conn->query("SELECT * FROM products");

        // Проверка успешности запроса
        if (!$result) {
            die("Ошибка выполнения запроса: " . $conn->error);
        }

        // Вывод товаров
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
            echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p>Цена: " . htmlspecialchars($row['price']) . " руб.</p>";
            echo "<a href='product.php?id=" . $row['id'] . "'>Подробнее</a>";
            echo "</div>";
        }
        ?>
    </div>
  </main>

  <footer>
    <p>Контакты: info@shop.com | Тел: +7 (495) 123-45-67</p>
    <p>&copy; 2024 Магазин товаров</p>
  </footer>
</body>
</html>
