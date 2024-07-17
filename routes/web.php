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

    QyWechatData::send_work_msg('ceshi');

    $data = array();
    $data['client_id'] = 1;
    $data['message_type'] = 11154;             // Api数值（可以参考 - api列表demo）
    $data['params'] = [
        'conversation_id' => 'R:10957429678709694',
        'content' => 'ceshi',
    ];
//    $to = 'R:10957429678709694';
//    $message = "Welcome";
//    QyWechatData::send_text_msg($to ,$message);
    $mq = new \App\Services\Rabbitmq\RabbitmqServer();
    $mq->send($data);


    Log::info('test');

//    return WxWorkImg::create($message['message_data']);
});



