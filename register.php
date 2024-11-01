<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        echo "Регистрация успешна!";
    } else {
        echo "Ошибка регистрации: " . $conn->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
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
    <h2>Регистрация</h2>
    <form action="register.php" method="POST">
        <label>Логин: <input type="text" name="username" required></label><br>
        <label>Пароль: <input type="password" name="password" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>
