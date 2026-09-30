<?php

class Router {
    private $routes = [];

    public function add($method, $route, $controllerStr) {
        // Convert route params like {slug} to regex
        $routeRegex = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<\1>[a-zA-Z0-9_-]+)', $route);
        $routeRegex = "#^" . $routeRegex . "$#";
        
        $this->routes[] = [
            'method' => $method,
            'route' => $routeRegex,
            'controller' => $controllerStr
        ];
    }

    public function dispatch($url, $method) {
        $url = parse_url($url, PHP_URL_PATH);
        // Dynamically determine the base path from the entry script
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        if ($basePath === '/' || $basePath === '\\') {
            $basePath = '';
        }
        if (strpos($url, $basePath) === 0) {
            $url = substr($url, strlen($basePath));
        }
        if (empty($url)) $url = '/';

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['route'], $url, $matches)) {
                list($controllerName, $action) = explode('@', $route['controller']);
                $controllerClass = "App\\Controllers\\" . $controllerName;
                
                // Keep only named parameters from matches
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                require_once __DIR__ . '/../app/Controllers/' . $controllerName . '.php';
                $controller = new $controllerClass();
                call_user_func_array([$controller, $action], $params);
                return;
            }
        }

        // 404 or Dynamic Page
        require_once __DIR__ . '/Database.php';
        $db = \Database::getConnection();
        $slug = trim($url, '/');
        if (empty($slug)) $slug = 'home';
        
        $stmt = $db->prepare("SELECT * FROM pages WHERE slug = ?");
        $stmt->execute([$slug]);
        $page = $stmt->fetch();
        
        if ($page) {
            require_once __DIR__ . '/../app/Controllers/PageController.php';
            $controller = new \App\Controllers\PageController();
            $controller->renderDynamic($page);
            return;
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
