<?php

declare(strict_types=1);

namespace src\Exception;

use src\Templates\Uuid;
use LogicException;
use Throwable;

final class CannotRetrievePlayer extends LogicException
{
    public function __construct(Uuid $identifier, Throwable $previousException)
    {
        parent::__construct(
            sprintf('Cannot retrieve player %s at the moment', $identifier),
            0,
            $previousException
        );
    }
}
