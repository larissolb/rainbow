<?php

namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;
use Larissolb\Rainbow\Models\PicModel;

class IndexController extends Controller
{
    protected $picModel;
    
    public function __construct() 
            {
            $this->picModel = new PicModel();
            
    }
    public function indexAction(){
        $title = 'Main page';
        $view = 'index_view.php';
        $last_pic = $this->picModel->getLastLoadPics();
        $data = [
            'title'=>$title,
            'last_pic'=>$last_pic
        ];
        return parent::generateResponse($view, $data);
    }

    public function aboutAction(){
        $title = 'Why I am here?';
        $view = 'about.php';
        $last_pic = $this->picModel->getLastLoadPics();
        $data = [
            'title'=>$title,
            'last_pic'=>$last_pic
        ];
        return parent::generateResponse($view, $data);
    }
    
    public function pbAction(){
        $title = 'Do it this world rainbow';
        $view = 'paintbook.php';
        $last_pic = $this->picModel->getLastLoadPics();        
        $data = [
            'title'=>$title,
            'last_pic'=>$last_pic
        ];
        return parent::generateResponse($view, $data, $template="paintbook.php");
    }    
        
    
}