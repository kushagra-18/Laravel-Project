<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\CartModel;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        try{
            $cartModel->addCartItems($request);
            return  $this->show();
        }catch(Exception $e){
            return $e;
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
        if(count($cartItemsShow) == 0){
            $isEmpty = true;
            return view('cart', compact('isEmpty'));
        }
        else{
            return view('cart', compact('cartItemsShow','isEmpty'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * This function is used to delete cart items
     * @param  int  $id
     * @return {NULL}
     */
    public function destroy(Request $request)
    {
        $cartModel = new CartModel();
        try{
            $cartModel->deleteCartItems($request);
            return  $this->show();
        }catch(Exception $e){
            return $e;
        }
    }


    public function checkoutCart($id){

        $cartModel = new CartModel();
        $cartItemsShow = $cartModel->checkoutItem($id);

        $checkSavedAddress = $cartModel->checkSavedAddress();

        $getSavedAddress = $cartModel->getSavedAddress();

        return view('checkout', compact('cartItemsShow','checkSavedAddress','getSavedAddress'));

    }

    
}
