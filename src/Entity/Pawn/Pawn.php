<?php

declare(strict_types=1);

namespace App\Entity\Pawn;

use src\Entity\Pawn\Name;
use src\Entity\Pawn\Position;

abstract class Pawn
{
    private $position;
    private $name;

    public function __construct(position $position, name $name)
    {
        $this->position = $position;
        $this->name = $name;
    }
}