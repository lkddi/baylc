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
 * App\Models\HuangGroup
 *
 * @property-read \App\Models\WxUser|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|HuangGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HuangGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HuangGroup query()
 * @mixin \Eloquent
 */
	class HuangGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HuangTarget
 *
 * @property-read \App\Models\WxUser|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|HuangTarget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HuangTarget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HuangTarget query()
 * @mixin \Eloquent
 */
	class HuangTarget extends \Eloquent {}
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
	class NccSale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @mixin \Eloquent
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RuningGroup
 *
 * @property int $id
 * @property string $wxid 微信id
 * @property string|null $num 公里数
 * @property int|null $state 状态
 * @property string|null $rundate 跑步日期
 * @property string|null $photo 图片
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\WxUser|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup whereRundate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningGroup whereWxid($value)
 * @mixin \Eloquent
 */
	class RuningGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RuningTarget
 *
 * @property int $id
 * @property string $wxid wxid
 * @property string|null $target 目标
 * @property string|null $rundate 目标日期
 * @property int|null $state 状态
 * @property string|null $actual 实际
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\WxUser|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget query()
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget whereActual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget whereRundate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuningTarget whereWxid($value)
 * @mixin \Eloquent
 */
	class RuningTarget extends \Eloquent {}
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
	class StockPile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $nickName 微信昵称
 * @property string|null $unionid 微信开放平台unionid
 * @property string|null $openid 微信openid
 * @property string|null $miniapp_openid 微信小程序openid
 * @property string|null $name 昵称
 * @property int $sex 性别
 * @property string|null $email
 * @property string|null $tel
 * @property string|null $real_name 真实姓名
 * @property string|null $password 密码
 * @property string|null $home 个人网站
 * @property string|null $avatar 头像
 * @property string|null $weibo 微博地址
 * @property string|null $wechat 微信号
 * @property string|null $github GITHUB
 * @property string|null $qq QQ
 * @property string|null $wakatime wakatime
 * @property \Illuminate\Support\Carbon|null $email_verified_at 邮箱验证时间
 * @property string|null $mobile_verified_at 手机验证时间
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $lock 用户锁定
 * @property int|null $credit1
 * @property int|null $credit2
 * @property int|null $credit3
 * @property int|null $credit4
 * @property int|null $credit5
 * @property int|null $credit6
 * @property int $favour_count 点赞数
 * @property int $favorite_count 收藏数
 * @property-read \App\Models\ZtPromoterst|null $info
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCredit1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCredit2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCredit3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCredit4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCredit5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCredit6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFavoriteCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFavourCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMiniappOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobileVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereQq($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUnionid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWakatime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWechat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWeibo($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent implements \PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject {}
}

namespace App\Models{
/**
 * App\Models\Warehouse
 *
 * @mixin IdeHelperWarehouse
 * @property int $id
 * @property string $zt_stores_id 仓库id
 * @property int $zt_products_id 商品id
 * @property int $quantity 数量
 * @property int $jinhuo 进货总数量
 * @property int $nums 销售数量
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ZtProduct|null $product
 * @property-read \App\Models\ZtStore|null $store
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
 */
	class Warehouse extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WorkMessage
 *
 * @property int $id
 * @property string|null $client_id
 * @property string|null $message_type 类型
 * @property mixed|null $message_data 内容
 * @property string|null $state 状态
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage whereMessageData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage whereMessageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class WorkMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxBot
 *
 * @property int $id
 * @property string $wxid WxId
 * @property string|null $username 名字
 * @property int|null $robot_type
 * @property string|null $wx_headimgurl
 * @property string|null $wx_num
 * @property string|null $clientId
 * @property int $open 状态
 * @property int|null $online
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
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereFriend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereRobotType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereTransfer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereWxHeadimgurl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereWxNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereWxid($value)
 */
	class WxBot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxForward
 *
 * @property int $id
 * @property string $wxid 群id
 * @property mixed|null $towxid 群id
 * @property int|null $open
 * @property int $text 转发文本消息
 * @property int $img 转发拖消息
 * @property int $video 转发视频消息
 * @property int $file 转发文件消息
 * @property int $xml 转发小程序消息
 * @property int $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\WxGroup|null $group
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereTowxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxForward whereXml($value)
 * @mixin \Eloquent
 */
	class WxForward extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxGroup
 *
 * @method static wxid(mixed $from_group)
 * @property int $id
 * @property string $wxid 群id
 * @property string|null $robot_wxid botwxid
 * @property string|null $title 群名
 * @property string|null $admin_wxid 管理员
 * @property int|null $user
 * @property int|null $ischeck 是否开启查库存
 * @property int|null $advance
 * @property int|null $isadd 是否开启登记
 * @property int|null $chat
 * @property int|null $photo
 * @property int|null $kucun
 * @property string|null $retailCode
 * @property string|null $retailName
 * @property string|null $deptRegionCode
 * @property string|null $deptRegionName
 * @property string|null $deptBigRegionCode
 * @property string|null $deptBigRegionName
 * @property int|null $new
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\WxUser|null $admin
 * @property-read \App\Models\ZtDeptBigRegion|null $deptBigRegion
 * @property-read \App\Models\ZtDeptRegion|null $deptRegion
 * @property-read \App\Models\ZtRetail|null $retail
 * @property-read \App\Models\ZtStore|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereAdminWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereAdvance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereChat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereDeptBigRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereDeptBigRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereDeptRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereDeptRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereIsadd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereIscheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereKucun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereRetailCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereRetailName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereRobotWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxGroup whereWxid($value)
 * @mixin \Eloquent
 * @property-read \App\Models\WxBot|null $bot
 */
	class WxGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxImg
 *
 * @mixin IdeHelperWxImg
 * @property int $id
 * @property string $from_group 群id
 * @property string|null $from_group_name
 * @property string $from_wxid 用户id
 * @property string|null $from_name
 * @property string|null $robot_wxid 机器人id
 * @property string|null $user_id 最后操作者
 * @property string|null $img img
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
 */
	class WxImg extends \Eloquent {}
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
 * @property mixed|null $msg_source 附带JSON属性（群消息有艾特人员时，返回被艾特信息）
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
	class WxMsg extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxReward
 *
 * @property int $id
 * @property string $model 型号
 * @property int $commission 提成
 * @property string|null $start-time 开始时间
 * @property string|null $stop-time 结束时间
 * @property string|null $group_ids 作用群
 * @property int|null $state 状态
 * @property string|null $channel 渠道
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereGroupIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereStopTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxReward whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class WxReward extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxSale
 *
 * @mixin IdeHelperWxSale
 * @property mixed $zt_store_code
 * @property mixed $from_group
 * @property mixed $from_wxid
 * @property int $id
 * @property int|null $zt_store_id
 * @property string|null $model 商品
 * @property int $zt_product_id
 * @property int $quantity 数量
 * @property int $amount 提成
 * @property int|null $price 卖价
 * @property string|null $user 促销员
 * @property int|null $wx_img_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ZtProduct $product
 * @property-read \App\Models\ZtStore|null $store
 * @property-read \App\Models\WxUser|null $wxuser
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereFromGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereFromWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereWxImgId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereZtProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereZtStoreCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSale whereZtStoreId($value)
 */
	class WxSale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxSalestarget
 *
 * @property int $id
 * @property string $code 门店code
 * @property string|null $wxid 群id
 * @property int $targets 任务
 * @property string|null $srarttime 开始时间
 * @property string|null $stoptime 结束时间
 * @property int $state 状态
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ZtStore|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget whereSrarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget whereStoptime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget whereTargets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxSalestarget whereWxid($value)
 * @mixin \Eloquent
 */
	class WxSalestarget extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxUser
 *
 * @mixin IdeHelperWxUser
 * @property int|mixed $zt_store_code
 * @property int $id
 * @property string|null $name 真实姓名
 * @property string|null $nickname 名字
 * @property string $group_wxid
 * @property string $wxid WxId
 * @property string|null $avatar
 * @property int|null $new
 * @property int|null $nostoremsg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\WxGroup|null $group
 * @property-read \App\Models\ZtStore|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereGroupWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereNostoremsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser whereZtStoreCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxUser wxid($wxid, $group)
 */
	class WxUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxWork
 *
 * @property int $id
 * @property string $roomid 群id
 * @property string|null $roomname 群名
 * @property int $user 登记用户
 * @property int $ischeck 是否开启查库存
 * @property int $advance 是否开启查推进
 * @property int $isadd 是否开启登记
 * @property int $chat 是否记录聊天
 * @property int $photo 是否保存图片
 * @property int $kucun 是否减库存
 * @property string|null $retailCode 片区id
 * @property string|null $retailName 片区
 * @property string|null $deptRegionCode 地区id
 * @property string|null $deptRegionName 地区
 * @property string|null $deptBigRegionCode 大区id
 * @property string|null $deptBigRegionName 大区
 * @property string|null $new 更新
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereAdvance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereChat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereDeptBigRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereDeptBigRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereDeptRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereDeptRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereIsadd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereIscheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereKucun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereRetailCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereRetailName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereRoomid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereRoomname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWork whereUser($value)
 * @mixin \Eloquent
 */
	class WxWork extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxWorkImg
 *
 * @property int $id
 * @property string|null $appinfo
 * @property mixed|null $cdn 图片数据
 * @property string|null $cdn_type cdn类型
 * @property string|null $content_type
 * @property string|null $conversation_id 群id
 * @property string|null $is_pc
 * @property string|null $receiver
 * @property string|null $send_time 发送时间
 * @property string|null $sender 发送者id
 * @property string|null $sender_name 昵称
 * @property string|null $server_id
 * @property string|null $state
 * @property string|null $path 本地目录
 * @property string|null $ai
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereAi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereAppinfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereCdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereCdnType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereContentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereIsPc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereReceiver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereSendTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereServerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkImg whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class WxWorkImg extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxWorkUser
 *
 * @property int $id
 * @property string $sender 用户id
 * @property string|null $sender_name 昵称
 * @property string|null $zt_store_code 门店编码
 * @property int|null $nostoremsg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser whereNostoremsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser whereSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser whereSenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxWorkUser whereZtStoreCode($value)
 * @mixin \Eloquent
 */
	class WxWorkUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WxZhuanfa
 *
 * @property int $id
 * @property string $robot_wxid
 * @property string $type
 * @property string $msg
 * @property string $to_wxid
 * @property int $state
 * @property string|null $fsdata 时间
 * @property int $start 开始发送
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa query()
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereFsdata($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereMsg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereRobotWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereToWxid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxZhuanfa whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class WxZhuanfa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wxbot
 *
 * @property int $id
 * @property string $wxid WxId
 * @property string|null $username 名字
 * @property int|null $robot_type
 * @property string|null $wx_headimgurl
 * @property string|null $wx_num
 * @property string|null $clientId
 * @property int $open 状态
 * @property int|null $online
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
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereFriend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereRobotType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereTransfer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereWxHeadimgurl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereWxNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WxBot whereWxid($value)
 */
	class WxBot extends \Eloquent {}
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
	class ZtArea extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtCanalType
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property int|null $order
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtCanalType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ZtCanalType extends \Eloquent {}
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
	class ZtChannel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtDeptBigRegion
 *
 * @mixin IdeHelperZtDeptBigRegion
 * @property int $id
 * @property string $title
 * @property string $code
 * @property int|null $order
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ZtStore[] $store
 * @property-read int|null $store_count
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptBigRegion whereUpdatedAt($value)
 */
	class ZtDeptBigRegion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtDeptRegion
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property int|null $order
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtDeptRegion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ZtDeptRegion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtGati
 *
 * @property int $id
 * @property int|null $gati 加提
 * @property int|null $percentage 提成
 * @property int $reward 单带
 * @property \App\Models\ZtProduct|null $model 单带
 * @property string $starttime 开始时间
 * @property string $endtime 结束时间
 * @property int $state 状态
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati whereGati($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati whereReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati whereStarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtGati whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ZtGati extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtProduct
 *
 * @property int $id
 * @property string $title 型号
 * @property string $model 型号简称
 * @property int|null $price 商品价格
 * @property int|null $ticheng 商品提成
 * @property int|null $offline 产品是否下线
 * @property int|null $product_brands_id
 * @property int|null $product_seies_id
 * @property int|null $product_classes_id
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
	class ZtProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtPromoterst
 *
 * @property int $id
 * @property string $ztid 系统id
 * @property string $code 编号
 * @property string $name 名字
 * @property string|null $terminalsupplierCode 客户编号
 * @property string|null $terminalsupplierName 客户名称
 * @property string|null $storecodeCode 门店编号
 * @property string|null $storecodeName 门店名称
 * @property string|null $retailCode 片区名称
 * @property string|null $retailName 片区名称
 * @property string|null $departmentSecLevelCode 区域编号
 * @property string|null $departmentSecLevelName 区域名称
 * @property string|null $departmentStairCode 大区编号
 * @property string|null $departmentStairName 大区名称
 * @property string $tel 电话
 * @property string $state 状态 1正常，0未审核 3审核通过
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ZtSale[] $sales
 * @property-read int|null $sales_count
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereDepartmentSecLevelCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereDepartmentSecLevelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereDepartmentStairCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereDepartmentStairName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereRetailCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereRetailName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereStorecodeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereStorecodeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereTerminalsupplierCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereTerminalsupplierName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtPromoterst whereZtid($value)
 * @mixin \Eloquent
 */
	class ZtPromoterst extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtRetail
 *
 * @property int $id
 * @property string $title
 * @property string $code
 * @property int|null $order
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtRetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ZtRetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtReward
 *
 * @property int $id
 * @property int $reward 带单
 * @property \App\Models\ZtProduct|null $model 型号
 * @property string $starttime 开始时间
 * @property string $endtime 结束时间
 * @property int $state 状态
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward whereReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward whereStarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtReward whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ZtReward extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtSale
 *
 * @mixin IdeHelperZtSale
 * @property int $id
 * @property string $tid 中台id
 * @property string|null $year 年
 * @property string|null $month 月
 * @property string|null $date 时间
 * @property string|null $retailBillCode 销售单号
 * @property string|null $saleTypeName 销售类型
 * @property string|null $retailTypeName 销售方式
 * @property string|null $zt_store_code 门店编码
 * @property string|null $ownerShopName 门店名
 * @property string|null $model 型号
 * @property string|null $customerZeroAmount 零售价
 * @property string|null $unitPrice 卖价
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ZtGati|null $gati
 * @property-read \App\Models\ZtReward|null $reward
 * @property-read \App\Models\ZtStore|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereCustomerZeroAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereOwnerShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereRetailBillCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereRetailTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereSaleTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereTid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereZtStoreCode($value)
 * @property int|null $totalQuantity 数量
 * @method static \Illuminate\Database\Eloquent\Builder|ZtSale whereTotalQuantity($value)
 */
	class ZtSale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ZtStore
 *
 * @mixin IdeHelperZtStore
 * @property int $id
 * @property string $name 门店
 * @property string $facadeShort 门店简称
 * @property string|null $warehouseName 门店名称
 * @property string $code 门店编码
 * @property string $canalCategoryCode 渠道编号
 * @property string $canalCategoryName 渠道名称
 * @property int|null $isEnable 是否启用
 * @property string|null $retailCode 片区id
 * @property string|null $retailName 片区
 * @property string|null $deptRegionCode 地区id
 * @property string|null $deptRegionName 地区
 * @property string|null $deptBigRegionCode 大区id
 * @property string|null $deptBigRegionName 大区
 * @property string|null $riscode RIS门店编码
 * @property string|null $storename 客户系统门店名称
 * @property string|null $storecode 客户系统门店编码
 * @property string|null $zid 中台id
 * @property string|null $provinceName 省
 * @property string|null $cityName 市
 * @property string|null $countyName 区县
 * @property string|null $townName 镇
 * @property string|null $ext23 归属客户
 * @property int|null $advance 是否启用推进
 * @property int|null $new 更新键值
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ZtDeptBigRegion|null $big
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore query()
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereAdvance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCanalCategoryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCanalCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCountyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereDeptBigRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereDeptBigRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereDeptRegionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereDeptRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereExt23($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereFacadeShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereIsEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereProvinceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereRetailCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereRetailName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereRiscode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereStorecode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereStorename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereTownName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereWarehouseName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ZtStore whereZid($value)
 */
	class ZtStore extends \Eloquent {}
}

