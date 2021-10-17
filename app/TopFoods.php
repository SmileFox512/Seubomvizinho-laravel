<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Foods;

class TopFoods
{
    public static function getList(){
        $topfoods = DB::table('topfoods')->
            leftjoin("foods", 'foods.id', 'topfoods.food')->
            leftjoin("image_uploads", 'image_uploads.id', '=', 'foods.imageid')->
            select('foods.*', 'image_uploads.filename as image')->get()->toArray();
        return Foods::fill($topfoods);
    }

    public static function mostPopular(){
        $topfoods = DB::Select('SELECT foods.id, foods.name, foods.discountprice, foods.price, foods.restaurant, foods.images,
            count(*) as result, image_uploads.filename as image FROM favorites
            RIGHT JOIN foods ON foods.id=favorites.food
            LEFT JOIN image_uploads ON image_uploads.id=foods.imageid
            GROUP BY foods.id, image_uploads.filename, foods.name, foods.discountprice, foods.price
            ORDER BY result DESC
            LIMIT 10
        ');
        return Foods::fill($topfoods);
    }
}
