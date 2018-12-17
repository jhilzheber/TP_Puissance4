<?php

declare(strict_types=1);


namespace src\DependencyInjection\Factory\Config\Db;

use Psr\Container\ContainerInterface;
use src\DependencyInjection\Factory\Factory;

final class Name implements Factory
{
    public function create(ContainerInterface $container): string
    {
        return $container->get('db.config')->name();
    }
}