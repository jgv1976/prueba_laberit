<?php

namespace App\Models;

use App\Database\Database;
use PDO;

class PlayerModel {

    private int $id;
    private string $name;
    private int $number;
    private int $teamId;
    private bool $isCaptain;

    public function __construct(string $name, int $number, int $teamId, bool $isCaptain = false) {
        $this->name = $name;
        $this->number = $number;
        $this->teamId = $teamId;
        $this->isCaptain = $isCaptain;
    }

    public function save(): bool {
        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO players (name, number, team_id, is_captain) VALUES (:name, :number, :team_id, :is_captain)");
            return $stmt->execute([
                ':name' => $this->name,
                ':number' => $this->number,
                ':team_id' => $this->teamId,
                ':is_captain' => $this->isCaptain ? 1 : 0
            ]);
        } catch (\PDOException $e) {
            error_log("Error al guardar jugador: " . $e->getMessage());
            return false;
        }
    }

    public static function getByTeamId(int $teamId): array {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM players WHERE team_id = :team_id");
        $stmt->execute([':team_id' => $teamId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete(int $id): bool {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM players WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public static function update(int $id, string $name, int $number, bool $isCaptain): bool {
        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("UPDATE players SET name = :name, number = :number, is_captain = :is_captain WHERE id = :id");
            return $stmt->execute([
                ':id' => $id,
                ':name' => $name,
                ':number' => $number,
                ':is_captain' => $isCaptain ? 1 : 0
            ]);
        } catch (\PDOException $e) {
            error_log("Error al actualizar jugador: " . $e->getMessage());
            return false;
        }
    }

}
