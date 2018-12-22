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
        parent::generateResponse($view, $data);
    }
    public function aboutAction(){
        $title = ' ';
        $view = 'about.php';
        
        $data = [
            'title'=>$title,
        ];
        parent::generateResponse($view, $data);
    }
   
}