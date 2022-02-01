<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class APIController extends Controller
{
    /**
     * Display list of products
     * through API with certain filters
     * 
     */
    public function index(Request $request)
    {

        error_log("Request: " . print_r($request->all(), true));

        $sort = $request->input('sort');
        $category = $request->input('category');
        error_log("sort: ".$sort);
        error_log("category: ".$category);

        $postModel = new Post();
        $posts = $postModel->getAllProductsAPI($sort, $category);


        if ($posts == null) {
            return response()->json([
                'status' => 'error',
                'message' => 'No products found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $posts
        ], 200);

    }
}
