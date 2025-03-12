<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiGatewayService
{
    protected string $baseUrl;
    protected string $token;

    public function __construct()
    {
        $this->baseUrl = config('services.api_gateway.url');
        $this->token = config('services.api_gateway.token');
    }

    /**
     * 获取 tokenID
     *
     * @return array
     * @throws Exception
     */
    public function getTokenId(): array
    {
        return $this->callApi("/tools/getTokenId", 'post');
    }

    /**
     * 获取登录二维码
     *
     * @param string $appId
     * @return array
     * @throws Exception
     */
    public function getLoginQrCode(string $appId = ''): array
    {
        return $this->callApi("/login/getLoginQrCode", 'post', $this->preparePayload($appId));
    }

    /**
     * 获取用户在线状态
     *
     * @param string $appId
     * @return array
     * @throws Exception
     */
    public function getOnline(string $appId): array
    {
        return $this->callApi("/login/checkOnline", 'post', $this->preparePayload($appId));
    }

    /**
     * 获取用户资料
     *
     * @param string $appId
     * @return array
     * @throws Exception
     */
    public function getProfile(string $appId): array
    {
        return $this->callApi("/personal/getProfile", 'post', $this->preparePayload($appId));
    }

    /**
     * 获取设备记录
     *
     * @param string $appId
     * @return array
     * @throws Exception
     */
    public function getSafetyInfo(string $appId): array
    {
        return $this->callApi("/personal/getSafetyInfo", 'post', $this->preparePayload($appId));
    }

    /**
     * 重新连接
     *
     * @param string $appId
     * @return array
     * @throws Exception
     */
    public function reconnection(string $appId): array
    {
        return $this->callApi("/login/reconnection", 'post', $this->preparePayload($appId));
    }

    /**
     * 退出登录
     *
     * @param string $appId
     * @return array
     * @throws Exception
     */
    public function logout(string $appId): array
    {
        return $this->callApi("/login/logout", 'post', $this->preparePayload($appId));
    }

    /**
     * 设置回调
     *
     * @param string $url
     * @return array
     * @throws Exception
     */
    public function setCallback(string $url): array
    {
        $data = [
            'token' => $this->token,
            'url' => $url,
        ];
        return $this->callApi("/tools/setCallback", 'post', $data);
    }

    /**
     * 获取联系人列表
     *
     * @param string $appId
     * @return array
     * @throws Exception
     */
    public function fetchContactsList(string $appId): array
    {
        return $this->callApi("/contacts/fetchContactsList", 'post', $this->preparePayload($appId));
    }

    /**
     * 获取手机通讯录
     * @param string $appId
     * @param array $phones
     * @return array
     * @throws Exception
     */
    public function getPhoneAddressList(string $appId, array $phones = []): array
    {
        $data = [
            'appId' => $appId,
            'phones' => $phones,
        ];
        return $this->callApi("/contacts/getPhoneAddressList", 'post', $data);
    }


    /**
     * 保存群到通讯录
     *
     * @param string $appId
     * @param array $chatroomId
     * @return array
     * @throws Exception
     */
    public function saveContractList(string $appId, array $chatroomId): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
            'operType' => 3,
        ];
        return $this->callApi("/group/saveContractList", 'post', $data);
    }

    /**
     * 同意加入群聊
     *
     * @param string $appId
     * @param string $url
     * @return array
     * @throws Exception
     */
    public function agreeJoinRoom(string $appId, string $url): array
    {
        $data = [
            'appId' => $appId,
            'url' => $url,
        ];
        return $this->callApi("/group/agreeJoinRoom", 'post', $data);
    }

    /**
     * 下载图片
     * @param string $appId
     * @param string $xml
     * @return array
     * @throws Exception
     */
    public function downloadImage(string $appId, string $xml): array
    {
        $data = [
            'appId' => $appId,
            'type' => 2,
            'xml' => $xml,
        ];
        return $this->callApi("/message/downloadImage", 'post', $data);
    }


    /**
     * 发送文本消息
     *
     * @param string $appId
     * @param string $toWxid
     * @param string $content
     * @param string $ats
     * @return array
     * @throws Exception
     */
    public function postText(string $appId, string $toWxid, string $content, string $ats = ''): array
    {
        $data = [
            'appId' => $appId,
            'toWxid' => $toWxid,
            'ats' => $ats,
            'content' => $content,
        ];
        return $this->callApi("/message/postText", 'post', $data);
    }

    /**
     * 发送图片消息
     *
     * @param string $appId
     * @param string $toWxid
     * @param string $imgUrl
     * @return array
     * @throws Exception
     */
    public function postImage(string $appId, string $toWxid, string $imgUrl): array
    {
        $data = [
            'appId' => $appId,
            'toWxid' => $toWxid,
            'imgUrl' => $imgUrl,
        ];
        return $this->callApi("/message/postImage", 'post', $data);
    }

    /**
     * 发送链接消息
     *
     * @param string $appId
     * @param string $toWxid
     * @param string $title
     * @param string $desc
     * @param string $linkUrl
     * @param string $thumbUrl
     * @return array
     * @throws Exception
     */
    public function postLink(string $appId, string $toWxid, string $title, string $desc, string $linkUrl, string $thumbUrl): array
    {
        $data = [
            'appId' => $appId,
            'toWxid' => $toWxid,
            'title' => $title,
            'desc' => $desc,
            'linkUrl' => $linkUrl,
            'thumbUrl' => $thumbUrl,
        ];
        return $this->callApi("/message/postLink", 'post', $data);
    }

    /**
     * 添加联系人/同意添加好友
     *
     * @param string $appId
     * @param string $scene
     * @param string $content
     * @param string $v4
     * @param string $v3
     * @param int $option
     * @return array
     * @throws Exception
     */
    public function addContacts(string $appId, string $scene, string $content, string $v4, string $v3, int $option): array
    {
        $data = [
            'appId' => $appId,
            'scene' => $scene,
            'content' => $content,
            'v4' => $v4,
            'v3' => $v3,
            'option' => $option,
        ];
        return $this->callApi("/contacts/addContacts", 'post', $data);
    }

    /**
     * 创建群聊
     * @param string $appId
     * @param array $wxids
     * @return array
     * @throws Exception
     */
    public function createChatroom(string $appId, array $wxids): array
    {
        $data = [
            'appId' => $appId,
            'wxids' => $wxids,
        ];
        Log::info($data);
        return $this->callApi("/group/createChatroom", 'post', $data);
    }

    /**
     * 修改群名称
     *
     * @param string $appId
     * @param string $chatroomId
     * @param string $chatroomName
     * @return array
     * @throws Exception
     */
    public function modifyChatroomName(string $appId, string $chatroomId, string $chatroomName): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
            'chatroomName' => $chatroomName,
        ];
        return $this->callApi("/group/modifyChatroomName", 'post', $data);
    }

    /**
     * 修改群备注
     * @param string $appId
     * @param string $chatroomId
     * @param string $chatroomRemark
     * @return array
     * @throws Exception
     */
    public function modifyChatroomRemark(string $appId, string $chatroomId, string $chatroomRemark): array
    {
        $data = [
            'appId' => $appId,
            'chatroomRemark' => $chatroomRemark,
            'chatroomId' => $chatroomId,
        ];
        return $this->callApi("/group/modifyChatroomRemark", 'post', $data);
    }

    /**
     * 获取群信息
     * @param string $appId
     * @param string $chatroomId
     * @return array
     * @throws Exception
     */
    public function getChatroomInfo(string $appId, string $chatroomId): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
        ];
        return $this->callApi("/group/getChatroomInfo", 'post', $data);
    }

    /**
     * 解散群聊
     * @param string $appId
     * @param string $chatroomId
     * @return array
     * @throws Exception
     */
    public function disbandChatroom(string $appId, string $chatroomId): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
        ];
        return $this->callApi("/group/disbandChatroom", 'post', $data);
    }

    /**
     * 设置群公告
     * @param string $appId
     * @param string $chatroomId
     * @param string $content
     * @return array
     * @throws Exception
     */
    public function setChatroomAnnouncement(string $appId, string $chatroomId, string $content): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
            'content' => $content,
        ];
        return $this->callApi("/group/setChatroomAnnouncement", 'post', $data);
    }


    /**
     * 扫码进群
     * @param string $appId
     * @param string $qrUrl
     * @return array
     * @throws Exception
     */
    public function joinRoomUsingQRCode(string $appId, string $qrUrl): array
    {
        $data = [
            'appId' => $appId,
            'qrUrl' => $qrUrl,
        ];
        return $this->callApi("/group/joinRoomUsingQRCode", 'post', $data);
    }

    /**
     * 获取群成员列表
     * @param string $appId
     * @param string $chatroomId
     * @return array
     * @throws Exception
     */
    public function getChatroomMemberList(string $appId, string $chatroomId): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
        ];
        return $this->callApi("/group/getChatroomMemberList", 'post', $data);
    }

    /**
     * 修改我在群内的昵称
     * @param string $appId
     * @param string $chatroomId
     * @param string $nickName
     * @return array
     * @throws Exception
     */
    public function modifyChatroomNickNameForSelf(string $appId, string $chatroomId, string $nickName): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
            'nickName' => $nickName,
        ];
        return $this->callApi("/group/modifyChatroomNickNameForSelf", 'post', $data);
    }

    /**
     * 邀请/添加 成员进群
     * @param string $appId
     * @param string $chatroomId
     * @param array $wxids
     * @param string $reason
     * @return array
     * @throws Exception
     */
    public function inviteMember(string $appId, string $chatroomId, array $wxids, string $reason = ''): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
            'wxids' => $wxids,
            'reason' => $reason,
        ];
        return $this->callApi("/group/inviteMember", 'post', $data);
    }

    /**
     * 删除群成员
     * @param string $appId
     * @param string $chatroomId
     * @param array $wxids
     * @return array
     * @throws Exception
     */
    public function removeMember(string $appId, string $chatroomId, array $wxids): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
            'wxids' => $wxids,
        ];
        return $this->callApi("/group/removeMember", 'post', $data);
    }

    /**
     * 退出群聊
     * @param string $appId
     * @param string $chatroomId
     * @return array
     * @throws Exception
     */
    public function quitChatroom(string $appId, string $chatroomId): array
    {
        $data = [
            'appId' => $appId,
            'chatroomId' => $chatroomId,
        ];
        return $this->callApi("/group/quitChatroom", 'post', $data);
    }


    /**
     * 通用 API 请求方法
     *
     * @param string $endpoint 请求的接口地址
     * @param string $method 请求方法，默认为 POST
     * @param array $params 请求参数
     * @return array 返回解析后的 JSON 数据
     * @throws Exception 请求失败时抛出异常
     */
    public function callApi(string $endpoint, string $method = 'POST', array $params = []): array
    {
        try {
            $response = Http::withHeaders([
                'X-GEWE-TOKEN' => $this->token,
                'Content-Type' => 'application/json',
            ])->{$method}($this->baseUrl . $endpoint, $params);

            if ($response->successful()) {
                return $response->json();
            }

            throw new Exception("API request failed with status: " . $response->status());
        } catch (Exception $e) {
            Log::error("API request to {$endpoint} failed: " . $e->getMessage(), [
                'method' => $method,
                'params' => $params,
                'exception' => $e,
            ]);
            throw $e;
        }
    }

    /**
     * 生成公共请求参数
     * @param string $appId
     * @return array
     */
    private function preparePayload(string $appId): array
    {
        return ['appId' => $appId];
    }
}
