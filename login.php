<?php
$separator = " блять это лучший разделитель я тебе отвечаю ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $login = htmlspecialchars($_POST['Login']);
    $entered_password = htmlspecialchars($_POST['Password']);

    if ($login == "" | $entered_password == "") {
        $_SESSION["login_event"] = "incorrect input data";
        header("Location: main.php");
        exit;
    }

    $db = new SQLite3('users.db');
    if (!$db) die("Не удалось создать/открыть базу данных");

    $query = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
    )";
    $db->exec($query);

    $query = "SELECT username, password FROM users";
    $result = $db->query($query);
    while($row = $result->fetchArray(SQLITE3_ASSOC)) {
        if ($row["username"] == $login) {
            if ($entered_password == $row["password"]) {
                setcookie('login', $login, time() + (86400 * 30), "/"); // Куки на 30 дней
                header("Location: welcome.php");
                exit;
            } else {
                $_SESSION["login_event"] = "incorrect password";
                header("Location: main.php");
                exit;
            }
        }
    }

    $db->exec("INSERT INTO users (username, password) VALUES ('$login', '$entered_password')");

    setcookie('login', $login, time() + (86400 * 30), "/"); // Куки на 30 дней
    header("Location: welcome.php");
    exit;
}
?>