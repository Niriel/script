<?php
require('config.php');

function configToDsn($db_config) {
    $dsn = 'mysql:host='.$db_config['host'].
                ';port='.strval($db_config['port']).
                ';user='.$db_config['user'].
                ';password='.$db_config['password'].
                ';dbname='.$db_config['dbname'].
                ';charset='.$db_config['charset'];
    return $dsn;
}

function connectToDb($db_config) {
    $dsn = configToDsn($db_config);
    $pdo = new PDO($dsn);
    return $pdo;
}

function fetchGroceries($pdo) {
    $statement = $pdo->prepare("SELECT * FROM groceries");
    $statement->execute();
    $groceries = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $groceries;
}
?>

