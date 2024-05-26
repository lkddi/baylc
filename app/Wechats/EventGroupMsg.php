<?php

namespace App\Wechats;

use App\Models\WxGroup;
use App\Models\WxImg;
use App\Models\WxMsg;
use App\Plugin\RuningGroup;
use App\Servers\ApiAylc;
use App\Servers\GroupZhuanfa;
use App\Servers\Tuijin;
use Illuminate\Support\Facades\Log;

class EventGroupMsg
{
    public static function msg($data)
    {
        GroupZhuanfa::zhuanfa($data);

        $group = WxGroup::wxid($data['from_group'])->first();
        if ($group) {

            //群改名后修改
            if ($group->title != $data['from_group_name'] && $data['from_group_name']!=NULL) {
                $group->title = $data['from_group_name'];
//                $group->robot_wxid = $data['robot_wxid'];
                $group->save();
            }
            //记录聊天  // 机器人 发的信息不记录！
            if ($group['chat'] && $data['robot_wxid'] != $data['from_wxid']) {
                // 1/文本消息 3/图片消息 34/语音消息  42/名片消息  43/视频 47/动态表情 48/地理位置  49/分享链接  2001/红包  2002/小程序  2003/群邀请 更多请参考常量表
                if ($data['type'] == '1' || $data['type'] == '3' || $data['type'] == '2002') {
                    unset($data['msg_source']);
                    $msg = $data;
                    WxMsg::create($msg);
                }
            }
            //登记群用户
            if ($group['user']) {
                EventGroupMemberAdd::run($data);
            }

            //查库存操作
            if ($group['ischeck']) {
                if (strpos($data['msg'], '`库存`') !== false) {
//                    Runserver::kucun($data);
                }
            }
            //登记销售
//            if ($group['isadd']) {
//                AddSale::checkAdd($data);
//                if (isset($data['final_from_wxid']) && $data['final_from_wxid'] == $group['admin'] && strpos($data['msg'], '新增') !== false) {
//                    if (strpos($data['msg'], '新增') == 0) {
//                        $data['Title'] = str_replace('新增 ', '', $data['msg']);
//                        Log::info('记录销售');
//                    }
//                }
//            }

            //开启查询推进，并设置片区
            if ($group['advance'] && strpos($data['msg'], '推进') !== false) {
                if ($data['msg'] == '推进') {
                    $month = date("m", time());
                } elseif ($data['msg'] == '618推进') {
                    Log::info('618推进');
                    $url = Tuijin::getStartget('2022-05-27', '2022-06-19');
                    return VlwApiServer::SendImageMsg($data['robot_wxid'], $data['from_group'], $url);
                } else {
                    $a = explode(' ', $data['msg']);
                    $d = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
                    if (in_array($a[1], $d)) {
                        $month = $a[1];
                    } else {
                        return false;
                    }
                }
                if ($group['deptBigRegionCode']) {
                    $code = $group['deptBigRegionCode'];
                } elseif ($group['retailCode']) {
                    $code = $group['retailCode'];
                }
                $url = Tuijin::getTuijin($code, $month);
                VlwApiServer::SendImageMsg($data['robot_wxid'], $data['from_group'], $url);
            }

            // 群设置管理员，并开启 销售登记
            if (isset($group['admin_wxid']) && $group['isadd']) {
                $name = $data['from_name'] ?? findWxUserName($data['from_wxid'], $data['from_group']);
                $user = qUser($data['from_wxid'], $data['from_group']);
                if (!checkStoreSend($data['from_wxid'])) {
                    if ($user && !$user->zt_store_code) {
                        if (!$user->nostoremsg) {
                            $url = 'http://j.ay.lc/pages/wxuser/wxuser?id=' . $user->id;
                            $url = ApiAylc::add($url);
                            $msg = '【' . $group['title'] . '】' . $name . ':未设置门店，点链接设置' . $url;
                            //发送到培训分享群内
                            //环京所属群
                            $hj = [
                                '17259949859@chatroom',
                                '21187926683@chatroom',
                                '20002042687@chatroom',
                                '18700162162@chatroom',
                                '19344837330@chatroom',
                                '25227355721@chatroom',
                                '39301348317@chatroom',
                                '19452626178@chatroom',
                                '34470039096@chatroom'
                            ];
                            if (in_array($data['from_group'], $hj)) {
                                $towid = '18795961754@chatroom'; //环京
                            } else {
                                $towid = '20908816227@chatroom';
                            }
                            VlwApiServer::SendTextMsg($data['robot_wxid'], $towid, $msg);
                        }
                    }

                    $x = new WxImg();
                    $x->robot_wxid = $data['robot_wxid'];
                    $x->from_group = $data['from_group'];
                    $x->from_group_name = $group['title'];
                    $x->from_wxid = $data['from_wxid'];
                    $x->from_name = $name;
                    $x->user_id = $group['admin_wxid'];
                    if ($data['type'] == '3') {
                        $msg = explode($data['robot_wxid'], $data['msg']);
                        $msg = mb_substr($msg[1], 1);
                        $msg = explode(']', $msg);
                        $img = 'http://bot.ay.lc/Data/' . $data['robot_wxid'] . '/' . $msg[0];
                        $x->img = $img;
                        $x->state = 0;
                        $x->save();
                        $url = 'http://j.ay.lc/pages/sale/sale?id=' . $x->id . '&user=' . $group['admin_wxid'];
                        $url = ApiAylc::add($url);
                        $msg = findWxUserName($data['from_wxid'], $data['from_group']) . ':' . $name . '在【' . $group['title'] . '】发了一张图片，点击查看登记：' . $url;
                        VlwApiServer::SendTextMsg($data['robot_wxid'], $group['admin_wxid'], $msg);
                    } elseif ($data['type'] == '2002' || $data['type'] == '49') {
                        Log::info('小程序');
                        $x->img = $data['msg'];
                        $x->state = 0;
                        $x->save();
                        $url = 'http://j.ay.lc/pages/sale/sale?id=' . $x->id . '&user=' . $group['admin_wxid'];
                        $url = ApiAylc::add($url);
                        $msg = findWxUserName($data['from_wxid'], $data['from_group']) . ':' . $data['from_name'] . '在【' . $group['title'] . '】发了一个链接，点击查看登记：' . $url;
                        VlwApiServer::SendTextMsg($data['robot_wxid'], $group['admin_wxid'], $msg);
                    }
                }
            }
            if ($data['msg'] == '京东链接') {
                $title = '松下洗衣机&京东专卖店';
                $desc = '京东型号推荐及最新价格政策';
                $image_url = 'http://jd.ay.lc/';
                $url = 'http://jd.ay.lc/logo_zw.jpeg';
                $r = VlwApiServer::SendShareLinkMsg($data['robot_wxid'], $group['admin_wxid'], $title, $desc, $image_url, $url);
            }

        } else {
            $g = new WxGroup();
            $g->wxid = $data['from_group'];
            $g->title = $data['from_group_name'];
            $g->robot_wxid = $data['robot_wxid'];
            $g->save();
        }
        return ['Code' => -1];
    }

}
