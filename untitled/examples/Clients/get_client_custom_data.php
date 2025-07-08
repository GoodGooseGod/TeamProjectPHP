<?php

require __DIR__ . '/../../src/Exceptions/TeletypeException.php';
require __DIR__ . '/../../src/TeletypeClient.php';

$token = 'Your_Token';
$clientId = 'Your_Client_ID';

try {
    $client = new Teletype\Sdk\TeletypeClient($token);
    $customData = $client->getClientCustomData($clientId);
    print_r($customData['data'] ?? 'No custom data found');
} catch (Teletype\Sdk\Exceptions\TeletypeException $e) {
    echo "Error: {$e->getMessage()} (Code: {$e->getCode()})";
}