<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Logging
{
    public static function log($param1)
    {
        Logging::log2($param1, "");
    }

    public static function log2($param1, $param2)
    {
        Logging::log3($param1, $param2, "");
    }

    public static function logapi($param1){
        $name = "";
        $user = auth('api')->user();
        if ($user != null) {
            if ($user->id != null)
                $name = DB::table('users')->where('id', '=', $user->id)->get()->first()->name;
        }

        $values = array('user' => $name,
            'param1' => $param1, 'param2' => "", 'param3' => "", 'param4' => 'api', 'param5' => $_SERVER['REMOTE_ADDR'],
            'updated_at' => new \DateTime());
        $values['created_at'] = new \DateTime();
        DB::table('logging')->insert($values);
        
    }
        
    public static function log3($param1, $param2, $param3)
    {
        $id = Auth::user()->id;
        $name = DB::table('users')->where('id', '=', $id)->get()->first()->name;

        $values = array('user' => $name,
            'param1' => $param1, 'param2' => $param2, 'param3' => $param3, 'param4' => '', 'param5' => $_SERVER['REMOTE_ADDR'],
            'updated_at' => new \DateTime());
        $values['created_at'] = new \DateTime();
        DB::table('logging')->insert($values);
    }

}
