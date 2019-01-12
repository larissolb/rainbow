<?php
namespace Larissolb\Rainbow\Models;
use Larissolb\Rainbow\Base\DBConnection;


class PicModel 
{

const SIZE_ERROR = "SIZE_ERROR";
const TYPE_ERROR = "TYPE_ERROR";
const LOAD_SUCCESS = "LOAD_SUCCESS";
const NO_PIC = "NO_PIC";
  
    
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
            return $pic;       
}
    
    
}
    }
    
protected $DBConnection;
    
    public function __construct() 
            {
            $this->DBConnection = new DBConnection();
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
        $type = finfo_file($finfo, $tmp_name);
        
        if(!in_array($type, $types)){
        finfo_close($finfo);
        return self::TYPE_ERROR;
    }
        move_uploaded_file($tmp_name, "img/$name");
    }
    }
 
    $sql = "INSERT INTO Types (type)
              VALUES (:type)";
    $params = [
        'type'=>$data['nameBook'],
//        'amount'=>$data['amount'],
//        'describe'=>$data['describe'],
//        'img_path'=>$name
    ];
    
    $statement = $this->DBConnection->execute($sql, $params, false);
          return self::LOAD_SUCCESS;
    }
}
