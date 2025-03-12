<?php

namespace App\Admin\Extensions;

use App\Facades\ApiGateway;
use App\Models\WechatBot;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;

class GetOnline extends RowAction
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
        return '更新状态';
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
            "您确定要更新机器人数据吗？",
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
//        $model = $request->get('model');

        $bot = WechatBot::find($id);

        $request = ApiGateway::getProfile($bot->appid);
//        if ($request['ret'] == 500) {
//            $token = ApiGateway::getTokenId();
//            if ($token['ret'] == 200) {
//                $bot->token = $token['data'];
//                $bot->appid = '';
//                $bot->wxid = '';
//                $bot->nickName = '';
//                $bot->smallHeadImgUrl = '';
//                $bot->save();
//                return $this->response()->success("机器人掉线，需要重新登录")->refresh();
//            }
//        }

        \Log::channel('gewe_daily')->info($request);
        $bot->update([
            'nickName' => $request['data']['nickName'],
            'smallHeadImgUrl' => $request['data']['smallHeadImgUrl'],
            'wxid' => $request['data']['wxid'],
        ]);
//
//        // 复制数据
//        $model::find($id)->replicate()->save();

        // 返回响应结果并刷新页面
        return $this->response()->success("更新成功: [{$username}]")->refresh();
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
//            'model' => $this->model,
        ];
    }
}
