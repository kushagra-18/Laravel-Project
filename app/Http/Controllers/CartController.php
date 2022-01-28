<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\Post;
use App\Models\User;
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

        //validate request

        $this->validate($request, [
            'itemId' => 'required',
        ]);

        $cartModel = new Cart();

        try {

            $email = Auth::user()->email;
            $product_id = $request->input('itemId');
            $quantity = 1;
            $data = array('email' => $email, 'product_id' => $product_id, 'quantity' => $quantity);
            $cartModel->addCartItems($data);
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

        try {
            $cartItemsShow = $cartModel->showCartItems($id);
        } catch (Exception $e) {
            error_log($e);
        }
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

        //validate request
        $this->validate($request, [
            'itemId' => 'required',
        ]);

        $cartModel = new Cart();
        try {
            $itemId =  $request->input('itemId');
            $cartModel->deleteCartItems($itemId, Auth::user()->email);
            return  $this->show();
        } catch (Exception $e) {
            error_log($e);
        }
    }

    /**
     * @description function used for final checkout
     * calls the user model function to check address and get the address 
     * if any.
     * @param  $id
     * @return {View}
     */

    public function checkoutCart($id)
    {

        $cartModel = new Cart();

        $userModel = new User();

        $postModel = new Post();

        $email = Auth::user()->email;

        try {

            $cartItemsShow = $postModel->checkoutItem($id);

            $checkSavedAddress = $userModel->checkSavedAddress($email);

            $getSavedAddress = $userModel->getSavedAddress($email);
            
        } catch (Exception $e) {
            error_log($e);
        }

        return view('checkout', compact('cartItemsShow', 'checkSavedAddress', 'getSavedAddress'));
    }

    /**
     * @description function used to show the
     * number of items in the cart
     * function will be called from AppServiceProvider
     * @return {int}
     * @throws Exception
     */

    public function cartNumber()
    {
        $cartModel = new Cart();
        try {
            $cartNumber = $cartModel->cartNumber(Auth::user()->email);
            return $cartNumber;
        } catch (Exception $e) {
            error_log($e);
        }
    }
}
