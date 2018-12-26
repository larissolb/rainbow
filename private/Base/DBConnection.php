<?php

//соединение с базой данных rainbow

class DBConnection
{
    private $connection;

    public function __construct() {
        $this->connection = $this->connect();
    }
    
    private function connect($server, $db_name, $username, $pwd, array $opt=[]) {

        try {

        new \PDO("mysql:host=$server;dbname=$db_name",
            $username, $pwd, $opt);
        var_dump("connection is good");

        } catch (\PDOException $exception) {
            //здесь надо логировать, т.е. записывать все исключения в файл=ошибки
            var_dump($exception->getTrace());
        }
        return $connection;
}

    public function exec($sql_string) {
        return $this->connection->exec($sql_string); //будет возвращено либо true, либо false
    }
    
    public function queryAll($sql_string) {  //будет брать запрос и получать данные, есть еще fetch и fetchall
        $statement = $this->query($sql_string);
        if(!$statement){
            return FALSE; //либо сообщение
        }
        
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($data);
    }
    
    public function query($sql_string) {  //будет брать запрос и получать данные, есть еще fetch и fetchall
        $statement = $this->query($sql_string);
        if(!$statement){
            return FALSE; //либо сообщение
        }
        
        $data = $statement->fetch(\PDO::FETCH_ASSOC);
        var_dump($data);
    }

    public function execute($sql_string, $param, $all=true) {
        $statement = $connection->prepare($sql_string);
        $statement->execute($params);
        
        if(!$all) {
            return $statement->fetch(\PDO::FETCH_ASSOC);;
        }
        return $statement->fetchAll(\PDO::FETCH_ASSOC);;
        
    }
    

    
}
