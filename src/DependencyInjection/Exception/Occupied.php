<?php

declare(strict_types=1);

namespace src\Exception;

use LogicException;

final class Occupied extends LogicException
{
    public function __construct()
    {
        parent::__construct('This place is not free');
    }
}