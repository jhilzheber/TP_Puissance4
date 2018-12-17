<?php

declare(strict_types=1);

namespace App;

interface Game
{
    public static function playersFactory(int $numberOfPlayers, $statute, $pseudo, $team): array;
}