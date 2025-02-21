<?php
require_once('../vendor/autoload.php');

$request = $request = $_SERVER['REQUEST_URI'];


use Juan\ApoChallenge\Controller\MedicationController;
use Juan\ApoChallenge\Database\DatabaseHandler;
use Juan\ApoChallenge\Database\MysqlDriver;
use Juan\ApoChallenge\Repository\MedicationRepository;
use Juan\ApoChallenge\Service\MedicationService;
use Juan\ApoChallenge\Utils\Container;
use Juan\ApoChallenge\Utils\Request;
use Steampixel\Route;

$container = new Container();
$container->set(MedicationRepository::class, function() {
    $dbHandler = new DatabaseHandler(
        new MysqlDriver($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DB'])
    );

    return new MedicationRepository($dbHandler);
});

$container->set(MedicationService::class, function ($container) {
    return new MedicationService($container->get(MedicationRepository::class));
});

Route::add('/medications', function () use ($container) {
    $request = new Request();
    $controller = new MedicationController($container);
    $controller->getMedications($request);
}, 'get');

// Route::add('/medications/new', function () use ($container) {
//     $request = new Request();
//     $controller = new MedicationController($container);
//     $controller->getMedications($request);
// }, 'post');

Route::run('/');
