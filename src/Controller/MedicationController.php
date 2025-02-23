<?php

declare(strict_types=1);

namespace Juan\ApoChallenge\Controller;

use Juan\ApoChallenge\Service\MedicationService;
use Juan\ApoChallenge\Service\UserService;
use Juan\ApoChallenge\Utils\JsonResponse;
use Juan\ApoChallenge\Utils\Request;
use Juan\ApoChallenge\Utils\Validator\Type\Types;

class MedicationController extends Controller
{
    protected MedicationService $medicationService;

    protected UserService $userService;

    const USER_ID = 'User-ID';

    public function getMedications(Request $request): void
    {
        $userId = (int) $request->getHeader(self::USER_ID);
        // allows only pharmacists
        $this->getAccess()->isPharmacist($userId);

        $result = $this->getService(MedicationService::class)->getMedications();

        JsonResponse::send($result, 200);
    }

    public function createMedications(Request $request): void
    {
        $userId = (int) $request->getHeader(self::USER_ID);
        // allows only customers
        $this->getAccess()->isCustomer($userId);

        $data = $request->getBody();
        $validator = $this->getValidator();
        $isValid = $validator->validate(
            $data,
            [
                'name' => ['type' => Types::STRING, 'required' => true],
                'started_at' => ['type' => Types::STRING, 'required' => true],
                'dosage' => ['type' => Types::NUMBER, 'required' => true],
                'note' => ['type' => Types::STRING, 'required' => false],
            ]
        );

        if (!$isValid) {
            JsonResponse::send($validator->getErrors(), 400);
        }

        $result = $this->getService(MedicationService::class)->createMedications($data);

        JsonResponse::send($result, 201);
    }

    public function updateMedications(int $id, Request $request): void
    {
        $userId = (int) $request->getHeader(self::USER_ID);
        // allows only customers
        $this->getAccess()->isCustomer($userId);

        $data = $request->getBody();
        $validator = $this->getValidator();
        $isValid = $validator->validate(
            $data,
            [
                'name' => ['type' => Types::STRING, 'required' => false],
                'started_at' => ['type' => Types::STRING, 'required' => false],
                'dosage' => ['type' => Types::NUMBER, 'required' => false],
                'note' => ['type' => Types::STRING, 'required' => false],
            ]
        );

        if (!$isValid) {
            JsonResponse::send($validator->getErrors(), 400);
        }

        $result = $this->getService(MedicationService::class)->updateMedications($id, $data);

        JsonResponse::send($result);
    }

    public function deleteMedications(int $id, Request $request): void
    {
        $userId = (int) $request->getHeader(self::USER_ID);
        // allows only customers
        $this->getAccess()->isCustomer($userId);

        $isDeleted = $this->getService(MedicationService::class)->deleteMedications($id);

        if (!$isDeleted) {
            JsonResponse::send('Couldnt delete medication id: ' . $id);
        }

        JsonResponse::send('medication id ' . $id . ' deleted');
    }
}
