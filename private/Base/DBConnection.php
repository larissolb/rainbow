<?php

namespace Larissolb\Rainbow\Base;

class DBConnection
{
    private $connection;
    private static $dbconnection;

    public static function getDBConnection() {
        if (!self::$dbconnection) {
            self::$dbconnection = new self();
        }
        return self::$dbconnection;
    }

    public function setConnection($settings) {
        $this->connection = $this->connect($settings['server'], $settings['db_name'], $settings['username'], $settings['pwd']);
    }

    private function connect(
        $server, $db_name,
        $username, $pwd, array $opt=[]
    )
    {
        $connection = null;
        try {
            $connection =  new \PDO("mysql:host=$server;dbname=$db_name",
                $username, $pwd, $opt);
        } catch (\PDOException $exception){
            // обработка ошибки
        }
        return $connection;
    }
    // неподготовленный запрос
    public function exec($sql_string){

        return $this->connection->exec($sql_string);
    }
    // неподготовленный запрос
    public function queryAll($sql_string){
        $statement = $this->connection->query($sql_string);
        if (!$statement) {
            return false; // либо сообщение
        }
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
    // неподготовленный запрос
    public function query($sql_string){
        $statement = $this->connection->query($sql_string);
        if (!$statement) {
            return false; 
        }
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    // подготовленный запрос
    public function execute($sql_string, $params, $all=true){
        $statement = $this->connection->prepare($sql_string);
        $statement->execute($params);
        if (!$all) {
            return $statement->fetch(\PDO::FETCH_ASSOC);
        }
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
