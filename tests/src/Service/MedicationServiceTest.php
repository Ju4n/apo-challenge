<?php
namespace Tests\Service;

use Juan\ApoChallenge\Repository\MedicationRepository;
use Juan\ApoChallenge\Service\MedicationService;
use PHPUnit\Framework\TestCase;

class MedicationServiceTest extends TestCase
{
    public function testCreateMedications(): void
    {
        $mockRepo = $this->createMock(MedicationRepository::class);
        $mockRepo->method('createMedications')->willReturn(['id' => 1]);

        $service = new MedicationService($mockRepo);
        $result = $service->createMedications(['name' => 'Aspirin']);

        $this->assertEquals(['id' => 1], $result);
    }
}
