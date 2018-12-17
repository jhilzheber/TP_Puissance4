<?php

declare(strict_types=1);

namespace src\Templates;

use src\Boolean;

final class Team
{
    private $team;

    public function __construct(int $team)
    {
        $this->team = $team;
    }

    public function toBoolean(): Boolean
    {
        return (Boolean) $this->team;
    }
}