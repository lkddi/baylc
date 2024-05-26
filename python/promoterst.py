# -*- coding: utf-8 -*-
from function import *
from mysql import *


def zt_store(page, count):
    url = 'http://121.196.14.173/occ-base/base/promoterst?size={}&page={}&search_AUTH_APPCODE=promoter&search_EQ_turnoverStatus=0&r=0.34054073023515663'.format(
        count, page)
    # url = 'http://121.196.14.173/occ-base/base/promoterst?size={}&page={}&search_AUTH_APPCODE=promoter&r=0.34054073023515663'
    # http://121.196.14.173/occ-base/base/promoterst?size=10&page=0&search_AUTH_APPCODE=promoter&search_EQ_turnoverStatus=0&r=0.396862250309598
    # print(url)
    a = http_get(url)
    c = json.loads(a)
    # print(a)
    return c


def checkStore(data):
    try:
        cursor = new.cursor()
        sql = 'select * from zt_promotersts where code={0}'.format(data["code"])
        cursor.execute(sql)
        data = cursor.fetchone()
        # print(data)
        return data
    except Exception as e:
        print(e)


if __name__ == '__main__':
    # 登录
    uerId = login()
    # verify(uerId)
    # 页数循序
    for i in range(100):
        print(i)
        # 获取洗护顾问明细
        c = zt_store(i, 50)  # 每页显示条数
        if len(c["content"]) == 0:
            break
        for a in c["content"]:
            insert_promotersts(a)
            # print(a['name'])
            # checkStore(a)

            # add(a)

    # 发送采集成功提示
    wechatapi('洗护顾问采集完毕')
