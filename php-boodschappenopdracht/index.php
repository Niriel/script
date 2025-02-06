<?php

require("functions.php");
require("router.php");

$routes = [
    '/' => 'controllers/index.php',
    '/create' => 'controllers/create.php',
];
routeToController(getPath(), $routes);

?>
