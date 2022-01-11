<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\users;
use App\Models\PostModel;


class PostController extends Controller
{
    // get data from posts table
    public function index()
    {
        //return data from getTrendingPosts function
        $posts = PostModel::getTrendingPosts();
        return view('welcome', compact('posts'));
        
    }

}
