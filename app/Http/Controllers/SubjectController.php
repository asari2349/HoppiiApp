<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function select(Subject $subjects)
    {   
        $user = User::find(Auth::user()->id);
        $usersubjects = $user->subjects()->get();
        $userposteds = $user->posts()->get();

        return view('/posts/select')->with(['usersubjects' => $usersubjects,'userposteds' => $userposteds]);
    }
}
