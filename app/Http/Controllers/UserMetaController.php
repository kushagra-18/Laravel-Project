<?php

namespace App\Http\Controllers;

use App\Models\UserMetaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

class UserMetaController extends Controller
{

    /**Controller for
     * show details of products added by user in the meta table
     * join user_meta table with product table
     * @return \Illuminate\Http\Response
     */

    public function showUserDetails()
    {

        $userMetaModel = new UserMetaModel();

        try {

            $userMeta = $userMetaModel->showUserDetails();
            
            return view('user', compact('userMeta'));
            

        } catch (Exception $e) {
            return $e;
        }
    }
}
