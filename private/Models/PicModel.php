<?php
namespace Larissolb\Rainbow\Models;
//use Larissolb\Rainbow\Base\DBConnection;


class PicModel 
{

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
//            var_dump($pic);
            return $pic;       
}
    
    
}
    }
    
//protected $conn;
//    
//    public function __construct() 
//            {
//            $this->DBConnection = new DBConnection();
//    }
//    
//    
    
public function loadPics($data){

    $conn = connect('rainbow',
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
    
    
}
