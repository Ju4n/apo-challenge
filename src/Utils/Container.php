<?php

namespace Juan\ApoChallenge\Utils;

use Exception;

class Container
{
    public function __construct(protected array $services = [], protected array $instances = [])
    {
       //
    }

    public function get(string $serviceName)
    {
        if (!isset($this->services[$serviceName])) {
            throw new Exception('Service not registered');
        }

        if (!isset($this->instances[$serviceName])) {
            $this->instances[$serviceName] = $this->services[$serviceName]();
        }

        return $this->instances[$serviceName];
    }

    public function set(string $serviceName, callable $service)
    {
        $this->services[$serviceName] = $service;
    }
}
