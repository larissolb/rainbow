<?php
ini_set('display_errors', 'On');

require_once __DIR__ . '/../private/Base/Controller.php';
require_once __DIR__ . '/../private/Controllers/IndexController.php';
require_once __DIR__ . '/../private/Controllers/ShareController.php';
require_once __DIR__ . '/../private/Controllers/PencilsController.php';
require_once __DIR__ . '/../private/Models/PicModel.php';

run();

function run() {
    $controller = 'Index';
    $action = 'index';
    $get = null;
    $routes = explode('/', $_SERVER['REQUEST_URI']); 

    if($routes[1]) {
        $controller = $routes[1]; //след.страницы
    }
        if(isset($routes[2])) {
        $action = $routes[2]; // метод для pic
    }

    if(isset($routes[3])) {
       $get = $routes[3]; //получение id для pic
    }
    $controller = ucfirst(strtolower($controller)) . 'Controller';
//    var_dump($controller);
    $action = strtolower($action) . 'Action';
//    var_dump($action);
    
    if (!class_exists($controller)) {
        var_dump("класс не найден");
        return false;
    }
    if (!method_exists($controller, $action)) {
        var_dump("метод не найден");
        return false;
    }
    $controller = new $controller();
    $controller->$action($get);
}