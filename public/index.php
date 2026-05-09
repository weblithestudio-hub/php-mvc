<?php


require_once __DIR__ . '/../app/init.php';

require_once __DIR__ . '/../routes/web.php';

$request = trim($_GET['url'] ?? '', '/');

// default route
if ($request === '') {
    $request = 'home';
}

if (array_key_exists($request, $routes)) {

    $route = explode('@', $routes[$request]);

    $controllerName = $route[0];
    $methodName = $route[1];

    $controller = new $controllerName();
    $controller->$methodName();

} else {
    echo "404 - Oldal nem található";
}