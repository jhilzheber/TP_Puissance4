<?php

declare(strict_types=1);

namespace src\Templates;

use \src\Entity\Player\Pseudo as PlayerPseudo;

final class Pseudo implements PlayerPseudo
{
    private $pseudo;

    public function __construct(int $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function pseudo(): string
    {
        return (string) $this->pseudo;
    }

    public function toString(): string
    {
        return $this->pseudo();
    }
}