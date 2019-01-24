<?php
namespace Larissolb\Rainbow\Models;
use Larissolb\Rainbow\Base\DBConnection;


class PicModel 
{

const SIZE_ERROR = "SIZE_ERROR";
const TYPE_ERROR = "TYPE_ERROR";
const LOAD_SUCCESS = "LOAD_SUCCESS";
const NO_PIC = "NO_PIC";
const COMMENT_SAVED =  "COMMENT_SAVED";
  
protected $DBConnection;
    
    public function __construct() 
            {
            $this->DBConnection = new DBConnection();
    }


    public function getComments($id) {
             //получение комментариев к картинке
        $sql = "SELECT comment FROM Comments WHERE Pics_id=:Pics_id";
        $params = [
            'Pics_id'=>$id
                ];
        $statement = $this->DBConnection->execute($sql, $params, false);
        
        $comments = $statement['comment'];
        var_dump($comments);
        return $comments;
   
    }
    
    
    public function getPics($id) {
        
        
$pics = [
[
'id' => 1,
'nameBook' => 'Cat',
'theme' => 'Animals',
'type' => 'pencil',
'amount' => 5,
'describe' => 'It is my favorite pic among my arts',
'img' => 'slide.jpg'
],
[
'id' => 2,
'nameBook' => 'Kengo',
'theme' => 'Animals',
'type' => 'gouache',
'amount' => 15,
'describe' => 'from my dreams about Australia',
'img' => 'slide1.jpeg'
],
[
'id' => 3,
'nameBook' => 'flowers',
'theme' => 'Nature',
'type' => 'watercolour',
'amount' => 10,
'describe' => 'Summer..where are u?',
'img' => 'youamongus.jpg'
],
[
'id' => 4,
'nameBook' => 'Speedy',
'theme' => 'Cars',
'type' => 'pen',
'amount' => 1,
'describe' => 'it is my mood today',
'img' => 'slide3.jpg'
],
[
'id' => 5,
'nameBook' => 'Houses',
'theme' => 'Cities',
'type' => 'markers',
'amount' => 3,
'describe' => 'the house of Spider-man',
'img' => 'slide2.jpg'
]
];

foreach ($pics as $pic) { 
        if ($pic["id"] == $id){
            $_SESSION['idPics'] =  $pic['id'];
            return $pic;       
}
}



    }
    


   //check size and type
    public function loadPics($data) {

        $pics = $_FILES;
        
        foreach ($pics["picture"]["error"] as $key => $error) {
        $tmp_name = $pics["picture"]["tmp_name"][$key];
        $name = basename($pics["picture"]["name"][$key]);
    
        if($error == UPLOAD_ERR_FORM_SIZE){
        return self::SIZE_ERROR;
    } 

    $types = ['image/png'];
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



