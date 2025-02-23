<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Service;

use Juan\ApoChallenge\Repository\MedicationRepository;

class MedicationService
{
    public function __construct(public readonly MedicationRepository $medicationRepository)
    {
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getMedications(): array
    {
        return  $this->medicationRepository->getMedications();
    }

    /**
     * @param  array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function createMedications(array $data): array
    {
        return  $this->medicationRepository->createMedications($data);
    }

    /**
     * @param  array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function updateMedications(int $id, array $data): array
    {
        return  $this->medicationRepository->updateMedications($id, $data);
    }

    public function deleteMedications(int $id): bool
    {
        return  $this->medicationRepository->deleteMedications($id);
    }
}
