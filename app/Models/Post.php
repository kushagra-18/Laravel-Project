<?php

namespace App;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class Post extends Model
{
    /**
     * Posts table can use the following columns
     */
    protected $table = 'posts';

    protected $fillable = [
        'title', 'description', 'price',
        'category', 'image', 'user_id',
        'quantity', 'status', 'created_at',
        'updated_at', 'discount_till'
    ];


    public function getDiscountTillAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }


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

        $posts = self::join('product_meta', 'posts.id', '=', 'product_meta.product_id')
            ->select('*')
            ->orderByRaw('(posts.price_original - posts.price_revised) DESC')
            ->limit(6)
            ->get();



        // $post = self::whereIn('emp_id', function ($query) use ($empid){

        //     $query->select('emp_id')

        //         ->from('employees')

        //         ->where('m_id',$empid)

        //         ->where('status',0);

        // })->get();

        $this->helperRating($posts);

        return $posts;
    }

    public function getProduct($id)
    {
        $posts = Post::where('id', $id)->get();

        return $posts;
    }


    public function getTrendingPosts()
    {

        $posts = self::select('*')
            ->join('product_meta', 'posts.id', '=', 'product_meta.product_id')
            ->orderByRaw('(posts.price_original - posts.price_revised) DESC')
            ->limit(6)
            ->get();

        error_log("posts: " . print_r($posts, true));

        $this->helperRating($posts);

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

        $posts = self::where('category', $category)->paginate(6);

        return $posts;
    }

    public function searchItems($search)
    {
        //search items from the database on titie and tags

        $posts = self::where('title', 'like', '%' . $search . '%')
            ->orWhere('tags', 'like', '%' . $search . '%')
            ->paginate(6);

        return $posts;
    }

    public function sortPostsByCategory($category, $sort)
    {

        if ($sort == 'newest') {
            $posts = self::where('category', $category)->orderBy('created_at', 'desc')->paginate(10);
        } elseif ($sort == 'oldest') {
            $posts = self::where('category', $category)->orderBy('created_at', 'asc')->paginate(10);
        } elseif ($sort == 'price_low_high') {
            $posts = self::where('category', $category)->orderBy('price_revised', 'asc')->paginate(10);
        } elseif ($sort == 'price_high_low') {
            $posts = self::where('category', $category)->orderBy('price_revised', 'desc')->paginate(10);
        } elseif ($sort == 'rating_high_low') {
            $posts = self::where('category', $category)->orderBy('rating', 'desc')->get()->paginate(10);
        } elseif ($sort == 'rating_low_high') {
            $posts = self::where('category', $category)->orderBy('rating', 'asc')->get()->paginate(10);
        }

        return $posts;
    }

    public function addProduct($data)
    {
        self::insert($data);
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

    public function checkoutItem($id)
    {
        //get details of the items of the post table corresponding to the id
        $cartItems = self::where('id', $id)
            ->get();

        return $cartItems;
    }

    public function getSellerInfo()
    {

        $sellerProducts = self::join('product_meta', 'posts.id', '=', 'product_meta.product_id')
            ->select("*")
            ->paginate(6);

        return $sellerProducts;
    }


    /**
     * Function to get all the products avaiable in the database
     * along with certain filters
     * most recent, price low to high, price high to low, rating high to low, rating low to high
     * will be used for the API calls
     */

    public function getAllProductsAPI($sort = "", $category = "", $page = "")
    {

        if ($sort == "") {
            $sort = "newest";
        }
        if ($category == "") {
            $category = "";
        }
        if ($page == "") {
            $page = 1;
        }
    

        if ($sort == 'newest') {
            $posts = self::where('category', $category)->offset($page)->limit(5)->orderBy('created_at', 'desc')->get();
        } elseif ($sort == 'oldest') {
            $posts = self::where('category', $category)->offset($page)->limit(5)->orderBy('created_at', 'asc')->get();
        } elseif ($sort == 'price_low_high') {
            $posts = self::where('category', $category)->offset($page)->limit(5)->orderBy('price_revised', 'asc')->get();
        } elseif ($sort == 'price_high_low') {
            $posts = self::where('category', $category)->offset($page)->limit(5)->orderBy('price_revised', 'desc')->get();
        } elseif ($sort == 'rating_high_low') {
            $posts = self::where('category', $category)->offset($page)->limit(5)->orderBy('rating', 'desc')->get()->get();
        } elseif ($sort == 'rating_low_high') {
            $posts = self::where('category', $category)->offset($page)->limit(5)->orderBy('rating', 'asc')->get()->get();
        } else {
            $posts = self::get();
        }

        return $posts;
    }
}
