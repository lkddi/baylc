# -*- coding: utf-8 -*-
from function import *
import requests
import urllib.parse


def wechat(data):
    url = 'http://home.36y.net:8073/send'
    datas = {'type': 100,
             'msg': urllib.parse.quote('中台通知：' + data['subject'] + data['content'] + '操作者:' + m['sender']),
             'to_wxid': 'ddm5432',
             'robot_wxid': 'wxid_a20gkjep135x22'}
    # datas = {"type": 100, "msg": "%E6%88%91%E5%9C%A8%E5%91%A2", "to_wxid": "dd23com", "robot_wxid": "wxid_a20gkjep135x22"}
    res = requests.post(url=url, data=json.dumps(datas))
    #     print(datas)
    #     print(res.text)
    return res.text


# {"type":100,"msg":"%E6%88%91%E5%9C%A8%E5%91%A2","to_wxid":"dd23com","robot_wxid":"wxid_a20gkjep135x22"}


if __name__ == '__main__':
    uerId = login()
    a = redailMes()
    #     print(a["data"]["content"])
    for m in a["data"]["content"]:
        print(m['id'])
        if m['readStatus'] == 0:
            wechatapi(m)
            url = "http://121.196.14.173/iuap_qy/internalmsg/msgs/{0}/receive".format(m['id'])
            urld = "http://121.196.14.173/iuap_qy/internalmsg/msgs/{0}/received".format(m['id'])
            m = http_get(urld)
            mm = http_get(url)
            print(m)
            print(mm)
#             print(m['subject'])
        else:
            print('已读')
    #         break
    #         # print(res.text)
    #         # print(a)
    # wechat(data=['subject'=>'www'])
    # data ={'id': 'd60ff6bfe3ab47d1ba575dfee9908c0b', 'subject': '驳回到制单人批语:计划费用额不等于计划报销额', 'content': '<决裁申请单:AC202202150016>', 'cts': 1645751516626, 'ts': 1645751516626, 'type': 'notice', 'hasAttach': False, 'tenantId': 'tenant', 'sysId': 'wbalone', 'sender': '刘毓玮', 'receiveTime': 1645751516626, 'typeName': '通知', 'readStatus': 1, 'readStatusName': '已读', 'receiver': '董冬明', 'sendTime': 1645751516626}
    # wechat(data)
