# -*- coding: utf-8 -*-
from function import *
from mysql import add, insert_product

if __name__ == '__main__':
    # 登录
    uerId = login()
    # verify(uerId)
    # 页数循序
    for i in range(10):
        print(i)
        # 获取销售订单明细
        c = retailBill(i, 1000)  # 每页显示条数
        if len(c["content"]) == 0:
            break
        for a in c["content"]:
            # print(a)
            add(a)
            insert_product(a)

    # 发送采集成功提示
    wechatapi('中台数据采集完毕')
