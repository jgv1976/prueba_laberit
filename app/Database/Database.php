<?php

namespace App\Database;

use PDO;
use PDOException;

class Database {
    private static ?PDO $connection = null;

    private function __construct() {}

    public static function getConnection(): PDO {
        if (self::$connection === null) {
            $config = require __DIR__ . '/../../config/config.php';

            try {
                self::$connection = new PDO(
                    "mysql:host={$config['host']};dbname={$config['database']};charset=utf8mb4",
                    $config['username'],
                    $config['password'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $e) {
                die("Database connection error: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
