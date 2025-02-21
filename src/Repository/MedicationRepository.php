<?php
namespace Juan\ApoChallenge\Repository;

class MedicationRepository extends Repository
{

    public function createMedication(array $data): int
    {
        $sql = 'INSERT INTO medications (name, started_at, dosage, note) VALUES (?, ?, ?, ?)';
        $result = $this->database->query($sql, $data);

        return $result;
    }

    public function updateMedications(int $id, array $data): array
    {
        $data['id'] = $id;
        $sql = 'UPDATE medications SET name = ?, started_at = ?, dosage = ?, note = ? WHERE id = ?';
        $result = $this->database->query($sql, $data);

        return $result;
    }

    public function getMedications(): array
    {
        $sql = 'SELECT name, started_at, dosage, note FROM medications';
        $result = $this->database->query($sql);

        return $result;
    }
}
