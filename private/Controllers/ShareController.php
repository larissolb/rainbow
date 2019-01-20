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

    public function LoadPicsAction($request){
        $postData = $request->post();
        $type = $this->picModel->loadPics($postData);
        return parent::generateAjaxResponse($type);
    }
}