<?php
require_once __DIR__ . '/../includes/bootstrap.php'; // Loads Dotenv and autoload

class Database {
    public static function connect(): PDO {
        try {
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=utf8mb4',
                $_ENV['DB_HOST'],
                $_ENV['DB_DATABASE']
            );

            return new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            // Environment-aware error handling
            if ($_ENV['APP_ENV'] === 'local') {
                die("Database connection failed: " . $e->getMessage());
            } else {
                error_log("Database connection error: " . $e->getMessage());
                die("Database connection failed. Please contact the administrator.");
            }
        }
    }
}

// Create a PDO instance for use in controllers
$pdo = Database::connect();
?>