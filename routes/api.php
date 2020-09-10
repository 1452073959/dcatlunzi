<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app(\Dingo\Api\Routing\Router::class);

$api->version('v1', [
//    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {
    //需要登录
    Route::middleware('jwt.auth')->group(function ($api) {
        Route::get('cardlist', 'Api\Discountuser@kabiao');
        //
        //添加卡
        Route::post('discount', 'Api\Discountuser@add');

    });

    // 登录
    $api->post('logincode', 'WechatController@wechat');
    //用户信息
    Route::get('user','Api\WechatController@usershow');
    //刷新token
    $api->get('token', 'WechatController@tokenupdate');


});
