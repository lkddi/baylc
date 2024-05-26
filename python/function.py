# -*- coding: utf-8 -*-
# This is a sample Python script.

# Press ⌃R to execute it or replace it with your code.
# Press Double ⇧ to search everywhere for classes, files, tool windows, actions, and settings.
import urllib.request
import urllib.parse
import json
import http.cookiejar
import datetime
import time
import requests

HEADERS = {
    # 'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36',
    'Content-Type': 'application/json; charset=UTF-8',
    # 'Cookie': '_TH_=primary; default_serial=1; u_locale=zh_CN; locale_serial=1; sessionid=1baf3f4e-5c43-43aa-98d3-dc1a0f5a104c; token=d2ViLDE4MDAsaFlvVVJDMUV1eW1ZRkxNYUhiNlM3Zyt3STZ2QVNrREx1eXJReTdoajQyMmlWeDgybngydnRoSnhFOTdBQWNxSkdaZ2FRcHVEQlNwcDk2Ym5vZWgwYXc9PQ; u_usercode=6faecc4037fa49908cc290552791de70; u_logints=1643427320081; tenantid=tenant; userType=userType; typeAlias=typeAlias; userId=6faecc4037fa49908cc290552791de70; _A_P_userId=6faecc4037fa49908cc290552791de70; _A_P_userType=userType; _A_P_userLoginName=070032; _A_P_userAvator=%252Fg1%252FM00%252F00%252F02%252FrBBfqF_j676Ae_8CAACv7NVM7UU944.jpg%2540100h; _A_P_userName=%25E8%2591%25A3%25E5%2586%25AC%25E6%2598%258E'
}
cjar = http.cookiejar.CookieJar()
cookie = urllib.request.HTTPCookieProcessor(cjar)
opener = urllib.request.build_opener(cookie)
urllib.request.install_opener(opener)


def print_hi(name):
    # Use a breakpoint in the code line below to debug your script.
    print(f'Hi, {name}')  # Press ⌘F8 to toggle the breakpoint.


def http_post(url, data):
    req = urllib.request.Request(url=url,
                                 data=data.encode("utf8"),
                                 headers=HEADERS,
                                 method="POST")
    response = urllib.request.urlopen(req)
    data = response.read()
    return data.decode("utf8")


def http_get(url):
    req = urllib.request.Request(url=url,
                                 headers=HEADERS,
                                 method="GET")
    response = urllib.request.urlopen(req)
    data = response.read().decode("utf8")
    return data


# 登陆
def login():
    url = 'http://121.196.14.173/wbalone/user/yhtLogin'
    data = {"username": "18347940286",
            "password": "",
            "password2": "9b8f5c3e3064599807ad042395a7b929d0472e06",
            "password1": "078cfdfed302c3d200c78f543e59bb5a",
            "productCode": "OCC,CRM",
            "channel": "OCC"}
    a = http_post(url, json.dumps(data))
    b = json.loads(a)
    return b['data']['userId']
    # print(a)


def verify(uerId):
    data = {"userId": uerId, "cid": "", "uuid": ""}
    a = http_post('http://121.196.14.173/occ-base/verify', json.dumps(data))


def retailBill(page, count):
    a = get_current_month_start_and_end(str(datetime.datetime.now()))
    starttime = unix_time(a[0]) * 1000
    starttime = 1577808000000
    endtime = unix_time(a[1]) * 1000
    url = 'http://121.196.14.173/occ-b2b-order/b2b/retail-order-item/retail-order-detail-report-form?search_IN_organization.id=0001A110000000001TUQ&size={0}&page=0&search_AUTH_APPCODE=retailOrderDetailForm'.format(
        count)
    # 'http://121.196.14.173/occ-b2b-order/b2b/retail-order-item/retail-order-detail-report-form?search_IN_organization.id=0001A110000000001TUQ&size={0}&page={1}&search_AUTH_APPCODE=retailOrderDetailForm&search_GTE_purchaseDate_date={2}&search_LT_purchaseDate_date={3}'.format(count, page, starttime, endtime)
    a = http_get(url)
    c = json.loads(a)
    return c


# 获取消息
def redailMes():
    data = {
        "direction": "receive",
        "pageSize": 10,
        "pageIndex": 0}
    url = 'http://121.196.14.173/iuap_qy/internalmsg/msgs/pagination'
    mes = http_post(url, json.dumps(data))
    mes = json.loads(mes)
    # print(mes)
    return mes


import calendar


def get_current_month_start_and_end(date):
    """
    年份 date(2017-09-08格式)
    :param date:
    :return:本月第一天日期和本月最后一天日期
    """
    if date.count('-') != 2:
        raise ValueError('- is error')
    year, month = str(date).split('-')[0], str(date).split('-')[1]
    end = calendar.monthrange(int(year), int(month))[1]
    end_date = '%s-%s-%s' % (year, month, end)
    newyear = int(year)

    if month == "01":
        newyear = int(year) - 1
        month = "13"
    start_date = '%s-%s-01' % (str(newyear), str(int(month) - 1))
    return start_date, end_date


def unix_time(dt):
    # 转换成时间数组
    timeArray = time.strptime(dt, "%Y-%m-%d")
    # 转换成时间戳
    timestamp = int(time.mktime(timeArray))
    return timestamp


# 微信消息接口
def wechatapi(data):
    url = 'http://10.0.0.85:8080/api_send_message'
    datas = {
        'client_id': 1,
        'message_type': 11154,
        'params': {
            'conversation_id': 'S:7881302503935047_1688855282355755',
            'content': data,
        },
     }
    res = requests.post(url=url, data=json.dumps(datas))
    return res.text
