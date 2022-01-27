<?php

namespace App;

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Exception;

class User extends Model
{
    protected $table = 'user_address';

    protected $fillable = [
        'email', 'first_name',
        'last_name',
        'address2', 'address',
        'city', 'state',
        'zip', 'created_at',
    ];

    public function saveUserInfo($data)
    {

        //save information in user_address coming from request

        $userModel = new User();
        try {
            $userModel->insert($data);
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }

    //update bought by + 1 corresponding to product_id product_meta table IF PRODUCT EXITS ELSE INSERT

    public function updateBought($product_id)
    {
        $product_meta = ProductMeta::where('product_id', $product_id)->get();
        if (count($product_meta) > 0) {
            ProductMeta::where('product_id', $product_id)->increment('bought');
        } else {
            $data = array('product_id' => $product_id, 'bought' => 1);
            ProductMeta::insert($data);
        }
    }
}
