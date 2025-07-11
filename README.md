# Teletype API SDK for PHP

![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)

Простой и удобный SDK для работы с API сервиса Teletype.app. Позволяет легко интегрировать функционал чатов и клиентской поддержки в ваше PHP-приложение.

---

## 📦 Установка

### Способ 1: Composer (рекомендуется)

```bash
composer require your-vendor/teletype-sdk
```

### Способ 2: Вручную
```bash
git clone https://github.com/your-account/teletype-sdk-php.git
cp -r teletype-sdk-php/src/ path/to/your/project/
```

## 🚀 Быстрый старт
```php
require_once 'vendor/autoload.php'; // или путь к TeletypeClient.php

use Teletype\Sdk\TeletypeClient;
use Teletype\Sdk\Exceptions\TeletypeException;

$token = 'ваш_api_токен';
$client = new TeletypeClient($token);

try {
    // Отправка сообщения
    $response = $client->sendMessage('dialog_123', 'Привет, мир!');
    echo "Сообщение отправлено! ID: " . $response['data']['messageId'];
} catch (TeletypeException $e) {
    echo "Ошибка: " . $e->getMessage();
}
```

## 🚨 Обработка ошибок
Все методы выбрасывают TeletypeException при ошибках:
```php
try {
    $client->sendMessage('invalid_id', 'Текст');
} catch (Teletype\Sdk\Exceptions\TeletypeException $e) {
    echo "Ошибка {$e->getCode()}: {$e->getMessage()}";
}
```
