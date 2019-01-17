<?php
namespace Larissolb\Rainbow\Models;

use Larissolb\Rainbow\Base\DBConnection;

class UserModel
{    
    const USER_ADDED = "USER_ADDED";
    const USER_EXISTS = "USER_EXISTS";
    const EMAIL_ERROR = "EMAIL_ERROR";
    const PSW_ERROR = "PSW_ERROR";
    const USER_AUTH = "/share";
    const DB_ERROR = "DB_ERROR";

protected $DBConnection;
    
    public function __construct() 
            {
            $this->DBConnection = new DBConnection();
    }

    public function loginExists($userData){
        $sql = 'SELECT login FROM Users WHERE login =:login';
        $params = ['login'=>$userData['login']];
        $statement = $this->DBConnection->execute($sql, $params, false);
        $answer = $statement->fetch(\PDO::FETCH_ASSOC);
        return $answer;
    }
    
    public function recData($userData){
        $sql = 'SELECT email FROM Users WHERE email =:email';
        $params = [
            'email'=>$userData['emailRec']
        ];
        $statement = $this->DBConnection->execute($sql, $params, false);
        if(!$statement){
            return self::EMAIL_ERROR;
        }
        return self::USER_EXISTS;
    }
    
    public function addUser($userData){
        if ($this->loginExists($userData)){
            return self::USER_EXISTS;
        }
        $sql = "INSERT INTO user (login, hash, email)
              VALUES (:login, :hash, :email)";
        $params = [
            'login'=>$userData['login'],
            'hash'=>password_hash($userData['psw'], PASSWORD_DEFAULT),
            'email'=>$userData['email'],
        ];
       $statement = $this->DBConnection->execute($sql, $params, false);
        if($statement->execute($params) === false) {
            return self::DB_ERROR;
        }
        return self::USER_ADDED;
    }

    public function authUser($userData){
        $sql = "SELECT email, login, psw FROM Users 
      WHERE email=:email";
        $params = [
            'email'=>$userData['email']
        ];
       
        $statement = $this->DBConnection->execute($sql, $params, false);
        $psw = $statement['psw'];
//        $login = $statement['login'];
                
        if (!$statement){
            return self::EMAIL_ERROR;
        }elseif($psw != $userData['psw']){
            return self::PSW_ERROR;
        }else{
//        
 //        $hash = $answer['hash'];
//        if (!password_verify($userData['psw'], $hash)){
//            return self::PWD_ERROR;
//        }
        return self::USER_AUTH;
            
    }
}
}
