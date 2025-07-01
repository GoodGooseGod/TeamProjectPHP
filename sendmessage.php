<?php
$separator = " блять это лучший разделитель я тебе отвечаю ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $from = $_COOKIE['login'];
    $to = htmlspecialchars($_POST['Name']);
    $text = htmlspecialchars($_POST['Text']);

    $db = new SQLite3('messages.db');
    if (!$db) die("Не удалось создать/открыть базу данных");

    $db->exec("INSERT INTO messages (fromwho, towho, text) VALUES ('$from', '$to', '$text')");

    $res = $db->query("SELECT fromwho, towho, text FROM messages");
    while($row = $res->fetchArray(SQLITE3_ASSOC)) {
        echo $row["fromwho"] . " " . $row["towho"] . " " . $row["text"];
    }

    header("Location: welcome.php");
    exit;
}
?>
