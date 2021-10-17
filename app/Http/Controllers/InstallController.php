<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InstallController extends Controller
{

    public static function update()
    {
        // time zone - default UTC
        if (count(DB::table('settings')->where("param", 'timezone')->get()) == 0)
            DB::table('settings')->insert(['param' => 'timezone', 'value' => 'UTC', 'created_at' => new \DateTime(), 'updated_at' => new \DateTime(),]);
        // set Time Zone
        $timezone = DB::table('settings')->where('param', '=', "timezone")->get()->first()->value;
        date_default_timezone_set($timezone);
    }
}
