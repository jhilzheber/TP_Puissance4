<?php

declare(strict_types=1);

use App\DependencyInjection\Factory\Game;
use src\DependencyInjection\Factory\Config;
use src\Repository\InDatabase;
use Support\Factory;
use Support\Renderer;
use Support\Service;
use App\Service\Game as Checkers;
use src\Service\ConnectFourGame as Connect4;
use Support\Service\PseudoRandomValue;
use Support\Service\RandomValue;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'db.host' => Config\Db\Host::class,
    'db.user' => Config\Db\User::class,
    'db.pass' => Config\Db\Pass::class,
    'db.name' => Config\Db\Name::class,
    'db.config' => Config\Db::class,
    InDatabase::class =>  src\Repository\InDatabase::class,
    PDO::class => Pdo::class,

    'games' => [
        'connect4' => Service\ConnectFourGame::class,
        'checkers' => Checkers::class,
    ],
    'service_manager' => [
        'factories' => [
            Renderer\Output::class => Factory\Renderer\Output::class,
            Service\ConnectFourGame::class => Factory\Service\ConnectFourGame::class,
            Connect4::class => Factory\Service\ConnectFourGame::class,
            Checkers::class => Game::class,
            // InvokableFactory can be used when the service does not need any constructor argument
            Service\PseudoRandomValue::class => InvokableFactory::class,
            PseudoRandomValue::class => InvokableFactory::class,
        ],
        'aliases' => [
            Service\RandomValue::class => Service\PseudoRandomValue::class,
            RandomValue::class => PseudoRandomValue::class,

        ],
    ]
];