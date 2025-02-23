<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Repository;

use ClanCats\Hydrahon\Query\Sql\Table;
use Exception;
use Juan\ApoChallenge\Repository\Exception\RepositoryException;

class MedicationRepository extends Repository
{
    private const TABLE = 'medications';

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getMedications(): array
    {
        try {
            /** @var Table $query */
            $query = $this->database->table(self::TABLE);

            return $query->select()->get() ?? [];
        } catch (Exception $e) {
            throw new RepositoryException($e->getMessage());
        }
    }

    /**
     * @param  array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function createMedications(array $data): array
    {
        try {
            /** @var Table $query */
            $query = $this->database->table(self::TABLE);
            $id = $query->insert($data)->execute();

            /** @var Table $query */
            $query = $this->database->table(self::TABLE);

            return $query->select()
                ->where('id', $id)
                ->limit(1)
                ->get() ?? [];
        } catch (Exception $e) {
            throw new RepositoryException($e->getMessage());
        }
    }

    /**
     * @param  array<string, mixed> $data
     * @return array<string, mixed>
     */
    public function updateMedications(int $id, array $data): array
    {
        try {
            /** @var Table $query */
            $query = $this->database->table(self::TABLE);

            $query->update($data)
                ->where('id', $id)
                ->execute();

            return $query->select()
                ->where('id', $id)
                ->limit(1)
                ->get() ?? [];
        } catch (Exception $e) {
            throw new RepositoryException($e->getMessage());
        }
    }

    /**
     */
    public function deleteMedications(int $id): bool
    {
        try {
            /** @var Table $query */
            $query = $this->database->table(self::TABLE);

            return (bool) $query->delete()->where('id', $id)->execute();
        } catch (Exception $e) {
            throw new RepositoryException($e->getMessage());
        }
    }
}
