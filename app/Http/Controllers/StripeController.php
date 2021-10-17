<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use Auth;

class StripeController extends Controller
{
    static public function stripe(Request $request)
    {
        return view('stripe', ['title' => "Stripe"]);
    }
}
