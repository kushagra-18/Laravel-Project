<?php

namespace App;


namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class Seller extends Model
{
    
    // public function addProduct($data)
    // {
    //     echo $data;
    //     DB::table('seller')->insert($data);
    // }

    /**
     * @description : This function is used to get the data from the posts table
     * based on seller's email join on product_meta table on product_id
     * @return : array of posts
     * @author : Kushagra Sharma
     */


    public function getSellerInfo(){

        $sellerProducts = Post::join('product_meta', 'posts.id', '=', 'product_meta.product_id')
            ->select("*")
            ->paginate(6);

            return $sellerProducts;
    }

}
