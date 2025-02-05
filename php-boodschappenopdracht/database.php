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


class Database {
    public $connection;

    public function __construct($db_config) {
        $dsn = configToDsn($db_config);
        $this->connection = new PDO($dsn, null, null, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function execute($sql) {
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement;
    }

    public function fetch($sql) {
        $result = $this->execute($sql)->fetch();
        return $result;
    }

    public function fetchall($sql) {
        $result = $this->execute($sql)->fetchAll();
        return $result;
    }
}


class GroceriesDatabase extends Database {   
    public function fetchGroceries() {
        return $this->fetchAll('SELECT * FROM groceries');
    }
}
?>
