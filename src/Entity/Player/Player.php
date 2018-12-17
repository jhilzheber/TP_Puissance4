<?php

namespace src\Entity\Player;

use src\Templates\Statute;
use src\Templates\Pseudo;
use src\Templates\Team;
use src\Templates\Uuid;
use Support\Entity\Participant as ParticipantAlias;

final class Player implements ParticipantAlias
{
    private $identifier;
    private $pseudo;
    private $statute;
    private $team;

    public function __construct(Uuid $identifier, Pseudo $pseudo, statute $statute, team $team)
    {
        $this->identifier = $identifier;
        $this->pseudo = $pseudo;
        $this->statute = $statute;
        $this->team = $team;
    }

    public function identifier(): Uuid
    {
        return $this->identifier;
    }

    public function pseudo(): string
    {
        return $this->pseudo->toString();
    }

    public function statute(): Statute
    {
        return $this->statute;
    }
}