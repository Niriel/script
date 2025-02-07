<?php

require("functions.php");
require("router.php");
require("routes.php");

routeToController(getPath(), $routes);

?>
