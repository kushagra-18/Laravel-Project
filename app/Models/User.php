<?php

namespace App;

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Exception;

class User extends Model
{
    protected $table = 'user_address';

    protected $fillable = [
        'email', 'first_name',
        'last_name',
        'address2', 'address',
        'city', 'state',
        'zip', 'created_at',
    ];

    public function saveUserInfo($data)
    {
        //save information in user_address coming from data

        self::insert($data);
    }


    public function getSavedAddress($email)
    {
        // check if user has saved address and return bool
        $getSavedAddress = self::where('email', '=', $email)
            ->get();

        return $getSavedAddress;
    }

    public function checkSavedAddress($email)
    {

        // check if user has saved address and return bool

        $savedAddress = self::where('email', '=', $email)
            ->get();
        if (count($savedAddress) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
