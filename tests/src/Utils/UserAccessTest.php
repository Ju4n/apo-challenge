<?php

declare(strict_types=1);

namespace Tests\Utils;

use Juan\ApoChallenge\Repository\UserRepository;
use Juan\ApoChallenge\Service\UserService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class UserAccessTest extends TestCase
{
    /** @phpstan-ignore missingType.property  */
    private $userRepository;
    private UserService $userService;

    protected function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->userService = new UserService($this->userRepository);
    }

    public function testIsCustomerReturnsTrue(): void
    {
        $userId = 1;
        $this->userRepository->method('findOneById')
            ->willReturn(['type' => UserService::CUSTOMER_ROL]);

        $this->assertTrue($this->userService->isCustomer($userId));
    }

    public function testIsCustomerReturnsFalse(): void
    {
        $userId = 2;
        $this->userRepository
            ->method('findOneById')
            ->willReturn(['type' => UserService::PHARMASIST_ROL]);

        $this->assertFalse($this->userService->isCustomer($userId));
    }

    public function testIsPharmacistReturnsTrue(): void
    {
        $userId = 3;
        $this->userRepository
            ->method('findOneById')
            ->willReturn(['type' => UserService::PHARMASIST_ROL]);

        $this->assertTrue($this->userService->isPharmasist($userId));
    }

    public function testIsPharmacistReturnsFalse(): void
    {
        $userId = 4;
        $this->userRepository
            ->method('findOneById')
            ->willReturn(['type' => UserService::CUSTOMER_ROL]);

        $this->assertFalse($this->userService->isPharmasist($userId));
    }
}
