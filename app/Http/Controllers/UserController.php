<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMeta;
use App\Models\User;

/**
    //TODO: relationships
    //TODO: return view correct way
 */

class UserController extends Controller
{
    public function checkoutCartFinal(Request $request)
    {

        //check if save-info is true
        if ($request->input('save-info') == 'on') {
            //save user info
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

            $userModel = new User();

            try {
                $userModel->saveUserInfo($data);
            } catch (Exception $e) {
                echo $e;
            }
        }

        //get product_id
        $product_id = $request->input('product_id');
        $this->saveProductInfo($product_id);
        $this->saveProductBuy($request);
        return redirect()->back()->with('success', 'Item purchased successfully. Check your email for confirmation.');
    }



    public function saveProductBuy(Request $request)
    {

        $product_id = $request->input('product_id');


        try {
            $userModel = new User();
            $userModel->updateBought($product_id);
        } catch (Exception $e) {
            echo $e;
        }
    }

    /**
     * save product_id and user_email in UserMeta tables
     * @param Request $request
     */

    public function saveProductInfo($product_id)
    {


        $userMetaModel = new UserMeta();
        try {
            $userMetaModel->saveProductInfo($product_id);
        } catch (Exception $e) {
            echo $e;
        }
    }
}
