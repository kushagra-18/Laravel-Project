<?php

namespace App;


namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class CartModel extends Model
{
    
    public function addCartItems(Request $request)
    {
    //    insert user email id and product id in cart table

        $email = Auth::user()->email;
        $product_id = $request->input('itemId');
        $quantity = 1;
        $data = array('email'=>$email,'product_id'=>$product_id,'quantity'=>$quantity);
        DB::table('cart')->insert($data);

    }

    public function showCartItems($id){

        if(!Auth::check()){
            return redirect('/login');
        }

        $cartItems = DB::table('cart')
        ->join('users', 'cart.email', '=', 'users.email')
        ->join('posts', 'cart.product_id', '=', 'posts.id')
        ->where('users.id', '=', $id)
        ->get();

       return $cartItems;
    }


    public function deleteCartItems($request){

        if(!Auth::check()){
            return redirect('/login');
        }
      
        try{
            DB::table('cart')->where('product_id', '=', $request->input('itemId'))->where('email', '=', Auth::user()->email)->delete();
        }catch(Exception $e){
            return $e;
        }

    }

}
