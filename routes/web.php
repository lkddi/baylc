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

    $today = Carbon::today()->toDateString();
//    $sales = WxSale::with(['store', 'product'])->where('zt_company_id', 2)->whereDate('created_at', $today)->get();

    $a = array (
        'client_id' => '961632a0-09ce-3880-95ea-92637305a563',
        'message_type' => 11041,
        'message_data' =>
            array (
                'appinfo' => '4477935335403118690',
                'at_list' =>
                    array (
                        0 =>
                            array (
                                'nickname' => '董冬明',
                                'user_id' => '1688856965630846',
                            ),
                    ),
                'content' => '@董冬明 今天几号',
                'content_type' => 2,
                'conversation_id' => 'R:10921933120267894',
                'is_pc' => 0,
                'local_id' => '34938',
                'quote_content' => '',
                'receiver' => '1688856965630846',
                'send_time' => '1730478211',
                'sender' => '7881302503935047',
                'sender_name' => '松下董冬明¹⁵³⁸⁹⁸¹⁴¹¹⁴',
                'server_id' => '1116413',
            ),
    );
 Log::info(1);

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
