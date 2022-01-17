<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;


class ProductPageModel extends Model
{
    /**
     *  @description check if user has bought the product from database
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function checkIfBought($id)
    {
        try {
            $checkIfBought = DB::table('user_meta')
                ->where('product_id', '=', $id)
                ->where('user_email', '=', Auth::user()->email)
                ->get();
        } catch (Exception $e) {
            return $e;
        }

        if (count($checkIfBought) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
