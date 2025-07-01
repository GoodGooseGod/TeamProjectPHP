<?php
$separator = " блять это лучший разделитель я тебе отвечаю ";
session_start();

if (!isset($_COOKIE['login'])) {
    header("Location: main.php");
    exit();
}
echo "<H1>Добро пожаловать, " . $_COOKIE['login'] . "</H1>";
echo "<H2>Ваши сообщения:</H2>";

$db = new SQLite3('messages.db');
if (!$db) die("Не удалось создать/открыть базу данных");

$query = "CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    fromwho TEXT NOT NULL,
    towho TEXT NOT NULL,
    text TEXT NOT NULL
    )";
$db->exec($query);

$query = "SELECT fromwho, towho, text  FROM messages";
$result = $db->query($query);
$isthereanymessages = false;
while($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $isthereanymessages = true;
    if ($row["towho"] == $_COOKIE['login']) {
        echo "<pre>    От " . $row["fromwho"] . ":" . $row["text"] . "</pre><br>";
        $isthereanymessages = true;
    }
}
if  (!$isthereanymessages) echo "<pre>   Вы чмо! Вам никто не пишет!</pre><br>";
?>

<H2>Напишите сообщение:</H2>
<form action="sendmessage.php" method="post">
    <label for="Name">Адресат: </label>
    <input type="text" id="Name" name="Name">
    <br>
    <label for="Text">Текст сообщения: </label>
    <input type="text" id="Text" name="Text">
    <br>
    <input type="submit" value="Отправить">
</form>

<a href="leave.php">Выйти</a>