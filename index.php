<?php

use App\Controllers\TaskController;
use App\Controllers\HelloController;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require __DIR__ . "/vendor/autoload.php";



$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

$collection = new RouteCollection();

$collection->add('list', new Route("/",['controller'=> 'App\controllers\TaskController@index'],[],[],'localhost', ['http'], ['get']) );
$collection->add('create', new Route("/create",['controller'=> 'App\controllers\TaskController@insert' ],[],[],'localhost', ['http'], ['get', 'post']) );
$collection->add('show', new Route("/show/{id?}",['controller'=> 'App\controllers\TaskController@show'],['id'=>'\d+']));
$collection->add('hello', 
        new Route("/hello/{name}",
                ['name'=>'world', 'controller'=> 'App\controllers\HelloController@sayHello' ]));

$matcher = new UrlMatcher($collection, new RequestContext('', $_SERVER['REQUEST_METHOD']));
$generator = new UrlGenerator($collection, new RequestContext());

try{
    $currentRoute = $matcher->match( $pathInfo );
  
    $currentRoute['generator'] =  $generator;

    $controller = $currentRoute['controller'];
    // receive: 'App\controllers\NameController@method'
    $controllerName = substr($controller, 0, strpos($controller, '@') );
    $method = substr($controller, strpos($controller, '@')+1);

    // call controller : 
    ( new $controllerName() )->$method( $currentRoute );

}catch(ResourceNotFoundException $e){
    require 'pages/404.php';
    return;
}
