<?php

declare(strict_types=1);

namespace src\Entity\Pawn;

interface Pawn extends Name, Position
{
    public function Pawn():Pawn;
}
