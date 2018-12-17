<?php
/**
 * Created by PhpStorm.
 * User: Justine
 * Date: 14/12/2018
 * Time: 11:38
 */

namespace src\Repository;

use App\Game;
use src\Entity\Player\Player;

interface FindAll extends Game
{
    public function findAll() : player;

}