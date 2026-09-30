<?php

return [
    'db_host' => 'localhost',
    'db_name' => 'cafirm_db',
    'db_user' => 'root',
    'db_pass' => '',
    'db_charset' => 'utf8mb4',
    
    'app_env' => 'production', // 'development' or 'production'
    'app_url' => 'http://localhost/ca-firm/public',
    
    // Security
    'session_secure' => false, // Set to true when on HTTPS
    'hash_algo' => PASSWORD_BCRYPT,
    
    // Facebook Sync
    'fb_sync_enabled' => true,
];
