<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Lang
{
    public static function init(){
        if (count(DB::table('settings')->where("param", 'siteLang')->get()) == 0)
            DB::table('settings')->insert(['param' => 'siteLang', 'value' => 'langEng', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
    }

    public static function get($id)
    {
        Lang::init();
        $lang = DB::table('settings')->where('param', '=', "siteLang")->get()->first()->value;
        return Config::get("$lang.$id");
    }

    public static function setNewLang($newLang)
    {
        DB::table('settings')->where('param', '=', "panelLang")->update(['value' => $newLang, 'updated_at' => new \DateTime(),]);
        //
        DB::table('orderstatuses')->where('id', '=', "1")->update(['status' => Lang::get(438), 'updated_at' => new \DateTime(),]);
        DB::table('orderstatuses')->where('id', '=', "2")->update(['status' => Lang::get(439), 'updated_at' => new \DateTime(),]);
        DB::table('orderstatuses')->where('id', '=', "3")->update(['status' => Lang::get(440), 'updated_at' => new \DateTime(),]);
        DB::table('orderstatuses')->where('id', '=', "4")->update(['status' => Lang::get(441), 'updated_at' => new \DateTime(),]);
        DB::table('orderstatuses')->where('id', '=', "5")->update(['status' => Lang::get(442), 'updated_at' => new \DateTime(),]);
        DB::table('orderstatuses')->where('id', '=', "6")->update(['status' => Lang::get(443), 'updated_at' => new \DateTime(),]);
    }

    public static function direction()
    {
        Lang::init();
        $lang = DB::table('settings')->where('param', '=', "panelLang")->get()->first()->value;
        $langs = Config::get("langs");
        foreach ($langs as &$value) {
            if ($value['file'] == $lang)
                return $value['dir'];
        }
        return "ltr";
    }

    public static function langs(){
        Lang::init();
        return Config::get("langs");
    }

    public static function defLang(){
        Lang::init();
        return DB::table('settings')->where('param', '=', "siteLang")->get()->first()->value;
    }

    public static function defLangName(){
        $defLang = Lang::defLang();
        $langs = Lang::langs();
        foreach ($langs as &$value) {
            if ($value['file'] == $defLang)
                return $value['name'];
        }
        return "";
    }

    public static function setDefLang($lang){
        DB::table('settings')->where('param', '=', "siteLang")->update(['value' => $lang, 'updated_at' => new \DateTime(),]);
    }

}
