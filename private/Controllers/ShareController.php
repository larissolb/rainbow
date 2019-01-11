<?php

namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;
use Larissolb\Rainbow\Models\PicModel;


class ShareController extends Controller
{

    
    public function indexAction(){
        $title = 'Share with us!';
        $view = 'share.php';
        
        $data = [
            'title'=>$title,
        ];
        
        return parent::generateResponse($view, $data);
    }
    
    protected $picModel;
    
    public function __construct() 
            {
            $this->picModel = new PicModel();
    }
            
    public function LoadPicsAction($post){
//        $title = 'About pic';
        $view = 'share.php';
        $post = $_POST;
        $type = $this->picModel->loadPics($post);
                     
        $data = [
//            'title'=>$title,
            'type'=>$data['nameBook'],
        ];
        return parent::generateResponse($view, $data);
    }
    
    
    
    
}