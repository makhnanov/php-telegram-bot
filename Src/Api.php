<?php

declare(strict_types=1);

namespace Makhnanov\TelegramBot;

use RuntimeException;

readonly class Api
{
    private const string BASE_URL = 'https://api.telegram.org/bot';

    public function __construct(
        private string $token,
    ) {}

    public function call(string $method, array $params = []): array|bool
    {
        $url = self::BASE_URL . $this->token . '/' . $method;

        $hasFile = false;
        foreach ($params as $value) {
            if ($value instanceof \CURLFile) {
                $hasFile = true;
                break;
            }
        }

        $ch = curl_init();

        if ($hasFile) {
            foreach ($params as $key => $value) {
                if (is_array($value)) {
                    $params[$key] = json_encode($value);
                }
            }
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $params,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 60,
            ]);
        } else {
            curl_setopt_array($ch, [
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($params),
                CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 60,
            ]);
        }

        $response = curl_exec($ch);
        $error = curl_error($ch);

        if ($error) {
            throw new RuntimeException("Curl error: $error");
        }

        $data = json_decode($response, true);

        if (!$data['ok']) {
            throw new RuntimeException($data['description'] ?? 'Unknown API error');
        }

        return $data['result'];
    }
}
