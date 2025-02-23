<?php

namespace Tests\Controller;

use Juan\ApoChallenge\Controller\MedicationController;
use Juan\ApoChallenge\Service\MedicationService;
use Juan\ApoChallenge\Utils\Container;
use Juan\ApoChallenge\Utils\Request;
use Juan\ApoChallenge\Utils\UserAccess;
use Juan\ApoChallenge\Utils\Validator\Validator;
use PHPUnit\Framework\TestCase;

class MedicationControllerTest extends TestCase
{
    public function testGetMedications(): void
    {
        $this->markTestSkipped();

        $values = [
            'id' => 21,
            'name' => 'Paracetamol',
            'started_at' => '2024-02-21',
            'dosage' => 33,
            'note' => 'Take after meals'
        ];
        $mockContainer = $this->createMock(Container::class);
        $mockValidator = $this->createMock(Validator::class);
        $mockService = $this->createMock(MedicationService::class);
        $mockUserAccess = $this->createMock(UserAccess::class);
        $mockContainer->method('get')->willReturn($mockService);
        $mockService->method('getMedications')->willReturn($values);

        ob_start();
        $controller = new MedicationController($mockContainer, $mockValidator, $mockUserAccess);
        $controller->getMedications(new Request());
        $output = ob_get_clean();


        $this->assertJson($output);
        $this->assertStringContainsString(json_encode($values, JSON_PRETTY_PRINT), $output);
    }
}
