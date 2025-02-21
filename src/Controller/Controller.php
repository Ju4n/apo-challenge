<?php

namespace Juan\ApoChallenge\Controller;

use Juan\ApoChallenge\Utils\Container;

class Controller
{
    public function __construct(
        private readonly Container $container
    ) {

    }

    public function getService(string $name): object
    {
        return $this->container->get($name);
    }
}
