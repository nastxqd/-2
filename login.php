<?php
include 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);

    if ($stmt->num_rows > 0 && $stmt->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        header("Location: index.html");
    } else {
        echo "Неправильный логин или пароль.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="navbar">
      <a href="index.php">Главная</a>
      <a href="shop.php">Магазин</a>
      <a href="contacts.html">Контакты</a>
      <a href="register.php">Регистрация</a>
    </nav>
  </header>
    <h2>Вход</h2>
    <form action="login.php" method="POST">
        <label>Логин: <input type="text" name="username" required></label><br>
        <label>Пароль: <input type="password" name="password" required></label><br>
        <button type="submit">Войти</button>
    </form>
</body>
<footer>
    <p>Контактная информация | Копирайт © 2024 Магазин</p>
</footer>
</html>
