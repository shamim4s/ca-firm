<?php
session_start();

// Global Exception Handler
set_exception_handler(function ($e) {
    http_response_code(500);
    $isDatabaseError = $e instanceof PDOException;
    
    // Log the actual error to the server's error log (not exposing raw file paths to the user)
    error_log("Exception: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());

    // Show a user-friendly error message
    echo "<!DOCTYPE html><html><head><title>System Error</title>";
    echo "<style>body { font-family: system-ui, sans-serif; background: #f8fafc; color: #0f172a; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; } .error-card { background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); max-width: 500px; text-align: center; } h1 { color: #dc2626; margin-top: 0; }</style>";
    echo "</head><body><div class='error-card'>";
    
    if ($isDatabaseError) {
        echo "<h1>Database Connection Failed</h1>";
        echo "<p>We're experiencing technical difficulties connecting to our database. Please try again later.</p>";
    } else {
        echo "<h1>Internal Server Error</h1>";
        echo "<p>Something went wrong. Our team has been notified.</p>";
    }
    
    echo "</div></body></html>";
    exit;
});

// Autoloader to resolve namespaces like App\Core\Database
spl_autoload_register(function ($class) {
    if ($class === 'App\\Core\\Database') {
        require_once __DIR__ . '/../core/Database.php';
        if (!class_exists('App\\Core\\Database', false)) {
            class_alias('Database', 'App\\Core\\Database');
        }
        return;
    }
    
    $prefix = 'App\\Controllers\\';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) === 0) {
        $relative_class = substr($class, $len);
        $file = __DIR__ . '/../app/Controllers/' . str_replace('\\', '/', $relative_class) . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

// Security Headers
header("X-Frame-Options: SAMEORIGIN");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
header("Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.tailwindcss.com https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com; img-src * data: blob: 'unsafe-inline' https://images.unsplash.com https://images.pexels.com https://png.pngtree.com https://upload.wikimedia.org; font-src * data: blob: 'unsafe-inline';");

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Controller.php';

$config = require __DIR__ . '/../config/database.php';
define('SITE_URL', $config['app_url']);

$router = new Router();

// Public Routes
$router->add('GET', '/', 'HomeController@index');
$router->add('GET', '/newhome', 'HomeController@newhome');
$router->add('GET', '/about', 'PageController@about');
$router->add('GET', '/services', 'PageController@services');
$router->add('GET', '/services/{slug}', 'PageController@serviceDetail');
$router->add('GET', '/team', 'PageController@team');
$router->add('GET', '/members', 'PageController@members');
$router->add('GET', '/members/{id}', 'PageController@memberDetail');
$router->add('GET', '/blog', 'BlogController@index');
$router->add('GET', '/blog/{slug}', 'BlogController@show');
$router->add('GET', '/contact', 'PageController@contact');
$router->add('POST', '/contact/submit', 'PageController@submitContact');
$router->add('GET', '/clients', 'PageController@clients');
$router->add('GET', '/api/reviews', 'PageController@apiReviews');
$router->add('GET', '/terms', 'PageController@terms');
$router->add('GET', '/privacy', 'PageController@privacy');
$router->add('GET', '/sitemap', 'PageController@sitemap');

// Admin Routes
$router->add('GET', '/admin/login', 'AdminController@login');
$router->add('POST', '/admin/login', 'AdminController@login');
$router->add('GET', '/admin/dashboard', 'AdminController@dashboard');
$router->add('GET', '/admin/pages', 'AdminController@pages');
$router->add('POST', '/admin/pages/save', 'AdminController@savePage');
$router->add('GET', '/admin/pages/api', 'AdminController@apiGetPage');
$router->add('GET', '/admin/menu', 'AdminController@menu');
$router->add('POST', '/admin/menu', 'AdminController@saveMenu');
$router->add('GET', '/admin/members', 'AdminController@members');
$router->add('POST', '/admin/members', 'AdminController@saveMember');
$router->add('GET', '/admin/members/delete/{id}', 'AdminController@deleteMember');
$router->add('GET', '/admin/clients', 'AdminController@clients');
$router->add('POST', '/admin/clients', 'AdminController@saveClient');
$router->add('GET', '/admin/clients/delete/{id}', 'AdminController@deleteClient');
$router->add('GET', '/admin/services', 'AdminController@services');
$router->add('GET', '/admin/blog', 'AdminController@blog');
$router->add('GET', '/admin/contacts', 'AdminController@contacts');
$router->add('GET', '/admin/settings', 'AdminController@settings');
$router->add('POST', '/admin/settings', 'AdminController@settings');
$router->add('GET', '/admin/logout', 'AdminController@logout');

// Github Webhook Trigger
$router->add('POST', '/webhook/deploy', 'WebhookController@deploy');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$router->dispatch($uri, $method);
