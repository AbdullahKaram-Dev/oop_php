<?php

namespace App\Models;

use Core\Db;

class Post
{

    public static function connectTable()
    {
        return Db::getInstance()->table("posts");
    }


}