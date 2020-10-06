
<?php

use Core\Route;

$route = new Route;
$num = "([\d]+)";
$str = "([\w-]+)";

$route->get('', "HomeController@index");
$route->get("post/index", "PostController@index");
$route->get("post/show/$num", "PostController@show");
$route->get("post/edit/$num", "PostController@edit");
$route->get("post/create", "PostController@create");
$route->post("post/store", "PostController@store");