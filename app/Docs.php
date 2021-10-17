<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Docs
{
    public static function get($market){
        $rest = DB::table('restaurants')->where('id', '=', $market)->get()->first();
        return [
            'address' => (($rest != null) ? $rest->address : ""),
            'phone' => (($rest != null) ? $rest->phone : ""),
            'mobilephone' => (($rest != null) ? $rest->mobilephone : ""),
            'copyright_text' => DB::table('docs')->where('param', '=', "copyright_text")->get()->first()->value,
            'about' => DB::table('docs')->where('param', '=', "about")->get()->first()->value,
            'delivery' => DB::table('docs')->where('param', '=', "delivery")->get()->first()->value,
            'privacy' => DB::table('docs')->where('param', '=', "privacy")->get()->first()->value,
            'terms' => DB::table('docs')->where('param', '=', "terms")->get()->first()->value,
            'refund' => DB::table('docs')->where('param', '=', "refund")->get()->first()->value,
        ];
    }

    public static function getName($type){
        return DB::table('docs')->where('param', '=', $type)->get()->first()->value;
    }
}
