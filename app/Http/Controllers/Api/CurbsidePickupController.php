<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\MessagingController;
use App\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\DB;

class CurbsidePickupController extends Controller
{
    public function arrived(Request $request)
    {
        $order_id = $request->input('order_id');

        $values = array('arrived' => "true",
            'updated_at' => new \DateTime());
        DB::table('orders')->where('id',$order_id)->update($values);

        //
        // save to OrdersTime details
        //
        $values = array(
            'order_id' => "$order_id", 'status' => "12", 'driver' => 0,
            'comment' => "",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        );
        DB::table('ordertimes')->insert($values);

        $username = "";
        $orderRow = DB::table('orders')->where('id', $order_id)->get()->first();
        if ($orderRow != null){
            $userid = $orderRow->user;
            $t = DB::table('users')->where('id', $userid)->get()->first();
            if ($t != null)
                $username = $t->name;
        }

        //
        // send notifications to vendor
        //
        if ($orderRow != null) {
            $userid = DB::table('users')->where('vendor', $orderRow->restaurant)->get()->first();
            if ($userid != null) {
                $myRequest = new \Illuminate\Http\Request();
                $myRequest->setMethod('POST');
                $myRequest->request->add(['user' => $userid->id]);
                $myRequest->request->add(['title' => "Customer arrived"]); //
                $myRequest->request->add(['text' => "Customer name: " . $username]);
                $defaultImage = DB::table('settings')->where('param', '=', "notify_image")->get()->first()->value;
                $myRequest->request->add(['imageid' => $defaultImage]);
                MessagingController::sendNotify($myRequest);
            }
        }

        $count = DB::table('settings')->where('param', '=', "ordersNotifications")->get()->first()->value;
        $count += 1;
        DB::table('settings')->where('param', '=', "ordersNotifications")->update(['value' => "$count", 'updated_at' => new \DateTime(),]);

        $response = [
            'error' => '0',
        ];
        return response()->json($response, 200);

    }
}
