<?php

declare(strict_types=1);

namespace src\DependencyInjection\Factory\Config;


use src\DependencyInjection\Factory\Factory;
use src\Service\DatabaseConfig;
use LogicException;
use Psr\Container\ContainerInterface;

final class Db implements Factory
{
    private const LOCAL_CONFIG_FILE = 'config/database.local.php';

    public function create(ContainerInterface $container)
    {
        $configArray = require self::GLOBAL_CONFIG_FILE;
        if (is_file(self::LOCAL_CONFIG_FILE)) {
            $localConfig = require self::LOCAL_CONFIG_FILE;
            if (!is_array($localConfig)) {
                throw new LogicException(sprintf(
                    '%s, %s',
                    'A local config file exists but cannot be parsed correctly',
                    'please return a PHP array from that file.'
                ));
            }
            $configArray = array_merge($configArray, $localConfig);
        }

        return new DatabaseConfig($configArray);
    }
}