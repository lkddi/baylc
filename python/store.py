# -*- coding: utf-8 -*-
from function import *
from mysql import *


def zt_store(page, count):
    url = 'http://121.196.14.173/occ-base/base/terminal-stores/findAllItemList?size={}&page={}&search_AUTH_APPCODE=terminal&search_EQ_isEnable=1&r=0.742044661484889'.format(
        count, page)
    # url = 'http://121.196.14.173/occ-base/base/terminal-stores/findAllItemList?size=10&page=1&search_AUTH_APPCODE=terminal&search_EQ_isEnable=1&r=0.742044661484889'
    # print(url)
    a = http_get(url)
    c = json.loads(a)
    # print(a)
    return c


def checkStore(data):
    try:
        cursor = new.cursor()
        sql = 'select * from zt_stores where code={0}'.format(data["code"])
        cursor.execute(sql)
        data = cursor.fetchone()
        print(data)
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
        # 获取销售订单明细
        c = zt_store(i, 50)  # 每页显示条数
        if len(c["content"]) == 0:
            break
        for a in c["content"]:
            insert_big_region(a)
            insert_dept_region(a)
            insert_retail(a)
            insert_store(a)
            insert_canal_type(a)
            print(a['code'])
            # checkStore(a)

            # add(a)

    # 发送采集成功提示
    wechatapi('门店信息采集完毕')
