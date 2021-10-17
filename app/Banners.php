<?php

namespace App;

use App\Http\Controllers\MessagingController;
use App\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class Banners
{
    public static function getBanners1($vendor)
    {
        $banners1 = DB::table('banners')->
            leftjoin("image_uploads", "image_uploads.id", "=", "banners.imageid")->
            where('banners.position', "1")->where('banners.visible', "1")->
            where('banners.vendor', $vendor)->
            select("banners.id", "banners.type", "banners.details", "image_uploads.filename")->get();
        return Banners::getDetails($banners1);
    }

    public static function getBanners2()
    {
        $banners2 = DB::table('banners')->leftjoin("image_uploads", "image_uploads.id", "=", "banners.imageid")->
        where('banners.position', "2")->where('banners.visible', "1")->
        where('banners.vendor', "0")->
        select("banners.id", "banners.type", "banners.details", "image_uploads.filename")->get();
        return Banners::getDetails($banners2);
    }

    public static function getDetails($banners1){
        $path = env('URL_DASHBOARD', null) . "/public/images/";
        foreach ($banners1 as &$data) {
            if ($data->filename == null || $data->filename == "")
                $data->filename = $path . "noimage.png";
            else
                $data->filename = $path . $data->filename;
            if ($data->type == 1) {
                $food = DB::table("foods")->where("id", $data->details)->get()->first();
                if ($food != null)
                    $market = $food->restaurant;
                else
                    $market = '0';
                $data->link = "foodDetails?id=$data->details&market=$market";
            } else {
                $data->link = $data->details;
            }
        }
        return $banners1;
    }
}
