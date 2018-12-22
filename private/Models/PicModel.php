<?php
namespace Larissolb\Rainbow\Models;

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
}