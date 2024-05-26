<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\JdProduct
 *
 * @method static \Illuminate\Database\Eloquent\Builder|JdProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JdProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JdProduct query()
 * @mixin \Eloquent
 */
	class IdeHelperJdProduct {}
}

namespace App\Models{
/**
 * App\Models\JdProductInfo
 *
 * @method static \Illuminate\Database\Eloquent\Builder|JdProductInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JdProductInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JdProductInfo query()
 * @mixin \Eloquent
 */
	class IdeHelperJdProductInfo {}
}

namespace App\Models{
/**
 * App\Models\NccSale
 *
 * @property int $id
 * @property string|null $year
 * @property string|null $month
 * @property string|null $time
 * @property string|null $deptBigRegionName 大区
 * @property string|null $deptRegionName 地区
 * @property string|null $lishipianqu 片区
 * @property string|null $canalTypeName 中台门店渠道
 * @property string|null $client 客户
 * @property string|null $brand 商品品牌
 * @property string|null $pinlei 商品品类
 * @property string|null $xilie 商品系列
 * @property string|null $zixilie 商品子系列
 * @property string|null $model 商品型号
 * @property string|null $leixing 商品类型
 * @property string|null $zengpin 是否赠品
 * @property string|null $number 实发数量
 * @property string|null $hanshuidanjia 含税单价
 * @property string|null $hanshuijine 含税金额
 * @property string|null $shuilv 税率
 * @property string|null $yuefan 月返
 * @property string|null $danpinzhekou 单品折扣
 * @property string|null $hanshuizhekoue 含税折扣额
 * @property string|null $hanshuijxse 含税净销售额
 * @property string|null $wushuidanjia 无税单价
 * @property string|null $wushuijine 无税金额
 * @property string|null $wushuizke 无税折扣额
 * @property string|null $wushuijxse 无税净销售额
 * @property string|null $hanshuigle 含税零供额
 * @property string|null $kangkuleixing 仓库类型
 * @property string|null $chukucangku 出货仓库
 * @property string|null $user 业务员
 * @property string|null $type 单据类型
 * @property string|null $zhidanren 制单人
 * @property string|null $order 订单号
 * @property string|null $oedertime 订单日期
 * @property string|null $chuorder 出库单号
 * @property string|null $chutime 出库单据日期
 * @property string|null $shentime 订单审批日期
 * @property string|null $qiantime 签字日期
 * @property string|null $title 商品名称
 * @property string|null $shouhuokehu 收货客户
 * @property string|null $danjuqudao 单据渠道
 * @property string|null $retailName 当前片区
 * @property string|null $waibuhao 外部号
 * @property string|null $zuzhi 组织
 * @property string|null $beizhu 备注
 * @property string|null $shouhuodizhi 收货地址
 * @property string|null $gukedizhi 顾客地址
 * @property string|null $wuliugongsi 配送物流公司
 * @property string|null $tihuofangshi 提货方式
 * @property string|null $tuihuoleixing 退货类型
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereBeizhu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereCanalTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereChukucangku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereChuorder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereChutime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereDanjuqudao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereDanpinzhekou($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereDeptBigRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereDeptRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereGukedizhi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereHanshuidanjia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereHanshuigle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereHanshuijine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereHanshuijxse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereHanshuizhekoue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereKangkuleixing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereLeixing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereLishipianqu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereOedertime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale wherePinlei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereQiantime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereRetailName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereShentime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereShouhuodizhi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereShouhuokehu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereShuilv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereTihuofangshi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereTuihuoleixing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereWaibuhao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereWuliugongsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereWushuidanjia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereWushuijine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereWushuijxse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereWushuizke($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereXilie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereYuefan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereZengpin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereZhidanren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereZixilie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NccSale whereZuzhi($value)
 * @mixin \Eloquent
 */
	class IdeHelperNccSale {}
}

