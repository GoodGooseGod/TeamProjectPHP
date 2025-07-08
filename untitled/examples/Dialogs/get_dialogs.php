<?php

require __DIR__ . '/../../src/Exceptions/TeletypeException.php';
require __DIR__ . '/../../src/TeletypeClient.php';


$token = 'Your_Token';

try {
    $client = new Teletype\Sdk\TeletypeClient($token);
    $dialogues = $client->getDialogues();
    print_r($dialogues['data']['items'] ?? 'No dialogues found');
} catch (Teletype\Sdk\Exceptions\TeletypeException $e) {
    echo "Error: {$e->getMessage()} (Code: {$e->getCode()})";
}