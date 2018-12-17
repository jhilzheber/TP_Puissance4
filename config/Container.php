<?php

declare(strict_types=1);

namespace config\Container;

use configContainer\ConnectFourGame;
use configContainer\PseudoRandomValue;

abstract class Container implements ConnectFourGame, PseudoRandomValue
{
    public function ConnectFourGame(): string
    {
    }

    public function PseudoRandomValue(): string
    {

    }

    public function statute(): bool
    {
        // TODO: Implement statute() method.
    }
}

