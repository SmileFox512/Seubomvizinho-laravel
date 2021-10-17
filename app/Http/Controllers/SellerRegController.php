<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SellerRegController extends Controller
{
    public function sellerReg(Request $request){
        return view('sellerReg', []);
    }

    public function webSellerSave(Request $request){
        DB::table('sellersregs')->insert(array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ));
        return response()->json($response = ['error' => "0",], 200);
    }
}
