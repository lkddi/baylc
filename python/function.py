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
from rabbitmq import send_message
from concurrent.futures import ThreadPoolExecutor, as_completed


COMPANY_ID = None

# 定义一个全局线程池
MAX_WORKERS = 5
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
def login(login_user=None):
    global COMPANY_ID
    url = 'http://121.196.14.173/wbalone/user/yhtLogin'
    if login_user is None:
        username = '18347940286'
        password2 = '9b8f5c3e3064599807ad042395a7b929d0472e06'
        password1 = '078cfdfed302c3d200c78f543e59bb5a'
        COMPANY_ID = '0001A110000000001TUQ'
    if login_user == 1:
        username = '18081058833'
        password2 = '48efc4851e15940af5d477d3c0ce99211a70a3be'
        password1 = '5416d7cd6ef195a0f7622a9c56b55e84'
        COMPANY_ID = '0001A110000000001TUN'
        # 1q2w3e4r
    # if login_user == 2:
    #     username = '18081058833'
    #     password2 = '48efc4851e15940af5d477d3c0ce99211a70a3be'
    #     password1 = '5416d7cd6ef195a0f7622a9c56b55e84'
    #     COMPANY_ID = '0001A11'

    data = {"username": username,
            "password": "",
            "password2": password2,
            "password1": password1,
            "productCode": "OCC,CRM",
            "channel": "OCC"}

    a = http_post(url, json.dumps(data))
    b = json.loads(a)
    # {
    #   "status": "0",
    #   "message": "查询是否过期接口失败！",
    #   "data": null
    # }
    if b['status'] == '0':
        print(f'登录失败:{b["message"]}')
        print(f'登录失败:{data}')
        return

    print(f'登录成功,公司id:{COMPANY_ID}')

    return b['data']['userId']
    # print(a)


def verify(uerId):
    data = {"userId": uerId, "cid": "", "uuid": ""}
    a = http_post('http://121.196.14.173/occ-base/verify', json.dumps(data))


# 以下是获取销售数据部分 开始
def retailBill(page, count):
    global COMPANY_ID
    a = get_current_month_start_and_end(str(datetime.datetime.now()))
    starttime = unix_time(a[0]) * 1000
    starttime = 1577808000000
    endtime = unix_time(a[1]) * 1000
    url = 'http://121.196.14.173/occ-b2b-order/b2b/retail-order-item/retail-order-detail-report-form?search_IN_organization.id={0}&search_GTE_purchaseDate_date=1704038400000&search_LT_purchaseDate_date=1735574400000&size={1}&page={2}&search_AUTH_APPCODE=retailOrderDetailForm'.format(
        COMPANY_ID,count, page)
    # http://121.196.14.173/occ-b2b-order/b2b/retail-order-item/retail-order-detail-report-form?search_IN_organization.id=0001A110000000001TUQ&size=10&page=0&search_AUTH_APPCODE=retailOrderDetailForm
    #http://121.196.14.173/occ-b2b-order/b2b/retail-order-item/retail-order-detail-report-form?search_IN_organization.id=0001A110000000001TUQ&search_GTE_purchaseDate_date=1704038400000&search_LT_purchaseDate_date=1735574400000&size=10&page=0&search_AUTH_APPCODE=retailOrderDetailForm
    a = http_get(url)
    c = json.loads(a)
    print(f'本页总条数：{c.get("size")}')
    return c
    # for i in c['content']:
    #     if len(i):


# 获取总销售数量
def get_total_sales_number():
    global COMPANY_ID
    url = f"http://121.196.14.173/occ-b2b-order/b2b/retail-order-item/retail-order-detail-report-form?search_IN_organization.id={COMPANY_ID}&size=1&page=0&search_GTE_purchaseDate_date=1704038400000&search_LT_purchaseDate_date=1735574400000&search_AUTH_APPCODE=retailOrderDetailForm"
    a = http_get(url)
    c = json.loads(a)
    print(f'总条数：{c.get("totalElements")}')
    return c.get('totalElements')


# 以上是获取销售数据部分 结束

# 以下是获取门店信息部分  开始
def zt_store(page, count):
    url = 'http://121.196.14.173/occ-base/base/terminal-stores/findAllItemList?size={}&page={}&search_AUTH_APPCODE=terminal'.format(
        count, page)
    a = http_get(url)
    c = json.loads(a)
    return c


# 获取总条数
def zt_store_count():
    url = 'http://121.196.14.173/occ-base/base/terminal-stores/findAllItemList?size=1&page=0&search_AUTH_APPCODE=terminal&r=0.8153153996282803'
    a = http_get(url)
    c = json.loads(a)
    print(f'总条数：{c.get("totalElements")}')
    return c.get('totalElements')


# 以上是获取门店信息部分  结束

# 以下是获取洗护顾问信息部分  开始
def zt_promoter(page, count):
    url = 'http://121.196.14.173/occ-base/base/promoterst?size={}&page={}&search_AUTH_APPCODE=promoter'.format(
        count, page)
    # url = 'http://121.196.14.173/occ-base/base/promoterst?size={}&page={}&search_AUTH_APPCODE=promoter&r=0.34054073023515663'
    # http://121.196.14.173/occ-base/base/promoterst?size=10&page=0&search_AUTH_APPCODE=promoter&search_EQ_turnoverStatus=0&r=0.396862250309598
    # print(url)
    a = http_get(url)
    c = json.loads(a)
    print(f'第{page}页，本页总条数：{c.get("size")}')
    return c


# 获取洗护顾问总条数
def get_promoter_count():
    url = 'http://121.196.14.173/occ-base/base/promoterst?size=1&page=0&search_AUTH_APPCODE=promoter'
    a = http_get(url)
    c = json.loads(a)
    print(f'总条数：{c.get("totalElements")}')
    return c.get('totalElements')


# 以上是获取洗护顾问信息部分  结束

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
    send_message(data, 'wechat_1')

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


def count_calls(func):
    # 创建一个计数器，并定义一个闭包函数来更新计数器并输出当前执行次数
    calls_count = 0

    def wrapper(*args, **kwargs):
        nonlocal calls_count
        calls_count += 1
        print(f"当前执行次数：{calls_count} \n")

        # 调用原始方法
        result = func(*args, **kwargs)

        # 返回方法的执行结果
        return result

    # 返回包装后的方法
    return wrapper
