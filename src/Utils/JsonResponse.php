<?php

declare(strict_types=1);

namespace Juan\ApoChallenge\Utils;

class JsonResponse
{
    /**
     * @param array<mixed>|string $data
     */
    public static function send(array|string $data, int $status = 200): int
    {
        http_response_code($status);

        header("Content-Type: application/json; charset=UTF-8");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Pragma: no-cache");

        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        exit();
    }
}
