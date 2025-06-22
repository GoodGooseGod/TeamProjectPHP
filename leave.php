<?php
session_start();
session_destroy();
setcookie('login', '', time() - 3600, "/"); // Удаление куки
header("Location: main.php");
exit;
?>
