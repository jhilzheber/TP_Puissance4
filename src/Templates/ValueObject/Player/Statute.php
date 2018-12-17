<?php

declare(strict_types=1);

namespace src\Templates;

use src\Entity\Player\statute as PlayerStatute;

final class Statute implements PlayerStatute
{
    private $statute;

    public function __construct(int $statute)
    {
        $this->statute = $statute;
    }

    public function statute(): bool
    {
        return (Boolean) $this->statute;
    }

}