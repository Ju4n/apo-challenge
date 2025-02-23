<?php

declare(strict_types=1);

date_default_timezone_set('UTC');

require __DIR__ . '/../vendor/autoload.php';

if (!function_exists('getallheaders')) {
    /**
     * @return array<string, string>
     */
    function getallheaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
