<?php

namespace Tests\Utils;

use Juan\ApoChallenge\Utils\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    public function testJsonResponseSendsCorrectData(): void
    {
        $this->markTestSkipped();
        ob_start();
        JsonResponse::send(['message' => 'success'], 200);
        $output = ob_get_clean();

        $this->assertJson($output);
        $this->assertStringContainsString(json_encode(['message' => 'success'], JSON_PRETTY_PRINT), $output);
    }
}
