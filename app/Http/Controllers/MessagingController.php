<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use Auth;

class MessagingController extends Controller
{
    static public function sendNotify(Request $request)
    {
        $id = $request->input('user');
        $title = $request->input('title');
        $body = $request->input('text');
        $imageid = $request->input('imageid');
        $chat = $request->input('chat');
        if ($chat == null)
            $chat = "false";
        $users = DB::table('users')->get();
        $uid = uniqid();


        $path_to_FCM = 'https://fcm.googleapis.com/fcm/send';
        $server_key = DB::table('settings')->where('param', '=', "firebase_key")->get()->first()->value;
        $headers = array('Authorization:key=' . $server_key,
            'Content-Type:application/json'
        );

        if (!Auth::check())
            return \Redirect::route('/');


        $user = DB::table('users')->where('id', '=', "$id")->get()->first();
        $token = $user->fcbToken;

        $field = array(
            'notification' => array('body' => $body, 'title' => $title, 'click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'sound' => 'default'), //, 'image' => $imageToSend),
            'priority' => 'high',
            'sound' => 'default',
            'data' => array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => '1', 'status' => 'done', 'body' => $body, 'title' => $title, 'sound' => 'default', 'chat' => $chat),
            'to' => $token,
        );

        //echo json_encode($field, JSON_PRETTY_PRINT);

        $payload = json_encode($field);
        $curl_session = curl_init();
        curl_setopt($curl_session, CURLOPT_URL, $path_to_FCM);
        curl_setopt($curl_session, CURLOPT_POST, true);
        curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);
        $result = curl_exec($curl_session);

        //echo $result;
        curl_close($curl_session);
        if ($result) {
            if ($chat == "false") {
                // add to database
                $values = array('title' => $title,
                    'text' => $body, 'user' => $id,
                    'image' => $imageid,
                    'uid' => $uid, 'delete' => 0,
                    'show' => 1, "read" => 0,
                    'updated_at' => new \DateTime());
                $values['created_at'] = new \DateTime();
                DB::table('notifications')->insert($values);
            }
            DB::table('logging')->insert(array(
                'data' => "Firebase send msg title=$title, user id = $id",
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()));
        }else {
            DB::table('logging')->insert(array(
                'data' => 'Firebase send msg error ' . curl_error($curl_session),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()));
        }
    }


}
