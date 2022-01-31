<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressValidation;
use App\Models\ProductMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMeta;
use App\Models\User;
use Faker\Provider\ar_JO\Address;

/**

   
 */

class UserController extends Controller
{
    public function checkoutCartFinal(Request $request)
    {

        //validate product_id 

        $this->validate($request, [
            'product_id' => 'required',
        ]);

        //check if save-info is true
        if ($request->input('save-info') == 'on') {

            $request->validate([
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'address' => 'required|max:255',
                'state' => 'required',
                'zip' => 'required|max:255',
            ]);

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
        $this->saveProductBuy($product_id);
        return redirect()->back()->with('success', 'Item purchased successfully. Check your email for confirmation.');
    }


    public function saveProductBuy($product_id)
    {

        try {
            $productMeta = new ProductMeta();
            $productMeta->updateBought($product_id);
        } catch (Exception $e) {
            error_log($e);
        }
    }

    /**
     * save product_id and user_email in UserMeta tables
     * @param Request $request
     */

    public function saveProductInfo($product_id)
    {

        $user_email = Auth::user()->email;
        $userMetaModel = new UserMeta();
        try {
            $userMetaModel->saveProductInfo($product_id, $user_email);
        } catch (Exception $e) {
            echo $e;
        }
    }
}
