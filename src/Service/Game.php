<?php

declare(strict_types=1);

namespace App\Service;

use App\Checkers\Entity\Participant;
use src\Entity\Player\Player;
use App\Game as GameInterface;
use App\DependencyInjection\Exception\TooManyPlayers;
use RuntimeException;
use Support\Renderer\Output;
use Support\Service\RandomValue;
use src\Entity\Pawn\Color;

final class Game implements GameInterface
{
    private $output;
    private $randomValueGenerator;
    private $participants;
    private $board;

    public function __construct(Output $output, RandomValue $randomValueGenerator, Participant ...$participants)
    {
        $this->validateTooManyParticipants($participants);
        $this->validateEnoughParticipants($participants);
        $this->output = $output;
        $this->randomValueGenerator = $randomValueGenerator;
        $this->participants = $participants;
    }

    /**
     * @return Output
     */
    public function run(): Output
    {
        $this->output->writeLine(sprintf('Initialisation du jeu avec %d participants.', count($this->participants)));
        $this->output->writeLine('Initialisation de la grille en 8 colonnes et 8 lignes.');
        $this->initBoard();
        return $this->output;
    }
    private function validateTooManyParticipants(array $participants): void
    {
        if (count($participants) > 2) {
            throw new TooManyPlayers();
        }
    }
    private function validateEnoughParticipants(array $participants): void
    {
        if (count($participants) < 2) {
            throw new class extends RuntimeException {
                public function __construct()
                {
                    parent::__construct('Il faut plus de joueurs pour ce jeu. Deux joueurs minimum.');
                }
            };
        }
    }
    private function initBoard()
    {
        $this->board = [];
        $this->output->writeLine(str_pad('', 65, '-'));
        for ($row = 7; $row >= 0; --$row) {
            $rowPawns = [];
            for ($column = 7; $column >= 0; --$column) {
                if ($row > 4 && $column % 2 !== $row % 2) {
                    $this->board[$row][$column] = Color::createRed();
                } elseif ($row < 3 && $column % 2 !== $row % 2) {
                    $this->board[$row][$column] = Color::createYellow();
                } else {
                    $this->board[$row][$column] = null;
                }
                $rowPawns[] = ' ' . str_pad((string) $this->board[$row][$column], 6, ' ');
            }
            $this->output->writeLine('|' . implode('|', $rowPawns) . '|');
            $this->output->writeLine(str_pad('', 65, '-'));
        }
    }
    public static function playersFactory(int $numberOfPlayers, $statute, $pseudo, $team): array
    {
        $players = [];

        for ($playerNumber  = 0; $playerNumber < $numberOfPlayers; ++$playerNumber)
        {
            $players[] = new Player($playerNumber+1,$pseudo,$statute,$team);
        }
        return $players;
    }
}