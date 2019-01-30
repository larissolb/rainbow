<?php
namespace Larissolb\Rainbow\Models;
use Larissolb\Rainbow\Base\DBConnection;
use Larissolb\Rainbow\Base\Response;


class PicModel 
{

const SIZE_ERROR = "SIZE_ERROR";
const TYPE_ERROR = "TYPE_ERROR";
const LOAD_SUCCESS = "LOAD_SUCCESS";
const NO_PIC = "NO_PIC";
const COMMENT_SAVED =  "COMMENT_SAVED";
const LIKE =  "LIKE";
const GO_AUTH = "GO_AUTH";

  
protected $DBConnection;
protected $response;
    
    public function __construct() 
            {
            $this->DBConnection = new DBConnection();
            $this->response = new Response();
    }


    public function getComments($id) {
             //получение комментариев к картинке
        $sql = "SELECT comment FROM Comments WHERE Pics_id=:Pics_id";
        $params = [
            'Pics_id'=>$id
                ];
        $statement = $this->DBConnection->execute($sql, $params, true);
        
        $comments = [];
        
        foreach ($statement as $comment) {

            array_push($comments, $comment);     
  }
  
        return $comments;
    }
    
        public function getLikes($id) {
             //получение комментариев к картинке
        $sql = "SELECT `like` FROM Pics WHERE id=:id";
        $params = [
            'id'=>$id
                ];
        $statement = $this->DBConnection->execute($sql, $params, FALSE);
        $likes = $statement['like'];

        $_SESSION['idPic'] = $id;
          
        return $likes;
    }
    
    public function getAllPics() {
        $sql = "SELECT *  FROM Pics";
        $all_pics = $this->DBConnection->queryAll($sql);
        
        return $all_pics;
    }
    
    public function getLastLoadPics() {
        $sql = "SELECT *  FROM Pics ORDER BY id ASC";
        $last_pics = $this->DBConnection->queryAll($sql);
//        var_dump($last_pics);
        foreach($last_pics as $arr){
            $last_pic = $arr;
        }
        
        return $last_pic;
    }
    
    public function getRandomPics() {
        $sql = "SELECT id, img_path  FROM Pics ORDER BY id ASC LIMIT 3";
        $pics_arr = $this->DBConnection->queryAll($sql);
        
        $pics = [];
        
        $rand_pics = array_rand($pics_arr, 2);
        $rand_pic1 = $pics_arr[$rand_pics[0]];
        array_push($pics, $rand_pic1);
        $rand_pic2 = $pics_arr[$rand_pics[1]];
        array_push($pics, $rand_pic2);
        
        return $pics;
    }
     
    public function getPics($id) {
        $sql = "SELECT id, nameBook, amount, text, img_path, Themes_id, Types_id, Users_login  FROM Pics WHERE id=:id";
        $params = [
            'id'=>$id
                ];
        $pic_arr = $this->DBConnection->execute($sql, $params, true);
        
  foreach ($pic_arr as $pics) { 
        //choose theme
        $id_theme = $pics['Themes_id'];   
        $sql = "SELECT theme FROM Themes WHERE id=:id";
        $params = [
            'id'=>$id_theme
                ];
        $theme_arr = $this->DBConnection->execute($sql, $params, true);
        foreach ($theme_arr as $key => $value) {
            $theme = $value["theme"];            
        }
        $pics['Themes_id'] = $theme;
        
        //choose instrument
        $id_type = $pics['Types_id'];   
        $sql_type = "SELECT type FROM Types WHERE id=:id";
        $params_type = [
            'id'=>$id_type
                ];
        $type_arr = $this->DBConnection->execute($sql_type, $params_type, true);
        foreach ($type_arr as $key => $value) {
            $type = $value["type"];
        }
         $pics['Types_id'] = $type;
      
        if ($pics["id"] == $id){
            $_SESSION['idPics'] =  $pics['id'];
            return $pics;       
        }  
    }
    
}
 
   //check size and type
    public function loadPics($data) {

        $pics = $_FILES;
        
        foreach ($pics["picture"]["error"] as $key => $error) {
        $tmp_name = $pics["picture"]["tmp_name"][$key];
        $name = basename($pics["picture"]["name"][$key]);
//        var_dump($name);
    
        if($error == UPLOAD_ERR_FORM_SIZE){
        return self::SIZE_ERROR;
    } 

    $types = ['image/jpeg'];
    
    $finfo = finfo_open(FILEINFO_MIME_TYPE);   
        
        foreach ($pics["picture"]["error"] as $key => $error) {
        $tmp_name = $pics["picture"]["tmp_name"][$key];
        $type_pic = finfo_file($finfo, $tmp_name);
        
        //choose theme
        if($data["theme"] === "Nature") {
            $themes = 1;    
        }elseif($data["theme"] === "Space"){
            $themes = 2;    
        }elseif($data["theme"] === "Animals"){
            $themes = 3;    
        }elseif($data["theme"] === "Cars"){
            $themes = 4;    
        }elseif($data["theme"] === "Cities"){
            $themes = 5;    
        }else{
            $themes = 6;
        }
            
        //choose type
        if($data["type"] === "pen") {
            $type = 1;    
        }elseif($data["type"] === "pencil"){
            $type = 3;    
        }elseif($data["type"] === "gouache"){
            $type = 4;    
        }elseif($data["type"] === "watercolour"){
            $type = 5;    
        }else{
            $type = 6;    
        }
        
        if(!in_array($type_pic, $types)){
        finfo_close($finfo);
        return self::TYPE_ERROR;
    }
    
    move_uploaded_file($tmp_name, "img/$name");
        
    }
    
    $login = $_SESSION['login'];
 
    $sql = "INSERT INTO Pics (nameBook, amount, text, img_path, Themes_id, Types_id, Users_login)
              VALUES (:nameBook, :amount, :text, :img_path, :Themes_id, :Types_id, :Users_login)";
    $params = [
        'nameBook'=>$data['nameBook'],
        'amount'=>$data['amount'],
        'text'=>$data['text'],
        'img_path'=>$name,
        'Themes_id'=>$themes,
        'Types_id'=>$type,
        'Users_login'=>$login        
    ];
    
    $statement = $this->DBConnection->execute($sql, $params, false);
          return self::LOAD_SUCCESS;
    }
}

public function saveComment($comData) {

        
       if(!isset($_SESSION['login'])){
         return self::GO_AUTH;   
        } else {
            $login = $_SESSION['login'];
            $idPic = $_SESSION['idPics'];
            
        $sql = "INSERT INTO Comments (Comment, Users_login, Pics_id)
              VALUES (:Comment, :Users_login, :Pics_id)";
        $params = [
            'Comment'=>$comData['comment'],
            'Users_login'=>$login,
            'Pics_id'=> $idPic
        ];
//        var_dump($params);
        $statement = $this->DBConnection->execute($sql, $params, false);
        if($statement) {
            return self::DB_ERROR;
        }
               
        return self::COMMENT_SAVED; 
        }
    }

public function addLike() {

        $idPic = $_SESSION['idPic'];
        
        if(!isset($_SESSION['login'])){
         return self::GO_AUTH;   
        } else {
        
        $sql = "UPDATE Pics SET `like`=:like
              WHERE `id`=:id";
        
        $current = $this->getLikes($idPic);
        
        $params = [
            'like'=>$current+1,
            'id'=>$idPic
        ];

        $statement = $this->DBConnection->execute($sql, $params, false);
        if($statement) {
            return self::DB_ERROR;
        }
               
        return self::LIKE; 
        }  
    }        
   
}



