<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Repository;

use Exception;
use Juan\ApoChallenge\Repository\Exception\RepositoryException;

class UserRepository extends Repository
{
    const TABLE = 'users';

    /**
     * @return array<string, mixed>
     */
    public function findOneById(int $id): array
    {
        try {
            $query = $this->database->table(self::TABLE);

            return $query->select()
                ->where('id', $id)
                ->limit(1)
                ->get() ?: [];
        } catch (Exception $e) {
            throw new RepositoryException($e->getMessage());
        }
    }
}
