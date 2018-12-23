<?php

namespace Larissolb\Rainbow\Base;

class Cookies {
    public function setCookie($name, $value, $time){
        setcookie($name, $value, $time);
    }
    
    public function getCookie($name) {
        if (isset($_COOKIE[$name])) 
            return $_COOKIE[$name];
       
    }
    
    public function delCookie($name, $value){
      return setcookie ($name, $value,time() - 3600);  
    }
}

   



