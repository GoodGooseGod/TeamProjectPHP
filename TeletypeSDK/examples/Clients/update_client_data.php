<?php

require __DIR__ . '/../../src/Exceptions/TeletypeException.php';
require __DIR__ . '/../../src/TeletypeClient.php';

$token = 'Your_Token';
$clientId = 'Your_Client_ID';

try {
    $client = new Teletype\Sdk\TeletypeClient($token);

    $updateData = [
        'name' => 'Новое имя клиента',
        'phone' => '+79123456789',
        'email' => 'new@example.com',
        'additional_payload' => json_encode([
            'custom_field' => 'value',
            'another_field' => 123
        ])
    ];

    // Пробуем разные варианты force_additional_payload
    $response = $client->updateClientData($clientId, $updateData, true); // true = '1'
    // Или: $response = $client->updateClientData($clientId, $updateData, false); // false = '0'

    if ($response['success']) {
        echo "Данные клиента успешно обновлены!\n";
        print_r($response['data']);
    } else {
        echo "Ошибка при обновлении данных клиента\n";
        print_r($response['errors'] ?? 'Неизвестная ошибка');
    }
} catch (Teletype\Sdk\Exceptions\TeletypeException $e) {
    echo "Error: {$e->getMessage()} (Code: {$e->getCode()})";
}