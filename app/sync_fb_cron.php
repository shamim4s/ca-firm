<?php
/**
 * Facebook Auto Blog Importer (Background Cron Job)
 * Run via CLI: php /path/to/sync_fb_cron.php
 * Or securely via trigger URL.
 */
require_once __DIR__ . '/../core/Database.php';

$db = Database::getConnection();

echo "Starting Facebook Pages Sync...\n";

try {
    $sources = $db->query("SELECT * FROM facebook_sources WHERE is_active = 1")->fetchAll();
    
    foreach ($sources as $source) {
        $lastSync = strtotime($source['last_sync'] ?? '1970-01-01');
        $interval = $source['sync_interval_minutes'] * 60;
        
        if (time() - $lastSync >= $interval) {
            echo "[SYNCING] Source ID: {$source['id']} - URL: {$source['page_url']}\n";
            
            // Simulating API Fetch using Graph API
            // $apiUrl = "https://graph.facebook.com/v17.0/{$source['page_id']}/posts?fields=id,message,created_time,full_picture&access_token={$source['access_token']}";
            // $response = file_get_contents($apiUrl);
            // $posts = json_decode($response, true)['data'] ?? [];
            
            // Simulating insertion logic
            $mockPostsCount = rand(0, 3);
            for ($i=0; $i<$mockPostsCount; $i++) {
                $postTitle = "Facebook Update " . date('Y-m-d H:i:s');
                $postSlug = strtolower(str_replace(' ', '-', $postTitle)) . '-' . uniqid();
                
                $stmt = $db->prepare("INSERT INTO blogs (title, slug, content, source_url, published_at) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)");
                $stmt->execute([
                    $postTitle,
                    $postSlug,
                    "This is an automatically imported post from Facebook Page: " . $source['page_url'],
                    "https://facebook.com/{$source['page_id']}/posts/12345"
                ]);
            }
            
            $db->prepare("UPDATE facebook_sources SET last_sync = CURRENT_TIMESTAMP WHERE id = ?")->execute([$source['id']]);
            echo "   -> Created $mockPostsCount new posts.\n";
            
        } else {
            echo "[SKIPPED] Source ID: {$source['id']} (recently synced. Interval is {$source['sync_interval_minutes']} mins)\n";
        }
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}

echo "Sync job finished.\n";
