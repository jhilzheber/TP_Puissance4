<?php

declare(strict_types=1);

namespace src\Exception;

use LogicException;

final class CannotRetrievePlayers extends LogicException
{
    public function __construct(\Throwable $previousException)
    {
        parent::__construct('Cannot retrieve player at the moment', 0, $previousException);
    }
}