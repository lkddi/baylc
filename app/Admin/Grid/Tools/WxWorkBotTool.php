<?php

namespace App\Admin\Grid\Tools;

use App\Models\WxBot;
use App\Models\WxWork;
use App\Servers\WxUserServer;
use App\Services\QyWechatData;
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
        // 你的代码逻辑
        $groups = WxWork::all();
        if ($groups){
            foreach ($groups as $group){
//                WxUserServer::checkNew($group->wxid);
                $group = QyWechatData::send_room($group->wxid);
                $r = json_decode($group, true);
                \Log::info($r);
            }
        }
        return $this->response()->success('更新成功!')->refresh();
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
