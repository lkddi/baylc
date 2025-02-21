<?php

use App\Admin\Repositories\ZtCompany;
use App\Exceptions\WokeException;
use App\Jobs\SendMessageWorkJob;
use App\Models\WxSale;
use App\Models\ZtGati;
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

//
//    $sales = WxSale::where('zt_company_id', 1)
//        ->where('created_at', '>=', '2025-01-01')
//        ->get();
//    foreach ($sales as $sale) {
//        $today = Carbon::today();
//        $product = ZtGati::where('zt_product_id', $sale->zt_product_id)
//            ->where('zt_company_id', 1)
//            ->first();
//        if ($product && $product->percentage) {
//            $sale->amount = $product->percentage;
//            print_r($sale->id);
////            print_r($sale->model);
//            print_r('<br>');
//            $sale->save();
//        }
//
//    }
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
