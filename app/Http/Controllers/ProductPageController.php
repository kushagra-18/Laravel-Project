<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\users;
use Exception;
use App\Models\Post;
use App\Models\ProductMeta;
use App\Models\ProductPage;
use App\Models\UserMeta;
use Illuminate\Support\Facades\Auth;

class ProductPageController extends Controller
{
    public function index($id)
    {

        $isRated = 0;

        $userModel = new UserMeta();

        $postModel = new Post();

        $posts = $postModel->getProduct($id);

        $checkBought = $this->checkBought($id);

        $checkIfRated = $userModel->checkIfRated($id);

        try {

            $productMeta =  new ProductMeta();

            $individualRating =  $productMeta->showIndividualRating($id);

            $totRating = $productMeta->showCommulativeUsersRated($id);

            $avgRating = $productMeta->showAverageRating($id);

            $avgRating = $avgRating / $totRating;
            $avgRating = round($avgRating, 1);
        } catch (Exception $e) {
            //return $e;
            return view('productpage', compact('posts', 'checkBought', 'checkIfRated'));
        }

        //error_log($individualRating);

        return view('productpage', compact('posts', 'checkBought', 'individualRating', 'totRating', 'avgRating', 'checkIfRated'));
    }

    /**
     *  @description check if user has bought the product
     * calls the function in CartModel
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function checkBought($id)
    {
        $userMetaModel = new UserMeta();
        $checkBought = $userMetaModel->checkIfBought($id);
        return $checkBought;
    }


    public function ratingUpdate(Request $request)
    {

        //validate the request
        $this->validate($request, [
            'stars' => 'required'
        ]);
        $product_id = $request->input('itemId');
        $rating = $request->input('stars');
        $email = Auth::user()->email;

        error_log($product_id);
        error_log($rating);
        $userMetaModel = new UserMeta();
        try {
            $userMetaModel->ratingUpdate($email,$product_id, $rating);
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
        $productMetaModel = new ProductMeta();
        $rating = $productMetaModel->showIndividualRating($id);
        return $rating;
    }

    public function productMetaRating(Request $request)
    {
        //validate the request
        $this->validate($request, [
            'itemId' => 'required',
            'stars' => 'required',
        ]);

        $product_id = $request->input('itemId');
        $rating = $request->input('stars');
        $productMetaModel = new ProductMeta();
        try {
            $productMetaModel->productMetaRating($product_id, $rating);
            return  $this->index($product_id);
        } catch (Exception $e) {
            return $e;
        }
    }
}
