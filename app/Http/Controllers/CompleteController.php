<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use Auth;
use App\Lang;

class CompleteController extends Controller
{
    // {"paymentId":"PAYID-L76CIBY8V856303AH487904V","token":"EC-6W11276285270821R","PayerID":"5TRVVUPHE8SGY"}
    public function paypalCallback(Request $request)
    {
      return view('complete', [
          'title' => Lang::get(136),  // Order Complete
          'method' => "paypal",
          'paymentId' => $request->input('paymentId'),
          'token' => $request->input('token'),
          'PayerID' => $request->input('PayerID'),
      ]);
    }

    public function complete(Request $request)
    {
        return view('complete', [
            'title' => Lang::get(136),  // Order Complete
            'method' => "cash",
            'paymentId' => "",
            'token' => "",
            'PayerID' => "",
        ]);
    }

    public function completeStripe(Request $request)
    {
        return view('complete', [
            'title' => Lang::get(136),  // Order Complete
            'method' => "Stripe",
            'paymentId' => "",
            'token' => "",
            'PayerID' => $request->input('PayerID'),
        ]);
    }

}
