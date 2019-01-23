<?php
namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;
use Larissolb\Rainbow\Models\PicModel;

class RatingController extends Controller
{
    
    public function indexAction(){
        $title = 'Watch&Rate';
        $view = 'rating.php';
        $data = [
            'title'=>$title,
        ];
        return parent::generateResponse($view, $data);
    }
    
    public function pencilsAction(){
        $title = 'Watch&Rate|Paints by pencils';
        $header = 'Paints by pencils';
        $view = 'instruments.php';
        $data = [
            'title'=>$title,
            'header'=>$header,
        ];
        return parent::generateResponse($view, $data);
    }
    
    public function markersAction(){
        $title = 'Watch&Rate|Paints by markers';
        $header = 'Paints by markers';
        $view = 'instruments.php';
        $data = [
            'title'=>$title,
            'header'=>$header,
        ];
        return parent::generateResponse($view, $data);
    }
    public function paintsAction(){
        $title = 'Watch&Rate|Paints by watercolours';
        $header = 'Paints by watercolours';
        $view = 'instruments.php';
        $data = [
            'title'=>$title,
            'header'=>$header,
        ];
        return parent::generateResponse($view, $data);
    }
        
    protected $picModel;
    
    public function __construct() 
            {
            $this->picModel = new PicModel();
    }
    

    public function picAction($request){
//        var_dump($request);
        $params = $request->params();
        $id = $params['id'];
        $title = 'About pic';
        $view = 'pic.php';
        $pics = $this->picModel->getPics($id);
                            
        $data = [
            'title'=>$title,
            'pics'=>$pics
                
        ];
        return parent::generateResponse($view, $data);
    }
    
        public function commentAction($request){
       
        $postData = $request->post(); // массив $_POST
        $answer = $this->picModel->saveComment($postData);
        return parent::generateAjaxResponse($answer);    
        
        }
    
}