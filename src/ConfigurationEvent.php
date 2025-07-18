<?php

namespace PHPMaker2025\kkndanpkl;

use Symfony\Contracts\EventDispatcher\Event;
use Dflydev\DotAccessData\Data;

/**
 * Configuration Event
 */
class ConfigurationEvent extends Event
{
    public const NAME = "configuration";

    public function __construct(protected Data $config)
    {
    }

    public function getConfig(): Data
    {
        return $this->config;
    }

    public function getSubject(): Data
    {
        return $this->config;
    }

    public function import(array $data, int $mode = Data::REPLACE): void
    {
        $this->config->import($data, $mode);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->config->get($key, $default);
    }

    public function set(string $key, mixed $value = null): void
    {
        $this->config->set($key, $value);
    }
}
