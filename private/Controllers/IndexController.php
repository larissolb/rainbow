<?php

namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;

class IndexController extends Controller
{
    public function indexAction(){
        $title = 'Main page';
        $view = 'index_view.php';
        
        $data = [
            'title'=>$title,
        ];
        return parent::generateResponse($view, $data);
    }
    public function aboutAction(){
        $title = 'Why I am here?';
        $view = 'about.php';
        
        $data = [
            'title'=>$title,
        ];
        return parent::generateResponse($view, $data);
    }
    
    public function shareAction(){
        if((isset($_SESSION['auth']))){
        $title1 = 'Share with this world ';
        $view1 = 'share.php';
        } else {
        $title1 = '';
        $view1 = 'index_view.php';
        }
        $title = $title1;
        $view = $view1;
        
        $data = [
            'title'=>$title,
        ];
        
        return parent::generateResponse($view, $data);
    }
}