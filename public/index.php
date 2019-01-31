<?php //
ini_set('display_errors', 'On');

require_once __DIR__ . '/../vendor/autoload.php';
//setcookie('rainbow', 'mainpage', time() + 900);

$request = new \Larissolb\Rainbow\Base\Request(); // получаем запрос
session_start();
$file = __DIR__ . '/../config.json';
$app = new Larissolb\Rainbow\Base\Application($file);
$response = $app->handleRequest($request);  // обрабатываем запрос
$response->send();


//json_decode("json string", true); //декодирует строчку json
//json_encode(); //кодирует строчку json

//$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
//    $file = __DIR__ . '/../config.json';
//    $config = json_decode(file_get_contents($file), true);
//    $urls = $config['urls'];
//    var_dump($urls);
//    foreach ($urls as $name => $data){
//        $arr = explode("::", $data['controller']);
//        var_dump($arr);
//            $r->addRoute($data['method'], $data['path'], [$arr[0], $arr[1]]);    
//        
//    }
//      $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
//});

// Fetch method and URI from somewhere
//$httpMethod = $_SERVER['REQUEST_METHOD'];
//$uri = $_SERVER['REQUEST_URI'];
//
//// Strip query string (?foo=bar) and decode URI
//if (false !== $pos = strpos($uri, '?')) {
//    $uri = substr($uri, 0, $pos);
//}
//$uri = rawurldecode($uri);
//
//$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
//switch ($routeInfo[0]) {
//    case FastRoute\Dispatcher::NOT_FOUND:
//        // ... 404 Not Found
//        var_dump('404 Not Found');
//        break;
//    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
//        $allowedMethods = $routeInfo[1];
//        // ... 405 Method Not Allowed
//        var_dump('405 Method Not Allowed');
//        break;
//    case FastRoute\Dispatcher::FOUND:
//        $handler = $routeInfo[1];
//        $controller = $handler[0];
//        $action = $handler[1];
//        
//        $vars = $routeInfo[2];
//        // ... call $handler with $vars
//        var_dump($vars);
//        
//        $controller = new $controller();
//        $controller->$action($vars);
//        
//        break;
//}

//   
//run();
//
//function run() {
//    $controller = 'Index';
//    $action = 'index';
//    $get = null;
//    $routes = explode('/', $_SERVER['REQUEST_URI']); 
////    var_dump($routes);
//
//    if($routes[1]) {
//        $controller = $routes[1]; //страница 1 уровня
//    }
//    if($routes[1] === 'about') {
//        $controller = 'Index'; //страница 1 уровня
//    }
//    if($routes[1] === 'pencils' || $routes[1] === 'markers' || $routes[1] === 'paints'){
//        $controller = 'rating';
//    }
////    var_dump($controller);
//    if($routes[1] === 'pencils'){
//        $action = 'pencils';
//    }
//    if($routes[1] === 'markers'){
//        $action = 'markers';
//    }
//    if($routes[1] === 'paints'){
//        $action = 'paints';
//    }
//    if($routes[1] === 'about'){
//        $action = 'about';
//    }
//    if(isset($routes[2])) {
//        $action = $routes[2]; // метод для pic
//    }
////    var_dump($action);
//
//    if(isset($routes[3])) {
//       $get = $routes[3]; //получение id для pic
//    }
//    $controller = 'Larissolb\Rainbow\Controllers\\'. ucfirst(strtolower($controller)) . 'Controller';
////    var_dump($controller);
//    $action = strtolower($action) . 'Action';
////    var_dump($action);
//    
//    if (!class_exists($controller)) {
//        var_dump("класс не найден");
//        return false;
//    }
//    if (!method_exists($controller, $action)) {
//        var_dump("метод не найден");
//        return false;
//    }
//    $controller = new $controller();
//    $controller->$action($get);
//}