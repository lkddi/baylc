<?php

use App\Admin\Controllers\NccSaleController;
use App\Admin\Controllers\RuningGroupController;
use App\Admin\Controllers\RuningTargetController;
use App\Admin\Controllers\StockPileController;
use App\Admin\Controllers\WarehouseController;
use App\Admin\Controllers\WxbotController;
use App\Admin\Controllers\WxForwardController;
use App\Admin\Controllers\WxGroupController;
use App\Admin\Controllers\WxRewardController;
use App\Admin\Controllers\WxSalestargetController;
use App\Admin\Controllers\WxUserController;
use App\Admin\Controllers\WxWorkController;
use App\Admin\Controllers\WxWorkUserController;
use App\Admin\Controllers\ZtCompanyController;
use App\Admin\Controllers\ZtGatiController;
use App\Admin\Controllers\ZtProductController;
use App\Admin\Controllers\ZtStoreController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resources([
        'wxbot' => WxbotController::class,
        'product' => ZtProductController::class,
        'StoreHouse' => ZtStoreController::class,
        'StockPile' => StockPileController::class,
        'warehouse' => WarehouseController::class,
//        'warehouse'=>Ware
        'msg' => \App\Admin\Controllers\WxMsgController::class,
        'wxforward' => WxForwardController::class,
        'WxReward' => WxRewardController::class,
        'WxSalestarget' => WxSalestargetController::class,
//        'product-brands' => ProductBrandController::class,
        'group' => WxGroupController::class,
        'work' => WxWorkController::class,
        'wxuser' =>  WxUserController::class,
        'gati' => ZtGatiController::class,
        'reward' => ZtRewardController::class,
////        'pay-orders' => OrderController::class,
//        'szw' => SzwClassController::class,
        'ZtDeptRegion' => ZtDeptRegionController::class,
        'ZtDeptBigRegion' => \App\Admin\Controllers\ZtDeptBigRegionController::class,
        'ZtRetail' => \App\Admin\Controllers\ZtRetailController::class,
        'ZtCanalType' => \App\Admin\Controllers\ZtCanalTypeController::class,
        'ztsale' => ZtSaleController::class,
        'wxsale' => WxSaleController::class,
        'nccsale' => NccSaleController::class,
//        'channel' => ZtChannelController::class,
//        'p10y' => P10yController::class,
        'wximg' => WxImgController::class,
        'tools' => WxToolsController::class,
        'runinggroup' =>RuningGroupController::class,
        'runtarget' =>RuningTargetController::class,
        'workuser'=>WxWorkUserController::class,
        'company'=>ZtCompanyController::class,


    ]);

});
