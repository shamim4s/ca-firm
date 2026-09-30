<?php
require_once __DIR__ . '/../core/Database.php';

try {
    $db = Database::getConnection();

    // Table: clients
    $db->exec("CREATE TABLE IF NOT EXISTS clients (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        logo VARCHAR(255),
        hyperlink VARCHAR(255),
        sort_order INT DEFAULT 0,
        status ENUM('active', 'inactive') DEFAULT 'active',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );");

    // Add new columns to members table
    $columns = $db->query("SHOW COLUMNS FROM members")->fetchAll(PDO::FETCH_COLUMN);
    
    if (!in_array('parent_id', $columns)) {
        $db->exec("ALTER TABLE members ADD COLUMN parent_id INT NULL");
        $db->exec("ALTER TABLE members ADD FOREIGN KEY (parent_id) REFERENCES members(id) ON DELETE SET NULL");
    }
    if (!in_array('job_years', $columns)) {
        $db->exec("ALTER TABLE members ADD COLUMN job_years VARCHAR(100) NULL AFTER designation");
    }
    if (!in_array('color_theme', $columns)) {
        // e.g. pink, blue, red
        $db->exec("ALTER TABLE members ADD COLUMN color_theme VARCHAR(50) DEFAULT 'blue' AFTER profile_image"); 
    }

    echo "Migration completed successfully.";
} catch (Exception $e) {
    echo "Migration failed: " . $e->getMessage();
}
