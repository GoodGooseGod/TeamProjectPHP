<?php
    $str = readline();
    $orders = [];
    while ($str) {
        $orders[] = $str;
        $str = readline();
    }
    foreach ($orders as $i){
        echo $i . "\n";
    }
?>
