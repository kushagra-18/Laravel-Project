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
        $postModel = new PostModel();
        $posts = $postModel->getTrendingPosts();

        //return data from getTopDeals function
        $topDeals = $postModel->getTopDeals();

        return view('welcome', compact('posts','topDeals'));
        
    }

    /**
     * This function is used to get the data from the posts table
     * based on category of the items
     * Items will be paginated
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     * 
     */

    public function category($category){

        //create object of PostModel class
        $postModel = new PostModel();
        $posts = $postModel->getPostsByCategory($category);
        //return view with data
        return view('category', compact('posts'));
    }


    /**
     * This function is used to get the data from the posts table
     * based on category of the items
     * items will be sorted
     * Items will be paginated
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */

     public function categorySort($category,$sort){

        //create object of PostModel class
        $postModel = new PostModel();
        $posts = $postModel->sortPostsByCategory($category,$sort);
        return view('category', compact('posts'));
     }
}
