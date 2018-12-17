<?php

declare(strict_types=1);

namespace src\Entity\Pawn;

class Color implements Name
{
    //private $color;
    private const RED = 'red';
    private const YELLOW = 'yellow';

    /*public function __construct($color, $name)
    {
        $this->color = $color;
        if ($color='red') {
            return $name->color = 'red';
        }
            return $name->color = 'yellow';
    }*/

    public static function createRed(): Color
    {
        return new self(self::RED);
    }
    public static function createYellow(): Color
    {
        return new self(self::YELLOW);
    }

    public function name(): string
    {
        // TODO: Implement name() method.
    }
}