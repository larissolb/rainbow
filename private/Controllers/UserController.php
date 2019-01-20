<?php
//authorization/registration/recovery psw

namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;
use Larissolb\Rainbow\Models\UserModel;
use Larissolb\Rainbow\Base\Session;

class UserController extends Controller
{
        private $userModel;
        private  $session;


        public function __construct()
    {
     $this->userModel = new UserModel();  
     $this->session = new Session();
    }

    public function registrationAction($request){
        $postData = $request->post(); // массив $_POST
        $answer = $this->userModel->addUser($postData);
        return parent::generateAjaxResponse($answer);
    }
    
    public function authorizationAction($request){
       $postData = $request->post(); // массив $_POST
       $answer = $this->userModel->authUser($postData);
       return parent::generateAjaxResponse($answer);
    }
    
    public function recAction($request){
        $postData = $request->post(); // массив $_POST
        $answer = $this->userModel->recData($postData);
        return parent::generateAjaxResponse($answer);
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
 
