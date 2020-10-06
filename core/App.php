<?php

namespace Core;

class App
{
    private $controller, $action, $params;

    public function __construct()
    {
        $this->checkRoute();
        $this->render();
    }

    public function checkRoute()
    {
        // accessing $route obj directly without dependency injection
        global $route;

        $request = new Request;
        $requested_url = $request->server('QUERY_STRING');
        $requested_method = $request->server('REQUEST_METHOD');
        $all_routes = $route->getRoutingTable();

        // adding 404 and 405 errors
        // Todos: add default controller@action
        foreach ($all_routes as $url => $info) {
            if (preg_match($url, $requested_url, $matches)) {
                if ($requested_method == $info['method']) {
                    $this->controller = $info['controller'];
                    $this->action = $info['action'];
                    $this->params = array_slice($matches, 1);
                    return true;
                } else {
                    die("405 method not allowed");
                }
            }
        }

        die("404 not found");
    }

    public function render()
    {
        // add the namespace to the class name
        $controller_name = "App\Controllers\\" . $this->controller;

        if (class_exists($controller_name)) {
            $controller_obj = new $controller_name;
            if (method_exists($controller_obj, $this->action)) {
                call_user_func_array(
                    [$controller_name, $this->action],
                    $this->params
                );
            } else {
                die("$this->action not found");
            }
        } else {
            die("$this->controller not found");
        }
    }
}