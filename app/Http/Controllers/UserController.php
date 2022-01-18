<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMetaModel;
use App\Models\UserModel;

class UserController extends Controller
{
    public function checkoutCartFinal(Request $request){

        //check if save-info is true
        if($request->input('save-info') == 'on'){
            //save user info
            $userModel = new UserModel();

            try{
            $userModel->saveUserInfo($request);
            }
            catch(Exception $e){
                echo $e;
            }
        }

        //get product_id
        $product_id = $request->input('product_id');
        $this->saveProductInfo($product_id);
        $this->saveProductBuy($request);

       return "success";
    }



    public function saveProductBuy(Request $request){

        $product_id = $request->input('product_id');
        
       
        try {
            $userModel = new UserModel();
            $userModel->updateBought($product_id);
        } catch (Exception $e) {
            echo $e;
        }
    }


    /**
     * save product_id and user_email in UserMeta tables
     * @param Request $request
     */

    public function saveProductInfo($product_id){
     

        $userMetaModel = new UserMetaModel();
        try{
            $userMetaModel->saveProductInfo($product_id);
        }
        catch(Exception $e){
            echo $e;
        }
    }


}
