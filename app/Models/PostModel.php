<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
}
