<?php
session_start();
session_destroy();
setcookie('username', '', time() - 3600, "/"); // Удаление куки
header("Location: main.php");
exit;
?>
