<?php

namespace App\Controllers;

use App\Models\Post;
use Core\View;

class PostController
{

    public function index()
    {
       $data['posts'] = Post::connectTable()->select()->get();
       View::load("posts/view",$data);
    }

    public function create()
    {
        echo 'this is from create method';
    }

    public function show($id)
    {
        echo 'this is ' . $id;
    }

    public function edit()
    {

    }

    public function store()
    {

    }

}