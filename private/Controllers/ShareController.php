<?php

namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;

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
}