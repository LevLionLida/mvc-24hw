<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Controller;
use Core\View;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all()->get();
        $arr=['posts'=>$posts];
        View::render('home/index', $arr);
    }
}
