<?php

// Вручную подключаем необходимые файлы
require __DIR__ . '/../../src/Exceptions/TeletypeException.php';
require __DIR__ . '/../../src/TeletypeClient.php';

// Теперь можно использовать классы
$token = 'Your_Token';

try {
    $client = new Teletype\Sdk\TeletypeClient($token);
    $messages = $client->getMessages();
    print_r($messages['data']['items'] ?? 'No messages');
} catch (Teletype\Sdk\Exceptions\TeletypeException $e) {
    echo "Error: {$e->getMessage()} (Code: {$e->getCode()})";
}