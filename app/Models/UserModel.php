<?php

namespace App;

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;
class UserModel extends Model
{

    public function saveUserInfo($request)
    {

        //save information in user_address coming from request
        $email = Auth::user()->email;
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $address = $request->input('address');
        $address2 = $request->input('address2');
        $city = "Bhiwadi";
        $state = $request->input('state');
        $zip = $request->input('zip');
        //current time stamp IST
        $created_at = date('Y-m-d H:i:s');

        $data = array('email' => $email, 'first_name' => $first_name, 'last_name' => $last_name, 'address' => $address, 'address2' => $address2, 'city' => $city, 'state' => $state, 'zip' => $zip, 'created_at' => $created_at);

        DB::table('user_address')->insert($data);
    }


    //update bought by + 1 corresponding to product_id product_meta table IF PRODUCT EXITS ELSE INSERT
    public function updateBought($product_id)
    {
        $product_meta = DB::table('product_meta')->where('product_id', $product_id)->get();
        if (count($product_meta) > 0) {
            DB::table('product_meta')->where('product_id', $product_id)->increment('bought');
        } else {
            $data = array('product_id' => $product_id, 'bought' => 1);
            DB::table('product_meta')->insert($data);
        }
    }

}
