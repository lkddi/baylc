<?php

namespace App\Admin\Grid\Tools;

use App\Facades\ApiGateway;
use App\Models\WechatBot;
use App\Models\WxBot;
use App\Models\WxGroup;
use App\Servers\WxUserServer;
use Dcat\Admin\Grid\Tools\AbstractTool;
use Illuminate\Http\Request;

class WxGroupBotTool extends AbstractTool
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
        return ' 群数据更新';
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
        return ['您确定要更新群信息？', ''];
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
        $groups = WxGroup::with(['bot'])->get();
        if ($groups){
            foreach ($groups as $group){
                $request = ApiGateway::getChatroomInfo($group->bot->appid, $group->wxid);
                if ($request['ret'] == 200){
                    $group->update([
                        'nickname'=>$request['data']['nickName']
                    ]);
                    if ($group->user) {
                        foreach ($request['data']['memberList'] as $user) {
                            $group->users()->updateOrCreate([
                                'wxid' => $user['wxid'],
//                                'zt_company_id' => $group->zt_company_id
                            ], [
                                'nickname' => $user['nickName']
                            ]);
                        }
                    }

                }
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
