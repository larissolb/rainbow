<?php

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
   
}