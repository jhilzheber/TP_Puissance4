<?php

declare(strict_types=1);

namespace src\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GuzzleHttp\Psr7\Response;
use src\Repository\Players\Player;

abstract class GameInterface
{
    private $repository;

    public function __construct(Player $repository)
    {
        $this->repository = $repository;
    }

    public function handle(ServerRequestInterface $request, $identifier): ResponseInterface
    {
        ob_start();
        $pseudo = $request->getQueryParams()['pseudo'] ?? null;
        $player = $this->repository->find($identifier);
        require __DIR__.'/../Templates/Ring.php';
        $content = ob_get_clean();

        return (new Response($content($pseudo,$player)));
    }

    public static function playersFactory(int $numberOfPlayers, $statute, $pseudo, $team): array
    {
        // TODO: Implement playersFactory() method.
    }
}