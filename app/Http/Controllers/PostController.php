<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\users;
use App\Models\ProductPage;
use App\Models\Post;

class PostController extends Controller
{
    // get data from posts table
    public function index()
    {
        //return data from getTrendingPosts function
        $postModel = new Post();

        $posts = $postModel->getTrendingPosts();

        //return data from getTopDeals function
        $topDeals = $postModel->getTopDeals();

        return view('welcome', compact('posts', 'topDeals'));
    }

    /**
     * This function is used to get the data from the posts table
     * based on category of the items
     * Items will be paginated
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 
     */

    public function category($category)
    {

        //create object of PostModel class
        $postModel = new Post();
        $posts = $postModel->getPostsByCategory($category);
        //return view with data
        $isEmpty = false;
        return view('category', compact('posts','isEmpty'));
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

    public function searchItems(Request $request)
    {

        $search  = $request->input('search-bar');

       // echo $search;

        $postModel = new Post();
        $posts = $postModel->searchItems($search);

        $isEmpty = false;

        //check if search is empty
        if(count($posts) == 0){

            $isEmpty = true;

            return view('category', compact('posts','isEmpty'));
        }

        $posts->appends(['search-bar' => $search]);

        return view('category', compact('posts','isEmpty'));
    }

    public function categorySort($category, $sort)
    {

        //create object of PostModel class
        $postModel = new Post();

        $posts = $postModel->sortPostsByCategory($category, $sort);

        $isEmpty = false;

        //check if search is empty
        if(count($posts) == 0){

            $isEmpty = true;
        }
        
        return view('category', compact('posts','isEmpty'));
    }
}
