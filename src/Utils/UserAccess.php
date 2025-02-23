<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Utils;

use Juan\ApoChallenge\Service\UserService;

class UserAccess
{
    public function __construct(private readonly UserService $userService)
    {
        //
    }

    public function isCustomer(int $userId): void
    {
        if (!$this->userService->isCustomer($userId)) {
            JsonResponse::send([], 403);
        }
    }

    public function isPharmacist(int $userId): void
    {
        if (!$this->userService->isPharmasist($userId)) {
            JsonResponse::send([], 403);
        }
    }
}
