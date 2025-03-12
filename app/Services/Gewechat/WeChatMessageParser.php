<?php

namespace App\Services\Gewechat;


use SimpleXMLElement;

class WeChatMessageParser
{
    /**
     * 解析微信消息中的 Content 字段
     *
     * @param array $message 接收到的微信消息数组
     * @return array|null 返回解析后的数据数组，或在解析失败时返回 null
     */
    public function parseContent(array $message): ?array
    {
        // 检查消息中是否包含 'Data' 和 'Content' 字段
        if (!isset($message['Data']['Content']['string'])) {
            return null;
        }

        $content = $message['Data']['Content']['string'];
        $content = preg_replace('/.*?(<msg>.*)/s', '$1', $content);


        // 解析 XML 内容
        try {
            $xmlObject = simplexml_load_string($content, SimpleXMLElement::class, LIBXML_NOCDATA);
        } catch (\Exception $e) {
            // 处理解析错误，例如记录日志
            // Log::error('XML 解析失败: ' . $e->getMessage());
            return null;
        }

        // 提取所需的字段
        $description = (string)($xmlObject->appmsg->des ?? '');
        $url = (string)($xmlObject->appmsg->url ?? '');
        $nativeurl = (string)($xmlObject->appmsg->nativeurl ?? '');
        $title = (string)($xmlObject->appmsg->title ?? '');
        $type = (string)($xmlObject->appmsg->type ?? '');
        $pay_memo = (string)($xmlObject->appmsg->wcpayinfo->pay_memo ?? '');
        // 小数类型

        $feedesc = (string)($xmlObject->appmsg->wcpayinfo->feedesc ?? '');
        $receivertitle = (string)($xmlObject->appmsg->wcpayinfo->receivertitle ?? '');
        $sendertitle = (string)($xmlObject->appmsg->wcpayinfo->sendertitle ?? '');
        $receiver_username = (string)($xmlObject->appmsg->wcpayinfo->receiver_username ?? '');
        $payer_username = (string)($xmlObject->appmsg->wcpayinfo->payer_username ?? '');

        // 返回提取的数据
        return [
            'description' => $description,
            'url' => $url,
            'nativeurl' => $nativeurl,
            'title' => $title,
            'type' =>$type,
            'pay_memo'=> $pay_memo,
            'feedesc'=> (float)str_replace('￥', '', $feedesc),
            'receivertitle' => $receivertitle,
            'sendertitle' => $sendertitle,
            'receiver_username' => $receiver_username,
            'payer_username' => $payer_username,
        ];
    }
}
