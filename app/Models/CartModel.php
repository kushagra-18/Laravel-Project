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
        $data = array('email' => $email, 'product_id' => $product_id, 'quantity' => $quantity);
        DB::table('cart')->insert($data);
    }

    public function showCartItems($id)
    {

        if (!Auth::check()) {
            return redirect('/login');
        }

        $cartItems = DB::table('cart')
            ->join('users', 'cart.email', '=', 'users.email')
            ->join('posts', 'cart.product_id', '=', 'posts.id')
            ->where('users.id', '=', $id)
            ->get();

        return $cartItems;
    }

    public function checkoutItem($id)
    {

        //get details of the items of the post table corresponding to the id
        $cartItems = DB::table('posts')
            ->where('id', '=', $id)
            ->get();

        return $cartItems;
    }

    public function checkSavedAddress()
    {

        // check if user has saved address and return bool

        try {
            $savedAddress = DB::table('user_address')
                ->where('email', '=', Auth::user()->email)
                ->get();
            if (count($savedAddress) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getSavedAddress()
    {

        // check if user has saved address and return bool

        try {
            $getSavedAddress = DB::table('user_address')
                ->where('email', '=', Auth::user()->email)
                ->get();
        } catch (Exception $e) {
            return $e;
        }

        return $getSavedAddress;
    }

    public function deleteCartItems($request)
    {

        if (!Auth::check()) {
            return redirect('/login');
        }

        try {
            DB::table('cart')->where('product_id', '=', $request->input('itemId'))->where('email', '=', Auth::user()->email)->delete();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function cartNumber()
    {

        try {
            $cartNumber = DB::table('cart')
                ->where('email', '=', Auth::user()->email)
                ->count();
        } catch (Exception $e) {
            return 0;
        }

        //if cart is empty return 0
        if ($cartNumber == 0) {
            return 0;
        } else {
            return $cartNumber;
        }
    }


    /**
     * function is used to update the rating
     * corresponding to the product id iff the user
     * has purchased the product
     * @param  Request $request
     */
    public function rating(Request $request)
    {
        $product_id = $request->input('itemId');
        $rating = $request->input('stars');
        $email = Auth::user()->email;

        error_log("product id: " . $product_id);

        try {
            DB::table('user_meta')
                ->where('product_id', '=', $product_id)
                ->where('user_email', '=', $email)
                ->update(['rating' => $rating]);
        } catch (Exception $e) {
           
           error_log($e);
           
            return $e;
        }
    }
}

