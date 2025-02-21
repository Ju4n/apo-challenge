<?php

namespace Juan\ApoChallenge\Utils;

class JsonResponse {
    public static function send($data, int $status = 200) {
        http_response_code($status);

        header("Content-Type: application/json; charset=UTF-8");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Pragma: no-cache");

        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }
}
