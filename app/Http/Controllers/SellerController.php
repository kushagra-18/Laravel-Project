<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    

    public function index()
    {
        return view('sellerProduct');
    }

    public function addProduct(Request $request)
    {
        
        //add products to seller_product table coming from request

        $seller_id = Auth::user()->id;
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $product_description = $request->input('product_description');
        $product_image = $request->input('product_image');
        $data = array('seller_id' => $seller_id, 'product_name' => $product_name, 'product_price' => $product_price, 'product_description' => $product_description, 'product_image' => $product_image);


    }
}