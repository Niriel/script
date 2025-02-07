<?php
require("Database.php");

$db = new GroceriesDatabase($db_config);
$groceries = $db->fetchGroceries();

$total_cost = array_reduce($groceries, function($acc, $item) {
    return $acc + $item['price'] * $item['quantity'];
}, 0);

require("views/index.view.php");
?>
