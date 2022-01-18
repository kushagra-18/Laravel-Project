<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\users;
use Exception;
use App\Models\PostModel;
use App\Models\ProductPageModel;

class ProductPageController extends Controller
{
    public function index($id)

    {
        $posts = DB::table('posts')->where('id', $id)->get();

        $checkBought = $this->checkBought($id);

        $individualRating =  $this->showIndividualRating($id);

        //error_log($individualRating);

        return view('productpage', compact('posts', 'checkBought','individualRating'));
    }

    /**
     *  @description check if user has bought the product
     * calls the function in CartModel
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function checkBought($id)
    {
        $ProductModel = new ProductPageModel();
        $checkBought = $ProductModel->checkIfBought($id);
        return $checkBought;
    }


    public function rating(Request $request)
    {
        $product_id = $request->input('itemId');
        $ProductModel = new ProductPageModel();
        try {
            $ProductModel->rating($request);
            $this->productMetaRating($request);
            return  $this->index($product_id);
        } catch (Exception $e) {
            return $e;
        }
    }


    /**
     * @description: Use to show the individual rating of the product
     * @param  Request $id
     * @return ratings
     */

    public function showIndividualRating($id)
    {
        $ProductModel = new ProductPageModel();
        $rating = $ProductModel->showIndividualRating($id);
        return $rating;
    }

    public function productMetaRating(Request $request)
    {
        $product_id = $request->input('itemId');
        $ProductModel = new ProductPageModel();
        try {
            $ProductModel->productMetaRating($request);
            return  $this->index($product_id);
        } catch (Exception $e) {
            return $e;
        }
    }
}
