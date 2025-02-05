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

function _connectToDb($db_config) {
    $dsn = configToDsn($db_config);
    $pdo = new PDO($dsn);
    return $pdo;
}

function _fetchGroceries($pdo) {
    $statement = $pdo->prepare("SELECT * FROM groceries");
    $statement->execute();
    $groceries = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $groceries;
}

class GroceriesDatabase {
    public $connection;

    public function __construct($db_config) {
        $this->connection = _connectToDb($db_config);
    }

    public function fetchGroceries() {
        return _fetchGroceries($this->connection);
    }
}
?>
