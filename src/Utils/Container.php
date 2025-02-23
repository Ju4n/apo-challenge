<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Utils;

use Exception;

class Container
{
    /**
     * @param array<string, callable> $services
     * @param array<string, object>   $instances
     */
    public function __construct(protected array $services = [], protected array $instances = [])
    {
        //
    }

    public function get(string $serviceName): object
    {
        if (!isset($this->services[$serviceName])) {
            throw new Exception('Service not registered');
        }

        if (!isset($this->instances[$serviceName])) {
            $this->instances[$serviceName] = ($this->services[$serviceName])();
        }

        return $this->instances[$serviceName];
    }

    public function set(string $serviceName, callable $service): void
    {
        $this->services[$serviceName] = $service;
    }
}
