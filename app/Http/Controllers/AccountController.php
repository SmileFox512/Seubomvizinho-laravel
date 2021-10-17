<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use Auth;
use App\Settings;
use App\Logging;
use App\Categories;
use App\Docs;
use App\Lang;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function enter(Request $request)
    {
        if (Auth::user() == null){
            $page = "login";
            $breadcrumb = Lang::get(51); // Login
        }else{
            $page = "account";
            $breadcrumb = Lang::get(30); // My account
        }
        return view('account', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
        ]);
    }

    public function forgot(Request $request)
    {
        return view('account', [
            'breadcrumb' => Lang::get(55), // Forgot password?",
            'page' => "forgot",
        ]);
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $remember = $request->input('remember') ?: "off";
        $remember = $remember == "on";
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']), $remember)) {
            return response()->json(['error' => "1",], 200);
        }else{
            return response()->json(['error' => "2", "text" => Lang::get(57)], 200);  // "Email-Address or Password Are Wrong.",
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('/account');
    }

    public function doForgot(Request $request)
    {
        $error = '0';
        $email = $request->input('email');

        $user = DB::table('users')->where('email', "=", $email)->get()->first();
        if ($user == null)
            return response(['error' => '5000', "text" => Lang::get(62)]);   // User not found

        $recipient = $email;

        $sender = 'sender@valeraletun.ru';
        $subject = Lang::get(63); // "Password recovery"

        $pass = AccountController::rand_passwd();
        $message = '<html><body>';
        $message .= '<h1>' . Lang::get(64) . '</h1>'; // Hello!
        $message .= '<p>' . Lang::get(65) . '</p>';  // You received this email because you requested a password recovery in the FoodDelivery mobile app.
        $message .= '<p>' . Lang::get(66) . $pass . ' </p>'; // Your new password:
        $message .= '</body></html>';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        // Create email headers
        $headers .= 'From: '.$sender."\r\n".
            'Reply-To: '.$sender."\r\n" .
            'X-Mailer: PHP/' . phpversion();

        try{
        if (mail($recipient, $subject, $message, $headers))
        {
            $encpass = bcrypt($pass);
            $values = array('password' => $encpass,
                'updated_at' => new \DateTime());
            DB::table('users')
                ->where('email', $email)
                ->update($values);
        }
        else
            return response(['error' => '5001', 'text' => Lang::get(67)]);   // Can not send email
        } catch (\Exception $ex) {
            return response(['error' => '5001', 'text' => Lang::get(67)]);   // Can not send email
        } catch (\Throwable $ex) {
            return response(['error' => '5001', 'text' => Lang::get(67)]);   // Can not send email
        }

        return response(['error' => '0']);
    }

    function rand_passwd( $length = 8, $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789' ) {
        return substr( str_shuffle( $chars ), 0, $length );
    }

    public function register(Request $request)
    {
        $user = Auth::user();
        if ($user != null)
            return redirect()->route('/account');
        else
           return view('account', [
                'breadcrumb' => Lang::get(70), // Register
                'page' => "register",
            ]);
    }

    public function createUser(Request $request)
    {
        $email = $request->input('email');
        $typeReg = $request->input('typeReg');
        $user = DB::table('users')->where('email', "=", $email)->get()->first();
        if ($user != null && $typeReg == "email")
            return response(['error' => '3', 'text' => Lang::get(78)]);  // This is email is busy
        if ($user != null)
            return AccountController::login($request);

        $validatedData['name'] = $request->input('name');
        $validatedData['typeReg'] = $typeReg;
        $validatedData['email'] = $email;
        $validatedData['password'] = bcrypt($request->input('password'));
        $validatedData['role'] = 4;
        $user = User::create($validatedData);
        return AccountController::login($request);
    }

    public function changeProfile(Request $request)
    {
        $name = $request->input('name', "") ?: "";
        $email = $request->input('email', "") ?: "";
        $phone = $request->input('phone', "") ?: "";
        Auth::user()->phone = $phone;
        Auth::user()->email = $email;
        Auth::user()->name = $name;
        Auth::user()->save();
        return response(['error' => '0']);
    }

    public function changePassword(Request $request)
    {
        $oldPassword = $request->input('oldPassword') ?: "";
        $newPassword = $request->input('newPassword') ?: "";

        if (!Hash::check($oldPassword, Auth::user()->password))
            return response(['error' => '1']);
        if (strlen($newPassword) < 6)
            return response(['error' => '2']);
        $values = array('password' => bcrypt($newPassword),
            'updated_at' => new \DateTime());
        Auth::user()->password = bcrypt($newPassword);
        Auth::user()->save();
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($values);
        return response(['error' => '0']);
    }


}


