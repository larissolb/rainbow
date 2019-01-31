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
        $id = $this->picAction->$id;
        $type = 2;
        $pics = $this->picModel->getPicsByType($id, $type);
        $comments = $this->picModel->getComments($id);
        $likes = $this->picModel->getLikes($id);
     
        $data = [
            'title'=>$title,
            'header'=>$header,
            'last_pic'=>$last_pic,
            'rand_pics'=>$rand_pics,
            'pics'=>$pics,
            'comments'=>$comments,
            'likes'=>$likes
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
        $id = $params['id'];
        $title = 'Watch&Rate || About pic';
        $view = 'rating.php';
        $pics = $this->picModel->getPics($id);
        $comments = $this->picModel->getComments($id);
        $likes = $this->picModel->getLikes($id);
        $last_pic = $this->picModel->getLastLoadPics();
        if ($id>1) {
        $link = $id-1;
        
        }else{
                $link = 1;
            }
        
        $data = [
            'title'=>$title,
            'pics'=>$pics,
            'comments'=>$comments,
            'likes'=>$likes,
            'last_pic'=>$last_pic,
            'link'=>$link
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
