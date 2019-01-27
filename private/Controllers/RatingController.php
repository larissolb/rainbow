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
    
    public function indexAction(){
        $title = 'Watch&Rate';
        $view = 'rating.php';
        $pics = $this->picModel->getLastLoadPics();
        $id = $this->picModel->getLastLoadPics()['id'];
        $comments = $this->picModel->getComments($id);
                
        $data = [
            'title'=>$title,
            'pics'=>$pics,
            'comments'=>$comments
        ];
        return parent::generateResponse($view, $data);
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
        $id = $params['id'];
        $title = 'About pic';
        $view = 'pic.php';
        $pics = $this->picModel->getPics($id);
        $comments = $this->picModel->getComments($id);
                                    
        $data = [
            'title'=>$title,
            'pics'=>$pics,
            'comments'=>$comments
                
        ];
        return parent::generateResponse($view, $data);
    }
    
        public function commentAction($request){
       
        $postData = $request->post(); 
        $answer = $this->picModel->saveComment($postData);
        return parent::generateAjaxResponse($answer);    
        
        }
    
}