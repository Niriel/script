<?php

function arrayToString($assoc_arr, $equal, $separator) {
    $strings = array_map(
        function ($key, $value) use ($equal) {
            return strval($key) . $equal . strval($value);
        },
        array_keys($assoc_arr),
        array_values($assoc_arr)
    );
    return join($separator, $strings);
}


function configToDsn($db_config) {
    $dsn = 'mysql:' . arrayToString($db_config, '=', ';');
    return $dsn;
}


class Database {
    public $connection;

    public function __construct($db_config, $username=null, $password=null) {
        $dsn = configToDsn($db_config);
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($sql, $params=[]) {
        $statement = $this->connection->prepare($sql);
        $statement->execute($params);
        return $statement;
    }

    public function fetch($sql) {
        $result = $this->query($sql)->fetch();
        return $result;
    }

    public function fetchall($sql) {
        $result = $this->query($sql)->fetchAll();
        return $result;
    }
}


class GroceriesDatabase extends Database {   
    public function fetchGroceries() {
        return $this->fetchAll('SELECT * FROM groceries;');
    }
}
?>
