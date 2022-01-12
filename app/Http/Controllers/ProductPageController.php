<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\users;
use App\Models\PostModel;

class ProductPageController extends Controller
{
    public function index($id)

    {
        echo $id;
        $posts = DB::table('posts')->where('id', $id)->get();
        return view('productpage', compact('posts'));
    }

}
