<?php

declare(strict_types=1);

namespace src\Repository;

use src\Entity\Player\Player;
use src\Templates\Uuid;

interface Finder
{
    public function find(Uuid $identifier): ?Player;
}