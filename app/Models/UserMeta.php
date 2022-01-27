<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class UserMetaModel extends Model
{

    protected $table = 'user_meta';

    protected $fillable = [
        'user_email', 'product_id', 'rating', 'created_at',
    ];

    /**
     * save product_id and user_email in UserMeta tables
     */

    public function saveProductInfo($product_id)
    {
        //get current time 

        $current_time = date("Y-m-d H:i:s");

        $user_email = Auth::user()->email;

        $data = array('user_email' => $user_email, 'product_id' => $product_id, 'created_at' => $current_time);

        $userMeta = new UserMetaModel();

        //using db transactions

        DB::beginTransaction();

        try {

            $userMeta->insert($data);

            DB::commit();
            
        } catch (Exception $e) {

            DB::rollback();

            error_log("Exception: " . $e->getMessage());
        }
    }

    /**
     * modelfor
     * show details of posts added by user in the meta table
     * join user_meta table with posts table
     * @return \Illuminate\Http\Response
     */

     //apend the user_meta table with posts table

    public function showUserDetails()
    {
        $user_email = Auth::user()->email;
        $userMeta = UserMetaModel::join('posts', 'user_meta.product_id', '=', 'posts.id')
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
