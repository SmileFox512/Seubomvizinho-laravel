<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use App\Lang;
use Auth;

class OrdersController extends Controller
{
    public function getBasket(Request $request){
        $path = Settings::getPath();
        if ($path == null)
            return "Set URL_DASHBOARD variable in .env file (getBasket)";

        $orderdetails = null;
        $fee = 0;
        $tax = 0;
        $perkm = 0;
        $percent = 0;
        $order = null;
        $auth = "0";
        $restName = "";
        $minAmount = 0;
        if (Auth::user() != null) {
            $auth = "1";
            $id = Auth::user()->id;
            // basket
            $order = DB::table('orders')->where('user', '=', "$id")->where('send', '=', "0")->get()->first();
            if ($order != null) {
                $orderdetails = DB::table('ordersdetails')->where('order', '=', "$order->id")->get();
                foreach ($orderdetails as &$value) {
                    $foodCategory = DB::table('foods')->where('id', '=', "$value->foodid")->get()->first();
                    if ($foodCategory != null)
                        $value->category = $foodCategory->category;
                    $food = DB::table('foods')->where('id', '=', "$value->id")->get()->first();
                    if ($food != null)
                        $value->discountprice = $food->discountprice;
                    else
                        $value->discountprice = 0;
                    $value->image =  $path . $value->image;
                }
                $rest = DB::table('restaurants')->where('id', '=', $order->restaurant)->get()->first();
                if ($rest != null) {
                    $tax = $rest->tax;
                    $fee = $rest->fee;
                    $percent = $rest->percent;
                    $restName = $rest->name;
                    $perkm = $rest->perkm;
                    $minAmount = $rest->minAmount;
                }
            }
        }
//        $tax = DB::table('settings')->where('param', '=', "default_tax")->get()->first()->value;
        $currencies = DB::table('settings')->where('param', '=', "default_currencies")->get()->first()->value;

        $response = [
            'error' => '0',
            'currency' => $currencies,
            'default_tax' => $tax,
            'order' => $order,
            'orderdetails' => $orderdetails,
            'fee' => $fee,
            'tax' => $tax,
            'percent' => $percent,
            'perkm' => $perkm,
            'auth' => $auth,
            'restName' => $restName,
            'minAmount' => $minAmount,
        ];
        return response()->json($response, 200);
    }

