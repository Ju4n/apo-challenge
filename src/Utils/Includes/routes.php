<?php declare(strict_types=1);

use Juan\ApoChallenge\Controller\MedicationController;
use Juan\ApoChallenge\Service\UserService;
use Juan\ApoChallenge\Utils\Request;
use Juan\ApoChallenge\Utils\UserAccess;
use Juan\ApoChallenge\Utils\Validator\Validator;
use Steampixel\Route;

// validator
$validator = new Validator();
// User access
$userAccess = new UserAccess($container->get(UserService::class));

// router
Route::add('/medications', function () use ($container, $validator, $userAccess) {
    $request = new Request();
    $controller = new MedicationController($container, $validator, $userAccess);
    $controller->getMedications($request);
}, 'get');

Route::add('/medications', function () use ($container, $validator, $userAccess) {
    $request = new Request();
    $controller = new MedicationController($container, $validator, $userAccess);
    $controller->createMedications($request);
}, 'post');

Route::add('/medications/([0-9]*)', function ($id) use ($container, $validator, $userAccess) {
    $request = new Request();
    $controller = new MedicationController($container, $validator, $userAccess);
    $controller->updateMedications((int)$id, $request);
}, 'put');

Route::add('/medications/([0-9]*)', function ($id) use ($container, $validator, $userAccess) {
    $request = new Request();
    $controller = new MedicationController($container, $validator, $userAccess);
    $controller->deleteMedications((int)$id, $request);
}, 'delete');

Route::run('/');
