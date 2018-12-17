<?php

declare(strict_types=1);

namespace src\Action;

use src\Entity\Pawn\Pawn;
use src\Entity\Pawn\Position;
use src\Repository\Position\StatutePosition;
use src\Repository\Move;

class Moving
{
    private $position;
    private $StatutePosition;

    public function __construct(position $position, StatutePosition $StatutePosition)
    {
        $this->position = $position;
        $this->StatutePosition = $StatutePosition;
    }

    public function ResultToMove(Move $move, $position, $positionY): Pawn
    {
        if ($StatutePosition = 'free')
        {
            $move->Origin($position);
            $move->GoTo($position);
        }
        $move->Origin($position);
        $move->GoTo($positionY+1);
    }
}