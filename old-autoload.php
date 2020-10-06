<?php

spl_autoload_register('getClassFile');

function getClassFile($className)
{
    /*$classNameToArray = explode("\\",$className);
    $className = end($classNameToArray);
    require_once "core/$className.php";*/


    $file_path = lcfirst(str_replace('\\',DIRECTORY_SEPARATOR,$className)).".php";
    if (file_exists($file_path)){

        require_once $file_path;
    }


}

