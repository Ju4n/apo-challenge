<?php declare(strict_types=1);

use Juan\ApoChallenge\Database\MysqlBuilder;
use Juan\ApoChallenge\Repository\MedicationRepository;
use Juan\ApoChallenge\Repository\UserRepository;
use Juan\ApoChallenge\Service\MedicationService;
use Juan\ApoChallenge\Service\UserService;
use Juan\ApoChallenge\Utils\Container;

// Container initialization
$container = new Container();

// Mysql Builder
$container->set(MysqlBuilder::class, function () {
    return new MysqlBuilder(
        $_ENV['MYSQL_HOST'],
        $_ENV['MYSQL_USER'],
        $_ENV['MYSQL_PASSWORD'],
        $_ENV['MYSQL_DATABASE']
    );
});

// Repositories
$container->set(MedicationRepository::class, function () use ($container) {
    return new MedicationRepository($container->get(MysqlBuilder::class));
});

$container->set(UserRepository::class, function () use ($container) {
    return new UserRepository($container->get(MysqlBuilder::class));
});

// Services
$container->set(MedicationService::class, function () use ($container) {
    return new MedicationService($container->get(MedicationRepository::class));
});

$container->set(UserService::class, function () use ($container) {
    return new UserService($container->get(UserRepository::class));
});
