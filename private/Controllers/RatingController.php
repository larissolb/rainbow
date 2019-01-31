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
        $rand_pics = $this->picModel->getRandomPics();
        $type = 2;
        $pics = $this->picModel->getPicsByType($type);
      
        $data = [
            'title'=>$title,
            'header'=>$header,
            'last_pic'=>$last_pic,
            'rand_pics'=>$rand_pics,
            'pics'=>$pics
        ];
        return parent::generateResponse($view, $data);
    }
    
    public function markersAction(){
        $title = 'Watch&Rate|Paints by markers';
        $header = 'Paints by markers';
        $view = 'instruments.php';
        $last_pic = $this->picModel->getLastLoadPics();
        $rand_pics = $this->picModel->getRandomPics();
        $type = 5;
        $pics = $this->picModel->getPicsByType($type);
      
        $data = [
            'title'=>$title,
            'header'=>$header,
            'last_pic'=>$last_pic,
            'rand_pics'=>$rand_pics,
            'pics'=>$pics
        ];
        return parent::generateResponse($view, $data);
    }
    public function paintsAction(){
        $title = 'Watch&Rate|Paints by paints';
        $header = 'Paints by paints';
        $view = 'instruments.php';
        $last_pic = $this->picModel->getLastLoadPics();
        $rand_pics = $this->picModel->getRandomPics();
        $type = 3;
        $pics = $this->picModel->getPicsByType($type);
      
        $data = [
            'title'=>$title,
            'header'=>$header,
            'last_pic'=>$last_pic,
            'rand_pics'=>$rand_pics,
            'pics'=>$pics
        ];
        return parent::generateResponse($view, $data);
    }
        
    public function picAction($request){
        $params = $request->params();
        $id = $params['id'];
        $title = 'Watch&Rate || About pic';
        $view = 'rating.php';
        $pics = $this->picModel->getPics($id);
        $comments = $this->picModel->getComments($id);
        $likes = $this->picModel->getLikes($id);
        if ($id>1) {
        $link = $id-1;
        }else{
                $link = 1;
            }
        $last_pic = $this->picModel->getLastLoadPics();
            
        $data = [
            'title'=>$title,
            'pics'=>$pics,
            'comments'=>$comments,
            'likes'=>$likes,
            'link'=>$link,
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
