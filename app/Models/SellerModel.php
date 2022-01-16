<?php

namespace App;


namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class SellerModel extends Model
{
    public function addProduct($data)
    {
        echo $data;
        DB::table('seller')->insert($data);
    }

    /**
     * @description : This function is used to get the data from the posts table
     * based on seller's email
     * @return : array of posts
     * @author : Kushagra Sharma
     */

    public function getSellerInfo()
    {
        $seller_email = Auth::user()->email;
        $seller_info = DB::table('posts')->where('seller_email', $seller_email)->get();
        return $seller_info;
    }
}
