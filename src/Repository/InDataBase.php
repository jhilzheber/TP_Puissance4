<?php

declare(strict_types=1);

namespace src\Repository;

use src\Exception\CannotRetrievePlayer;
use src\Exception\CannotRetrievePlayers;
use src\Templates\Uuid;

final class InDatabase
{
    private $dbConnection;
    private $fields = [
        'p.identifier',
        'p.pseudo',
        'p.statute',
        'p.team',
        'pa.identifier',
        'pa.name',
    ];

    public function __construct(\PDO $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function findAll(): array
    {
        try {
                $this->dbConnection->query(sprintf(
                'SELECT %s FROM %s LEFT JOIN %s ON %s;',
                implode(', ', $this->fields),
                'p.identifier',
                'p.pseudo',
                'p.statute = 1'
            ));
            $result = [];
        } catch (\PDOException $exception) {
            throw new CannotRetrievePlayers($exception);
        }
            return $result;
    }

    public function find(Uuid $identifier): InDatabase
    {
        try {
            $statement = $this->dbConnection->prepare(sprintf(
                'SELECT %s FROM %s LEFT JOIN %s ON %s WHERE %s = :uuid;',
                implode(', ', $this->fields),
                'p.identifier',
                'p.pseudo',
                'p.statute = 1'
            ));
            $statement->execute([
                ':uuid' => $identifier,
            ]);
            $databaseRecord = $statement->fetch(\PDO::FETCH_ASSOC);

            if (!$databaseRecord) {
                throw new CannotRetrievePlayer(
                    $identifier,
                    new \LogicException('No record with this id in db')
                );
            }
        } catch (\PDOException $exception) {
            throw new CannotRetrievePlayer($identifier, $exception);
        }
        return $this;
    }
}