<?php
    $str = readline();
    $orders = [];
    while ($str) {
        $orders[] = $str;
        $str = readline();
    }
    
    $orderNumber = 1;
    foreach ($orders as $order) {
        list($dishes, $total) = explode(' ', $order);
        $dishes = (int)$dishes;
        $total = (int)$total;
        
        if ($dishes % 2 == 0 && $total >= 1000) {
            echo "Заказ $orderNumber: скидка\n";
        } else {
            echo "Заказ $orderNumber: без скидки\n";
        }
        $orderNumber++;
    }
?>