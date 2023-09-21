<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subject;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('index')->with(['posts' => $post->get()]);
    }
    public function create(Subject $subject)
    {
        return view('create')->with(['subjects' => $subject->get()]);
    }
}
