<?php
$separator = " блять это лучший разделитель я тебе отвечаю ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $from = $_COOKIE['login'];
    $to = htmlspecialchars($_POST['Name']);
    $text = htmlspecialchars($_POST['Text']);

    $file = fopen("messages.txt", "a");
    fwrite($file, $from . $separator . $to . $separator . $text . "\n");
    fclose($file);

    header("Location: welcome.php");
    exit;
}
?>
