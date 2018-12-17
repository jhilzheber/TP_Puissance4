<?php

declare(strict_types=1);

namespace src\Templates;

use src\Boolean;
use src\Entity\Pawn\Name as RepositoryName;

final class Name
{
    private $Name;

    public function __construct(RepositoryName $Name)
    {
        $this->Name = $Name;
    }

    public function toBoolean($yellow, $red): Boolean
    {
        if ($name = 'red')
        {
            return (Boolean) $this->Name=$red;
        }
        {
           return (Boolean) $this->Name=$yellow;
        }
    }
}