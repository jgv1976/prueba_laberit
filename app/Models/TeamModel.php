<?php

namespace App\Models;

use App\Database\Database;
use PDO;
use Exception;

class TeamModel {
    private int $id;
    private string $name;
    private ?string $city;
    private string $sport;
    private string $foundedDate;
    private ?string $history;

    public function __construct(string $name, string $sport, string $foundedDate, ?string $city = null, ?string $history = null) {
        $this->name = $name;
        $this->sport = $sport;
        $this->foundedDate = $foundedDate;
        $this->city = $city;
        $this->history = $history;
    }

    public function save(): bool {
        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO teams (name, city, sport, founded_date, history) VALUES (:name, :city, :sport, :founded_date, :history)");
            return $stmt->execute([
                ':name' => $this->name,
                ':city' => $this->city,
                ':sport' => $this->sport,
                ':founded_date' => $this->foundedDate,
                ':history' => $this->history
            ]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public static function getAll(): array {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM teams ORDER BY name");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById(int $id): ?array {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM teams WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $team = $stmt->fetch(PDO::FETCH_ASSOC);
        return $team ?: null;
    }
}

