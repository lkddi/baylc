<?php

use App\Admin\Controllers\GroupWelcomeMessageController;
use App\Admin\Controllers\InventoryLogController;
use App\Admin\Controllers\NccSaleController;
use App\Admin\Controllers\StockPileController;
use App\Admin\Controllers\WarehouseController;
use App\Admin\Controllers\WechatBotController;
use App\Admin\Controllers\WokeApiController;
use App\Admin\Controllers\WxbotController;
use App\Admin\Controllers\WxForwardController;
use App\Admin\Controllers\WxGroupController;
use App\Admin\Controllers\WxImgController;
use App\Admin\Controllers\WxRewardController;
use App\Admin\Controllers\WxSaleController;
use App\Admin\Controllers\WxSalestargetController;
use App\Admin\Controllers\WxToolsController;
use App\Admin\Controllers\WxUserController;
use App\Admin\Controllers\WxUserListController;
use App\Admin\Controllers\WxWorkController;
use App\Admin\Controllers\WxWorkUserController;
use App\Admin\Controllers\ZtCanalTypeController;
use App\Admin\Controllers\ZtCompanyController;
use App\Admin\Controllers\ZtDeptBigRegionController;
use App\Admin\Controllers\ZtDeptRegionController;
use App\Admin\Controllers\ZtGatiController;
use App\Admin\Controllers\ZtProductController;
use App\Admin\Controllers\ZtRetailController;
use App\Admin\Controllers\ZtRewardController;
use App\Admin\Controllers\ZtSaleController;
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
        'wechat-bot'=> WechatBotController::class,
        'product' => ZtProductController::class,
        'StoreHouse' => ZtStoreController::class,
        'StockPile' => StockPileController::class,
        'warehouse' => WarehouseController::class,
        'msg' => \App\Admin\Controllers\WxMsgController::class,
        'wxforward' => WxForwardController::class,
        'WxReward' => WxRewardController::class,
        'WxSalestarget' => WxSalestargetController::class,
        'group' => WxGroupController::class,
        'work' => WxWorkController::class,
        'wxuser' =>  WxUserController::class,
        'gati' => ZtGatiController::class,
        'reward' => ZtRewardController::class,
        'ZtDeptRegion' => ZtDeptRegionController::class,
        'ZtDeptBigRegion' => ZtDeptBigRegionController::class,
        'ZtRetail' => ZtRetailController::class,
        'ZtCanalType' => ZtCanalTypeController::class,
        'ztsale' => ZtSaleController::class,
        'wxsale' => WxSaleController::class,
        'nccsale' => NccSaleController::class,
        'tools' => WxToolsController::class,
        'workuser'=>WxWorkUserController::class,
        'company'=>ZtCompanyController::class,
        'wokeapi'=>WokeApiController::class,
        'wxuserlist'=>WxUserListController::class,
        'inventorylog'=>InventoryLogController::class,
        'welcome'=>GroupWelcomeMessageController::class,
        'task'=>\App\Admin\Controllers\TaskController::class,

    ]);

});
