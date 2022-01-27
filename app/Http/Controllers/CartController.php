<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\CartModel;

class CartController extends Controller
{

    //create const user_email from auth
   public function __construct()
   {
    //    $this->USER_EMAIL = Auth::user()->email;
    //    $this->USER_ID  = Auth::user()->id;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartModel = new CartModel();
        try {
            $cartModel->addCartItems($request);
            return  back();
        } catch (Exception $e) {
            error_log($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $isEmpty = false;
        $id = Auth::user()->id;
        //show cart items and return 
        $cartModel = new CartModel();
        $cartItemsShow = $cartModel->showCartItems($id);
        //find if query return any data 
        if (count($cartItemsShow) == 0) {
            $isEmpty = true;
            return view('cart', compact('isEmpty'));
        } else {
            return view('cart', compact('cartItemsShow', 'isEmpty'));
        }
    }

   /**
     * This function is used to delete cart items
     * @param  int  $id
     * @return {NULL}
     */
    public function destroy(Request $request)
    {
        $cartModel = new CartModel();
        try {
            $cartModel->deleteCartItems($request);
            return  $this->show();
        } catch (Exception $e) {
            error_log($e);
        }
    }



    /**
     * @description function used for final checkout
     * @param  $id
     * @return {View}
     */

    public function checkoutCart($id)
    {

        $cartModel = new CartModel();
        $cartItemsShow = $cartModel->checkoutItem($id);

        $checkSavedAddress = $cartModel->checkSavedAddress();

        $getSavedAddress = $cartModel->getSavedAddress();
        
        return view('checkout', compact('cartItemsShow', 'checkSavedAddress', 'getSavedAddress'));
    }

    public function cartNumber()
    {
        $cartModel = new CartModel();
        $cartItemsShow = $cartModel->cartNumber();
        return $cartItemsShow;
    }
}