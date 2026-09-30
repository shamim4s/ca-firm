<?php

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $config = require __DIR__ . '/../config/database.php';
        
        $dsn = "mysql:host=" . $config['db_host'] . ";dbname=" . $config['db_name'] . ";charset=" . $config['db_charset'];
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $config['db_user'], $config['db_pass'], $options);
        } catch (\PDOException $e) {
            // For production, log error instead of throwing to avoid leaking credentials
            if ($config['app_env'] === 'development') {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            } else {
                die("Database connection failed.");
            }
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getConnection() {
        $db = self::getInstance()->pdo;
        self::autoMigrate($db);
        return $db;
    }

    private static $migrated = false;
    private static function autoMigrate($db) {
        if (self::$migrated) return;
        self::$migrated = true;
        try {
            $db->exec("CREATE TABLE IF NOT EXISTS clients (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                logo VARCHAR(255),
                hyperlink VARCHAR(255),
                sort_order INT DEFAULT 0,
                status ENUM('active', 'inactive') DEFAULT 'active',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );");

            $db->exec("CREATE TABLE IF NOT EXISTS pages (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                slug VARCHAR(255) NOT NULL UNIQUE,
                content LONGTEXT NULL,
                blocks_json LONGTEXT NULL,
                status ENUM('published', 'draft') DEFAULT 'published',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );");

            $db->exec("CREATE TABLE IF NOT EXISTS settings (
                id INT AUTO_INCREMENT PRIMARY KEY,
                setting_key VARCHAR(100) NOT NULL UNIQUE,
                setting_value TEXT,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );");

            $db->exec("CREATE TABLE IF NOT EXISTS members (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                designation VARCHAR(255) NULL,
                job_years VARCHAR(100) NULL,
                profile_image VARCHAR(255) NULL,
                color_theme VARCHAR(50) DEFAULT 'blue',
                linkedin_url VARCHAR(255) NULL,
                sort_order INT DEFAULT 0,
                status ENUM('active', 'inactive') DEFAULT 'active',
                parent_id INT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");

            try {
                $columns = $db->query("SHOW COLUMNS FROM members")->fetchAll(PDO::FETCH_COLUMN);
                
                if (!in_array('parent_id', $columns)) {
                    $db->exec("ALTER TABLE members ADD COLUMN parent_id INT NULL");
                }
                if (!in_array('job_years', $columns)) {
                    $db->exec("ALTER TABLE members ADD COLUMN job_years VARCHAR(100) NULL AFTER designation");
                }
                if (!in_array('color_theme', $columns)) {
                    $db->exec("ALTER TABLE members ADD COLUMN color_theme VARCHAR(50) DEFAULT 'blue' AFTER profile_image");
                }
                if (!in_array('linkedin_url', $columns)) {
                    $db->exec("ALTER TABLE members ADD COLUMN linkedin_url VARCHAR(255) NULL AFTER color_theme");
                }
            } catch (\Exception $e) {}
        } catch (\Exception $e) {
            // Log global migrate errors
        }
    }
}
