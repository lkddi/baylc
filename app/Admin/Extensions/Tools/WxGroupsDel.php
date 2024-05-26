<?php

namespace App\Admin\Extensions\Tools;

use App\Models\WxGroup;
use App\Models\WxUser;
use App\Wechats\VlwApiServer;
use Dcat\Admin\Grid\BatchAction;
use Illuminate\Http\Request;

class WxGroupsDel extends BatchAction
{
    protected $action;

    // 注意action的构造方法参数一定要给默认值
    public function __construct($title = null, $action = 1)
    {
        $this->title = $title;
        $this->action = $action;
    }

    // 确认弹窗信息
    public function confirm()
    {
        return '您确定删除选定的群吗？连同用户一起删除';
    }

    // 处理请求
    public function handle(Request $request)
    {
        // 获取选中的文章ID数组
        $keys = $this->getKey();

        // 获取请求参数
        $action = $request->get('action');

        foreach (WxGroup::find($keys) as $group) {
//            $post->de = $action;
            $group->delete();
            VlwApiServer::QuitGroup($group['robot_wxid'],$group['wxid']);
            WxUser::where('group_wxid',$group['wxid'])->delete();
        }

        $message = $action ? '群删除成功' : '文章下线成功';

        return $this->response()->success($message)->refresh();
    }

    // 设置请求参数
    public function parameters()
    {
        return [
            'action' => $this->action,
        ];
    }
}
