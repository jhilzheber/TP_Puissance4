<?php

declare(strict_types=1);

namespace src\Repository\Position;

final class StatutePosition
{
    private $StatutePosition;

    public function StatutePosition(StatutePosition $StatutePosition)
    {
        if ($StatutePosition == 0) {
            return $this->StatutePosition = "free";
        }
        return $this->StatutePosition = "occupied";
    }
}