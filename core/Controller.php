<?php

namespace App\Controllers;

class Controller {
    protected function render($view, $data = []) {
        require_once __DIR__ . '/Database.php';
        $db = \Database::getConnection();
        $settingsRaw = $db->query("SELECT setting_key, setting_value FROM settings")->fetchAll(\PDO::FETCH_ASSOC);
        $settings = [];
        foreach ($settingsRaw as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        $data['settings'] = $settings;

        extract($data);
        $file = __DIR__ . '/../templates/' . $view . '.php';
        if (file_exists($file)) {
            // Include main layout and pass the inner view as content
            ob_start();
            require $file;
            $content = ob_get_clean();
            require __DIR__ . '/../templates/layout.php';
        } else {
            die("View $view not found.");
        }
    }
    
    protected function json($data, $status = 200) {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }

    protected function sanitize($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
}
