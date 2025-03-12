<?php

namespace App\Admin\Extensions;

use App\Facades\ApiGateway;
use App\Models\WxGroup;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;

class QuitChatroom extends RowAction
{
    protected $model;

    public function __construct(string $model = null)
    {
        $this->model = $model;
    }

    /**
     * 返回字段标题
     *
     * @return string
     */
    public function title()
    {
        return '退群';
    }

    /**
     * 设置确认弹窗信息，如果返回空值，则不会弹出弹窗
     *
     * 允许返回字符串或数组类型
     *
     * @return array|string|void
     */
    public function confirm()
    {

        return [
            // 确认弹窗 title
            "您确定要退群吗？",
            // 确认弹窗 content
            $this->row->username,
        ];
    }

    /**
     * 处理请求
     *
     * @param Request $request
     *
     * @return \Dcat\Admin\Actions\Response
     */
    public function handle(Request $request)
    {
        // 获取当前行ID
        $id = $this->getKey();
        // 获取 parameters 方法传递的参数
        $username = $request->get('token');

        $group = WxGroup::find($id);
        if (!$group) {
            return $this->response()->warning("数据出错了")->refresh();
        }

        $result = ApiGateway::quitChatroom($group->bot->appid, $group->wxid);
        if($result['msg'] == '操作成功'){
            $group->delete();
            return $this->response()->success("退群成功")->refresh();
        }
//        \Log::info('创建新群请求：', ['request' => $request]);
        // 返回响应结果并刷新页面
        return $this->response()->success("退群失败: [{$result['']}]")->refresh();
    }

    /**
     * 设置要POST到接口的数据
     *
     * @return array
     */
    public function parameters()
    {
        return [
            // 发送当前行 username 字段数据到接口
            'username' => $this->row->username,
            // 把模型类名传递到接口
            'model' => $this->model,
        ];
    }
}
