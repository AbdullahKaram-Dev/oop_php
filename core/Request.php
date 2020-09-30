<?php

namespace Core;

class Request
{

    public function get(string $key, $value = null)
    {
      return $_GET['key'] = ($value) ? $value : (isset($_GET[$key]) ? $_GET[$key] : $value);
    }

    public function post(string $key, $value = null)
    {
        return $_POST['key'] = ($value) ? $value : (isset($_POST[$key]) ? $_POST[$key] : $value);
    }

    public function cookie(string $key, $value = null)
    {
        return $_COOKIE['key'] = ($value) ? $value : (isset($_COOKIE[$key]) ? $_COOKIE[$key] : $value);
    }

    public function server(string $key)
    {
        return $_SERVER[$key];
    }

    public function serverAll()
    {
        foreach ($_SERVER as $key => $value){

                echo "<strong>$key</strong> : $value <br>";
        }

    }


}