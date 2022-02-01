<?php

namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $table = 'cart';

    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'price', 'total_price'
    ];

    public function addCartItems($data)
    {
        //    insert user email id and product id in cart table
        self::insert($data);
    }

    public function showCartItems($id)
    {

        $cartItems = self::join('users', 'cart.email', '=', 'users.email')
            ->join('posts', 'cart.product_id', 'posts.id')
            ->where('users.id', '=', $id)
            ->get();

        return $cartItems;
    }

    public function deleteCartItems($itemId,$email)
    {
        self::where('product_id', $itemId)->where('email', $email)->delete();
    }

    public function cartNumber($email)
    {
        $cartNumber = self::where('email', $email)
            ->count();

        //if cart is empty return 0
        if ($cartNumber == 0) {
            return 0;
        } else {
            return $cartNumber;
        }
    }
}
