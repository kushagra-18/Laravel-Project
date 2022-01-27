<?php

namespace App;
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    //

    protected $table = 'product_meta';

    public $timestamps = false;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_id', 'bought', 'rating_one', 'rating_two', 'rating_three', 'rating_four', 'rating_five'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\ProductModel', 'product_id');
    }

    
    
}
