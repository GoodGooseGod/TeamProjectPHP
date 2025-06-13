<?php
$separator = " блять это лучший разделитель я тебе отвечаю ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $login = htmlspecialchars($_POST['Login']);
    $password = htmlspecialchars($_POST['Password']);
    setcookie('login', $login, time() + (86400 * 30), "/"); // Куки на 30 дней

    $file = fopen("users.txt", "r+");
    $loginexists = false;
    while (!feof($file)) {
        $line = fgets($file);
        if ($line) {
            $line = explode($separator, $line);
            if ($line[0] == $login) {
                $loginexists = true;
                if ($line[1] == $password . "\n") {
                    header("Location: welcome.php");
                    exit;
                }
                else {
                    $_SESSION["login_event"] = "incorrect password";
                    header("Location: main.php");
                    exit;
                }
            }
        }
    }
    if ($login == "" | $password == "") {
        $_SESSION["login_event"] = "incorrect input data";
        header("Location: main.php");
        exit;
    }
    if (!$loginexists) fwrite($file, $login . $separator . $password . "\n");
    fclose($file);

    header("Location: welcome.php");
    exit;
}
?>