<?php

declare(strict_types=1);

namespace src\Service;

final class DatabaseConfig
{
    private $host;
    private $name;
    private $pass;
    private $user;

    public function __construct(array $configArray)
    {
        if (count($configArray) > 4) {
            throw new \LogicException('');
        }
        $this->host = (string) $configArray['db.host'] ?? '';
        $this->name = (string) $configArray['db.name'] ?? '';
        $this->user = (string) $configArray['db.user'] ?? '';
        $this->pass = (string) $configArray['db.pass'] ?? '';
    }

    public function host(): string
    {
        return $this->host;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function pass(): string
    {
        return $this->pass;
    }

    public function user(): string
    {
        return $this->user;
    }
}