<?php
session_start();
if (isset($_COOKIE['login'])) {
    header("Location: welcome.php");
    exit();
}

if (isset($_SESSION['login_event'])) {
    switch ($_SESSION['login_event']) {
        case "incorrect password":
            echo "<H2>Неверный пароль!</H2>";
            break;
        case "incorrect input data":
            echo "<H2>Неверные данные входа!</H2>";
            break;
    }
    unset($_SESSION['login_event']);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пример формы</title>
</head>
<body>
<form action="login.php" method="post">
    <label for="Login">Ваш логин: </label>
    <input type="text" id="Login" name="Login">
    <br>
    <label for="Password">Ваш пароль: </label>
    <input type="text" id="Password" name="Password">
    <br>
    <input type="submit" value="Отправить">
</form>

</body>
</html>