<?php
namespace App;
use PDO;
use Dotenv\Dotenv;

class Database {
    private $pdo;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
        $dsn = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']};charset=utf8mb4";
        $this->pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);
    }

    public function getNews() {
        $stmt = $this->pdo->query("SELECT * FROM news ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
