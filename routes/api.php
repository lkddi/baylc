<?php

use App\Http\Controllers\Api\AuthorizationsController;
use App\Http\Controllers\Api\BotController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SaleListController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\WeChatController;
use App\Http\Controllers\Api\WorkImgController;
use App\Http\Controllers\Auth\WechatLoginController;
use App\Http\Controllers\HuangGroupController;
use App\Http\Controllers\QunZhuanfa;
use App\Http\Controllers\QxController;
use App\Http\Controllers\VlwController;
use App\Http\Controllers\WxImgController;
use App\Http\Controllers\WxSaleController;
use App\Http\Controllers\WxUserController;
use App\Http\Controllers\ZtProductController;
use App\Http\Controllers\ZtStoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::any('wechat/vlw',[VlwController::class,'api']);
Route::any('wechat/qx',[QxController::class,'api']);

Route::any('wechat/wcf',[WeChatController::class,'api']);

Route::post('qywechat',[WeChatController::class,'QyWchat']);

//获取企业微信保存的群图片信息
Route::get('workimg',[WorkImgController::class,'index']);
Route::post('workimg/save',[WorkImgController::class,'save']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('zt/product',[ZtProductController::class,'product']);
Route::any('zt/store',[ZtStoreController::class,'store']);

//Route::any('zt/sales/{id}',[WxImgController::class,'show']);

Route::get('zt/sales/info', [WxImgController::class, 'info']);
Route::apiResource('zt/sales', WxImgController::class);
Route::apiResource('huang/pao', HuangGroupController::class);



Route::any('zt/user/save',[WxUserController::class,'save']);
Route::any('zt/user/{id}',[WxUserController::class,'index']);

//Route::any('zt/sales',[WxImgController::class,'index']);
//Route::post('addsale',[WxImgController::class,'add']);
//Route::post('zt/sales/del/{id}',[WxImgController::class,'delSale']);


Route::get('zhuanfa',[QunZhuanfa::class,'zhuanfa']);

Route::any('sale',[WxSaleController::class,'check']);


Route::any('f',[\App\Http\Controllers\Api\WxloginController::class,'Login']);
// 登录
Route::post('authorizations', [AuthorizationsController::class, 'store'])
    ->name('authorizations.store');
// 小程序登录

Route::post('login', [AuthorizationsController::class, 'weappStore'])
    ->name('weapp.authorizations.store');

Route::post('refresh', [AuthorizationsController::class, 'update'])
    ->name('weapp.authorizations.refresh');

// 删除token
Route::delete('authorizations/current', [AuthorizationsController::class, 'destroy'])
    ->name('authorizations.destroy');



Route::group(['middleware' => ['auth:api']], function () {
    Route::get('my',[\App\Http\Controllers\Api\MyController::class,'my']);
    Route::get('mysales',[\App\Http\Controllers\Api\ZtSaleController::class,'sales']);


});



Route::any('tel', [AuthorizationsController::class, 'tel']);

Route::any('work',function (Request $request){
//    Log::info($request->all());
});


Route::get('wx/salelist',[SaleListController::class,'index']);
Route::post('product/add',[ProductController::class,'create']);
Route::get('store',[StoreController::class,'index']);
Route::post('store',[StoreController::class,'save']);

Route::apiResource('bot',BotController::class);
