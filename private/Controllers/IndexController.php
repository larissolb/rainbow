<?php

class ShareController extends Controller
{
    public function indexAction(){
        $title = 'Share with us!';
        $view = 'share.php';
        
        $data = [
            'title'=>$title,
        ];
        parent::generateResponse($view, $data);
    }
}