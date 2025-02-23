<?php

namespace Tests\Utils;

use Exception;
use Juan\ApoChallenge\Utils\Container;
use PHPUnit\Framework\TestCase;
use stdClass;

class ContainerTest extends TestCase
{
    public function testGetService(): void
    {
        $container = new Container();
        $container->set('TestService', fn() => new stdClass());

        $this->assertInstanceOf(stdClass::class, $container->get('TestService'));
    }

    public function testExceptionOnUnknownService(): void
    {
        $this->expectException(Exception::class);
        $container = new Container();
        $container->get('UnknownService');
    }
}
