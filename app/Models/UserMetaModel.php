<?php

namespace App;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class UserMetaModel extends Model
{

    /**
     * save product_id and user_email in UserMeta tables
     */

    public function saveProductInfo($product_id)
    {

        //get current time 

        $current_time = date("Y-m-d H:i:s");

        $user_email = Auth::user()->email;

        try {
            DB::table('user_meta')->insert(
                ['user_email' => $user_email,'created_at' => $current_time ,'product_id' => $product_id]
            );
        } catch (Exception $e) {
            echo $e;
        }
    }

    /**
     * modelfor
     * show details of posts added by user in the meta table
     * join user_meta table with product table
     * @return \Illuminate\Http\Response
     */

    public function showUserDetails()
    {

        $user_email = Auth::user()->email;
        $userMeta = DB::table('user_meta')
            ->join('posts', 'user_meta.product_id', '=', 'posts.id')
            ->select(
                'posts.id',
                'user_meta.created_at',
                'posts.title',
                'posts.price_original',
                'posts.price_revised',
                'posts.description',
                'posts.category',
                'posts.thumbnail',
            )
            ->where('user_email', '=', $user_email)
            ->get();
            
        return $userMeta;
    }
}
