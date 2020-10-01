<?php

spl_autoload_register('getClassFile');

function getClassFile($className)
{
    $classNameToArray = explode("\\",$className);
    $className = end($classNameToArray);
    require_once "core/$className.php";
}

