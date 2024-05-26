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
    $message = array (
        'client_id' => 1,
        'message_type' => 11042,
        'message_data' =>
            array (
                'appinfo' => '7154913086453938068',
                'cdn' =>
                    array (
                        'aes_key' => 'b6074cf24dd79bb93408586fb01fcefd',
                        'auth_key' => 'v1_3cf4686e23744ca639340d04515ff4d3959307e85e606700cc919ac1db84591f8d2a8e93492f6372faf1ff2056f2e94e1f31892b1ff99020e9646145f85912f6a8c4d95e0edb5aa14b4e43ba1070016d',
                        'file_name' => '',
                        'ld_size' => 2716,
                        'ld_url' => 'https://imunion.weixin.qq.com/cgi-bin/mmae-bin/tpdownloadmedia?param=v1_3cf4686e23744ca639340d04515ff4d3959307e85e606700cc919ac1db84591f8d2a8e93492f6372faf1ff2056f2e94e3be2b2b7ef35e1189dac7760db7c5c9796cfd47f938ffd1792a8f7b0ac43873ebc5da39b26665503fd06c79876580ad5ce6c00879151dc1ca25b1e1ae62cac80a4a98342b29ec4b7164e586dfb37a53914f1ea4599fc60fb3f1a6531529278ebd98589f95a3cee9440ccb090bacd7c5be31fa009e2d9c5846dcfd2617ec31060299cc7ff004329dd6435e9946168762044825ead9368143182b37f64b32720b4a9a85a8f870b8ede33999ed9c4bac60136b26ebc0bcecb0487110f0ca652800e5b837066259a073ade53cd534ceb6007a54e257fe916b3f81719a3fe525df92d',
                        'md5' => '93e4e6af56494db5e22f08ca61f7c20d',
                        'md_size' => 503462,
                        'md_url' => 'https://imunion.weixin.qq.com/cgi-bin/mmae-bin/tpdownloadmedia?param=v1_3cf4686e23744ca639340d04515ff4d3959307e85e606700cc919ac1db84591f8d2a8e93492f6372faf1ff2056f2e94eb8a71c87d72806b49160fa09c32c8abd79acf7f2b7510da0cee0c75e03a377a8080373997a210c3e77986c22f5a5770f688d7c61ee53b515a9c48bbd2dd0c34b01825da2d3fecc90a3fe45c6a8dcb3cc1b9f80e8334c0276363d6077ff9260db0ca532ee2042786f4a6bd2be3dca2a6d238ce34b3c924efed9fe8890294ffddcb94fd6be44104f75afea66f7c87bf2f28048d93f73949d52e0c6b8efc7e168506b2185b0ada92d61ba5a7460b3db57da8df18063412d6a10c8347e374014d43a356d83b1a6b285b3367ad218802ed4abd30906f83ed95027e63565a032a906af',
                        'size' => 503462,
                        'url' => 'https://imunion.weixin.qq.com/cgi-bin/mmae-bin/tpdownloadmedia?param=v1_3cf4686e23744ca639340d04515ff4d3959307e85e606700cc919ac1db84591f8d2a8e93492f6372faf1ff2056f2e94eb8a71c87d72806b49160fa09c32c8abd79acf7f2b7510da0cee0c75e03a377a8080373997a210c3e77986c22f5a5770f688d7c61ee53b515a9c48bbd2dd0c34b01825da2d3fecc90a3fe45c6a8dcb3cc1b9f80e8334c0276363d6077ff9260db0ca532ee2042786f4a6bd2be3dca2a6d238ce34b3c924efed9fe8890294ffddcb94fd6be44104f75afea66f7c87bf2f28048d93f73949d52e0c6b8efc7e168506b2185b0ada92d61ba5a7460b3db57da8df18063412d6a10c8347e374014d43a356d83b1a6b285b3367ad218802ed4abd30906f83ed95027e63565a032a906af',
                    ),
                'cdn_type' => 1,
                'content_type' => 101,
                'conversation_id' => 'R:10886471727775134',
                'is_pc' => 0,
                'receiver' => 'R:10886471727775134',
                'send_time' => '1716610644',
                'sender' => '7881301538965928',
                'sender_name' => '张东辉家电零售及批发15034797777',
                'server_id' => '1027416',
            ),
    )
    ;
//    $a = new ImageMessageHandler();
//    $a->handle($message);
//    CoreServer::handleRequest($message);
    try {
        // 调度作业
        WorkDownImgJob::dispatch($message['message_data']);

        // 记录日志
//        Log::info('Task dispatched to queue successfully.', ['img' => $img]);

        return response()->json(['status' => 'Image download job dispatched successfully']);
    } catch (Exception $e) {
        // 记录错误日志
//        Log::error('Failed to dispatch task to queue.', ['img' => $img, 'error' => $e->getMessage()]);

        return response()->json(['status' => 'Failed to dispatch image download job'], 500);
    }

//    return WxWorkImg::create($message['message_data']);
});



