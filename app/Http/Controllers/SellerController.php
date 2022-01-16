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

    public function addProduct(Request $request)
    {

        


        // $this->validate($request, [
        //     'product_name' => 'required',
        //     'product_price' => 'required',
        //     'product_description' => 'required',
        //     'product_image' => 'required',
        //     'product_category' => 'required',
        //     'product_discount_till' => 'required',
        //     'product_key_points' => 'required',
        // ]);


        // $seller_id = Auth::user()->id;
        $seller_email = Auth::user()->email;
        $product_name = $request->input('product_name');
        $product_price_orignal = $request->input('product_price_orignal');
        $product_price_revised = $request->input('product_price_revised');
        $product_description = $request->input('product_description');
        $product_image = $this->addImageStorage($request);
        $product_category = $request->input('product_category');
        $product_discount_till = $request->input('product_discount_till');
        $product_key_points = $request->input('product_key_points');

        $data = array(
            'itle' => $product_name, 'price_original' => $product_price_orignal,
            'description' => $product_description, 'thumbnail' => $product_image,
            'category' => $product_category, 'discount_till' => $product_discount_till,
            'key_points' => $product_key_points,
            'price_revised' => $product_price_revised,
            'seller_email' => $seller_email
        );

      
        $PostModel = new PostModel();
       
        try {
            $PostModel->addProduct($data);
            return $data;
        } catch (Exception $e) {
          //  return $e->getMessage();
        }

        return "Product Added Successfully";
    }


    public function addImageStorage(Request $request)
    {

        //add image to storage and get path
        $image = $request->file('product_image');
        $image_name = $image->getClientOriginalName();

        try {
            $image->move(public_path('products'), $image_name);

            $image_path = 'images/' . $image_name;

            return $image_path;
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }
}
