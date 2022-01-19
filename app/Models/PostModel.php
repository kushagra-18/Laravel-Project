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

    /**
     * @description : This function is used to get top 6 posts from the database.
     * whose discount is most
     * discount is calculated by subtracting original price from revised price
     * @return : array of posts
     * @author : Kushagra Sharma
     */


    public function getTopDeals()
    {

        $posts = DB::table('posts')
            ->select('posts.*', DB::raw('(posts.price_original - posts.price_revised) as discount'))
            ->orderBy('discount', 'desc')
            ->limit(6)
            ->get();

        foreach ($posts as $post) {

            if ($post->discount_till != null) {
                $post->discount_till  = Carbon::parse($post->discount_till);
                $post->discount_till = $post->discount_till->diffForHumans();
            }
        }

        return $posts;
    }


    public static function getTrendingPosts()
    {


        $posts = DB::table('posts')
            ->select('posts.*')
            ->join('product_meta', 'posts.id', '=', 'product_meta.product_id')
            ->orderBy('bought', 'desc')
            ->limit(6)
            ->get();
        
        // $posts = DB::table('posts')->limit(6)->get();

        foreach ($posts as $post) {

            if ($post->discount_till != null) {
                $post->discount_till  = Carbon::parse($post->discount_till);
                $post->discount_till = $post->discount_till->diffForHumans();
            }
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

    public function getPostsByCategory($category)
    {
        $posts = DB::table('posts')->where('category', $category)->paginate(10);
        return $posts;
    }

    public function searchItems($search)
    {
        //search items from the database on titie and tags
        $posts = DB::table('posts')->where('title', 'like', '%' . $search . '%')
            ->orWhere('tags', 'like', '%' . $search . '%')->paginate(10);


        return $posts;
    }


    public function sortPostsByCategory($category, $sort)
    {

        if ($sort == 'newest') {
            $posts = DB::table('posts')->where('category', $category)->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($sort == 'oldest') {
            $posts = DB::table('posts')->where('category', $category)->orderBy('created_at', 'asc')->paginate(10);
        } elseif ($sort == 'price_low_high') {
            $posts = DB::table('posts')->where('category', $category)->orderBy('price_revised', 'asc')->paginate(10);
        } elseif ($sort == 'price_high_low') {
            $posts = DB::table('posts')->where('category', $category)->orderBy('price_revised', 'desc')->paginate(10);
        } elseif ($sort == 'rating_high_low') {
            $posts = DB::table('posts')->where('category', $category)->orderBy('rating', 'desc')->get()->paginate(10);
        } elseif ($sort == 'rating_low_high') {
            $posts = DB::table('posts')->where('category', $category)->orderBy('rating', 'asc')->get()->paginate(10);
        }
        return $posts;
    }

    public function addProduct($data)
    {
        DB::table('posts')->insert($data);
    }
}
