<?php

require __DIR__ . '/../../src/Exceptions/TeletypeException.php';
require __DIR__ . '/../../src/TeletypeClient.php';

$token = 'Your_Token';
$dialogId = 'Your_Dialog_ID';

try {
    $client = new Teletype\Sdk\TeletypeClient($token);
    $response = $client->sendMessage($dialogId, 'Hello from SDK!');
    echo "Message sent: " . ($response['success'] ? 'Yes' : 'No');
} catch (Teletype\Sdk\Exceptions\TeletypeException $e) {
    echo "Error: {$e->getMessage()} (Code: {$e->getCode()})";
}