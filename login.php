<?php
$separator = " блять это лучший разделитель я тебе отвечаю ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $login = htmlspecialchars($_POST['Login']);
    $password = htmlspecialchars($_POST['Password']);
    $_SESSION['login'] = $login;

    $file = fopen("users.txt", "r+");
    $loginexists = false;
    while (!feof($file)) {
        $line = fgets($file);
        if ($line) {
            $line = explode($separator, $line);
            if ($line[0] == $login) {
                $loginexists = true;
                if ($line[1] == $password . "\n") {
                    echo "<H2>Добро пожаловать, $login!</H2>";
                    break;
                }
                else {
                    echo "<H1>Неверный пароль!</H1>";
                    exit();
                }
            }
        }
    }
    if ($login == "" | $password == "") {
        echo  "<H1>Неверный ввод!</H1>";
        exit();
    }
    if (!$loginexists) fwrite($file, $login . $separator . $password . "\n");
    fclose($file);

    echo "<H2>Ваши сообщения:</H2>";
    $file = fopen("messages.txt", "r");
    $isthereanymessages = false;
    while (!feof($file)) {
        $line = fgets($file);
        if ($line) {
            list($from, $to, $text) = explode($separator, $line);
            if ($to == $login) {
                echo "<pre>    От $from: $text</pre><br>";
                $isthereanymessages = true;
            }
        }
    }
    if  (!$isthereanymessages) echo "<pre>   Вы чмо! Вам никто не пишет!</pre><br>";
    fclose($file);
}
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
