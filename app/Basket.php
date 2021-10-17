<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Basket
{
    public static function default_tax(){
        return DB::table('settings')->where('param', '=', "default_tax")->get()->first()->value;
    }

    public static function delivery_fee(){
        $rest = DB::table('restaurants')->where('id', '=', "1")->get()->first();
        return (($rest != null) ? $rest->fee : 0);
    }

    public static function delivery_fee_inpercents(){
        $rest = DB::table('restaurants')->where('id', '=', "1")->get()->first();
        return (($rest != null) ? $rest->percent : 1);
    }
}
