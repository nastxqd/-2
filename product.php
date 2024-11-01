<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Товар</title>
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
    <?php
    include 'database.php';
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM products WHERE id=$id");
    $row = $result->fetch_assoc();
    ?>

    <h2><?php echo $row['name']; ?></h2>
    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
    <p>Цена: <?php echo $row['price']; ?> руб.</p>
    <p><?php echo $row['description']; ?></p>
    <form action="add-to-cart.php" method="POST">
      <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
      <button type="submit">Добавить в корзину</button>
    </form>
  </main>

  <footer>
    <p>Контакты: info@shop.com | Тел: +7 (495) 123-45-67</p>
    <p>&copy; 2024 Магазин товаров</p>
  </footer>
</body>
</html>
