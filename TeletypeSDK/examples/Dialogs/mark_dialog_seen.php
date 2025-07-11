<?php

require __DIR__ . '/../../src/Exceptions/TeletypeException.php';
require __DIR__ . '/../../src/TeletypeClient.php';

$token = 'Your_Token';
$dialogId = 'Your_Dialog_ID';

try {
    $client = new Teletype\Sdk\TeletypeClient($token);
    $result = $client->markDialogAsSeen($dialogId);

    if ($result) {
        echo "Диалог успешно помечен как прочитанный!";
    } else {
        echo "Не удалось обновить статус диалога";
    }
} catch (Teletype\Sdk\Exceptions\TeletypeException $e) {
    echo "Ошибка: {$e->getMessage()} (Код: {$e->getCode()})";
}