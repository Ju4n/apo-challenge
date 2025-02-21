<?php

namespace Juan\ApoChallenge\Service;

use Juan\ApoChallenge\Repository\MedicationRepository;
use Juan\ApoChallenge\Repository\Repository;

class MedicationService
{
    public function __construct(public readonly MedicationRepository $medicationRepository)
    {
        //
    }

    public function createMedication(array $data)
    {
        return  $this->medicationRepository->createMedication($data);
    }

    public function getMedications()
    {
        return  $this->medicationRepository->getMedications();
    }
}
