<?php
namespace App\Controllers;
require_once __DIR__ . '/../../core/Controller.php';

class WebhookController extends Controller {
    public function deploy() {
        // Very basic Github webhook deployment logic via plain PHP
        $secret = 'YOUR_GITHUB_WEBHOOK_SECRET';
        
        $signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';
        $payload = file_get_contents('php://input');

        // Verify signature
        if ($signature) {
            $hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);
            if (!hash_equals($hash, $signature)) {
                http_response_code(403);
                die('Invalid signature');
            }
        }

        // Run git pull
        // Make sure the server has permission to run this
        $output = shell_exec('cd ' . __DIR__ . '/../../ && git pull origin main 2>&1');
        
        // Log deployment
        file_put_contents(__DIR__ . '/../../logs/deploy.log', date('Y-m-d H:i:s') . "\n" . $output . "\n\n", FILE_APPEND);
        
        echo "Deployed successfully!";
        exit;
    }
}
