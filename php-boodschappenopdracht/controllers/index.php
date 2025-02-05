<?php
$groceries = [
    ['name' => 'Brood', "price" => 1.00, 'quantity' => 0],
    ['name' => 'Broccoli', "price" => 0.99, 'quantity' => 1],
    ['name' => 'Krentenbollen', "price" => 1.20, 'quantity' => 2],
//    ['name' => 'Noten', "price" => 2.99, 'quantity' => 3],
];
require("database.php");

$db = connectToDb($db_config);
$groceries = fetchGroceries($db);

$total_cost = array_reduce($groceries, function($acc, $item) {
    return $acc + $item['price'] * $item['quantity'];
}, 0);

require("views/index.view.php");
?>
