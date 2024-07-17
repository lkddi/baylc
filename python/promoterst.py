# -*- coding: utf-8 -*-
from function import *
from concurrent.futures import ThreadPoolExecutor, as_completed


@count_calls
def send_promoter_message(store_data):
    send_message(store_data, 'zt_promoter')
    print(store_data['name'])


if __name__ == '__main__':
    # 登录
    userId = login()

    # 设置分页数
    number = 50
    # 获取总条数
    sums = get_promoter_count()

    all_send_futures = []
    with ThreadPoolExecutor(max_workers=MAX_WORKERS) as executor:
        futures = []
        for i in range(sums // number + 1):
            futures.append(executor.submit(zt_promoter, i, number))

        for future in as_completed(futures):
            c = future.result()
            if len(c["content"]) == 0:
                continue

            # 创建一个新的线程池来发送消息
            with ThreadPoolExecutor(max_workers=MAX_WORKERS) as send_executor:
                send_futures = [send_executor.submit(send_promoter_message, a) for a in c["content"]]
                all_send_futures.extend(send_futures)

    # 等待所有发送消息的线程完成
    for send_future in as_completed(all_send_futures):
        send_future.result()

    # 发送采集成功提示
    wechatapi('中台数据采集完毕')
