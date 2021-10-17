<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Currency;
use App\Utils;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    $text = "Start...";
    Artisan::call('cache:clear');
    $text = $text . Artisan::output();
    Artisan::call('route:clear');
    $text = $text . Artisan::output();
    Artisan::call('config:clear');
    $text = $text . Artisan::output();
    Artisan::call('view:clear');
    $text = $text . Artisan::output();
    return $text;
});

Route::get('/phpinfo', function() {
    echo phpinfo();
});

Route::get('/test', function() {
//    return dump($zap);
});

Route::get('/', 'MainController@home')->name('/');
Route::get('/main', 'MainController@main')->name('/main');
Route::post('/foodsGoPage', 'MainController@foodsGoPage');
Route::get('/category', 'MainController@category')->name('/category');
Route::post('/foodsInfo', 'MainController@foodsInfo');
Route::post('/getBasket', 'OrdersController@getBasket');
Route::post('/addToBasket', 'OrdersController@addToBasket');

Route::get('/about', 'InfoController@about')->name('/about');
Route::get('/delivery', 'InfoController@delivery')->name('/delivery');
Route::get('/privacy', 'InfoController@privacy')->name('/privacy');
Route::get('/terms', 'InfoController@terms')->name('/terms');
Route::get('/refund', 'InfoController@refund')->name('/refund');

Route::get('/setLang', 'MainController@setLang')->name('/setLang');
Route::get('/foodDetails', 'MainController@details')->name('/foodDetails');

Route::get('/account', 'AccountController@enter')->name('/account');
Route::post('/login', 'AccountController@login')->name('/login');
Route::get('/logout', 'AccountController@logout')->name('/logout');
Route::get('/forgot', 'AccountController@forgot')->name('/forgot');
Route::get('/register', 'AccountController@register')->name('/register');
Route::post('/createUser', 'AccountController@createUser')->name('/createUser');
Route::post('/changeProfile', 'AccountController@changeProfile')->name('/changeProfile');
Route::post('/changePassword', 'AccountController@changePassword')->name('/changePassword');
Route::get('/addresses', 'AddressController@get')->middleware('auth:web');
Route::post('/addressSave', 'AddressController@save');
Route::post('/addressDel', 'AddressController@del');

Route::post('/doForgot', 'AccountController@doForgot');

Route::get('/wishlist', 'WishController@wishlist')->name('/wishlist');
Route::get('/cart', 'CartController@viewCart')->name('/cart');
Route::get('/orderinfo', 'OrderInfoController@load')->name('/orderinfo');

Route::get('/stripe', 'StripeController@stripe')->name('/stripe');
Route::get('/paypalCallback', 'CompleteController@paypalCallback')->name('/paypalCallback');
Route::get('/complete', 'CompleteController@complete')->name('/complete');
Route::get('/completeStripe', 'CompleteController@completeStripe')->name('/completeStripe');

// chat
Route::get('/chat', 'ChatController@load')->name('/chat');
Route::post('/getChatMessagesNewCount', 'ChatController@getChatMessagesNewCount');
Route::post('/getChatMessages', 'ChatController@getChatMessages');
Route::post('/chatSendMessage', 'ChatController@chatSendMessage');
//
Route::get('/chatUsers2', 'ChatController@chatUsersApi');
Route::get('/chatMessages2', 'ChatController@chatMessages2');
Route::post('/chatMessageSend2', 'ChatController@chatMessageSend2');

Route::get('/shop', 'MainController@shop');

//
Route::get('/sellerReg', 'SellerRegController@sellerReg')->name('/sellerReg');
Route::post('/webSellerSave', 'SellerRegController@webSellerSave');
Route::get('/PayMob', 'PayMobController@callback');
