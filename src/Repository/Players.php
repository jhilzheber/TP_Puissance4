<?php

declare(strict_types=1);

namespace src\Repository\Players;

use src\Repository\FindAll;
use src\Repository\Finder;

interface Player extends FindAll, Finder
{
    public function player() : Player;
}