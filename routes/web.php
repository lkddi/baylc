<?php

use App\Admin\Repositories\ZtCompany;
use App\Exceptions\WokeException;
use App\Jobs\SendMessageWorkJob;
use App\Models\WxSale;
use App\Models\ZtStore;
use App\Services\CoreServer;
use App\Services\FastgptService;
use App\Services\QyWechatData;
use App\Services\Rabbitmq\RabbitmqServer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
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


Route::get('/t', function (\Illuminate\Http\Request $request) {

// 获取本月的第一天和最后一天
    $firstDayOfMonth = Carbon::now()->startOfMonth();
    $lastDayOfMonth = Carbon::now()->endOfMonth();

$store = ZtStore::find(13710);
    $salesThisMonth = $store->wxsales()
        ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
        ->sum('quantity');
    Log::error($salesThisMonth);
dd($salesThisMonth);

//    $fast  =New FastgptService(2);
//    $fast->sendFastgpt($num['message_data']['content'], $num['message_data']['conversation_id'],$num['message_data']['conversation_id']);

});



//读取csv文件
//$filePath = storage_path('123.csv');
//    if (($handle = fopen($filePath, "r")) !== FALSE) {
//        $header = fgetcsv($handle); // 读取 CSV 头部
//        $data = [];
//        while (($row = fgetcsv($handle)) !== FALSE) {
////            $data[] = array_combine($header, $row);
//            if (isset($row[1])) {
//                $store = \App\Models\ZtStore::find($row[0]);
//                if ($store) {
//                    if ($store->nickname == $row[1]){
//                        print_r('存在：'.$store->name);
//                        print_r( '<br>');
//                        continue;
//                    }else{
//                        print_r('修改：'.$row[0]);
//                        print_r($store->name);
//                        #打印换行
//                        print_r( '<br>');
//                        $store->nickname = $row[1];
//                        $store->save();
//                    }
//                } else {
//                    continue;
//                }
//
//            }
//
//        }
//        fclose($handle);
//    }
