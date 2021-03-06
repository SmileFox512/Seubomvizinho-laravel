<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Seller
{
    public static function getText($id){
        return DB::table('settings')->where('param', $id)->get()->first()->value;
    }

    public static function getImage($id){
        $logoid = DB::table('settings')->where('param', $id)->get()->first()->value;
        $t = DB::table('image_uploads')->where("id", $logoid)->get()->first();
        if ($t == null)
            return "";
        $path = Settings::getPath();
        if ($path == null)
            return "";
        return $path . $t->filename;
    }

}
