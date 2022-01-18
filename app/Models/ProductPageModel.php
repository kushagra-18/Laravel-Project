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

    /**
     * update rating corresponding to the product id based on number
     * of stars given by the user.
     * if rating is already present, update it
     * if rating is one star, update the field corresponding to rating_one
     * if rating is two stars, update the field corresponding to it rating_two so on
     * @param  Request $request
     */

    public function productMetaRating(Request $request)
    {


        $product_id = $request->input('itemId');
        $rating = $request->input('stars');

        //$email = Auth::user()->email;

        //error_log("produsssct id: " . $product_id);


        if ($rating == 1) {
            error_log("rating: " . $rating);
            try {

                DB::table('product_meta')->where('product_id', $product_id)
                    ->increment('rating_one');
            } catch (Exception $e) {
                error_log($e);
                return $e;
            }
        } else if ($rating == 2) {
            try {
                DB::table('product_meta')
                    ->where('product_id', '=', $product_id)
                    ->increment('rating_two');
            } catch (Exception $e) {
                error_log($e);
            }
        } else if ($rating == 3) {
            try {
                DB::table('product_meta')
                    ->where('product_id', '=', $product_id)
                    ->increment('rating_three');
            } catch (Exception $e) {
                error_log($e);
            }
        } else if ($rating == 4) {
            try {
                DB::table('product_meta')
                    ->where('product_id', '=', $product_id)
                    ->increment('rating_four');
            } catch (Exception $e) {
                error_log($e);
            }
        } else if ($rating == 5) {
            try {
                DB::table('product_meta')
                    ->where('product_id', '=', $product_id)
                    ->increment('rating_five');
            } catch (Exception $e) {
                error_log($e);
            }
        }
    }
}
