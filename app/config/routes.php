<?php
/*
|--------------------------------------------------------------------------
| Routing
|--------------------------------------------------------------------------
|
| Here you can list below all routes used by your application 
|
| Examples :
|
| Add single route : 
| $router->add('/hello', 'index::hello');
| 	-> Will execute indexController and helloAction method
| 
| Name the route :
| $router->add('/hello', 'index::hello')->setName('hello-world');
| 
| 
| For more details about routing system : 
| @link http://docs.phalconphp.com/en/latest/reference/routing.html
| 
*/
$router->add('/', 'hello::index');


