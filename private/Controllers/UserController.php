<?php
//authorization/registration/recovery psw

namespace Larissolb\Rainbow\Controllers;
use Larissolb\Rainbow\Base\Controller;
use Larissolb\Rainbow\Models\UserModel;

class UserController extends Controller
{
        private $userModel;
    public function __construct()
    {
     $this->userModel = new UserModel();
    }

    public function userAction(){
      $title = 'Share with us!';
      $view = 'share.php';
//      $login = $this->userModel->authUser($login);
//                     
        $data = [
            'title'=>$title,
//            'login'=>$login,
        ];   
        
        return parent::generateResponse($view, $data, $template='share.php');
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
}
