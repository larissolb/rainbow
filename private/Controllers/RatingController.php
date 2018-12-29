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
        parent::generateResponse($view, $data);
    }
    
    public function pencilsAction(){
        $title = 'Watch&Rate|Paints by pencils';
        $header = 'Paints by pencils';
        $view = 'instruments.php';
        $data = [
            'title'=>$title,
            'header'=>$header,
        ];
        parent::generateResponse($view, $data);
    }
    
    public function markersAction(){
        $title = 'Watch&Rate|Paints by markers';
        $header = 'Paints by markers';
        $view = 'instruments.php';
        $data = [
            'title'=>$title,
            'header'=>$header,
        ];
        parent::generateResponse($view, $data);
    }
    public function paintsAction(){
        $title = 'Watch&Rate|Paints by watercolours';
        $header = 'Paints by watercolours';
        $view = 'instruments.php';
        $data = [
            'title'=>$title,
            'header'=>$header,
        ];
        parent::generateResponse($view, $data);
    }
        
    private $picModel;
    
    public function __construct() 
            {
            $this->picModel = new PicModel();
    }
    public function picAction($get){
        $title = 'About pic';
        $view = 'pic.php';
        $id = $get['id'];
        $pics = $this->picModel->getPics($id);
                     
        $data = [
            'title'=>$title,
            'pics'=>$pics,
        ];
        parent::generateResponse($view, $data);
    }
    
}