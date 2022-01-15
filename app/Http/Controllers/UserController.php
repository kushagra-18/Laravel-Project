<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
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

       return "success";
    }
}
