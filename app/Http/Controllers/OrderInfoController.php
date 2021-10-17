<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use Auth;
use App\Lang;
use App\Currency;

class OrderInfoController extends Controller
{
    public function load(Request $request)
    {
        $path = env('URL_DASHBOARD', null);
        if ($path == null) {
            return "Set URL_DASHBOARD variable in .env file";
        }else
            $path = $path . "/public/images/";

        $id = $request->input('id', "") ?: "";

        $order = DB::table('orders')->where('id', '=', $id)->get()->first();
        $ordersdata = DB::table('ordersdetails')->where('ordersdetails.order', '=', $id)->
                    select("ordersdetails.*")->get();

        $subtotal = 0;
        foreach ($ordersdata as &$food) {
            if ($food->image == null || $food->image == "")
                $food->image = $path . "noimage.png";
            else
                $food->image = $path . $food->image;
            $subtotal += $food->foodprice * $food->count + $food->extrasprice * $food->extrascount;
        }

        $subtotalAll = $subtotal;
        if ($order->couponName != null) {
            $coupons = DB::table('coupons')->where('name', '=', $order->couponName)->get()->first();
            if ($coupons != null)
                $subtotal = Currency::couponCalculate($subtotal, $coupons, $ordersdata, $order);
        }

        $fee = $order->fee/100*$subtotal;
        if ($order->percent == "0")
            $fee = $order->fee;
        $tax = $order->tax/100*$subtotal;

        return view('orderinfo', [
            'breadcrumb' => Lang::get(94), // Order details
            'order' => DB::table('orders')->where('orders.id', '=', $id)->
            leftjoin("ordersdetails", "orders.id", "=", "ordersdetails.order")->
            leftjoin("orderstatuses", "orderstatuses.id", "=", "orders.status")->
            select("orders.id", "orders.updated_at", "orders.total", "ordersdetails.food", "orderstatuses.status")->get()->first(),
            'couponCode' => $order->couponName,
            'ordersdetails' =>  $ordersdata,
            'subtotal' => $subtotal,
            'subtotalAll' => $subtotalAll,
            'fee' => $fee,
            'tax' => $tax,
            'total' => $subtotal+$fee+$tax
        ]);
    }




}
