<?php
/**
 * Front Controller / Main Router
 * Production-ready version
 */

session_start();

/* ================================
   LOAD CORE FILES
================================ */

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/helpers/functions.php';

// Middleware (loaded globally for now)
require_once __DIR__ . '/middleware/auth.php';
require_once __DIR__ . '/middleware/admin.php';

/* ================================
   BASE PATH HANDLING
================================ */

// Set this if your project is in a subfolder (IMPORTANT)
$basePath = ''; // e.g. '/my-project' if deployed in subdirectory

$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);

// Remove base path
if ($basePath && strpos($request, $basePath) === 0) {
    $request = substr($request, strlen($basePath));
}

// Normalize request
$request = rtrim($request, '/') ?: '/';

/* ================================
   LOAD ROUTES
================================ */

$publicRoutes = require __DIR__ . '/routes/web.php';
$adminRoutes  = require __DIR__ . '/routes/admin.php';

// Merge routes
$routes = array_merge($publicRoutes, $adminRoutes);

/* ================================
   ROUTE PRIORITY (IMPORTANT FIX)
================================ */

// Ensure static routes match before dynamic ones
uksort($routes, function ($a, $b) {
    return substr_count($a, '{') <=> substr_count($b, '{');
});

/* ================================
   ROUTE MATCHING FUNCTION
================================ */

function matchRoute($request, $routes) {
    foreach ($routes as $route => $handler) {

        // Convert {param} → regex
        $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_-]+)', $route);
        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $request, $matches)) {
            array_shift($matches);
            return ['handler' => $handler, 'params' => $matches];
        }
    }
    return null;
}

/* ================================
   RENDER HELPER (NEW)
================================ */

function render($view, $data = []) {
    extract($data);

    require __DIR__ . '/views/layouts/header.php';
    require __DIR__ . "/views/$view.php";
    require __DIR__ . '/views/layouts/footer.php';
}

/* ================================
   ROUTE HANDLING
================================ */

$match = matchRoute($request, $routes);

if ($match) {

    $handler = $match['handler'];
    $params  = $match['params'];

    /* ================================
       MIDDLEWARE HANDLING
    ================================= */

    if (isset($handler['middleware'])) {
        $middlewares = (array) $handler['middleware'];

        foreach ($middlewares as $mw) {
            if ($mw === 'auth') {
                authMiddleware();
            } elseif ($mw === 'admin') {
                adminMiddleware();
            }
        }
    }

    /* ================================
       CONTROLLER HANDLING
    ================================= */

    if (isset($handler['controller'])) {

        [$controllerName, $method] = explode('@', $handler['controller']);

        // SECURITY: Whitelist controllers
        $allowedControllers = [
            'HomeController',
            'AuthController',
            'AdminController'
        ];

        if (!in_array($controllerName, $allowedControllers)) {
            http_response_code(403);
            require __DIR__ . '/views/errors/403.php';
            exit;
        }

        $controllerFile = __DIR__ . '/controllers/' . $controllerName . '.php';

        if (!file_exists($controllerFile)) {
            http_response_code(500);
            require __DIR__ . '/views/errors/500.php';
            exit;
        }

        require_once $controllerFile;

        $controller = new $controllerName();

        if (!method_exists($controller, $method)) {
            http_response_code(500);
            require __DIR__ . '/views/errors/500.php';
            exit;
        }

        call_user_func_array([$controller, $method], $params);
    }

    /* ================================
       VIEW HANDLING
    ================================= */

    elseif (isset($handler['view'])) {

        $viewPath = $handler['view'];

        if (!file_exists(__DIR__ . "/views/$viewPath.php")) {
            http_response_code(404);
            require __DIR__ . '/views/errors/404.php';
            exit;
        }

        render($viewPath);
    }

    /* ================================
       CLOSURE HANDLING
    ================================= */

    elseif (is_callable($handler)) {
        call_user_func_array($handler, $params);
    }

} else {

    /* ================================
       404 HANDLING
    ================================= */

    http_response_code(404);
    $pageTitle = '404 - Page Not Found';
    require __DIR__ . '/views/errors/404.php';
}