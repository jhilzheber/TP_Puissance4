<?php

declare(strict_types=1);

namespace src\Repository;

interface Move
{
    public function Origin($position): int;
    public function GoTo($position): int;

}