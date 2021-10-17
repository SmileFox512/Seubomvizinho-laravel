<?php

namespace App\Http\Controllers;

use App\Lang;
use App\Logging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use Auth;

class PayMobController extends Controller
{
    static public function callback(Request $request)
    {
        $success = $request->input('success', "not found") ?: "not set";
        $id = $request->input('id', "not found") ?: "not set";
        Logging::log2("PayMobController success=", $success);
        Logging::log2("PayMobController id=", $id);
        return view('complete', [
            'title' => Lang::get(136),  // Order Complete
            'method' => "payMob",
            'paymentId' => $request->input('id'),
            'token' => $request->input('success'),
            'PayerID' => "",
        ]);

    }
}
