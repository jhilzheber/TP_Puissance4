<?php

declare(strict_types=1);


namespace src\DependencyInjection\Factory\Config\Db;

use src\DependencyInjection\Factory\Factory;
use Psr\Container\ContainerInterface;

final class Pass implements Factory
{
    public function create(ContainerInterface $container): string
    {
        return $container->get('db.config')->pass();
    }
}