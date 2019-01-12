<?php

//соединение с базой данных rainbow
//$server = 'rainbow';
//$db_name = 'rainbow'; // имя базы данных
//$username = 'larissolb';
//$pwd = 'pwd';
//$options = [
//    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//];
//

namespace Larissolb\Rainbow\Base;

class DBConnection
{
    protected $connection;
    
    private $server = "localhost";
    private $db_name = 'rainbow';
    private $username = 'larissolb';
    private $pwd = 'pwd';

    public function __construct() {
        $this->connection = $this->connect($this->server,$this->db_name, $this->username, $this->pwd);
    }
    
    protected function connect($server, $db_name, $username, $pwd, array $opt=[]) {

        try {

       $connection = new \PDO("mysql:host=$server;dbname=$db_name",
            $username, $pwd, $opt);
//        var_dump("connection is good");

        } catch (\PDOException $exception) {
            //здесь надо логировать, т.е. записывать все исключения в файл=ошибки
            var_dump($exception->getTrace());
        }
        return $connection;
}

    public function exec($sql_string) {
        return $this->connection->exec($sql_string); //будет возвращено либо true, либо false
    }
    
    public function queryAll($sql_string) {  
        $statement = $this->query($sql_string);
        if(!$statement){
            return FALSE; //либо сообщение
        }
        
        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($data);
    }
    
    public function query($sql_string) {  
        $statement = $this->query($sql_string);
        if(!$statement){
            return FALSE; //либо сообщение
        }
        
        $data = $statement->fetch(\PDO::FETCH_ASSOC);
        var_dump($data);
    }

    public function execute($sql_string, $params, $all=true) {
        $statement = $this->connection->prepare($sql_string);
        $statement->execute($params);
        
        if(!$all) {
            return $statement->fetch(\PDO::FETCH_ASSOC);;
        }
        return $statement->fetchAll(\PDO::FETCH_ASSOC);;
        
    }
    

    
}
