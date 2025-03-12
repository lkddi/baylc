<?php

use App\Admin\Repositories\ZtCompany;
use App\Events\AddMsgEvent;
use App\Exceptions\WokeException;
use App\Facades\ApiGateway;
use App\Jobs\SendMessageWorkJob;
use App\Models\WxSale;
use App\Models\WxUser;
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
    $token = '310d544785504981b39f08e3f2fe8c3a';
    $appid = 'wx_VxxjDRGrMKKUwNMSrgFo_';
//    $user = WxUser::with(['group','store'])->find(1);
//    dd($user);
    $message = array (
        'TypeName' => 'AddMsg',
        'Appid' => 'wx_VxxjDRGrMKKUwNMSrgFo_',
        'Data' =>
            array (
                'MsgId' => 382482232,
                'FromUserName' =>
                    array (
                        'string' => '56648603618@chatroom',
                    ),
                'ToUserName' =>
                    array (
                        'string' => 'wxid_pruy5b5gm0bg12',
                    ),
                'MsgType' => 49,
                'Content' =>
                    array (
                        'string' => 'wxid_49n16bk29gqm22:
<?xml version="1.0"?>
<msg>
	<appmsg appid="" sdkver="">
		<title><![CDATA[微信转账]]></title>
		<des><![CDATA[收到转账40.00元。如需收钱，请点此升级至最新版本]]></des>
		<action />
		<type>2000</type>
		<content><![CDATA[]]></content>
		<url><![CDATA[https://support.weixin.qq.com/cgi-bin/mmsupport-bin/readtemplate?t=page/common_page__upgrade&text=text001&btn_text=btn_text_0]]></url>
		<thumburl><![CDATA[https://support.weixin.qq.com/cgi-bin/mmsupport-bin/readtemplate?t=page/common_page__upgrade&text=text001&btn_text=btn_text_0]]></thumburl>
		<lowurl />
		<extinfo />
		<wcpayinfo>
			<paysubtype>1</paysubtype>
			<feedesc><![CDATA[￥40.00]]></feedesc>
			<transcationid><![CDATA[53010001358004202503120715515779]]></transcationid>
			<transferid><![CDATA[1000050001202503120029250508826]]></transferid>
			<invalidtime><![CDATA[1741866638]]></invalidtime>
			<begintransfertime><![CDATA[1741780238]]></begintransfertime>
			<effectivedate><![CDATA[1]]></effectivedate>
			<pay_memo><![CDATA[E176 40 1]]></pay_memo>
			<receiver_username><![CDATA[zw11112448]]></receiver_username>
			<payer_username><![CDATA[wxid_49n16bk29gqm22]]></payer_username>
		</wcpayinfo>
	</appmsg>
</msg>',
                    ),
                'Status' => 3,
                'ImgStatus' => 1,
                'ImgBuf' =>
                    array (
                        'iLen' => 0,
                    ),
                'CreateTime' => 1741780238,
                'MsgSource' => '<msgsource>
	<silence>0</silence>
	<membercount>11</membercount>
	<signature>N0_V1_ravKtKYH|v1_o9d0fAjw</signature>
	<tmp_node>
		<publisher-id></publisher-id>
	</tmp_node>
</msgsource>',
                'PushContent' => '松下洗护霍利春18095000601 : [转账]',
                'NewMsgId' => 2211795744274460479,
                'MsgSeq' => 820491529,
            ),
        'Wxid' => 'wxid_pruy5b5gm0bg12',
    );


    $content = $message['Data']['Content']['string'];
    print_r($content);
    if (preg_match('/^[^:]+/', $content, $matches)) {
        $result = $matches[0];
//                        echo $result;
        print_r($result);
    }
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
