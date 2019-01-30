<?php
namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;
use Larissolb\Rainbow\Models\PicModel;

class RatingController extends Controller
{
    
    protected $picModel;
    
    public function __construct() 
            {
            $this->picModel = new PicModel();
            
    }
    
    public function pencilsAction(){
        $title = 'Watch&Rate|Paints by pencils';
        $header = 'Paints by pencils';
        $view = 'instruments.php';
        $last_pic = $this->picModel->getLastLoadPics();
        $pics = $this->picModel->getRandomPics();
     
        $data = [
            'title'=>$title,
            'header'=>$header,
            'last_pic'=>$last_pic,
            'pics'=>$pics
        ];
        return parent::generateResponse($view, $data);
    }
    
    public function markersAction(){
        $title = 'Watch&Rate|Paints by markers';
        $header = 'Paints by markers';
        $view = 'instruments.php';
        $last_pic = $this->picModel->getLastLoadPics();
        $pics = $this->picModel->getRandomPics();
     
        $data = [
            'title'=>$title,
            'header'=>$header,
            'last_pic'=>$last_pic,
            'pics'=>$pics
        ];
        return parent::generateResponse($view, $data);
    }
    public function paintsAction(){
        $title = 'Watch&Rate|Paints by paints';
        $header = 'Paints by paints';
        $view = 'instruments.php';
        $last_pic = $this->picModel->getLastLoadPics();
        $pics = $this->picModel->getRandomPics();
     
        $data = [
            'title'=>$title,
            'header'=>$header,
            'last_pic'=>$last_pic,
            'pics'=>$pics
        ];
        return parent::generateResponse($view, $data);
    }
        
    public function picAction($request){
        $params = $request->params();
        $all_pics = $this->picModel->getAllPics();
        $last_id = count($all_pics);
                
        if(!isset($params)){
            $id = $this->picModel->getLastLoadPics()['id'];
            
        }else if($params['id']<1){
            $id = $last_id;
        }else{
        $id = $params['id'];}
        $title = 'Watch&Rate || About pic';
        $view = 'rating.php';
        $pics = $this->picModel->getPics($id);
        $comments = $this->picModel->getComments($id);
        $likes = $this->picModel->getLikes($id);
        $last_pic = $this->picModel->getLastLoadPics();
                                    
        $data = [
            'title'=>$title,
            'pics'=>$pics,
            'comments'=>$comments,
            'likes'=>$likes,
            'last_pic'=>$last_pic
        ];
        return parent::generateResponse($view, $data);
    }
    
        public function commentAction($request){
       
        $postData = $request->post(); 
        $answer = $this->picModel->saveComment($postData);
        return parent::generateAjaxResponse($answer);    
        
    }
        
        public function likeAction(){
        $answer = $this->picModel->addLike();
        return parent::generateAjaxResponse($answer);    
        
    }
    
}