<?php
require_once __DIR__ . '/../private/Base/Controller.php';
require_once __DIR__ . '/../private/Controllers/IndexController.php';
require_once __DIR__ . '/../private/Controllers/ShareController.php';
require_once __DIR__ . '/../private/Controllers/PencilsController.php';

run();
function run() {
    $controller = 'Index';
    $action = 'index';
    $get = null;
    $routes = explode('/', $_SERVER['REQUEST_URI']); 
//    var_dump($routes);
    if($routes[1]) {
        $controller = $routes[1]; //след.страницы
    }

    $controller = ucfirst(strtolower($controller)) . 'Controller';

    $action = strtolower($action) . 'Action';
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