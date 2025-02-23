<?php

namespace Tests\Controller;

use Juan\ApoChallenge\Controller\Controller;
use Juan\ApoChallenge\Utils\Container;
use Juan\ApoChallenge\Utils\UserAccess;
use Juan\ApoChallenge\Utils\Validator\Validator;
use PHPUnit\Framework\TestCase;
use stdClass;

class ControllerTest extends TestCase
{
    public function testGetService(): void
    {
        $mockContainer = $this->createMock(Container::class);
        $mockValidator = $this->createMock(Validator::class);
        $mockUserAccess = $this->createMock(UserAccess::class);
        $mockService = new stdClass();

        $mockContainer->method('get')->willReturn($mockService);

        $controller = new Controller($mockContainer, $mockValidator, $mockUserAccess);
        $this->assertSame($mockService, $controller->getService('testService'));
    }
}
