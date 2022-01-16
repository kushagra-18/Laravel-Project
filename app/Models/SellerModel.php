<?php

namespace App;


namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class SellerModel extends Model
{
    public function addProduct($data)
    {
        echo $data;
        DB::table('seller')->insert($data);
    }
}
