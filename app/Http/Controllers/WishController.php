<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageUpload;
use Auth;
use App\Lang;

class WishController extends Controller
{
    public function wishlist(Request $request){
        return view('wish', [
            'title' => Lang::get(31),  // Wishlist
        ]);
    }

}
