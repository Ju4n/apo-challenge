<?php

namespace Tests\Database;

use Juan\ApoChallenge\Database\Exception\DatabaseConnectionException;
use Juan\ApoChallenge\Database\MysqlBuilder;
use PHPUnit\Framework\TestCase;

class MysqlBuilderTest extends TestCase
{
    public function testDatabaseConnectionException(): void
    {
        $this->expectException(DatabaseConnectionException::class);

        $builder = new MysqlBuilder('invalid_host', 'user', 'password', 'database');
        $builder->getBuilder();
    }
}
