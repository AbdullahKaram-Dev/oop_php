<?php

spl_autoload_register('getClassFile');

function getClassFile($className)
{
    require_once "$className.php";
}