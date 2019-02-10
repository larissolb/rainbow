<?php
//authorization/registration/recovery psw

namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;
use Larissolb\Rainbow\Models\UserModel;
use Larissolb\Rainbow\Models\PicModel;
use Larissolb\Rainbow\Base\Session;

class UserController extends Controller
{
        private $userModel;
        private $picModel;
        private  $session;


        public function __construct()
    {
     $this->userModel = new UserModel();  
     $this->picModel = new PicModel();
     $this->session = new Session();
    }

    public function registrationAction($request){
        $postData = $request->post(); 
        $answer = $this->userModel->addUser($postData);
        return parent::generateAjaxResponse($answer);
    }
    
    public function registerMAction($request){
        $postData = $request->post(); 
        $answer = $this->userModel->addMUser($postData);   
        $title = 'Register';
        $view = 'reg_mob.php';
        $last_pic = $this->picModel->getLastLoadPics();
        $data = [
            'title'=>$title,
            'answer'=>$answer,
            'last_pic'=>$last_pic
        ];
        return parent::generateResponse($view, $data, $template='template_mobile.php');
    }    
    
    public function authorizationAction($request){
       $postData = $request->post(); 
       $answer = $this->userModel->authUser($postData);
       return parent::generateAjaxResponse($answer);
    }
    
    public function authorizationMAction($request){
       $postData = $request->post(); 
       $answer = $this->userModel->authMUser($postData);
       $title = 'Rainbow world';
        $last_pic = $this->picModel->getLastLoadPics();
        $view = 'index_view.php';
        $data = [
            'title'=>$title,
            'answer'=>$answer,
            'last_pic'=>$last_pic
        ];
        return parent::generateResponse($view, $data, $template='template_mobile.php');
    }
    
    public function recAction($request){
        $postData = $request->post(); 
        $answer = $this->userModel->recData($postData);
        return parent::generateAjaxResponse($answer);
    }
    
    public function recmAction($request){
        $postData = $request->post(); 
        $not = $this->userModel->recmData($postData);
        $title = 'Recovery';
        $view = 'rec_mob.php';
        $last_pic = $this->picModel->getLastLoadPics();
        $data = [
            'title'=>$title,
            'not'=>$not,
            'answer'=>1,
            'last_pic'=>$last_pic
            
        ];
        return parent::generateResponse($view, $data, $template='template_mobile.php');
    }
    
    public function outAction($request){
        $params = $request->params();
        $out = $params['out'];
        if($out){
        $this->session->close();
        header("Location: /");
        }
       return;
    }
    
}
 
