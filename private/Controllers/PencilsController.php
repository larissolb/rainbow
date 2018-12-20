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
}