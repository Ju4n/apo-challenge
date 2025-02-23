<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Service;

use Juan\ApoChallenge\Repository\UserRepository;

class UserService
{
    const CUSTOMER_ROL = 'customer';
    const PHARMASIST_ROL = 'pharmacist';

    public function __construct(public readonly UserRepository $userRepository)
    {
        //
    }

    public function isCustomer(int $id): bool
    {
        $isCustomer = false;
        $user = $this->userRepository->findOneById($id);

        if ($user['type'] === self::CUSTOMER_ROL) {
            $isCustomer = true;
        }

        return $isCustomer;
    }

    public function isPharmasist(int $id): bool
    {
        $isPharmasist = false;
        $user = $this->userRepository->findOneById($id);

        if ($user['type'] === self::PHARMASIST_ROL) {
            $isPharmasist = true;
        }

        return $isPharmasist;
    }
}
