# -*- coding: utf-8 -*-
from function import *
import sys

LOGIN_USER = None


@count_calls
def send_store_message(store_data):
    global LOGIN_USER
    # 向 数据里面增加 一个字段值
    store_data['company'] = LOGIN_USER
    # 发送消息
    send_message(store_data, 'zt_store')
    # print(store_data['name'])


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
        if first_arg == '2':
            # 登录
            userId = login(2)
            LOGIN_USER = 3

    else:
        userId = login()
        LOGIN_USER = 1

    # 设置 分页数
    number = 10
    MAX_WORKERS = 20
    # 获取总条数
    sums = zt_store_count()
    # sums = 10

    all_send_futures = []
    with ThreadPoolExecutor(max_workers=MAX_WORKERS) as executor:
        futures = []
        for i in range(sums // number + 1):
            futures.append(executor.submit(zt_store, i, number))

        for future in as_completed(futures):
            c = future.result()
            if len(c["content"]) == 0:
                continue

            # print("采集到门店信息:{}".format(len(c["content"]["id"])))
            # 创建一个新的线程池来发送消息
            with ThreadPoolExecutor(max_workers=MAX_WORKERS) as send_executor:
                send_futures = [send_executor.submit(send_store_message, a) for a in c["content"]]
                all_send_futures.extend(send_futures)

    # 等待所有发送消息的线程完成
    for send_future in as_completed(all_send_futures):
        send_future.result()

    # 发送采集成功提示
    # wechatapi('门店信息采集完毕')
