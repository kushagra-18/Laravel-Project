<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellerModel;
use App\Models\PostModel;
use Exception;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{

    public function index()
    {
        return view('sellerProduct');
    }


    

    public function sellerView()
    {
        //create object of seller model
        $sellerModel = new SellerModel();
        //get seller info
        $product = $sellerModel->getSellerInfo();

        return view('sellerInfo', ['products' => $product]);
    }

    public function addProduct(Request $request)
    {


        $this->validate($request, [
            'product_name' => ['required', 'max:255'],
            'product_description' => ['required', 'min:50'],
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:6144',
            'product_category' => 'required',
            'quantity' => 'required|numeric',
            'product_price_original' => 'required|numeric',
            'product_price_revised' => 'required|numeric',
            'tags' => 'required',
            'product_discount_till' => 'required',
            'product_key_points' => 'required',
        ]);

        $seller_email = Auth::user()->email;

        $product_name = $request->input('product_name');

        $product_price_original = $request->input('product_price_original');

        $product_price_revised = $request->input('product_price_revised');

        $product_description = $request->input('product_description');

        $product_image = $this->addImageStorage($request);

        $product_category = $request->input('product_category');

        $quantity = $request->input('quantity');

        $tags = $request->input('tags');

        $product_discount_till = $request->input('product_discount_till');

        $product_discount_till = $request->input('product_discount_till');

        $product_key_points = $request->input('product_key_points');

        $data = array(
            'title' => $product_name, 'price_original' => $product_price_original,
            'description' => $product_description, 'thumbnail' => $product_image,
            'tags' => $tags, 'quantity' => $quantity,
            'category' => $product_category, 'discount_till' => $product_discount_till,
            'product_key_points' => $product_key_points,
            'price_revised' => $product_price_revised,
            'seller_email' => $seller_email
        );

     



        $PostModel = new PostModel();

        try {
            $PostModel->addProduct($data);
             return redirect('/seller')->with('success', 'Product added successfully');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }




    public function addImageStorage(Request $request)
    {

        //add image to storage and get path
        $image = $request->file('product_image');
        $image_name = $image->getClientOriginalName();

        try {
            $image->move(public_path('products'), $image_name);

            $image_path = '../' . 'products/' . $image_name;


            return $image_path;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
