<?php

function abort($code) {
    http_response_code($code);
    require("views/$code.view.php");
    die();
}

function routeToController($path, $routes) {
    if (key_exists($path, $routes)) {
        $route = $routes[$path];
        require($route);
    } else {
        abort(Response::NOT_FOUND);
    }
}

?>