namespace App\Models{
/**
 * App\Models\StockPile
 *
 * @property int $id
 * @property int $zt_store_id 门店id
 * @property int $zt_product_id 产品id
 * @property int $quantity 库存
 * @property int $purchases 进货数
 * @property int $sales 销售数
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile query()
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile wherePurchases($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile whereSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile whereZtProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StockPile whereZtStoreId($value)
 * @mixin \Eloquent
 */
	class IdeHelperStockPile {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $name 真实姓名
 * @property string $openid 用户openid
 * @property string|null $nickName 微信昵称
 * @property int|null $gender 性别
 * @property string|null $avatarUrl 微信头像
 * @property int $zt_store_id 门店id
 * @property int $zt_area_id 门店id
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property int|null $status 状态 1正常 0关闭
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZtAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZtStoreId($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * App\Models\Warehouse
 *
 * @property int $id
 * @property int $zt_stores_id 仓库id
 * @property int $zt_products_id 商品id
 * @property int $quantity 数量
 * @property int $jinhuo 进货总数量
 * @property int $nums 销售数量
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereJinhuo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereNums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereZtProductsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereZtStoresId($value)
 * @mixin \Eloquent
 */
	class IdeHelperWarehouse {}
}

namespace App\Models{
/**
 * App\Models\WxBot
 *
 * @method static wxid($Wxid)
 * @property int $id
 * @property string $wxid WxId
 * @property string|null $nickname 名字
 * @property string $robot_wxid id
 * @property int $open 状态
 * @property int $friend 自动加好友
 * @property int $group 自动加群
 * @property int $transfer 自动接收转账
 * @property string|null $apiurl 接口地址
 * @property string|null $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereApiurl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereFriend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereRobotWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereTransfer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereWxid($value)
 * @mixin \Eloquent
 */
	class IdeHelperWxBot {}
}

namespace App\Models{
/**
 * App\Models\WxForward
 *
 * @property int $id
 * @property string $wxid 群id
 * @property string|null $towxid 群id
 * @property int $text 转发文本消息
 * @property int $img 转发拖消息
 * @property int $video 转发视频消息
 * @property int $file 转发文件消息
 * @property int $xml 转发小程序消息
 * @property int $all 转发全部
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\WxGroup|null $group
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereTowxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereXml($value)
 * @mixin \Eloquent
 */
	class IdeHelperWxForward {}
}

namespace App\Models{
/**
 * App\Models\WxGroup
 *
 * @method static wxid(string $string)
 * @property int $id
 * @property string $wxid 群id
 * @property string $title 群名
 * @property \App\Models\WxUser|null $admin 管理员
 * @property int $ischeck 是否开启查库存
 * @property int $isadd 是否开启登记
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ZtDeptBigRegion|null $deptBigRegion
 * @property-read \App\Models\ZtDeptRegion|null $deptRegion
 * @property-read \App\Models\ZtRetail|null $retail
 * @property-read \App\Models\ZtStore|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereIsadd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereIscheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereWxid($value)
 * @mixin \Eloquent
 */
	class IdeHelperWxGroup {}
}

namespace App\Models{
/**
 * App\Models\WxImg
 *
 * @property int $id
 * @property string $from_group 群id
 * @property string $from_group_name 群名
 * @property string $from_wxid 用户id
 * @property string $from_name 用户名
 * @property string $robot_wxid 机器人id
 * @property string|null $user_id 最后操作者
 * @property string $img img
 * @property int|null $state 状态
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\WxUser|null $wxuser
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereFromGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereFromGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereFromWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereRobotWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxImg wxid($wxid)
 * @mixin \Eloquent
 */
	class IdeHelperWxImg {}
}

namespace App\Models{
/**
 * App\Models\WxMsg
 *
 * @property int $id
 * @property string $sdkVer 版本号
 * @property string $Event 事件
 * @property string $robot_wxid 机器人id
 * @property string|null $type 类型 // 1/文本消息 3/图片消息 34/语音消息  42/名片消息  43/视频 47/动态表情 48/地理位置  49/分享链接  2001/红包  2002/小程序  2003/群邀请 更多请参考常量表
 * @property string|null $from_group 群id
 * @property string|null $from_group_name 群名
 * @property string|null $from_wxid 用户id
 * @property string|null $from_name 用户
 * @property string $msg 内容
 * @property string|null $msg_source 附带JSON属性（群消息有艾特人员时，返回被艾特信息）
 * @property string|null $clientid 企业微信可用
 * @property string|null $robot_type 来源微信类型 0 正常微信 / 1 企业微信
 * @property string|null $msg_id 消息ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereClientid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereFromGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereFromGroupName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereFromWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereMsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereMsgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereMsgSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereRobotType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereRobotWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereSdkVer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxMsg whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperWxMsg {}
}

namespace App\Models{
/**
 * App\Models\WxSale
 *
 * @property int $id
 * @property int $zt_store_id
 * @property int $zt_product_id
 * @property int $quantity 数量
 * @property int $amount 提成
 * @property string $cjdata 创建时间
 * @property string $user user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ZtProduct $product
 * @property-read \App\Models\ZtStore|null $store
 * @property-read \App\Models\WxUser|null $wxuser
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereCjdata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereZtProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereZtStoreId($value)
 * @mixin \Eloquent
 */
	class IdeHelperWxSale {}
}

namespace App\Models{
/**
 * App\Models\WxUser
 *
 * @property int $id
 * @property string|null $name 真实姓名
 * @property string $nickname 名字
 * @property string $wxid WxId
 * @property string $group_wxid group_wxid
 * @property int $zt_store_id 门店id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\WxGroup|null $group
 * @property-read \App\Models\ZtStore|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereGroupWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereZtStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser wxid($wxid, $group)
 * @mixin \Eloquent
 */
	class IdeHelperWxUser {}
}

namespace App\Models{
/**
 * App\Models\WxZhuanfa
 *
 * @property int $id
 * @property string $type
 * @property mixed $msg
 * @property string $to_wxid
 * @property int $state
 * @property string $fsdata 时间
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereFsdata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereMsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereToWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperWxZhuanfa {}
}

namespace App\Models{
/**
 * App\Models\ZtArea
 *
 * @property int $id
 * @property string $title
 * @property int $parent_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtArea newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtArea newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtArea query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtArea whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtArea whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtArea whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtArea whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtArea whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtArea whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperZtArea {}
}

namespace App\Models{
/**
 * App\Models\ZtCanalType
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperZtCanalType {}
}

namespace App\Models{
/**
 * App\Models\ZtChannel
 *
 * @property int $id
 * @property string $title 区域
 * @property int $parent_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtChannel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtChannel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtChannel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtChannel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtChannel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtChannel whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtChannel whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtChannel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtChannel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperZtChannel {}
}

namespace App\Models{
/**
 * App\Models\ZtDeptBigRegion
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperZtDeptBigRegion {}
}

namespace App\Models{
/**
 * App\Models\ZtDeptRegion
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperZtDeptRegion {}
}

namespace App\Models{
/**
 * App\Models\ZtProduct
 *
 * @property int $id
 * @property string $title 型号
 * @property string $model 型号简称
 * @property int $price 商品价格
 * @property int $ticheng 商品提成
 * @property int $offline 产品是否下线
 * @property int $product_brands_id
 * @property int $product_seies_id
 * @property int $product_classes_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereOffline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereProductBrandsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereProductClassesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereProductSeiesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereTicheng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperZtProduct {}
}

namespace App\Models{
/**
 * App\Models\ZtRetail
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperZtRetail {}
}

namespace App\Models{
/**
 * App\Models\ZtSale
 *
 * @property int $id
 * @property string|null $dr
 * @property string|null $ts
 * @property string|null $creator
 * @property string|null $creationTime
 * @property string|null $modifier
 * @property string|null $modifiedTime
 * @property string|null $persistStatus
 * @property string|null $purMachineYear
 * @property string|null $purMachineMonth
 * @property string|null $purMachineTime
 * @property string|null $retailBillCode
 * @property string|null $srcBillOrder
 * @property string|null $saleTypeCode
 * @property string|null $saleTypeName
 * @property string|null $retailTypeCode
 * @property string|null $retailTypeName
 * @property string|null $ext12Code
 * @property string|null $ext12Name
 * @property string|null $ext11Code
 * @property string|null $ext11Name
 * @property string|null $salesDeptCode
 * @property string|null $salesDeptName
 * @property string|null $currentBusiness
 * @property string|null $riscode
 * @property string|null $ownerShopId
 * @property string|null $ownerShopCode
 * @property string|null $ownerShopName
 * @property string|null $shopChannel
 * @property string|null $historyTerminalTypeName
 * @property string|null $currentTerminalTypeName
 * @property string|null $ext14Code
 * @property string|null $ext14Name
 * @property string|null $ext13Code
 * @property string|null $ext13Name
 * @property string|null $shippingareaCode
 * @property string|null $shippingareaName
 * @property string|null $historyBusiness
 * @property string|null $ownerCustomerId
 * @property string|null $ownerCustomerCode
 * @property string|null $ownerCustomerName
 * @property string|null $ext20CustomerId
 * @property string|null $ext20CustomeCode
 * @property string|null $ext20CustomerName
 * @property string|null $channelCode
 * @property string|null $channelName
 * @property string|null $brandId
 * @property string|null $brandCode
 * @property string|null $brandName
 * @property string|null $goodsCategoryId
 * @property string|null $goodsCategoryCode
 * @property string|null $goodsCategoryName
 * @property string|null $goodsType
 * @property string|null $goodsSeriesId
 * @property string|null $goodsSeriesCode
 * @property string|null $goodsSeriesName
 * @property string|null $goodsSeriesSon
 * @property string|null $endStatus
 * @property string|null $model
 * @property string|null $amount
 * @property string|null $proposeRetailPrice
 * @property string|null $customerZeroAmount
 * @property string|null $unitMoney
 * @property string|null $companyUnitCost
 * @property string|null $marketUnitCost
 * @property string|null $sonProposalRetailPrice
 * @property string|null $customerZeroPrice
 * @property string|null $unitPrice
 * @property string|null $proposalRetailPrice
 * @property string|null $creatorId
 * @property string|null $creatorCode
 * @property string|null $creatorName
 * @property string|null $accountingMethodCode
 * @property string|null $accountingMethodName
 * @property string|null $invoiceStates
 * @property string|null $state
 * @property string|null $approver
 * @property string|null $approveDate
 * @property string|null $machineBarCode
 * @property string|null $srcBillCode
 * @property string|null $serviceModeSrcCode
 * @property string|null $serviceModeSrcName
 * @property string|null $sendTime
 * @property string|null $invoiceCode
 * @property string|null $shopperName
 * @property string|null $shopperPhone
 * @property string|null $provinceId
 * @property string|null $provinceCode
 * @property string|null $provinceName
 * @property string|null $cityId
 * @property string|null $cityCode
 * @property string|null $cityName
 * @property string|null $countyId
 * @property string|null $countyCode
 * @property string|null $countyName
 * @property string|null $townId
 * @property string|null $townCode
 * @property string|null $townName
 * @property string|null $address
 * @property string|null $creationDate
 * @property string|null $saleOrgId
 * @property string|null $saleOrgCode
 * @property string|null $saleOrgName
 * @property string|null $invoice
 * @property string|null $srcBillId
 * @property string|null $regionId
 * @property string|null $regionCode
 * @property string|null $regionName
 * @property string|null $saleregionId
 * @property string|null $saleregionCode
 * @property string|null $saleregionName
 * @property string|null $sliceAreaId
 * @property string|null $sliceAreaCode
 * @property string|null $sliceAreaName
 * @property string|null $sonProposalUnitPrice
 * @property string|null $proposeUnitPrice
 * @property string|null $proposalUnitPrice
 * @property string|null $shopperPhone1
 * @property string|null $installationCode
 * @property string|null $isIncludedCommission
 * @property string|null $isChangeCommission
 * @property string|null $isWithSingleCommission
 * @property string|null $basicCommissions
 * @property string|null $changeCommissions
 * @property string|null $singleAmounts
 * @property string|null $headRemark
 * @property string|null $modifierId
 * @property string|null $modifierCode
 * @property string|null $modifierName
 * @property-read \App\Models\ZtStore|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereAccountingMethodCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereAccountingMethodName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereApproveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereApprover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereBasicCommissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereBrandCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereChangeCommissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereChannelCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereChannelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCompanyUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCountyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCountyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCountyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCreationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCreator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCreatorCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCreatorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCurrentBusiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCurrentTerminalTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCustomerZeroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCustomerZeroPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereDr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereEndStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt11Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt11Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt12Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt12Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt13Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt13Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt14Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt14Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt20CustomeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt20CustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereExt20CustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereGoodsCategoryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereGoodsCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereGoodsCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereGoodsSeriesCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereGoodsSeriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereGoodsSeriesName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereGoodsSeriesSon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereGoodsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereHeadRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereHistoryBusiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereHistoryTerminalTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereInstallationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereInvoiceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereInvoiceStates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereIsChangeCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereIsIncludedCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereIsWithSingleCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereMachineBarCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereMarketUnitCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereModifiedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereModifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereModifierCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereModifierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereModifierName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereOwnerCustomerCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereOwnerCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereOwnerCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereOwnerShopCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereOwnerShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereOwnerShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale wherePersistStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereProposalRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereProposalUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereProposeRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereProposeUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereProvinceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereProvinceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale wherePurMachineMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale wherePurMachineTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale wherePurMachineYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereRetailBillCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereRetailTypeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereRetailTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereRiscode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSaleOrgCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSaleOrgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSaleOrgName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSaleTypeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSaleTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSaleregionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSaleregionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSaleregionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSalesDeptCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSalesDeptName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereServiceModeSrcCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereServiceModeSrcName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereShippingareaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereShippingareaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereShopChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereShopperName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereShopperPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereShopperPhone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSingleAmounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSliceAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSliceAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSliceAreaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSonProposalRetailPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSonProposalUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSrcBillCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSrcBillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSrcBillOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereTownCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereTownId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereTownName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereTs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereUnitMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereUnitPrice($value)
 * @mixin \Eloquent
 */
	class IdeHelperZtSale {}
}

namespace App\Models{
/**
 * App\Models\ZtStore
 *
 * @property int $id
 * @property string $name 门店
 * @property string|null $title 简称
 * @property string $code 中台id
 * @property int|null $isEnable 是否启用
 * @property string|null $canalTypeName 中台门店渠道
 * @property string|null $canalTypeCode 中台门店渠道id
 * @property string|null $retailCode 片区id
 * @property string|null $retailName 片区
 * @property string|null $deptRegionCode 地区id
 * @property string|null $deptRegionName 地区
 * @property string|null $deptBigRegionCode 大区id
 * @property string|null $deptBigRegionName 大区
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCanalTypeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCanalTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereDeptBigRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereDeptBigRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereDeptRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereDeptRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereRetailCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereRetailName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperZtStore {}
}

