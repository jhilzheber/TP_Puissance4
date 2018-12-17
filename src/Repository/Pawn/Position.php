<?php

declare(strict_types=1);

namespace src\Entity\Pawn;

interface Position extends PositionX, PositionY, intval
{
    public function Position():position;
}