    public function addToBasket(Request $request)
    {
        if (Auth::user() == null)
            return response()->json($response = ['error' => "1",], 200);

        $id = Auth::user()->id;
        $order = DB::table('orders')->where('user', '=', "$id")->where('send', '=', "0")->get()->first();
        $orderid = 0;
        $send = $request->input('send');
        $pstatus = "";
        $tax = $request->input('tax');

        $restaurant = 0;
        $data = $request->input('data');
        if ($data != null)
            foreach ($data as &$value)
                $restaurant = $value['restId'];

        $method = $request->input('method');
        $hint = $request->input('hint');
        $fee = $request->input('fee');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $total = $request->input('total') ?: 0;
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $couponName = $request->input('couponName') ?: "";
        $curbsidePickup = $request->input('curbsidePickup');

        $rest = DB::table('users')->where('vendor', $restaurant)->get()->first();
        if ($rest == null)
            return response()->json([
                'error' => "7",
            ], 200);

        $restaurantObj = DB::table('restaurants')->where('id', '=', "$restaurant")->get()->first();
        if ($restaurantObj == null)
            return response()->json([
                'error' => "8",
            ], 200);
        if ($restaurantObj->perkm != '1')
            $fee = $restaurantObj->fee;
        $percent = $restaurantObj->percent;
        $tax = $restaurantObj->tax;
        $perkm = $restaurantObj->perkm;
        if ($curbsidePickup == "true")
            $fee = "0";

        if ($order == null) {
            $values = array('driver' => "0",
                'address' => "$address", 'phone' => "$phone",
                'user' => "$id", 'status' => '1', 'pstatus' => "$pstatus",
                'tax' => "$tax",
                'hint' => "$hint",
                'active' => '1',
                'restaurant' => "$restaurant",
                'method' => "$method", 'fee' => "$fee", 'send' => "$send",
                'lat' => "$lat", "lng" => "$lng",
                'total' => "$total", 'percent' => "$percent",
                'perkm' => "$perkm",
                'curbsidePickup' => "$curbsidePickup",
                'couponName' => $couponName,
                'vendor' => $rest->id,
                'view' => 'false',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            );
            DB::table('orders')->insert($values);
            $orderid = DB::getPdo()->lastInsertId();
        }else {
            $orderid = $order->id;
            $values = array(
                'address' => "$address", 'phone' => "$phone",
                'total' => "$total",
                'user' => "$id", 'status' => '1', 'pstatus' => "$pstatus",
                'tax' => "$tax", 'hint' => "$hint", 'active' => '1', 'restaurant' => "$restaurant",
                'lat' => "$lat", "lng" => "$lng", 'percent' => "$percent",
                'method' => "$method", 'fee' => "$fee", 'send' => "$send",
                'perkm' => "$perkm",
                'couponName' => $couponName,
                'curbsidePickup' => "$curbsidePickup",
                'vendor' => $rest->id,
                'view' => 'false',
                'updated_at' => new \DateTime());
            DB::table('orders')
                ->where('id',$orderid)
                ->update($values);
        }

        DB::table('ordersdetails')->where('order', '=', $orderid)->delete();

        $data = $request->input('data');
        if ($data != null)
            foreach ($data as &$value) {
                $food = $value['title'];
                $count = $value['count'];
                $foodprice = $value['price'];
                if ($value['discountprice'] != 0)
                    $foodprice = $value['discountprice'];
                $extras = ""; //$value['extras'];
                $extrascount = 0; //$value['extrascount'];
                $extrasprice = 0 ; //$value['extrasprice'];
                $foodid = $value['id'];
                $extrasid = 0; //value['extrasid'];
                $image = basename($value['image']);
                $values = array(
                    'order' => "$orderid", 'food' => "$food", 'count' => "$count",
                    'foodprice' => "$foodprice", 'extras' => "$extras", 'extrascount' => "$extrascount", 'extrasprice' => "$extrasprice",
                    'foodid' => "$foodid", 'extrasid' => "$extrasid", 'image' => "$image",
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                );
                DB::table('ordersdetails')->insert($values);
            }

        if ($send == '1'){
            $values = array(
                'order_id' => "$orderid", 'status' => 1, 'driver' => 0,
                'comment' => "",
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            );
            DB::table('ordertimes')->insert($values);
            //
//            $count = DB::table('settings')->where('param', '=', "ordersNotifications")->get()->first()->value;
//            $count += 1;
//            DB::table('settings')->where('param', '=', "ordersNotifications")->update(['value' => "$count", 'updated_at' => new \DateTime(),]);

            //
            // send notifications to manager and admin
            //
            // Send Notifications to Admin
            //
            $userid = DB::table('users')->where('role',"1")->get()->first();
            if ($userid != null) {
                $myRequest = new \Illuminate\Http\Request();
                $myRequest->setMethod('POST');
                $myRequest->request->add(['user' => $userid->id]);
                $myRequest->request->add(['title' => Lang::get(128)]); // 'New order arrived',
                $myRequest->request->add(['text' => Lang::get(129) . $orderid]); // "Order #",
                $defaultImage = DB::table('settings')->where('param', '=', "notify_image")->get()->first()->value;
                $myRequest->request->add(['imageid' => $defaultImage]);
                MessagingController::sendNotify($myRequest);
            }
            //
            // Send Notifications to Managers
            //
//            $managers = DB::table('users')->where('role',"2")->get();
//            foreach ($managers as &$value) {
//                //$restaurant
//                //$manager = DB::table('manager_rest')->where('user', '=', $value->id)->where('restaurant', '=', $restaurant)->get();
//                //if (count($manager) != 0){
//                    $myRequest = new \Illuminate\Http\Request();
//                    $myRequest->setMethod('POST');
//                    $myRequest->request->add(['user' => $value->id]);
//                    $myRequest->request->add(['title' => Lang::get(128)]); // 'New order arrived',
//                    $myRequest->request->add(['text' => Lang::get(129) . $orderid]); // "Order #",
//                    $defaultImage = DB::table('settings')->where('param', '=', "notify_image")->get()->first()->value;
//                    $myRequest->request->add(['imageid' => $defaultImage]);
//                    MessagingController::sendNotify($myRequest);
//                //}
//            }
        }

        $response = [
            'error' => "0",
            'data'=> null,
            'orderid' => $orderid,
            'fee' => $fee,
            'percent' => $percent,
        ];
        return response()->json($response, 200);
    }
}
