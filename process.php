<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $owner = $_POST['Владелец'];
    $size = $_POST['Пенис'];

    echo "Владелец: " . htmlspecialchars($owner) . "<br>";
    echo "Пенис: " . htmlspecialchars($size) . " см<br>";
}
?>