<?php

class PencilsController extends Controller
{
    
    public function indexAction(){
        $title = 'Watch&Rate';
        $view = 'pencils.php';
        $data = [
            'title'=>$title,
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
        $id = $get;
        $pics = $this->picModel->getPics($id);
                     
        $data = [
            'title'=>$title,
            'pics'=>$pics,
        ];
        parent::generateResponse($view, $data);
    }
    
}