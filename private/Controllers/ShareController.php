<?php

namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;
use Larissolb\Rainbow\Models\PicModel;

class ShareController extends Controller
{
    protected $picModel;
    
    public function __construct() 
            {
            $this->picModel = new PicModel();
            
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
        $last_pic = $this->picModel->getLastLoadPics();
        $pics = $this->picModel->getRandomPics();
        
        $data = [
            'title'=>$title,
            'last_pic'=>$last_pic,
            'pics'=>$pics
        ];
        
        return parent::generateResponse($view, $data);
    }
    
        public function shareMAction($request){
        if((isset($_SESSION['auth']))){
        $title1 = 'Share with this world ';
        $view1 = 'share_mob.php';
        } else {
        $title1 = '';
        $view1 = 'index_view.php';
        }
        $title = $title1;
        $view = $view1;
            
        $postData = $request->post(); 
        $answer = $this->picModel->loadPicsM($postData);   
        $last_pic = $this->picModel->getLastLoadPics();
        $data = [
            'title'=>$title,
            'answer'=>$answer,
            'last_pic'=>$last_pic
        ];
        return parent::generateResponse($view, $data, $template='template_mobile.php');
    }

    public function LoadPicsAction($request){
        $postData = $request->post();
        $data = $this->picModel->loadPics($postData);
        return parent::generateAjaxResponse($data);
    }
}