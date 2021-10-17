<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Settings;

class Theme
{
    public static function getMainColor(){
        return DB::table('settings')->where("param", 'web_mainColor')->get()->first()->value;
    }

    public static function getMainColorHover(){
        return DB::table('settings')->where("param", 'web_mainColorHover')->get()->first()->value;
    }

    public static function getRadius(){
        return DB::table('settings')->where("param", 'web_radius')->get()->first()->value;
    }

    public static function getSliderProductHeight(){
        return "200px";
    }

    public static function getBannerHeight(){
        return "400px";
    }

    public static function getLogo(){
        $logoid = DB::table('settings')->where("param", 'web_logo')->get()->first()->value;
        $path = Settings::getPath();
        if ($path == null)
            return "images/logo.png";
        $t = DB::table('image_uploads')->where("id", $logoid)->get()->first();
        if ($t != null)
            return $path . $t->filename;
        return "images/logo.png";
    }
}
