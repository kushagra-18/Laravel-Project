<?php

namespace App;


namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CartModel extends Model
{
    
    public static function addCartItems(Request $request)
    {
    //    insert user email id and product id in cart table

        
        echo $request;
        $email = Auth::user()->email;
        $product_id = $request->input('itemId');
        $quantity = 1;
        $data = array('email'=>$email,'product_id'=>$product_id,'quantity'=>$quantity);
        DB::table('cart')->insert($data);

        echo $email;
    }

}
