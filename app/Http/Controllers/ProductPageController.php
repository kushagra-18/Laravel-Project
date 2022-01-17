<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\users;
use App\Models\PostModel;
use App\Models\ProductPageModel;

class ProductPageController extends Controller
{
    public function index($id)

    {
        $posts = DB::table('posts')->where('id', $id)->get();

        $checkBought = $this->checkBought($id);

        return view('productpage', compact('posts','checkBought'));
    }

    /**
     *  @description check if user has bought the product
     * calls the function in CartModel
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function checkBought($id)
    {
        $cartModel = new ProductPageModel();
        $checkBought = $cartModel->checkIfBought($id);
        return $checkBought;
    }

}
