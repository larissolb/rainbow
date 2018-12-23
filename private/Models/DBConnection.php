<?php

//соединение с базой данных rainbow
$server = 'rainbow';
$db_name = 'rainbow'; //имя базы данных
$username = 'larissolb';
$pwd = 'pwd';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

];

function dbConnect($server, $db_name, $username, $pwd, array $opt=[]) {
    return new PDO("mysql:host=$server;dbname=$db_name",
            $username, $pwd, $opt);
}

try {

$connection = dbConnect($server, $db_name, $username, $pwd, $options); 
var_dump("connection is good");

} catch (PDOException $exception) {
    var_dump($exception->getTrace());
}

class DBConnection
{

    public function execute($sql_string, array $params) {
        $statement = $connection->prepare($sql_string);
        return $statement->execute($params);
    }

}
