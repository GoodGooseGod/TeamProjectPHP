<?php

namespace Teletype\Sdk;

use Teletype\Sdk\Exceptions\TeletypeException;

class TeletypeClient
{
    private $token;
    private $baseUrl = 'https://api.teletype.app/public/api/v1/';

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function getMessages(): array
    {
        return $this->sendRequest('GET', 'messages');
    }

    public function sendMessage(string $dialogId, string $text): array
    {
        return $this->sendRequest('POST', 'message/send', [
            'dialogId' => $dialogId,
            'text' => $text
        ]);
    }

    public function getClients(): array
    {
        return $this->sendRequest('GET', 'clients');
    }

    public function getClientData(string $clientId): array
    {
        return $this->sendRequest('GET', "client/details/$clientId", [
            'clientId' => $clientId
        ]);
    }

    public function getClientCustomData(string $clientId): array
    {
        return $this->sendRequest('GET', "client/get-custom-fields/$clientId", [
            'clientId' => $clientId
        ]);
    }

    public function getDialogues(): array
    {
        return $this->sendRequest('GET', 'dialogs');

    }
    public function updateClientData(
        string $clientId,
        array $data,
        bool $forceAdditionalPayload = false
    ): array {
        $payload = [
            'clientId' => $clientId,
            'force_additional_payload' => $forceAdditionalPayload ? '1' : '0' // Изменено на строковые '1'/'0'
        ];

        // Добавляем только переданные поля
        $allowedFields = ['name', 'phone', 'email', 'additional_payload'];
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $payload[$field] = $data[$field];
            }
        }

        return $this->sendRequest('POST', "client/update/$clientId", $payload);
    }

    public function closeDialog(string $dialogId): bool
    {
        $response = $this->sendRequest('POST', "dialog/close/$dialogId");

        if ($response['success'] && $response['data'] === true) {
            return true;
        }

        throw new TeletypeException(
            $response['errorType'] ?? 'Failed to close dialog',
            $response['errors'][0]['code'] ?? 500
        );
    }

    public function markDialogAsSeen(string $dialogId): bool
{
    $response = $this->sendRequest('POST', "dialog/seen/$dialogId");

    if ($response['success'] && $response['data'] === true) {
        return true;
    }

    throw new TeletypeException(
        $response['errorType'] ?? 'Failed to mark dialog as seen',
        $response['errors'][0]['code'] ?? 500
    );
}
    private function sendRequest(string $method, string $endpoint, array $data = []): array
    {
        $url = $this->baseUrl . $endpoint;
        $headers = [
            'X-Auth-Token: ' . $this->token,
            'Content-Type: application/x-www-form-urlencoded'
        ];

        $options = [
            'http' => [
                'method' => $method,
                'header' => $headers,
                'ignore_errors' => true
            ]
        ];

        if ($method === 'POST') {
            $options['http']['content'] = http_build_query($data);
        } elseif ($method === 'GET' && !empty($data)) {
            $url .= '?' . http_build_query($data);
        }

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response === false) {
            throw new TeletypeException('Request failed');
        }

        $result = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new TeletypeException('JSON decode error: ' . json_last_error_msg());
        }

        // Проверка HTTP статуса
        $statusLine = $http_response_header[0] ?? '';
        preg_match('{HTTP/\S*\s(\d{3})}', $statusLine, $match);
        $statusCode = $match[1] ?? 500;

        if ($statusCode < 200 || $statusCode >= 300) {
            throw new TeletypeException(
                $result['error'] ?? 'API Error',
                $statusCode
            );
        }

        return $result;
    }
}