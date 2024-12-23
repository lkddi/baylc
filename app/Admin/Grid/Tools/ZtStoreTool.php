<?php

namespace App\Admin\Grid\Tools;

use App\Servers\Server;
use App\Wechats\VlwApiServer;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\Tools\AbstractTool;
use Illuminate\Http\Request;

class ZtStoreTool extends AbstractTool
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
        return '批量修改门店简称';
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
        return ['您确定要更新机器人信息？', ''];
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
//        $a = VlwApiServer::GetRobotList();
//        Server::updateBot($a);
        return $this->response()->success('发送成功')->refresh();
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





//
//    protected function script()
//    {
////        $url = request()->fullUrlWithQuery(['gender' => '_gender_']);
////dd(11111);
////        return <<<JS
////$('input:radio.user-gender').change(function () {
////    var url = "$url".replace('_gender_', $(this).val());
////
////    Dcat.reload(url);
////});
////JS;
//        $a = VlwApiServer::GetRobotList();
//        Server::updateBot($a);
//    }

//    public function render()
//    {
//        Admin::script($this->script());
//
//        $options = 'Bot资料更新';
//
//        return view('admin.tools.wxbot', compact('options'));
//    }
}
