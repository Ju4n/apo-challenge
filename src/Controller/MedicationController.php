<?php

namespace Juan\ApoChallenge\Controller;

use Juan\ApoChallenge\Service\MedicationService;
use Juan\ApoChallenge\Utils\JsonResponse;
use Juan\ApoChallenge\Utils\Request;

class MedicationController extends Controller
{
    public function createMedications(Request $request): void
    {
        // TODO
    }

    public function getMedications(Request $request): void
    {
        $service = $this->getService(MedicationService::class);
        $result = $service->getMedications();

        JsonResponse::send($result);

    }

    public function editMedications(Request $request): void
    {
        $data = $request->getBody();
        $service = $this->getService(MedicationService::class);
        $result = $service->createMedications($data);

        JsonResponse::send($result);

    }

    public function updateMedications(int $id, Request $request): void
    {
        $data = $request->getBody();
        $service = $this->getService(MedicationService::class);
        $result = $service->updateMedications($id, $data);

        JsonResponse::send($result);
    }
}
