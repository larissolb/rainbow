<?php
//namespace Larissolb\Rainbow\Models;

session_start(); 

const SIZE_ERROR = "Size is more than 50kb";
const TYPE_ERROR = "Sorry, this pic has bad type. Use only .png images";
const LOAD_SUCCESS = "Your pic has uploaded!";
$post = $_POST;
echo loadPics($post);

function dbConnect($server, $db_name, $username, $pwd, array $opt=[])
{
            try {

   $connection = new PDO("mysql:host=$server;dbname=$db_name",
        $username, $pwd, $opt);
           var_dump("connection is good");
           } catch (\PDOException $exception) {
                 var_dump($exception->getTrace());
        }
        return $connection;
}

//загрузка картинок

function loadPics ($data){
    $conn = dbConnect('rainbow',
        'rainbow', 'larissolb', 'pwd');
    
    $pics = $_FILES;   
    $types = ['image/png'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE); 

foreach ($pics["picture"]["error"] as $key => $error) {
    $tmp_name = $pics["picture"]["tmp_name"][$key];
    $name = basename($pics["picture"]["name"][$key]);
    $type = finfo_file($finfo, $tmp_name);

   //check size 
    if($error == UPLOAD_ERR_FORM_SIZE){
        return SIZE_ERROR;
//        echo "$name size is more than 50kb";
    } elseif(!in_array($type, $types)){
        return TYPE_ERROR;
//        echo "<p>Sorry, this pic '$name' has bad type. Use only .png images</p>";
    }
    else {
//        move_uploaded_file($tmp_name, "/public/img/$name");
    $sql = "INSERT INTO Types (type)
              VALUES (:type)";
    $params = [
        'type'=>$data['nameBook'],
//        'amount'=>$data['amount'],
//        'describe'=>$data['describe'],
//        'img_path'=>$_FILES
    ];
    
    $statement = $conn->prepare($sql);
    $statement->execute($params);

          return LOAD_SUCCESS;
//        echo "<p>Your pic '$name' has uploaded!</p>";
    }
}
finfo_close($finfo);

}
//loadPics();
