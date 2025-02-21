<?php

namespace Juan\ApoChallenge\Utils;

class Request {
    private array $body;
    private string $method;

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->body = $this->parseJsonBody();
    }

    public function getBody(): array {
        return $this->body;
    }

    private function parseJsonBody(): array {
        if ($this->method === 'POST' || $this->method === 'PUT' || $this->method === 'PATCH') {
            $input = file_get_contents('php://input');
            return json_decode($input, true) ?? [];
        }

        return [];
    }
}
