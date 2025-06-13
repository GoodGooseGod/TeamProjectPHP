<?php
$separator = " блять это лучший разделитель я тебе отвечаю ";
session_start();

if (!isset($_COOKIE['login'])) {
    header("Location: main.php");
    exit();
}
echo "<H1>Добро пожаловать, " . $_COOKIE['login'] . "</H1>";
echo "<H2>Ваши сообщения:</H2>";
$file = fopen("messages.txt", "r");
$isthereanymessages = false;
while (!feof($file)) {
    $line = fgets($file);
    if ($line) {
        list($from, $to, $text) = explode($separator, $line);
        if ($to == $_COOKIE['login']) {
            echo "<pre>    От $from: $text</pre><br>";
            $isthereanymessages = true;
        }
    }
}
if  (!$isthereanymessages) echo "<pre>   Вы чмо! Вам никто не пишет!</pre><br>";
fclose($file);
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