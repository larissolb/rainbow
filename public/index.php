<?php
ini_set('display_errors', 'On');

//соединение с базой данных rainbow
$server = 'rainbow';
$db_name = 'rainbow'; //имя базы данных
$username = 'larissolb';
$pwd = 'pwd';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

];

function dbConnect($server, $db_name, $username, $pwd, array $opt=[]) {
    return new PDO("mysql:host=$server;dbname=$db_name",
            $username, $pwd, $opt);
}

try {

$connection = dbConnect($server, $db_name, $username, $pwd, $options); 
var_dump("connection is good");

} catch (PDOException $exception) {
    var_dump($exception->getTrace());
}

//require_once __DIR__ . '/../private/Base/Controller.php';
//require_once __DIR__ . '/../private/Controllers/IndexController.php';
//require_once __DIR__ . '/../private/Controllers/ShareController.php';
//require_once __DIR__ . '/../private/Controllers/PencilsController.php';
//require_once __DIR__ . '/../private/Models/PicModel.php';
require_once __DIR__ . '/../vendor/autoload.php';

run();

function run() {
    $controller = 'Index';
    $action = 'index';
    $get = null;
    $routes = explode('/', $_SERVER['REQUEST_URI']); 
//    var_dump($routes);

    if($routes[1]) {
        $controller = $routes[1]; //страница 1 уровня
    }
    if($routes[1] === 'about') {
        $controller = 'Index'; //страница 1 уровня
    }
    if($routes[1] === 'pencils' || $routes[1] === 'markers' || $routes[1] === 'paints'){
        $controller = 'rating';
    }
//    var_dump($controller);
    if($routes[1] === 'pencils'){
        $action = 'pencils';
    }
    if($routes[1] === 'markers'){
        $action = 'markers';
    }
    if($routes[1] === 'paints'){
        $action = 'paints';
    }
    if($routes[1] === 'about'){
        $action = 'about';
    }
    if(isset($routes[2])) {
        $action = $routes[2]; // метод для pic
    }
//    var_dump($action);

    if(isset($routes[3])) {
       $get = $routes[3]; //получение id для pic
    }
    $controller = 'Larissolb\Rainbow\Controllers\\'. ucfirst(strtolower($controller)) . 'Controller';
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