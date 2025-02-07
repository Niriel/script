<?php

require("functions.php");
require("Response.php");
require("router.php");
require("routes.php");

routeToController(getPath(), $routes);

?>
