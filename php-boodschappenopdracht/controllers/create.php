<?php
require('Database.php');

$config = require('config.php');
$db = new GroceriesDatabase($config['database']);

function post($db) {
    $s_name = $_POST['productName'];
    $s_price = $_POST['productPrice'];
    $s_quantity = $_POST['productQuantity'];

    $name = substr($s_name, 0, 32);
    $price = floatval($s_price);
    $quantity = intval($s_quantity);

    $nameOk = strlen($name) > 0;
    $priceOk = $price >= 0.0;
    $quantityOk = $quantity >= 0;

    if ($nameOk and $priceOk and $quantityOk) {
        $db->addGroceryItem($name, $price, $quantity);
        return true;
    }
    return false;
}

$posted = false;
$post_ok = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $posted = true;
    $post_ok = post($db);
    if ($post_ok) {
        header('location: /');
        die();
    }
}

require('views/create.view.php');
?>
