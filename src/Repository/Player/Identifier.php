<?php
/**
 * Created by PhpStorm.
 * User: Justine
 * Date: 12/12/2018
 * Time: 10:18
 */

namespace src\Entity\Player;

interface Identifier
{
    public function identifier(): int;
}