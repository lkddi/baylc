<?php

namespace App\Admin\Extensions;

use App\Facades\ApiGateway;
use App\Models\WxGroup;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;

class MigrateUserToNewGroup extends RowAction
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
        return '迁移新群';
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
            "您确定要迁移新群吗？",
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
        $haoyous = $group->users->pluck('wxid')->toArray();
        $request = ApiGateway::createChatroom($group->bot->appid, ['dd23com', 'wxid_8xi5xkpc8byu12']);
        if ($request['msg'] == '操作成功') {
            $group_wxid = $request['data']['chatroomId'];
            // 发送群消息
            $request = ApiGateway::postText($group->bot->appid, $group_wxid, '原群即将停用，转移至本群！！！！');
            // 修改群名
            $request = ApiGateway::modifyChatroomName($group->bot->appid, $group_wxid, $group->nickname . '(新)');

            ApiGateway::saveContractList($group->bot->appid, $group_wxid);

            if (is_array($haoyous)) {
                foreach ($haoyous as $wxid) {
                    $request = ApiGateway::inviteMember($group->bot->appid, $group_wxid, $wxid);
                }
            }
        }
//        \Log::info('创建新群请求：', ['request' => $request]);
        // 返回响应结果并刷新页面
        return $this->response()->success("复制成功: [{$username}]")->refresh();
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
