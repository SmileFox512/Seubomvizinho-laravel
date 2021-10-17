<?php

namespace App;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Settings
{
    public static function getVersion()
    {
        $settings = DB::table('settings')->where('param', '=', "version")->get()->first();
        return $settings->value;
    }

    public static function isDemoMode()
    {
        $settings = DB::table('settings')->where('param', '=', "demo_mode")->get()->first();
        if ($settings->value == 'true')
            return true;
        return false;
    }

    public static function getGoogleMapKey()
    {
        return DB::table('settings')->where('param', '=', "mapapikey")->get()->first()->value;
    }

    public static function getDefaultLat()
    {
        return DB::table('settings')->where('param', '=', "defaultLat")->get()->first()->value;
    }

    public static function getDefaultLng()
    {
        return DB::table('settings')->where('param', '=', "defaultLng")->get()->first()->value;
    }

    public static function getPath()
    {
        $path = config('app.pathImages');
//        $path = env('URL_DASHBOARD', null);
        if ($path == null) {
            return null;
        } else
            return $path . "/public/images/";
    }

    public static function getCoupons()
    {
        return DB::table('coupons')->get();
    }

    public static function pmCashOnDelivery(){
        return DB::table('settings')->where('param', '=', "cashEnable")->get()->first()->value;
    }

    //
    // PayPal
    //
    public static function pmPayPal(){
        return DB::table('settings')->where('param', '=', "payPalEnable")->get()->first()->value;
    }

    public static function payPalClientId(){
        return DB::table('settings')->where('param', '=', "payPalClientId")->get()->first()->value;
    }

    public static function payPalSecret(){
        return DB::table('settings')->where('param', '=', "payPalSecret")->get()->first()->value;
    }

    public static function payPalUrl(){
        if (DB::table('settings')->where('param', '=', "payPalSandBox")->get()->first()->value == "true")
            return "https://api-m.sandbox.paypal.com";
        return "https://api.paypal.com";
    }

    //
    // Stripe
    //
    public static function pmStripeEnable(){
        return DB::table('settings')->where('param', '=', "StripeEnable")->get()->first()->value;
    }

    public static function pmStripeKey(){
        return DB::table('settings')->where('param', '=', "stripeKey")->get()->first()->value;
    }

    public static function pmStripeSecret(){
        return DB::table('settings')->where('param', '=', "stripeSecretKey")->get()->first()->value;
    }

    public static function getKmOrMiles(){
        return DB::table('settings')->where('param', "distanceUnit")->get()->first()->value;
    }

    //
    // PayMob
    //
    public static function pmPayMobEnable(){
        return DB::table('settings')->where('param',"payMobEnable")->get()->first()->value;
    }
    public static function pmPayMobApiKey(){
        return DB::table('settings')->where('param',"payMobApiKey")->get()->first()->value;
    }
    public static function pmPayMobFrame(){
        return DB::table('settings')->where('param',"payMobFrame")->get()->first()->value;
    }
    public static function pmPayMobIntegrationId(){
        return DB::table('settings')->where('param',"payMobIntegrationId")->get()->first()->value;
    }

    // city
    public static function cities(){
        return explode(",", DB::table('settings')->where('param',"city")->get()->first()->value);
    }
    public static function citiesIsPresent(){
        $t = DB::table('settings')->where('param',"city")->get()->first()->value;
        if (strlen($t) != 0) return true;
        return false;
    }
}
