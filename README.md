# Teletype API SDK for PHP

![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)
![Teletype API](https://img.shields.io/badge/API-Teletype.app-orange.svg)

Простой и удобный SDK для работы с API сервиса Teletype.app. Позволяет легко интегрировать функционал чатов и клиентской поддержки в ваше PHP-приложение.

---

## 📦 Установка

### Способ 1: Composer (рекомендуется)

```bash
composer require your-vendor/teletype-sdk
Способ 2: Вручную
Скопируйте папку src в ваш проект:

bash
Копировать
Редактировать
git clone https://github.com/your-account/teletype-sdk-php.git
cp -r teletype-sdk-php/src/ path/to/your/project/
🚀 Быстрый старт
php
Копировать
Редактировать
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
🔍 Документация
Основные методы
Метод	Описание	Пример
sendMessage()	Отправить сообщение	$client->sendMessage($dialogId, $text)
getMessages()	Получить сообщения	$client->getMessages()
closeDialog()	Закрыть диалог	$client->closeDialog($dialogId)
getClientData()	Данные клиента	$client->getClientData($clientId)

Полные примеры
Смотрите в папке examples/:

Messages/send_message.php — Отправка сообщений

Dialogs/close_dialog.php — Управление диалогами

Clients/update_data.php — Работа с клиентами

🛠 Настройка
php
Копировать
Редактировать
// Расширенные настройки
$client = new TeletypeClient(
    $token,
    ['timeout' => 10] // Настройки HTTP-клиента
);
🚨 Обработка ошибок
Все методы выбрасывают TeletypeException при ошибках:

php
Копировать
Редактировать
try {
    $client->someMethod();
} catch (TeletypeException $e) {
    echo "Ошибка {$e->getCode()}: {$e->getMessage()}";
    // Логирование ошибки
    file_put_contents('teletype_errors.log', $e->getMessage(), FILE_APPEND);
}
🤝 Участие в разработке
Форкните репозиторий

Создайте ветку для вашей фичи:

bash
Копировать
Редактировать
git checkout -b feature/amazing-feature
Сделайте коммит изменений:

bash
Копировать
Редактировать
git commit -m 'Add amazing feature'
Запушьте ветку:

bash
Копировать
Редактировать
git push origin feature/amazing-feature
Откройте Pull Request

