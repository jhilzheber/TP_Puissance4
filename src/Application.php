<?php

declare(strict_types=1);

namespace App;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Support\Exception\GameDoesNotExist;
use App\Service\Game;
use Zend\ServiceManager\ServiceManager;

final class Application
{
    private $games = [];
    private $selectedGame;
    private $container;

    public function __construct(array $argv, array $config)
    {
        $this->games = $this->initGames($config);
        $this->container = $this->initContainer($config);
        if (count($argv) < 2) {
            throw new \RuntimeException('Please select a game ('.implode(', ', array_keys($this->games)));
        }
        if (!isset($this->games[$argv[1]])) {
            throw new GameDoesNotExist($argv[1], $this->games);
        }
        $participants = [];
        if (isset(class_implements($this->games[$argv[1]])[Game::class]) && isset($argv[2]) && (int) $argv[2] > 0) {
            $participants = call_user_func([$this->games[$argv[1]], 'playersFactory'], (int) $argv[2]);
        }
        $this->container->setService('participants', $participants);
        $this->selectedGame = $this->container->get($this->games[$argv[1]] ?? array_values($this->games)[0]);
    }
    public function run(): string
    {
        return $this->selectedGame->run()->getAndFlush();
    }
    private function initGames(array $config): array
    {
        if (!isset($config['games']) || !is_array($config['games']) || !count($config['games']) > 0) {
            return [];
        }
        return $config['games'];
    }
    private function initContainer(array $config): ServiceManager
    {
        $container = new ServiceManager($config['service_manager'] ?? []);
        return $container;
    }

    public function has($gameName)
    {
        return isset($this->games[$gameName]);
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id)
    {
        // TODO: Implement get() method.
    }
}
