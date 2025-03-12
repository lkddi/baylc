<?php

namespace App\Listeners;

use App\Events\FinanceEvent;
use App\Exceptions\WokeException;
use App\Facades\ApiGateway;
use App\Models\WxGroup;
use App\Models\WxSale;
use App\Models\WxUser;
use App\Models\ZtProduct;
use App\Models\ZtStore;
use App\Services\Gewechat\WeChatMessageParser;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FinanceEventListener
{


    /**
     * 红包及转账内容处理
     *
     * @return void
     */

    protected $parser;

    public function __construct(WeChatMessageParser $parser)
    {
        $this->parser = $parser;
    }

    public function handle(FinanceEvent $event): void
    {
        $message = $event->data;
        $parsedContent = $this->parser->parseContent($message);
        $group_wxid = $message['Data']['FromUserName']['string'];

        if ($parsedContent['title'] == '邀请你加入群聊') {
            ApiGateway::agreeJoinRoom($message['Appid'], $parsedContent['url']);
        }
        $group = WxGroup::with(['users'])->where('wxid', $group_wxid)->first();
        if ($group && $group->isadd) {
            $msg = '';
            if ($parsedContent['title'] == '微信红包') {
                //   'description' => '我给你发了一个红包，赶紧去拆!',
                //  'url' => 'https://wxapp.tenpay.com/mmpayhb/wxhb_personalreceive?showwxpaytitle=1&msgtype=1&channelid=1&sendid=1000039901202503117412340744003&ver=6&sign=f74497b5b017da2b8bbd6ad7fcce68f183447b8c1988a001cd43b634aee52701dc9d3bbd76f1dc977e7369a432ab50420d4e6f3acf686b2c1eaeeb37e8fcca504454c3ec640bfb5c227cbb8945e3762e',
                //  'title' => '微信红包',
                //  'type' => '2001',
                //  'pay_memo' => '',
                //  'feedesc' => 0.0,
                //  'receivertitle' => 'EG17C 40 ',
                //  'sendertitle' => 'EG17C 40 ',
                //  'receiver_username' => '',
                //  'payer_username' => '',
                //)

            }
            if ($parsedContent['title'] == '微信转账') {

                //   'description' => '收到转账0.01元。如需收钱，请点此升级至最新版本',
                //  'url' => 'https://support.weixin.qq.com/cgi-bin/mmsupport-bin/readtemplate?t=page/common_page__upgrade&text=text001&btn_text=btn_text_0',
                //  'title' => '微信转账',
                //  'type' => '2000',
                //  'pay_memo' => '？？？？？',
                //  'feedesc' => 0.01,
                //  'receivertitle' => '',
                //  'sendertitle' => '',
                //  'receiver_username' => 'wxid_8xi5xkpc8byu12',
                //  'payer_username' => 'dd23com',
                $receiver_username = $parsedContent['receiver_username'];
                $pay_memo = $parsedContent['pay_memo'];
                $payer_username = $parsedContent['payer_username'];
                $store_name = '';
                $num = 1;

                // 判断是 发转账 还是 收转账，收则不操作登记
                $content = $message['Data']['Content']['string'];
                if (preg_match('/^[^:]+/', $content, $matches)) {
                    $result = $matches[0];
                    if ($receiver_username !== $result) {
                        return;
                    }
                }

                if (isset($receiver_username) && isset($pay_memo) && isset($payer_username)) {
                    $remarkParts = explode(' ', $pay_memo);
                    $model = $remarkParts[0];
                    $money = $remarkParts[1];
                    if (count($remarkParts) >= 4) {
                        $store_name = $remarkParts[3] ?? '';
                    } elseif (count($remarkParts) >= 3) {
                        if ($remarkParts[2] >= 100) {
                            $store_name = $remarkParts[2] ?? '';
                        }else{
                            $num = $remarkParts[2] ?? 1;
                        }
                    }

                    $models = $this->checkmodel($model);
                    if (!$models) {
                        $mess['send_user'] = 1;
                        $mess['data'] = '商品不存在:' . $model . ',如果型号没有错误,那请联系管理增加型号';
                        ApiGateway::postText($message['Appid'], $group_wxid, $mess['data']);
                        return;
                    }
                    $users = $group->users()->where('wxid', $receiver_username)->first();
                    if (!empty($store_name)) {
                        $store = $this->checkstore($store_name);
                        if (!$store) {
                            $mess['data'] = $msg . '门店不存在:' . $store_name . ',登录系统后台查看门店清，或者联系管理员!！';
                            ApiGateway::postText($message['Appid'], $group_wxid, $mess['data']);
                            return;
                        }
                        $users->zt_store_id = $store->id;
                        $users->save();

                    } else {
                        $store = $users->store;
                    }

                    $wxSale = new WxSale();
                    $wxSale->model = $models->title;
                    $wxSale->zt_product_id = $models->id;
                    $wxSale->zt_company_id = $group->zt_company_id;
                    $wxSale->zt_store_id = $users->zt_store_id;
                    $wxSale->zt_store_code = $store->code;
                    $wxSale->quantity = $num;
                    $wxSale->amount = $money;
                    $wxSale->price = $models->price;
                    $wxSale->from_group = $group_wxid;
                    $wxSale->from_wxid = $payer_username;
                    $wxSale->save();
                    $firstDayOfMonth = Carbon::now()->startOfMonth();
                    $lastDayOfMonth = Carbon::now()->endOfMonth();

                    // 首先查询销售数量和总金额
                    $salesData = $store->wxsales()
                        ->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
                        ->selectRaw('sum(quantity) as total_quantity, sum(amount * quantity) as total_amount')
                        ->first();

                    // 获取销售数量
                    $sales = $salesData->total_quantity;
                    // 获取总销售金额
                    $totalAmount = $salesData->total_amount;
                    // 根据销售数量判断并生成消息
                    $ss = '';
                    if ($salesData && $sales > 2) {
                        $ss = "本月已经累计销售{$sales}台" . PHP_EOL;
                    }

                    $company = $group->zt_company_id;
                    $mess['send_user'] = 0;
//            $aa = '，获得红包 ' . $remarkParts[2] * $num . '元!';
                    $mess['data'] = $msg . "恭喜门店:" . $store->name . ' :' . PHP_EOL . '销售松下' . $models->title . ' ' . $num . '台' . PHP_EOL . $ss . '大卖大卖大卖[庆祝]';
//                    dd($message);
                    ApiGateway::postText($message['Appid'], $group_wxid, $mess['data']);
                    return;
                }
            }


        }

    }

    public static function checkstore($name)
    {
        $store = ZtStore::where('nickname', $name)->first();
        if ($store) {
            return $store;
        } else {
            return false;
        }
    }

    public static function checkmodel($model)
    {
        $models = ZtProduct::where('model', $model)->first();
        if ($models) {

            return $models;
        } else {
            return false;
        }
    }
}
