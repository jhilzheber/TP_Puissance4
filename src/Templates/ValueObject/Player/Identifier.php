<?php

declare(strict_types=1);

namespace src\Templates;

use src\Entity\Player\Identifier;

final class Uuid implements Identifier
{
    private $identifier;

    public function __construct(int $identifier)
    {
        $this->identifier = $identifier;
    }

    public function identifier(): int
    {
        return $this->identifier;
    }
}