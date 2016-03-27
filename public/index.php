<?php
use App\Kernel\Autoloader;
use App\Kernel\Container;
use App\Kernel\Router;

/******************
*  Configuration  *
******************/

// Enable all error levels
error_reporting(-1);
// Output all errors to the browser (should only be used in development)
ini_set('display_errors', 1);

// Define some global constants
define('CONTROLLER_DIR', realpath(__DIR__ . '/../controllers'));
define('VIEW_DIR', realpath(__DIR__ . '/../views'));


/*******************
*  Initialization  *
*******************/

// Handles the PHPSESSID cookie and populates the $_SESSION array with the users data
session_start();

// This is the only require in the project
require __DIR__ . '/../App/Kernel/Autoloader.php';

// Initialize and configure the autoloader
$loader = new Autoloader();
$loader->addNamespace('App', __DIR__ . '/../App');
$loader->register();

// Initialize and configure the dependency injection container
$container = new Container();
$container->bindArguments('App\\Controller\\QuestionController', ['scoreLimit' => 3]);


/************
*  Routing  *
************/

$router = new Router();
$router->addRoute('GET', '/', ['App\\Controller\\LoginController', 'Login']);
$router->addRoute('GET', '/score.html', ['App\\Controller\\ScoreController', 'showScore']);

$router->addRoute('POST', '/', ['App\\Controller\\QuestionController', 'answerQuestion']);

// Convert i.e. "/foo%40bar?id=1" to "/foo@bar"
$uri = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$route = $router->match($_SERVER['REQUEST_METHOD'], $uri);

if ($route === null) {
    $route = [
        'handle' => ['App\\Controller\\ErrorController'],
        'arguments' => []
    ];
}

$controller = $container->create($route['handle'][0]);
$container->call([$controller, $route['handle'][1]], $route['arguments']);
