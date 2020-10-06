<?php

require_once "vendor/autoload.php";

use Core\Validation\Validator;


$request = [

    [
        "name" => "name",
        "value" => "",
        "rules" => "required|str"
    ],

    [
        "name" => "age",
        "value" => "test",
        "rules" => "required|numeric"

    ],

];

$result = Validator::make($request);

echo '<pre>';
print_r($result);
echo '</pre>';










