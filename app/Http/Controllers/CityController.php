<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CityController extends Controller
{
    public function load(Request $request)
    {
        if (!Auth::check())
            return \Redirect::route('/');

        return view('city', [
            'city' => DB::table('settings')->where('param',"city")->get()->first()->value,
            'demo' => DB::table('settings')->where('param', "demo_mode")->get()->first()->value,
        ]);
    }

    public function save(Request $request)
    {
        if (!Auth::check())
            return response()->json(['error' => "1"]);

        DB::table('settings')->where('param',"city")->update(['value' => $request->input('city') ?: "", 'updated_at' => new \DateTime(),]);
        return response()->json(['error' => "0"]);
    }
}

