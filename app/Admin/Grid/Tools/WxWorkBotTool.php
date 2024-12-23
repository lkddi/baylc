<?php

namespace App\Admin\Grid\Tools;

use App\Models\WxUserList;
use App\Models\WxWork;
use App\Services\QyWechatData;
use App\Services\WorkWechat\UserListMessageHandler;
use Cache;
use Dcat\Admin\Grid\Tools\AbstractTool;
use Illuminate\Http\Request;

class WxWorkBotTool extends AbstractTool
{
    /**
     * 按钮样式定义，默认 btn btn-white waves-effect
     *
     * @var string
     */
    protected $style = 'btn btn-primary grid-refresh btn-mini feather icon-refresh-cw';


    /**
     * 按钮文本
     *
     * @return string|void
     */
    public function title()
    {
        return ' 企业群数据更新';
    }

    /**
     *  确认弹窗，如果不需要则返回空即可
     *
     * @return array|string|void
     */
    public function confirm()
    {
        // 只显示标题
//        return '您确定要发送新的提醒消息吗？';

        // 显示标题和内容
        return ['您确定要更新企业群信息？', ''];
    }

    /**
     * 处理请求
     * 如果你的类中包含了此方法，则点击按钮后会自动向后端发起ajax请求，并且会通过此方法处理请求逻辑
     *
     * @param Request $request
     */
    public function handle(Request $request)
    {

//        WxWork::update(['new'=>0]);
        WxWork::where('id', '>=', 1)->update(['new' => 0]);
//        QyWechatData::get_rooms();
        $data['guid'] = Cache::get('client_id');
        $data['page_num'] = 1;
        $data['page_size'] = 500;
        $request = QyWechatData::send_work_api_return($data,'/room/get_rooms');
        $request = json_decode($request, true);
        \Log::info($request);
        if (isset($request['data']['room_list']) && count($request['data']['room_list'])>0) {
            foreach ($request['data']['room_list'] as $room) {
                WxWork::updateOrCreate(
                    [
                        'roomid' => $room['conversation_id']
                    ],
                    [
                        'roomname' => $room['nickname'],
                    ]);
            }
            return $this->response()->success('更新成功!')->refresh();

        }else{
            return $this->response()->warning('更新失败!')->refresh();

        }
    }

    /**
     * 设置请求参数
     *
     * @return array|void
     */
    public function parameters()
    {
        return [

        ];
    }


}
