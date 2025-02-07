<?php

require("functions.php");
require("Response.php");
require("router.php");

$routes = require('routes.php');
routeToController(getPath(), $routes);

?>
