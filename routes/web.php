<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get("/ads/get_ads", [
        'uses'  =>  'AdsController@get_ads',
        'as'    =>  'ads.get'
    ]);
    
    Route::get("/ads/delete_ad/{adid}", [
        'uses'  =>  'AdsController@delete_ad',
        'as'    =>  'ads.delete'
    ]);

    Route::get('/get-people-nearby/{id}', [
        'uses'  =>  'MessagingController@get_people_nearby',
        'as'    =>  'people.nearby'
    ]);

    Route::get('/messaging/chat/{phone}', [
        'uses'  =>  'MessagingController@chat',
        'as'    =>  'messaging.chat'
    ]);

    Route::get('/messaging/load-messages/{user_id}/{chat_id}', [
        'uses'  =>  'MessagingController@load_messages',
        'as'    =>  'messaging.chat.load'
    ]);

    Route::get('/messaging/post', [
        'uses'  =>  'MessagingController@post_message',
        'as'    =>  'messaging.post'
    ]);

    Route::get('/test-users-nearby', [
        'uses'  =>  'AdsController@testnearby',
        'as'    =>  'nearby.test'
    ]);

    Route::get('/get_auth_user_data', function() {
        return \Auth::user();
    });

    Route::get('/get-currently-chatting/{phone}', [
        'uses'  =>  'MessagingController@get_currently_chatting',
        'as'    =>  'messaging.current'
    ]);
});

Route::resource('notification', 'NotificationController');
Route::resource('adscomment', 'AdsCommentController');
Route::resource('contact', 'ContactController');
Route::resource('message', 'MessagingController');
Route::resource('profile', 'ProfileController');
Route::resource('search', 'SearchController');
Route::resource('users', 'UserController');
Route::resource('ads', 'AdsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("users/email-verification/{code}/{id}", "UserController@activation");
Route::post("/account-setup", "Auth\RegisterController@accountSetup")->name("account-setup");
Route::get("verify-slug/", "Auth\RegisterController@verifySlug")->name("verify-slug");
Route::post("/login.modal", "Auth\LoginController@loginModal")->name("login.modal");
Route::get("help/areas", "\Helpers\Utility@getarea");
Route::get("/ads/result/{slug}", "AdsController@adsSlug");
Route::post("/ads/search", "AdsController@asdSearch");
Route::post("/ads/search-home", "AdsController@asdSearchHome");

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile/activate/{username}', [
        'uses' => 'ProfileController@activate',
        'as'    => 'profile'
    ]);
});

Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::post('refresh-token', 'AuthenticateController@refreshToken');
    Route::post('get-user', 'AuthenticateController@getUser');
    Route::get('home', 'ApiController@home');
    Route::get('/ads/result/{slug}', 'ApiController@getAd');
});