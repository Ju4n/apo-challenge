<?php

namespace Tests\Utils;

use Juan\ApoChallenge\Utils\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testGetBodyReturnsExpectedData(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $inputData = ['key' => 'value'];
        file_put_contents('php://input', json_encode($inputData));

        $request = new Request();
        $this->assertSame($inputData, $request->getBody());
    }
}