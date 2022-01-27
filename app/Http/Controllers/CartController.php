<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\Cart;

class CartController extends Controller
{


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
        $cartModel = new Cart();
        try {
            $cartModel->addCartItems($request);
            return  back();
        } catch (Exception $e) {
            error_log($e);
        }
    }

    /**
     * Display the specified resource.
     * @return view
     */
    public function show()
    {
        $isEmpty = false;
        $id = Auth::user()->id;
        //show cart items and return 
        $cartModel = new Cart();
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
     * @throws Exception
     */
    public function destroy(Request $request)
    {
        $cartModel = new Cart();
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

        $cartModel = new Cart();
        $cartItemsShow = $cartModel->checkoutItem($id);

        $checkSavedAddress = $cartModel->checkSavedAddress();

        $getSavedAddress = $cartModel->getSavedAddress();

        return view('checkout', compact('cartItemsShow', 'checkSavedAddress', 'getSavedAddress'));
    }

    public function cartNumber()
    {
        $cartModel = new Cart();
        $cartItemsShow = $cartModel->cartNumber();
        return $cartItemsShow;
    }
}