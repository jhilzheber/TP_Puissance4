<?php

declare(strict_types=1);

namespace src\DependencyInjection\Factory;

use Psr\Container\ContainerInterface;

interface Factory
{
    public function create(ContainerInterface $container);
}