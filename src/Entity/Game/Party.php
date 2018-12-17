<?php
/**
 * Created by PhpStorm.
 * User: Justine
 * Date: 12/12/2018
 * Time: 16:35
 */

namespace src\Entity\Game;

use src\Entity\Player\Player;

class Party
{
    private $player;
    private $party;
    private $round;

    public function __construct(player $player)
    {
        $this->player = $player;
    }

    public function party()
    {
        return $this->party;
    }

    public function round()
    {
        return $this->round;
    }
}