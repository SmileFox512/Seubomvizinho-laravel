<?php

namespace App;

use App\Http\Controllers\MessagingController;
use App\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class Chat
{
    public static function getUserUnreadMessagesCount()
    {
        $user = Auth::user();
        if ($user == null)
            return 0;
        return count(DB::table('chat')->where("user", $user->id)->
        where('read', '=', "false")->where('author', '=', "manager")->get());
    }

    public static function getUserAllMessages()
    {
        $user = Auth::user();
        if ($user == null)
            return 0;
        DB::table('chat')
            ->where('user', '=', $user->id)
            ->where('author', '=', "manager")
            ->update(array('read' => 'true', 'updated_at' => new \DateTime()));
        return DB::table('chat')->where('user', '=', $user->id)->orderBy('created_at', 'asc')->get();
    }

    public static function NewUserMessage($text)
    {
        $user = Auth::user();
        if ($user == null)
            return 0;
        DB::table('chat')->insert(array(
            'user' => $user->id, 'text' => "$text", 'author' => "customer",
            'delivered' => "false", 'read' => "false",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ));

        Chat::SendNotifyToAdminAndManager(Lang::get(148), $text); // Chat Message
        // to user
        $defaultImage = DB::table('settings')->where('param', '=', "notify_image")->get()->first()->value;
        Chat::sendNotify($user->id, Lang::get(148), $text, $defaultImage, "true"); // Chat Message
    }

    public static function SendNotifyToAdminAndManager($title, $text)
    {
        //
        // Send Notifications to Admin and Managers
        //
        $managers = DB::table('users')->where('role',"<", "3")->get();
        $defaultImage = DB::table('settings')->where('param', '=', "notify_image")->get()->first()->value;
        foreach ($managers as &$value) {
            Chat::sendNotify($value->id, $title, $text, $defaultImage, "true"); // Chat Message
        }
    }

    static public function sendNotify($id, $title, $body, $imageid, $chat)
    {
        // $users = DB::table('users')->get();
        $uid = uniqid();

        $path_to_FCM = 'https://fcm.googleapis.com/fcm/send';
        $server_key = DB::table('settings')->where('param', '=', "firebase_key")->get()->first()->value;
        $headers = array('Authorization:key=' . $server_key,
            'Content-Type:application/json'
        );

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
        }
        //curl_error($curl_session);
    }


}
