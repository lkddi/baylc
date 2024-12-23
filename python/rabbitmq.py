# -*- coding: utf8 -*-
import json
import pika
import time

# 在文件头部设置配置信息
# HOST = '39.104.239.212'
# # HOST = '10.0.0.100'
# PORT = 5672
# USERNAME = 'lkddi'
# PASSWORD = 'ddmabc123,./'
# QUEUE_NAME = 'wechat'

HOST = '10.10.11.30'
PORT = 30672
USERNAME = 'admin'
PASSWORD = 'ddmabc123.'
QUEUE_NAME = 'wechat'

class RabbitMQSender:
    def __init__(self, host, port, username, password, queue_name):
        # 设置连接参数
        self.credentials = pika.PlainCredentials(username, password)
        self.connection_params = pika.ConnectionParameters(host, port, '/', self.credentials)
        # 设置连接
        self.connection = None
        self.channel = None
        # 设置队列名称
        self.queue_name = queue_name
        # 设置消息确认
        self.delivery_confirmation = False
        # 设置超时时间
        self.timeout = 10  # 设置超时时间为10秒

    def connect(self):
        # 尝试建立连接
        try:
            self.connection = pika.BlockingConnection(self.connection_params)
            self.channel = self.connection.channel()
            # 声明队列
            self.channel.queue_declare(queue=self.queue_name, passive=False, durable=True, exclusive=False,
                                       auto_delete=False)
            # 确认投递
            self.channel.confirm_delivery()
            # print(" [x] 连接已建立。")
        # 发生错误时打印错误信息
        except Exception as e:
            print(f" [x] 连接错误: {e}")

    def on_delivery(self, method_frame):
        # 如果投递被确认
        if method_frame.method.NAME == 'Basic.Ack':
            self.delivery_confirmation = True
        # 如果投递被拒绝
        elif method_frame.method.NAME == 'Basic.Nack':
            self.delivery_confirmation = False

    def send_message(self, message, queue_name=None):
        # 如果队列名为空，则使用默认队列名
        if queue_name is None:
            queue_name = self.queue_name
        try:
            # 设置投递确认标志
            self.delivery_confirmation = False
            # 尝试投递消息

            if self.channel.basic_publish(exchange='', routing_key=queue_name, body=message,
                                          properties=pika.BasicProperties(delivery_mode=2)):
                # 记录开始时间
                start_time = time.time()
                # 等待投递确认
                while not self.delivery_confirmation:
                    self.connection.process_data_events()
                    # 如果等待时间超过超时时间，则打印超时信息
                    if time.time() - start_time > self.timeout:
                        print(" [x] 消息发送超时。")
                        break
                # 如果成功投递，则打印成功信息
                if self.delivery_confirmation:
                    print(" [x] 消息成功发送。")
                else:
                    print(" [x] 消息未能发送。")
        # 如果投递失败，则打印错误信息
        except pika.exceptions.UnroutableError:
            print(" [x] 消息不可路由。")
        except pika.exceptions.NackError:
            print(" [x] 消息未被确认。")
        except Exception as e:
            print(f" [x] 发送消息时发生错误: {e}")

    def close_connection(self):
        # 如果存在连接，则关闭连接
        if self.connection:
            self.connection.close()
            # print(" [x] 连接已关闭。")

    def get_message(self, queue_name=None):
        if queue_name is None:
            queue_name = self.queue_name

        def callback(ch, method, properties, body):
            print(f" [x] 收到消息: {body}")
            # 可以添加更多处理逻辑

        if self.channel and self.connection:
            try:
                self.channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
                print(f' [*] 等待 {queue_name} 队列中的消息。按 CTRL+C 退出')
                self.channel.start_consuming()
            except Exception as e:
                print(f" [x] 获取消息时发生错误: {e}")
        else:
            print(" [x] 连接或通道未建立，无法接收消息。")


# 定义发送消息的函数，参数为消息内容和队列名称，默认队列名为QUEUE_NAME
def send_message(message, queue_name=QUEUE_NAME):
    # 创建RabbitMQSender对象，参数为主机地址，端口号，用户名，密码，队列名称
    sender = RabbitMQSender(HOST, PORT, USERNAME, PASSWORD, queue_name)
    # 连接RabbitMQ服务器
    sender.connect()
    # 发送消息
    sender.send_message(json.dumps(message))
    # 关闭连接
    sender.close_connection()


def get_message(queue_name=QUEUE_NAME):
    receiver = RabbitMQSender(HOST, PORT, USERNAME, PASSWORD, queue_name)
    receiver.connect()
    receiver.get_message(queue_name)  # 调用新添加的 get_message 方法
    # 注意：由于start_consuming是阻塞的，所以下面的close_connection在实际使用中不会被执行，除非程序被外部中断。
    # 在实际应用中，可能需要考虑其他机制来优雅地关闭连接。
    # receiver.close_connection()


if __name__ == '__main__':
    # 循环执行100次，并把序号放到发送内容里面
    # for i in range(100):
    #     send_message(f'第{i}次。Hello World!', 'laravel')
    get_message('hello')
