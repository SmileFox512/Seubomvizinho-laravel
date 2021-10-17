<?php

namespace App;

use App\Lang;
use Illuminate\Support\Facades\DB;
use Auth;

class Utils
{
    public static function timeago($date)
    {
        $timestamp = strtotime($date);

        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60", "60", "24", "30", "12", "10");

        $currentTime = time();
        if ($currentTime >= $timestamp) {
            $diff = time() - $timestamp;
            for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
                $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            return $diff . " " . $strTime[$i] . "(s) ago ";
        }
    }

    public static function getCategories()
    {
        return DB::table('categories')->get();
    }

    public static function getRestaurants()
    {
        if (UserInfo::getUserRoleId() == 2) // manager
            return DB::table('manager_rest')->where('user', '=', Auth::user()->id)->join("restaurants", 'restaurants.id', '=', 'manager_rest.restaurant')->get();
        else
            return DB::table('restaurants')->get();
    }

    public static function getNutritions()
    {
        return DB::table('nutritiongroup')->get();
    }

    public static function getExtras()
    {
        return DB::table('extrasgroup')->get();
    }

    public static function getRoles()
    {
        if (UserInfo::getUserRoleId() == '1')
            return DB::table('roles')->get();
        else
            return DB::table('roles')->where("id", ">", "2")->get();
    }

    public static function getImages()
    {
        return DB::table('image_uploads')->get();
    }

    public static function getOrdersStatus()
    {
        return DB::table('orderstatuses')->get();
    }

    public static function getDoc($param)
    {
        return DB::table('docs')->where("param", $param)->get()->first()->value;
    }

    public static function getFoods()
    {
        $foods = DB::table('foods')->
            leftjoin("image_uploads", 'image_uploads.id', '=', 'foods.imageid')->
            select('foods.*', 'image_uploads.filename as filename')->get();
        foreach ($foods as &$food) {
            if ($food->filename == null)
                $food->filename = "noimage.png";
        }
        return $foods;
    }

}
