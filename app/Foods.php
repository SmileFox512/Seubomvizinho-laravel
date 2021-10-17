<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Foods
{
    public static function fill($topfoods){
        return Foods::fill2($topfoods, 0);
    }

    public static function fill2($topfoods, $step){
        $path = env('URL_DASHBOARD', null);
        if ($topfoods == null)
            return [];
        if ($path == null)
            $path = "";
        $path = $path . "/public/images/";
        //
        foreach ($topfoods as &$food) {
            if ($food == null)
                continue;
            // shop name
            $restaurant = DB::table("restaurants")->where("id", $food->restaurant)->get()->first();
            if ($restaurant != null) {
                $food->restId = $restaurant->id;
                $food->city = $restaurant->city;
                $food->tax = $restaurant->tax;
                //
                $food->fee = $restaurant->fee;
                $food->percent = $restaurant->percent;
                $food->perkm = $restaurant->perkm;
                $food->minAmount = $restaurant->minAmount;
                //
                $food->restName = $restaurant->name;
                // rating
                $pr = DB::table('restaurantsreviews')->where('restaurant', $restaurant->id)->get();
                $totals = 0;
                $count = 0;
                foreach ($pr as &$prv) {
                    $totals += $prv->rate;
                    $count++;
                }
                $drating = 0;
                $rating = "";
                if ($count != 0) {
                    $rating = $totals / $count;
                    $rating = sprintf('%0.1f', $rating);
                    $drating = $rating;
                }
                $food->rest_drating = $drating;
                $food->rest_rating = $rating;
                //
                if ($food->image == null || $food->image == "")
                    $food->image = $path . "noimage.png";
                else
                    $food->image = $path . $food->image;
                //
                $food->price2 = Currency::makePrice($food->price);
                if ($food->discountprice != "0.00")
                    $food->discountprice2 = Currency::makePrice($food->discountprice);
                else
                    $food->discountprice2 = "";

                // variants
                $food->variants = DB::select("SELECT variants.*, image_uploads.filename as image
                        FROM variants
                        LEFT JOIN image_uploads ON variants.imageid=image_uploads.id
                        WHERE food=$food->id ORDER BY variants.price ASC
                ");
                $first = 1;
                foreach ($food->variants as &$value) {
                    if ($value->image == null || $value->image == "")
                        $value->image = "";
                    else
                        $value->image = $path . $value->image;
                    //
                    $value->timeago = Utils::timeago($value->updated_at);
                    $value->price2 = Currency::makePrice($value->price);
                    if ($value->dprice != "0.00")
                        $value->dprice2 = Currency::makePrice($value->dprice);
                    else
                        $value->dprice2 = "";
                    if ($first == 1) {
                        $first = 0;
                        $food->price = $value->price;
                        $food->price2 = $value->price2;
                        if ($value->dprice != "0.00") {
                            $food->discountprice = $value->dprice;
                            $food->discountprice2 = $value->dprice2;
                        }
                    }
                }
                // related products
                if ($step == 0) {
                    $food->rproducts = DB::select("SELECT rproducts.rp FROM rproducts WHERE food=$food->id");
                    $food->rproducts_foods = [];
                    foreach ($food->rproducts as &$value2) {
                        $food->rproducts_foods[] = DB::table('foods')->where("foods.id", $value2->rp)->leftjoin("image_uploads", 'image_uploads.id', '=', 'foods.imageid')->
                        select('foods.*', 'image_uploads.filename as image')->get()->first();
                    }
                    Foods::fill2($food->rproducts_foods, '1');
                }
                // images
                $food->images_files = [];
                if ($food->images != null){
                    $images = explode(",", $food->images);
                    foreach ($images as &$data) {
                        $filename = DB::table('image_uploads')->where("id", $data)->get()->first();
                        if ($filename != null)
                            $filename = $path . $filename->filename;
                        else
                            $filename = $path . "noimage.png";
                        $food->images_files[] = $filename;
                    }
                }
            }else{
                if (($key = array_search($food, $topfoods)) !== false) {
                    unset($topfoods[$key]);
                }
            }
        }
        return $topfoods;
    }
}
