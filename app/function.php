<?php

//自定义方法文件

//CheckGroupAdmin()

use App\Models\WxGroup;
use App\Models\WxUser;
use App\Services\QyWechatData;
use Carbon\Carbon;

function Bot_id()
{
    
}

if (!function_exists('format_datetime')) {
    function format_datetime($datetime)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $datetime)->format('Y-m-d H:i:s');
    }
}

function getToUser($data)
{
    if (strpos($data['conversation_id'], 'R:') !== false) {
        return $data['conversation_id'];
    } else {
        return $data['conversation_id'];
    }
}

/**
 * @return void
 */
function sendIyuu($text, $desp = null)
{
    QyWechatData::send_iyuu($text, $desp);
}


function checkAndPrepend($code, $num = 4, $prefix = '增加')
{
    $parts = explode(' ', $code);
    // 检查第一个部分是否为"新增"

    if ($parts[0] !== $prefix) {
        return false;
    }
    // 检查是否有至少4个部分（"新增", 门店名称, 型号, 金额）
    if (count($parts) < $num) {
        return false;
    }
    return true;

}


/**
 * 判断是否是群聊
 * @param $data
 * @return bool
 */
function IfRoomid($data): bool
{
//    Log::info('这里是ifRoomid检查');
//    Log::info($data);
    //检查变量是否存在
    if (!isset($data['conversation_id'])) {
        return false;
    }

    if (Str::contains($data['conversation_id'], 'R:')) {
        return true;
    } else {
        return false;
    }
}

/**
 * 群 管理 确认
 * @param $group_wid
 * @param $wid
 * @return bool
 */
function CheckGroupAdmin($group_wid, $wid): bool
{
    if ($wid == 'dd23com') {
        return true;
    }
    $group = WxGroup::where('wxid', $group_wid)->first();
    if ($group && $group->admin_wxid == $wid) {
        return true;
    } else {
        return false;
    }
}

/**
 * 查询 用户信息
 * @param $wid
 * @param $group_wid
 * @return false
 */
function qUser($wid, $group_wid)
{
    $user = WxUser::where('group_wxid', $group_wid)->where('wxid', $wid)->first();
    return $user ?? false;
}

/**
 * 查找微信用户信息
 * @param $wxid
 * @param $group_wxid
 * @return null
 */
function findWxUserName($wxid, $group_wxid)
{
    $user = qUser($wxid, $group_wxid);
    if ($user) {
        return $user->name ?? $user->nickname;
    }
    return null;
}


/**
 * 保存用户门店信息
 * @param $wid
 * @param $from_group
 * @param $store_id
 * @return bool
 */
function saveUserStore($wid, $from_group, $store_id): bool
{
    $user = WxUser::where('group_wxid', $from_group)->where('wxid', $wid)->first();
    if ($user && !$user->zt_store_code) {
        $user->zt_store_code = $store_id;
        $user->save();
        return true;
    }
    return false;
}

/**
 * 未设置门店的特权用户，不用发提醒
 * @param $wid
 * @return bool
 */
function checkStoreSend($wxid)
{
    $users = [
        'xzj165',
        'lliuhongping202314',
        'wxid_a20gkjep135x22',
        'wxid_keves5ubfq8411',
        'yan_408625550',
        'wxid_pruy5b5gm0bg12',
        'dd23com',
        'wxid_y1982zfbhigz21',
        'ligang1981',
        'wxid_1rv58bt2ay8e22',
        'wxid_28zobzt61xne22',
        'swp4723543',
    ];

    if (in_array($wxid, $users)) {
        return true;
    }
    return false;
}

function checkGroupSend($group_wxid)
{
    $users = [
        '19370116010@chatroom',
        '18082030339@chatroom',

    ];
    if (in_array($group_wxid, $users)) {
        return true;
    }
    return false;
}

/**
 * 查找用户的归属的门店名字
 * @param $wxid
 * @param $group_wxid
 * @return false|\Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|string
 */
function findUserStoreName($wxid, $group_wxid): mixed
{
    $user = WxUser::wxid($wxid, $group_wxid)->first();
//    dd($user->store);
    if ($user && $user->store) {
        return $user->store->title;
    }
    return false;
}

function checkQuyu($code)
{
    if (strlen($code) == 10) {
        return 'ext12Code';
    } elseif (strlen($code) == 12) {
        return 'ext11Code';
    } else {
        return 'salesDeptCode';
    }
}

function formatTime($timevalue)
{
    if (strpos($timevalue, "-")) {
        return strtotime($timevalue);
    } else {
        return intval(($timevalue - 25569) * 3600 * 24 - 28800);
    }
}

/**
 * Created by PhpStorm.
 * User: 萧逸
 * Date: 2017/6/20
 * Time: 10:11
 *
 * 在使用 PHP 做简单的爬虫的时候，我们经常会遇到需要下载远程图片的需求，所以下面来简单实现这个需求。
 */
class Spider
{
    //定义下载图片 用于发送url
    public function downloadImage($url, $path = '/www/wwwroot/bj.ay.lc/storage/app/public/files/')
    {
        $ch = curl_init();
        //以url的形式 进行请求
        curl_setopt($ch, CURLOPT_URL, $url);
        //以文件流的形式 进行返回 不直接输出到浏览器
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //浏览器发起请求 超时设置
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $file = curl_exec($ch);
        curl_close($ch);
        //返回文件路径的信息
        $this->saveAsImage($url, $file, $path);
    }

    //保存图片
    private function saveAsImage($url, $file, $path)
    {
        //返回文件的基本信息
        $filename = pathinfo($url, PATHINFO_BASENAME);
        //打开文件 并且写入到路径中
        $resource = fopen($path . $filename, 'a');
        fwrite($resource, $file);
        fclose($resource);
    }



}


