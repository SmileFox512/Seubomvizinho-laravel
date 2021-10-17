<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use Auth;
use App\Settings;
use App\Logging;
use App\Lang;
use Illuminate\Support\Facades\Config;

class InfoController extends Controller
{
    public function about(Request $request){
        return InfoController::view("about_text", Lang::get(37)); // "About Us",
    }

    public function delivery(Request $request){
        return InfoController::view("delivery_text", Lang::get(38)); // Delivery Information
    }

    public function privacy(Request $request){
        return InfoController::view("privacy_text", Lang::get(39)); // Privacy Policy
    }

    public function terms(Request $request){
        return InfoController::view("terms_text", Lang::get(40)); // Terms & Condition
    }

    public function refund(Request $request){
        return InfoController::view("refund_text", Lang::get(144)); // Refund Policy
    }

    public static function view($text, $breadcrumb)
    {
        return view('info', [
            'text' => DB::table('docs')->where('param', '=', $text)->get()->first()->value,
            'breadcrumb' => $breadcrumb
        ]);
    }
}
