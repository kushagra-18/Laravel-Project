<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostModel extends Model
{

    /**
     * Posts table can use the following columns
     */

    protected $fillable = [
        'title', 'description', 'price', 'category', 'image', 'user_id', 'quantity', 'status', 'created_at', 'updated_at'
    ];

    /**
     * @description : This function is used to get top 6 posts from the database.
     * whose discount is most
     * discount is calculated by subtracting original price from revised price
     * join on product meta table to get the ratings of the product
     * @return : array of posts
     * @author : Kushagra Sharma
     */


    public function getTopDeals()
    {

        $posts = DB::table('posts')
            ->join('product_meta', 'posts.id', '=', 'product_meta.product_id')
            ->select('*', DB::raw('(posts.price_original - posts.price_revised) as discount'))
            ->orderBy('discount', 'desc')
            ->limit(6)
            ->get();


        $this->helperRating($posts);

        foreach ($posts as $post) {

            if ($post->discount_till != null) {
                $post->discount_till  = Carbon::parse($post->discount_till);
                $post->discount_till = $post->discount_till->diffForHumans();
            }
        }

        return $posts;
    }

    public function getTrendingPosts()
    {

        $posts = DB::table('posts')
            ->join('product_meta', 'posts.id', '=', 'product_meta.product_id')
            ->select('*', DB::raw('(posts.price_original - posts.price_revised) as discount'))
            ->orderBy('discount', 'desc')
            ->limit(6)
            ->get();

        //calculate the rating of the product and set it to the post using loop

        $this->helperRating($posts);

        foreach ($posts as $post) {

            if ($post->discount_till != null) {
                $post->discount_till  = Carbon::parse($post->discount_till);
                $post->discount_till = $post->discount_till->diffForHumans();
            }
        }

        // error_log(print_r($posts, true));

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


    public function helperRating($posts)
    {
        foreach ($posts as $post) {

            $totRating = $post->rating_one * 1 +
                $post->rating_two * 2 +
                $post->rating_three * 3 +
                $post->rating_four * 4 +
                $post->rating_five * 5;

            $post->ratingCount = $post->rating_one + $post->rating_two + $post->rating_three + $post->rating_four + $post->rating_five;

            try {
                $post->avgRating = round($totRating / $post->ratingCount, 1);
            } catch (Exception $e) {
                $post->avgRating = 0;
            }
        }
    }
}
