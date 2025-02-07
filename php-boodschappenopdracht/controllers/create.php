<?php
require('Database.php');
require('Validator.php');

$config = require('config.php');
$db = new GroceriesDatabase($config['database']);

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = substr($_POST['productName'], 0, 32);
    $price_string = $_POST['productPrice'];
    $price = floatval($price_string);
    $quantity = intval($_POST['productQuantity']);

    if (!Validator::string($name, 1, 20)) {
        $errors['name'] = 'Requires a name no longer than 20 characters.';
    }
    if (!Validator::decimals($price_string, 0, 2)) {
        $errors['price_decimals'] = 'The price should have no more than two decimals.';
    }
    if ($price < 0.0) {
        $errors['price_negative'] = 'The price should be 0 or above.';
    }
    if (!Validator::integer($quantity, 1)) {
        $errors['quantity'] = 'Quantity must be at least 1.';
    }

    if (empty($errors)) {
        $db->addGroceryItem($name, $price, $quantity);
        header('location: /');
        die();
    }
}

require('views/create.view.php');
?>
