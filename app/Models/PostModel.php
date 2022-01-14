<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\users;

class PostModel extends Model
{
    public static function getTrendingPosts()
    {
            //fetches all the posts from the posts table from database
            $posts = DB::table('posts')->get();

            //fetch created_at from posts table and convert it to days ago
            foreach ($posts as $post) {
                $post->created_at  = Carbon::parse($post->created_at );
                $post->created_at = $post->created_at->diffForHumans();
            }

            return $posts;
    }

    /**
     * @description This function is used to get the data from the posts table
     * based on category of the items
     * Items will be paginated
     * @param $category
     * @return {array}
     */

    public function getPostsByCategory($category){
        $posts = DB::table('posts')->where('category', $category)->paginate(4);
        return $posts;
    }


    public function sortPostsByCategory($category,$sort){


        if($sort == 'newest'){
            $posts = DB::table('posts')->where('category', $category)->orderBy('created_at', 'desc')->paginate(4);
        }elseif($sort == 'oldest'){
            $posts = DB::table('posts')->where('category', $category)->orderBy('created_at', 'asc')->paginate(4);
        }elseif($sort == 'price_low_high'){
            $posts = DB::table('posts')->where('category', $category)->orderBy('price_revised', 'asc')->paginate(4);
        }elseif($sort == 'price_high_low'){
            $posts = DB::table('posts')->where('category', $category)->orderBy('price_revised', 'desc')->paginate(4);
        }elseif($sort == 'rating_high_low'){
            $posts = DB::table('posts')->where('category', $category)->orderBy('rating', 'desc')->get()->paginate(4);
        }elseif($sort == 'rating_low_high'){
            $posts = DB::table('posts')->where('category', $category)->orderBy('rating', 'asc')->get()->paginate(4);
        }
        return $posts;
    }
}
