<?php

declare(strict_types=1);

namespace src\Persistence;

use PDO;

class DbConnection extends PDO
{
    private const MYSQL_ATTR_CHARSET_UTF8 = 'SET NAMES utf8';

    public function __construct(string $host, string $username, string $password, string $database)
    {
        parent::__construct("mysql:host={$host};dbname={$database}", $username, $password, [
            PDO::MYSQL_ATTR_INIT_COMMAND => self::MYSQL_ATTR_CHARSET_UTF8,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT => "1",
        ]);
    }
}