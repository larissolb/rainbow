<?php
namespace Larissolb\Rainbow\Models;
use Larissolb\Rainbow\Base\DBConnection;


class UserModel
{    
    const USER_ADDED = "USER_ADDED";
    const USER_EXISTS = "USER_EXISTS";
    const LOGIN_EXISTS = "LOGIN_EXISTS";
    const EMAIL_ERROR = "EMAIL_ERROR";
    const PSW_ERROR = "PSW_ERROR";
    const USER_AUTH = "USER_AUTH";
    const DB_ERROR = "DB_ERROR";
    const COUNTRY_EMPTY = "COUNTRY_EMPTY";
    const PSW_WRONG = "PSW_WRONG";

protected $DBConnection;

    
    public function __construct() 
            {
            $this->DBConnection = new DBConnection();
  
    }

    public function loginExists($userData){
        $sql = 'SELECT login FROM Users WHERE login =:login';
        $params = ['login'=>$userData['login']];
        $statement = $this->DBConnection->execute($sql, $params, false);
        return $statement;
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
            return self::LOGIN_EXISTS;
        }
        if($userData['country'] === "Choose country"){
            return self::COUNTRY_EMPTY;
        }
        if($userData['psw'] === "PSW_WRONG"){
            return self::PSW_WRONG;
        }
        
        
        $sql = "INSERT INTO Users (login, psw, email)
              VALUES (:login, :psw, :email)";
        $params = [
            'login'=>$userData['login'],
            'psw'=>password_hash($userData['psw'], PASSWORD_DEFAULT),
            'email'=>$userData['email'],
        ];
        $statement = $this->DBConnection->execute($sql, $params, false);
        if($statement) {
            return self::DB_ERROR;
        }
       
        return self::USER_ADDED;
    }

    public function authUser($userData){
        $sql = "SELECT email, psw, login FROM Users 
      WHERE email=:email";
        $params = [
            'email'=>$userData['email']
        ];
             
        $statement = $this->DBConnection->execute($sql, $params, false);
                        
        if (!$statement){
            return self::EMAIL_ERROR;
        }else{
         $hash = $statement['psw'];
         if (!password_verify($userData['psw'], $hash)){
            return self::PSW_ERROR;
        }
         $_SESSION['auth'] = true;
         $_SESSION['login'] = $statement['login'];
         
        return self::USER_AUTH;
    }
}

}
