<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use Auth;

class AddressController extends Controller
{
    public function get(Request $request)
    {
        $shop_id = $request->input('shop_id') ?: 0;
        $rest = DB::table('restaurants')->where("id", $shop_id)->get()->first();
        $shopName = "";
        $shopLat = 0;
        $shopLng = 0;
        $shopAddr = "";
        $shopPerKm = '0';
        if ($rest != null){
            $shopLat = $rest->lat;
            $shopLng = $rest->lng;
            $shopName = $rest->name;
            $shopAddr = $rest->address;
            $shopPerKm = $rest->perkm;
        }
        $response = [
            'error' => '0',
            'address' => DB::table('address')->where("user", Auth::user()->id)->get(),
            'shopLat' => $shopLat,
            'shopLng' => $shopLng,
            'shopAddr' => $shopAddr,
            'shopName' => $shopName,
            'shopPerKm' => $shopPerKm,
        ];
        return response()->json($response, 200);
    }

    public function save(Request $request)
    {
        $def = $request->input('default');
        if ($def = "true")
            DB::table('address')->where("user", Auth::user()->id)->update(array(
                'default' => "false",
                'updated_at' => new \DateTime(),
            ));

        $values = array(
            'user' => Auth::user()->id,
            'text' => $request->input('text'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
            'type' => $request->input('type'),
            'default' => $def,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        );
        DB::table('address')->insert($values);

        $response = [
            'error' => '0',
            'address' => DB::table('address')->where("user", Auth::user()->id)->get(),
        ];
        return response()->json($response, 200);
    }

    public function del(Request $request)
    {
        DB::table('address')->where('id', '=', $request->input('id'))->where('user', '=', Auth::user()->id)->delete();

        $response = [
            'error' => '0',
            'address' => DB::table('address')->where("user", Auth::user()->id)->get(),
        ];
        return response()->json($response, 200);
    }
}
