<?php

use App\Imports\ImportSalesstarget;
use App\Jobs\ProcessRabbitMQMessage;
use App\Jobs\WorkDownImgJob;
use App\Models\HuangGroup;
use App\Models\HuangTarget;
use App\Models\RuningTarget;
use App\Models\WxSale;
use App\Models\WxSalestarget;
use App\Models\WxWork;
use App\Models\WxWorkImg;
use App\Models\ZtDeptBigRegion;
use App\Models\ZtGati;
use App\Services\CoreServer;
use App\Services\QyWechatData;
use App\Services\WeChatFerry\AddSale;
use App\Services\WorkWechat\ImageMessageHandler;
use App\Wechats\EventGroupMsg;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/', [\App\Http\Controllers\VlwController::class, 'index']);


Route::get('/t', function () {



//    return WxWorkImg::create($message['message_data']);
});



