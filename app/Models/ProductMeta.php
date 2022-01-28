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
        'product_id', 'bought', 'rating_one',
        'rating_two', 'rating_three', 'rating_four',
        'rating_five'
    ];

    public function updateBought($product_id)
    {
        $product_meta = self::where('product_id', $product_id)->get();
        if (count($product_meta) > 0) {
            self::where('product_id', $product_id)->increment('bought');
        } else {
            $data = array('product_id' => $product_id, 'bought' => 1);
            self::insert($data);
        }
    }

    /**
     * show the individual rating of the product
     * @param  int  $id
     * @return ratings
     * @throws Exception
     */

    public function showIndividualRating($id)
    {

        $rating = self::where('product_id', '=', $id)->get();

        //change $rating->rating_one to $rating->rating_1 and so on

        $rating[0]->rating_1 = $rating[0]->rating_one;
        $rating[0]->rating_2 = $rating[0]->rating_two;
        $rating[0]->rating_3 = $rating[0]->rating_three;
        $rating[0]->rating_4 = $rating[0]->rating_four;
        $rating[0]->rating_5 = $rating[0]->rating_five;

        return $rating;
    }

    /**show average rating  */
    public function showAverageRating($id)
    {
        $rating = $this->showIndividualRating($id);
        $rating_1 = $rating[0]->rating_1;
        $rating_2 = $rating[0]->rating_2;
        $rating_3 = $rating[0]->rating_3;
        $rating_4 = $rating[0]->rating_4;
        $rating_5 = $rating[0]->rating_5;

        $total = ($rating_1) * 1 + ($rating_2) * 2 + ($rating_3) * 3 + ($rating_4) * 4 + ($rating_5) * 5;

        return $total;
    }

    /**
     * show the commulative rating of all the product
     * @param  int  $id
     * @return ratings
     * @throws Exception
     */

    public function showAllCommulativeUsersRated()
    {

        $rating = self::sum('rating_one') +
            self::sum('rating_two') +
            self::sum('rating_three') +
            self::sum('rating_four') +
            self::sum('rating_five');

        return $rating;
    }

    /**
     * show the commulative rating of the product
     * @param  int  $id
     */

    public function showCommulativeUsersRated($id)
    {

        $rating = self::where('product_id', '=', $id)->get();

        $totRating = $rating[0]->rating_one +
            $rating[0]->rating_two +
            $rating[0]->rating_three +
            $rating[0]->rating_four +
            $rating[0]->rating_five;

        return $totRating;
    }

    /**
     * update rating corresponding to the product id based on number
     * of stars given by the user.
     * if rating is already present, update it
     * if rating is one star, update the field corresponding to rating_one
     * if rating is two stars, update the field corresponding to it rating_two so on
     * @param  Request $request
     */

    public function productMetaRating($product_id, $rating)
    {

        if ($rating == 1) {

            self::where('product_id', $product_id)
                ->increment('rating_one');
        } else if ($rating == 2) {

            self::where('product_id', '=', $product_id)
                ->increment('rating_two');
        } else if ($rating == 3) {

            self::where('product_id', '=', $product_id)
                ->increment('rating_three');
        } else if ($rating == 4) {

            self::where('product_id', '=', $product_id)
                ->increment('rating_four');
        } else if ($rating == 5) {

            self::where('product_id', '=', $product_id)
                ->increment('rating_five');
        }
    }
}
