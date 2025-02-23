<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Utils;

class Request
{
    /** @var array<string, string> */
    private array $headers;

    /** @var array<string, mixed> */
    private array $body;

    private string $method;

    public function __construct()
    {
        $this->headers = getallheaders() ?: [];
        $this->method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $this->body = $this->parseJsonBody();
    }

    /**
     */
    public function getHeader(string $name): ?string
    {
        return $this->headers[$name] ?? null;
    }

    /**
     * @return array<string, mixed>
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @return array<string, mixed>
     */
    private function parseJsonBody(): array
    {
        if (\in_array($this->method, ['POST', 'PUT', 'PATCH'], true)) {
            $input = file_get_contents('php://input');

            return json_decode($input, true) ?? [];
        }

        return [];
    }
}
