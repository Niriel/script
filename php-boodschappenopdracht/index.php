<?php
    require("functions.php");

    function getRoute($path) {
        $routes = [
            '/' => 'controllers/index.php',
            '/create' => 'controllers/create.php',
        ];
        $default_route = $routes['/'];
        if (in_array($path, $routes, true)) {
            return routes[$path];
        } else {
            return $default_route;
        }
    }

    $route = getRoute(getPath());
    require($route);
?>
