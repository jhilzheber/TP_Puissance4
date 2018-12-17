<?php

declare(strict_types=1);

namespace src\Service;

use src\Action\GameInterface;
use Support\Entity\Participant;
use Support\Renderer\Output;
use Support\Service\RandomValue;
use Support\Entity\Connect4\Player;

final class ConnectFourGame extends GameInterface
{
    private $output;
    private $participants;
    /**
     * @var RandomValue
     */
    private $randomValueGenerator;

    public function __construct(Output $output, RandomValue $randomValueGenerator, Participant ...$participants)
    {
        $output->writeLine(sprintf('Initialisation du jeu avec %d participants.', count($participants)));
        $this->output = $output;
        array_walk($participants, function (Participant $participant) {
            if (!$participant instanceof Player) {
                throw new \RuntimeException(sprintf(
                    'Les participants doivent être des %s pour pouvoir jouer, au moins un de ceux fourni est un %s',
                    Player::class,
                    get_class($participant)
                ));
            }
        });
        $this->participants = $participants;
        $this->randomValueGenerator = $randomValueGenerator;
    }

    public function run(): Output
    {
        $this->selectFirstPlayer();

        return $this->output;
    }

    private function selectFirstPlayer(): Player
    {
        $this->output->writeLine("Choix aléatoire de l'identifiant du premier participant");
        return new Player();
    }
}