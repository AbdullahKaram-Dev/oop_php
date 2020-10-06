<?php

namespace Core;


class View
{

    public static function load(string $path, array $data = [])
    {
        $file_path = "../app/Views/$path.php";
        if (file_exists($file_path)) {

            extract($data);
            require_once "$file_path";
        }
    }

}