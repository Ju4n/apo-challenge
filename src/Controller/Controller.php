<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Controller;

use Juan\ApoChallenge\Utils\Container;
use Juan\ApoChallenge\Utils\UserAccess;
use Juan\ApoChallenge\Utils\Validator\Validator;

class Controller
{
    public function __construct(
        private readonly Container $container,
        private readonly Validator $validator,
        private readonly UserAccess $access
    ) {

    }

    public function getService(string $name): object
    {
        return $this->container->get($name);
    }

    public function getValidator(): Validator
    {
        return $this->validator;
    }

    public function getAccess(): UserAccess
    {
        return $this->access;
    }
}
