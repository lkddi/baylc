# -*- coding: utf-8 -*-
import sys

from function import *
from concurrent.futures import ThreadPoolExecutor, as_completed

LOGIN_USER = None


@count_calls
def send_sale_message(store_data):
    global LOGIN_USER
    # 向 数据里面增加 一个字段值
    store_data['company'] = LOGIN_USER
    send_message(store_data, 'zt_sale')
    print(store_data['id'])


if __name__ == '__main__':
    args = sys.argv[1:]
    # 检查是否有参数传递
    if args:
        # 获取第一个参数
        first_arg = args[0]

        if first_arg == '1':
            # 登录
            userId = login(1)
            LOGIN_USER = 2

    else:
        userId = login()
        LOGIN_USER = 1
    MAX_WORKERS = 20
    # 设置分页数
    number = 50
    # 获取总条数
    sums = get_total_sales_number()
    all_send_futures = []
    with ThreadPoolExecutor(max_workers=MAX_WORKERS) as executor:
        futures = []
        for i in range(sums // number + 1):
            futures.append(executor.submit(retailBill, i, number))

        for future in as_completed(futures):
            c = future.result()
            if len(c["content"]) == 0:
                continue

            # 创建一个新的线程池来发送消息
            with ThreadPoolExecutor(max_workers=MAX_WORKERS) as send_executor:
                send_futures = [send_executor.submit(send_sale_message, a) for a in c["content"]]
                all_send_futures.extend(send_futures)

    # 等待所有发送消息的线程完成
    for send_future in as_completed(all_send_futures):
        send_future.result()

# 发送采集成功提示
wechatapi('中台数据采集完毕')
