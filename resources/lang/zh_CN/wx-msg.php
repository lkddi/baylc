<?php
return [
    'labels' => [
        'WxMsg' => '聊天记录',
        'wx-msg' => '聊天记录',
    ],
    'fields' => [
        'sdkVer' => '版本号',
        'Event' => '事件',
        'robot_wxid' => '机器人id',
        'type' => '类型', // 1/文本消息 3/图片消息 34/语音消息  42/名片消息  43/视频 47/动态表情 48/地理位置  49/分享链接  2001/红包  2002/小程序  2003/群邀请 更多请参考常量表',
        'from_group' => '群id',
        'from_group_name' => '群名',
        'from_wxid' => '用户id',
        'from_name' => '用户',
        'msg' => '内容',
        'msg_source' => '附带JSON属性（群消息有艾特人员时，返回被艾特信息）',
        'clientid' => '企业微信可用',
        'robot_type' => '来源微信类型 0 正常微信 / 1 企业微信',
        'msg_id' => '消息ID',
    ],
    'options' => [
    ],
];
