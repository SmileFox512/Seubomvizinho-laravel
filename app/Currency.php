<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Currency
{
    public static function makePrice($price)
    {
        $rightSymbol = DB::table('settings')->where('param', '=', "rightSymbol")->get()->first()->value;
        $symbolDigits = DB::table('settings')->where('param', '=', "default_currencyCode")->
            join("currencies", 'currencies.code', '=', 'settings.value')->get()->first()->digits;
        $currency = DB::table('settings')->where('param', '=', "default_currencies")->get()->first()->value;

        if ($rightSymbol == "false")
            $ret = $currency . sprintf('%0.' . $symbolDigits . 'f', $price);
        else
            $ret = sprintf('%0.' . $symbolDigits . 'f', $price) . $currency;

        return $ret;
    }

    public static function rightSymbol(){
        return DB::table('settings')->where('param', '=', "rightSymbol")->get()->first()->value;
    }

    public static function currency(){          // $
        return DB::table('settings')->where('param', '=', "default_currencies")->get()->first()->value;
    }

    public static function currencyCode(){      // USD
        return DB::table('settings')->where('param', '=', "default_currencyCode")->get()->first()->value;
    }

    public static function symbolDigits(){
        return DB::table('settings')->where('param', '=', "default_currencyCode")->
        join("currencies", 'currencies.code', '=', 'settings.value')->get()->first()->digits;
    }

    public static function couponCalculate($subtotal, $coupons, $ordersdata, $order){
        $categoryList = explode(",", $coupons->categoryList);
        $foodsList = explode(",", $coupons->foodsList);
        $allRestaurants = explode(",", $coupons->allRestaurants);

        $text = "";

        if ($subtotal > $coupons->amount) {

            $text = $text . "min amount: " . $coupons->amount . "<br><br>";

            $total = 0;
            foreach ($ordersdata as &$food) {
                $price = $food->foodprice * $food->count + $food->extrasprice * $food->extrascount;
                $priceCoupon = $price;
                $category = 0;
                if ($food->foodid != "0") {
                    $category = DB::table('foods')->where('id', '=', $food->foodid)->get()->first();
                    if ($category != null)
                        $category = $category->category;
                }
                $text = $text . "order id=" . $food->id . " food id=" .  $food->foodid . " name: " . $food->food . " price: " . $price . "<br>";

                if ($coupons->allRestaurants == '1') {        // allRestaurants
                    $text = $text . "allRestaurants = true<br>";
                    $priceCoupon = Currency::_couponCalculate($price, $coupons);

                    if ($coupons->allCategory != '1' && !in_array($category, $categoryList)) {       // allCategory
                        $priceCoupon = $price;
                        $text = $text . "no this category need=".$category." all: ".implode($categoryList)."<br>";
                    }
                    if ($coupons->allFoods != '1' && !in_array($food->foodid, $foodsList)) {
                        $priceCoupon = $price;
                        $text = $text . "no this food. food id=".$food->foodid." all: ".implode($foodsList)."<br>";
                    }
                    $text = $text . "priceCoupon " . $priceCoupon . "<br><br>";
                } else {
                    if (in_array($order->restaurant, $allRestaurants)) {
                        $text = $text . "no this restaurant<br>";
                        $priceCoupon = Currency::_couponCalculate($price, $coupons);
                        if ($coupons->allCategory != '1' && !in_array($category, $categoryList)) {       // allCategory
                            $text = $text . "no this category need=".$category." all: ".implode($categoryList)."<br>";
                            $priceCoupon = $price;
                        }
                        if ($coupons->allFoods != '1' && !in_array($food->foodid, $foodsList)) {
                            $priceCoupon = $price;
                            $text = $text . "no this food. food id=".$food->foodid." all: ".implode($foodsList)."<br>";
                        }
                    } else {
                        $priceCoupon = $price;
                    }
                }
                $total += $priceCoupon;
            }

            if ($total != $subtotal)
                if ($coupons->inpercents != '1')
                    $total = $subtotal - $coupons->discount;
//            return $text . " total: " . $total . " subtotal: " . $subtotal; // debug
            return $total;
        }
    }

    public static function _couponCalculate($total, $coupons)
    {
        if ($coupons->inpercents == '1')  // inpercents
            $total = (100-$coupons->discount)/100*$total;  // discount
        else
            $total -= $coupons->discount; //discount
        return $total;
    }

}
