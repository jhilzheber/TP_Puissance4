#!/usr/bin/php
<?php

use App\Application;

if (!is_file(__DIR__.'/vendor/autoload.php')) {
    throw new LogicException('The autoload file does not exist, please use composer install');
}
$jeu = new Application($argv, require __DIR__.'/config/di.global.php');