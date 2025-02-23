<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Database;

use ClanCats\Hydrahon\Builder;
use ClanCats\Hydrahon\Query\Sql\FetchableInterface;
use ClanCats\Hydrahon\Query\Sql\Insert;
use Exception;
use Juan\ApoChallenge\Database\Exception\DatabaseConnectionException;
use Juan\ApoChallenge\Database\Interface\BuilderInterface;
use PDO;

class MysqlBuilder implements BuilderInterface
{
    public function __construct(
        protected string $host,
        protected string $username,
        protected string $password,
        protected string $database
    ) {
        //
    }

    public function getBuilder(): Builder
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $connection =  new PDO($dsn, $this->username, $this->password, $options);
            $builder = new Builder('mysql', function ($query, $queryString, $queryParameters) use ($connection) {
                $statement = $connection->prepare($queryString);
                $statement->execute($queryParameters);

                if ($query instanceof FetchableInterface) {
                    return $statement->fetchAll(PDO::FETCH_ASSOC);
                } elseif ($query instanceof Insert) {
                    return $connection->lastInsertId();
                } else {
                    return $statement->rowCount();
                }
            });
        } catch (Exception $e) {
            throw new DatabaseConnectionException($e->getMessage());
        }

        return $builder;
    }
}
