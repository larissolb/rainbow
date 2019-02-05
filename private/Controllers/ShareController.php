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

    public function LoadPicsAction($request){
        $postData = $request->post();
        $data = $this->picModel->loadPics($postData);
        return parent::generateAjaxResponse($data);
    }
    
    public function LoadPicsMAction($request){
        $postData = $request->post();
        $type = $this->picModel->loadPics($postData);
        $title = 'Share with this world ';
        $view = 'share.php';
        
        $data = [
            'title'=>$title,
            'type'=>$type,
            'data'=>$postData
        ];
        
        return parent::generateResponse($view, $data);
        
        
    }
}