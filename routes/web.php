<?php

use App\Admin\Repositories\ZtCompany;
use App\Exceptions\WokeException;
use App\Services\CoreServer;
use App\Services\QyWechatData;
use App\Services\Rabbitmq\RabbitmqServer;
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
//$data =array (
//    'client_id' => 'af551c54-ffe9-3e8f-bcef-8bb1f932209c',
//    'message_type' => 11049,
//    'message_data' =>
//        array (
//            'appinfo' => 'hongbao_1688853291427184_1800008896202408276379021298002',
//            'content_type' => 26,
//            'conversation_id' => 'R:10702600039784614',
//            'desc' => '来自杜曦的红包，请进入手机版企业微信查看',
//            'is_pc' => 0,
//            'local_id' => '1758',
//            'money' => 3000,
//            'packet_id' => '1800008896202408276379021298002',
//            'receiver' => '1688856965630846',
//            'remark' => '290657 EG10G 38',
//            'send_time' => '1724736289',
//            'sender' => '1688853291427184',
//            'sender_name' => '杜曦',
//            'server_id' => '1017109',
//        ),
//) ;
//
////    CoreServer::handleRequest($data);
//    try {
////        Log::info("收到的企业微信信息");
////        Log::info($data);
//        CoreServer::handleRequest($data);
//    } catch (WokeException $e) {
//        echo '队列入口-异常: ' . $e->getMessage() . "\n";
//        $uid = $e->getData();
//        if (isset($data['message_data']) && isset($data['message_data']['conversation_id'])) {
//            QyWechatData::send_text_msg(getToUser($data['message_data']), $e->getMessage(), $uid);
//        }
//    }

//    echo time();

    $featureCode = "新增 五原百信 E17680";

// 获取当前时间的时间戳
    $currentTimestamp = time();

//    dd(checkAndPrepend($featureCode, 4,'新增'));
// 转换为 "年-月-日 时:分:秒" 格式
//    $formattedDate = date('Y-m-d H:i:s', $currentTimestamp);
//
//    echo $formattedDate; // 输出格式化的日期和时间
//    print_r( '<br>');
//
//    $code = '添加型号 L186+LHM02Y211 LHM02Y2-L186';
//    $title = str_replace('添加型号 ', '', $code);
//    $x = explode(' ', $title);
//    if (!strpos($x[1], '-') !== false || !strpos($x[1], '+') !== false) {
//        echo $x[1];
//        echo 'sss';
//    }else{
//        echo 'dddd';
//    }
//if (!strpos($x[1], '-') !== false){
//    echo $x[1];
//    echo 'qqq';
//}

//    dd(checkAndPrepend($code, 4,'增加'));


//
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

