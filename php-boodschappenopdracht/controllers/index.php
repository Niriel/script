<?php
require("Database.php");

$config = require('config.php');
$db = new GroceriesDatabase($config['database']);
$groceries = $db->fetchGroceries();

$total_cost = array_reduce($groceries, function($acc, $item) {
    return $acc + $item['price'] * $item['quantity'];
}, 0);

require("views/index.view.php");
?>
