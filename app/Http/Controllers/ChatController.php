<?php

namespace App\Http\Controllers;

use App\Lang;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Chat;

class ChatController extends Controller
{

    public function getChatMessagesNewCount(Request $request)
    {
        if (!Auth::check())
            return response()->json(['error' => "1",], 200);

        $id = Auth::id();
        return response()->json([
            'error' => "0",
            'count' => count(DB::table('chat')->where('read', '=', "false")->
                where('to_user', $id)->rightJoin("users", "users.id", "chat.from_user")->get()),
            'orders' => count(DB::select("SELECT * FROM orders WHERE vendor=$id AND view='false'")),
        ], 200);
    }

//    public function getChatMessagesNewCount(Request $request)
//    {
//        if (!Auth::check())
//            response()->json(['error' => "1",], 200);
//
//        return response()->json([
//            'error' => "0",
//            'count' => Chat::getUserUnreadMessagesCount(),
//        ], 200);
//    }

    public function load(Request $request)
    {
        if (!Auth::check())
            return \Redirect::route('/');
        return view('chat');
    }

//    public function getChatMessages(Request $request)
//    {
//        $user = Auth::user();
//        if ($user == null)
//            response()->json(['error' => "1",], 200);
//
//        return response()->json([
//            'error' => "0",
//            'messages' => Chat::getUserAllMessages()
//        ], 200);
//    }
//
//    public function chatSendMessage(Request $request)
//    {
//        if (!Auth::check())
//            response()->json(['error' => "1",], 200);
//
//        Chat::NewUserMessage($request->input('text'));
//
//        return response()->json([
//            'error' => "0",
//            'messages' => Chat::getUserAllMessages()
//        ], 200);
//    }

    //
    //
    //
    //
    //
    //
    public function chatUsersApi(Request $request){
        $id = Auth::user()->id;
        // get vendor users, all messages from vendor and unread messages
        // and last message from vendor (if exist)
        $users = DB::select("SELECT * FROM (SELECT users.id, users.name, users.role,
            CASE
             WHEN image_uploads.filename IS NULL THEN \"noimage.png\"
             ELSE image_uploads.filename
            END AS image,
            count(chat.read='false' OR chat.read='true') as count,
            (SELECT count(chat.id) FROM chat WHERE chat.read='false' AND chat.from_user=users.id AND chat.to_user=$id) as unread,
            (SELECT chat.text FROM chat WHERE chat.from_user=users.id AND chat.to_user=$id ORDER BY chat.updated_at DESC LIMIT 1) as text
            FROM users
            LEFT JOIN image_uploads ON image_uploads.id=users.imageid
            LEFT JOIN chat ON chat.from_user=users.id AND chat.to_user=$id
            GROUP BY users.id, users.name, image_uploads.filename, users.role
            ORDER BY unread DESC) AS i WHERE (count <> 0 OR role=2) AND id != $id");
        //
        $path = Settings::getPath();
        if ($path == null)
            return "Set URL_DASHBOARD variable in .env file";
        foreach ($users as &$user)
            $user->image = $path . $user->image;

        return response()->json([
            'error' => '0',
            'users' => $users,
        ]);
    } // role=2 OR role=1

    public function chatMessages2(Request $request)
    {
        $from_user = $request->input('user_id');
        return ChatController::getMessages($from_user);
    }

    public function getMessages($from_user){
        $to_user = Auth::user()->id;

        $msg = DB::select("SELECT * FROM (
                (SELECT chat.*, 'customer' as author FROM chat
                WHERE from_user=$from_user AND to_user=$to_user ORDER BY created_at ASC)
                UNION
                (SELECT chat.*, 'vendor' as author FROM chat
                WHERE from_user=$to_user AND to_user=$from_user ORDER BY created_at ASC)) AS i
                ORDER BY created_at ASC
                ");

        $values = array('read' => 'true', 'updated_at' => new \DateTime());
        DB::table('chat')->
        where('from_user', '=', $from_user)->
        where('to_user', '=', $to_user)
            ->update($values);

        return response()->json([
            'error' => "0",
            'messages' => $msg
        ], 200);
    }

    public function chatMessageSend2(Request $request){
        $to_user = $request->input('id');
        $from_user = Auth::user()->id;
        $text = $request->input('text');
        return ChatController::chatNewMessage2($from_user, $to_user, $text);
    }

    public function chatNewMessage2($from_user, $to_user, $text)
    {
        if (!Auth::check())
            return response()->json(['error' => "1",], 200);

        $values = array(
            'to_user' => $to_user,
            'from_user' => $from_user,
            'text' => "$text",
            'delivered' => "false", 'read' => "false",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        );
        DB::table('chat')->insert($values);

        //
        // Send Notifications to user
        //
        $myRequest = new \Illuminate\Http\Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add(['user' => $to_user]);
        $myRequest->request->add(['chat' => 'true']);
        $myRequest->request->add(['title' => Lang::get(151)]); // Chat Message
        $myRequest->request->add(['text' => $text]);
        $defaultImage = DB::table('settings')->where('param', '=', "notify_image")->get()->first()->value;
        $myRequest->request->add(['imageid' => $defaultImage]);
        MessagingController::sendNotify($myRequest);

        return ChatController::getMessages($to_user);
    }
}
