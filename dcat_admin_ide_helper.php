<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection logo
     * @property Grid\Column|Collection home_page
     * @property Grid\Column|Collection zip_url
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection key
     * @property Grid\Column|Collection expiration
     * @property Grid\Column|Collection owner
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection group_welcome_message_id
     * @property Grid\Column|Collection wx_work_id
     * @property Grid\Column|Collection welcome_message
     * @property Grid\Column|Collection zt_products_id
     * @property Grid\Column|Collection zt_stores_id
     * @property Grid\Column|Collection quantity
     * @property Grid\Column|Collection jd_product_id
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection endtime
     * @property Grid\Column|Collection sku
     * @property Grid\Column|Collection listedPrice
     * @property Grid\Column|Collection tokenPrice
     * @property Grid\Column|Collection thumbnail
     * @property Grid\Column|Collection attempts
     * @property Grid\Column|Collection reserved_at
     * @property Grid\Column|Collection available_at
     * @property Grid\Column|Collection year
     * @property Grid\Column|Collection month
     * @property Grid\Column|Collection time
     * @property Grid\Column|Collection deptBigRegionName
     * @property Grid\Column|Collection deptRegionName
     * @property Grid\Column|Collection lishipianqu
     * @property Grid\Column|Collection canalTypeName
     * @property Grid\Column|Collection client
     * @property Grid\Column|Collection brand
     * @property Grid\Column|Collection pinlei
     * @property Grid\Column|Collection xilie
     * @property Grid\Column|Collection zixilie
     * @property Grid\Column|Collection leixing
     * @property Grid\Column|Collection zengpin
     * @property Grid\Column|Collection hanshuidanjia
     * @property Grid\Column|Collection hanshuijine
     * @property Grid\Column|Collection shuilv
     * @property Grid\Column|Collection yuefan
     * @property Grid\Column|Collection danpinzhekou
     * @property Grid\Column|Collection hanshuizhekoue
     * @property Grid\Column|Collection hanshuijxse
     * @property Grid\Column|Collection wushuidanjia
     * @property Grid\Column|Collection wushuijine
     * @property Grid\Column|Collection wushuizke
     * @property Grid\Column|Collection wushuijxse
     * @property Grid\Column|Collection hanshuigle
     * @property Grid\Column|Collection kangkuleixing
     * @property Grid\Column|Collection chukucangku
     * @property Grid\Column|Collection user
     * @property Grid\Column|Collection zhidanren
     * @property Grid\Column|Collection oedertime
     * @property Grid\Column|Collection chuorder
     * @property Grid\Column|Collection chutime
     * @property Grid\Column|Collection shentime
     * @property Grid\Column|Collection qiantime
     * @property Grid\Column|Collection shouhuokehu
     * @property Grid\Column|Collection danjuqudao
     * @property Grid\Column|Collection retailName
     * @property Grid\Column|Collection waibuhao
     * @property Grid\Column|Collection zuzhi
     * @property Grid\Column|Collection beizhu
     * @property Grid\Column|Collection shouhuodizhi
     * @property Grid\Column|Collection gukedizhi
     * @property Grid\Column|Collection wuliugongsi
     * @property Grid\Column|Collection tihuofangshi
     * @property Grid\Column|Collection tuihuoleixing
     * @property Grid\Column|Collection client_id
     * @property Grid\Column|Collection scopes
     * @property Grid\Column|Collection revoked
     * @property Grid\Column|Collection expires_at
     * @property Grid\Column|Collection secret
     * @property Grid\Column|Collection provider
     * @property Grid\Column|Collection redirect
     * @property Grid\Column|Collection personal_access_client
     * @property Grid\Column|Collection password_client
     * @property Grid\Column|Collection access_token_id
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection tokenable_type
     * @property Grid\Column|Collection tokenable_id
     * @property Grid\Column|Collection abilities
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection wxid
     * @property Grid\Column|Collection num
     * @property Grid\Column|Collection state
     * @property Grid\Column|Collection rundate
     * @property Grid\Column|Collection photo
     * @property Grid\Column|Collection target
     * @property Grid\Column|Collection actual
     * @property Grid\Column|Collection ip_address
     * @property Grid\Column|Collection user_agent
     * @property Grid\Column|Collection last_activity
     * @property Grid\Column|Collection zt_store_id
     * @property Grid\Column|Collection zt_product_id
     * @property Grid\Column|Collection purchases
     * @property Grid\Column|Collection sales
     * @property Grid\Column|Collection sequence
     * @property Grid\Column|Collection batch_id
     * @property Grid\Column|Collection family_hash
     * @property Grid\Column|Collection should_display_on_index
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection entry_uuid
     * @property Grid\Column|Collection tag
     * @property Grid\Column|Collection nickName
     * @property Grid\Column|Collection unionid
     * @property Grid\Column|Collection openid
     * @property Grid\Column|Collection miniapp_openid
     * @property Grid\Column|Collection sex
     * @property Grid\Column|Collection tel
     * @property Grid\Column|Collection real_name
     * @property Grid\Column|Collection home
     * @property Grid\Column|Collection weibo
     * @property Grid\Column|Collection wechat
     * @property Grid\Column|Collection github
     * @property Grid\Column|Collection qq
     * @property Grid\Column|Collection wakatime
     * @property Grid\Column|Collection email_verified_at
     * @property Grid\Column|Collection mobile_verified_at
     * @property Grid\Column|Collection lock
     * @property Grid\Column|Collection credit1
     * @property Grid\Column|Collection credit2
     * @property Grid\Column|Collection credit3
     * @property Grid\Column|Collection credit4
     * @property Grid\Column|Collection credit5
     * @property Grid\Column|Collection credit6
     * @property Grid\Column|Collection favour_count
     * @property Grid\Column|Collection favorite_count
     * @property Grid\Column|Collection jinhuo
     * @property Grid\Column|Collection nums
     * @property Grid\Column|Collection message_type
     * @property Grid\Column|Collection message_data
     * @property Grid\Column|Collection robot_type
     * @property Grid\Column|Collection wx_headimgurl
     * @property Grid\Column|Collection wx_num
     * @property Grid\Column|Collection clientId
     * @property Grid\Column|Collection open
     * @property Grid\Column|Collection online
     * @property Grid\Column|Collection friend
     * @property Grid\Column|Collection group
     * @property Grid\Column|Collection transfer
     * @property Grid\Column|Collection apiurl
     * @property Grid\Column|Collection towxid
     * @property Grid\Column|Collection text
     * @property Grid\Column|Collection img
     * @property Grid\Column|Collection video
     * @property Grid\Column|Collection file
     * @property Grid\Column|Collection xml
     * @property Grid\Column|Collection link
     * @property Grid\Column|Collection robot_wxid
     * @property Grid\Column|Collection zt_company_id
     * @property Grid\Column|Collection admin_wxid
     * @property Grid\Column|Collection ischeck
     * @property Grid\Column|Collection advance
     * @property Grid\Column|Collection isadd
     * @property Grid\Column|Collection chat
     * @property Grid\Column|Collection kucun
     * @property Grid\Column|Collection retailCode
     * @property Grid\Column|Collection deptRegionCode
     * @property Grid\Column|Collection deptBigRegionCode
     * @property Grid\Column|Collection new
     * @property Grid\Column|Collection from_group
     * @property Grid\Column|Collection from_group_name
     * @property Grid\Column|Collection from_wxid
     * @property Grid\Column|Collection from_name
     * @property Grid\Column|Collection sdkVer
     * @property Grid\Column|Collection Event
     * @property Grid\Column|Collection msg
     * @property Grid\Column|Collection msg_source
     * @property Grid\Column|Collection clientid
     * @property Grid\Column|Collection msg_id
     * @property Grid\Column|Collection commission
     * @property Grid\Column|Collection start-time
     * @property Grid\Column|Collection stop-time
     * @property Grid\Column|Collection group_ids
     * @property Grid\Column|Collection channel
     * @property Grid\Column|Collection zt_store_code
     * @property Grid\Column|Collection amount
     * @property Grid\Column|Collection wx_img_id
     * @property Grid\Column|Collection code
     * @property Grid\Column|Collection targets
     * @property Grid\Column|Collection srarttime
     * @property Grid\Column|Collection stoptime
     * @property Grid\Column|Collection acctid
     * @property Grid\Column|Collection conversation_id
     * @property Grid\Column|Collection corp_id
     * @property Grid\Column|Collection mobile
     * @property Grid\Column|Collection nickname
     * @property Grid\Column|Collection position
     * @property Grid\Column|Collection realname
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection group_wxid
     * @property Grid\Column|Collection nostoremsg
     * @property Grid\Column|Collection appinfo
     * @property Grid\Column|Collection cdn
     * @property Grid\Column|Collection cdn_type
     * @property Grid\Column|Collection content_type
     * @property Grid\Column|Collection is_pc
     * @property Grid\Column|Collection receiver
     * @property Grid\Column|Collection send_time
     * @property Grid\Column|Collection sender
     * @property Grid\Column|Collection sender_name
     * @property Grid\Column|Collection server_id
     * @property Grid\Column|Collection path
     * @property Grid\Column|Collection ai
     * @property Grid\Column|Collection wx_work_user_id
     * @property Grid\Column|Collection roomid
     * @property Grid\Column|Collection roomname
     * @property Grid\Column|Collection to_wxid
     * @property Grid\Column|Collection fsdata
     * @property Grid\Column|Collection start
     * @property Grid\Column|Collection gati
     * @property Grid\Column|Collection percentage
     * @property Grid\Column|Collection reward
     * @property Grid\Column|Collection starttime
     * @property Grid\Column|Collection ticheng
     * @property Grid\Column|Collection offline
     * @property Grid\Column|Collection product_brands_id
     * @property Grid\Column|Collection product_seies_id
     * @property Grid\Column|Collection product_classes_id
     * @property Grid\Column|Collection ztid
     * @property Grid\Column|Collection terminalsupplierCode
     * @property Grid\Column|Collection terminalsupplierName
     * @property Grid\Column|Collection storecodeCode
     * @property Grid\Column|Collection storecodeName
     * @property Grid\Column|Collection departmentSecLevelCode
     * @property Grid\Column|Collection departmentSecLevelName
     * @property Grid\Column|Collection departmentStairCode
     * @property Grid\Column|Collection departmentStairName
     * @property Grid\Column|Collection tid
     * @property Grid\Column|Collection date
     * @property Grid\Column|Collection customerZeroAmount
     * @property Grid\Column|Collection unitPrice
     * @property Grid\Column|Collection warehouseName
     * @property Grid\Column|Collection facadeShort
     * @property Grid\Column|Collection isEnable
     * @property Grid\Column|Collection canalCategoryName
     * @property Grid\Column|Collection canalCategoryCode
     * @property Grid\Column|Collection riscode
     * @property Grid\Column|Collection storename
     * @property Grid\Column|Collection storecode
     * @property Grid\Column|Collection zid
     * @property Grid\Column|Collection provinceName
     * @property Grid\Column|Collection cityName
     * @property Grid\Column|Collection countyName
     * @property Grid\Column|Collection townName
     * @property Grid\Column|Collection ext23
     *
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection logo(string $label = null)
     * @method Grid\Column|Collection home_page(string $label = null)
     * @method Grid\Column|Collection zip_url(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection key(string $label = null)
     * @method Grid\Column|Collection expiration(string $label = null)
     * @method Grid\Column|Collection owner(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection group_welcome_message_id(string $label = null)
     * @method Grid\Column|Collection wx_work_id(string $label = null)
     * @method Grid\Column|Collection welcome_message(string $label = null)
     * @method Grid\Column|Collection zt_products_id(string $label = null)
     * @method Grid\Column|Collection zt_stores_id(string $label = null)
     * @method Grid\Column|Collection quantity(string $label = null)
     * @method Grid\Column|Collection jd_product_id(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection endtime(string $label = null)
     * @method Grid\Column|Collection sku(string $label = null)
     * @method Grid\Column|Collection listedPrice(string $label = null)
     * @method Grid\Column|Collection tokenPrice(string $label = null)
     * @method Grid\Column|Collection thumbnail(string $label = null)
     * @method Grid\Column|Collection attempts(string $label = null)
     * @method Grid\Column|Collection reserved_at(string $label = null)
     * @method Grid\Column|Collection available_at(string $label = null)
     * @method Grid\Column|Collection year(string $label = null)
     * @method Grid\Column|Collection month(string $label = null)
     * @method Grid\Column|Collection time(string $label = null)
     * @method Grid\Column|Collection deptBigRegionName(string $label = null)
     * @method Grid\Column|Collection deptRegionName(string $label = null)
     * @method Grid\Column|Collection lishipianqu(string $label = null)
     * @method Grid\Column|Collection canalTypeName(string $label = null)
     * @method Grid\Column|Collection client(string $label = null)
     * @method Grid\Column|Collection brand(string $label = null)
     * @method Grid\Column|Collection pinlei(string $label = null)
     * @method Grid\Column|Collection xilie(string $label = null)
     * @method Grid\Column|Collection zixilie(string $label = null)
     * @method Grid\Column|Collection leixing(string $label = null)
     * @method Grid\Column|Collection zengpin(string $label = null)
     * @method Grid\Column|Collection hanshuidanjia(string $label = null)
     * @method Grid\Column|Collection hanshuijine(string $label = null)
     * @method Grid\Column|Collection shuilv(string $label = null)
     * @method Grid\Column|Collection yuefan(string $label = null)
     * @method Grid\Column|Collection danpinzhekou(string $label = null)
     * @method Grid\Column|Collection hanshuizhekoue(string $label = null)
     * @method Grid\Column|Collection hanshuijxse(string $label = null)
     * @method Grid\Column|Collection wushuidanjia(string $label = null)
     * @method Grid\Column|Collection wushuijine(string $label = null)
     * @method Grid\Column|Collection wushuizke(string $label = null)
     * @method Grid\Column|Collection wushuijxse(string $label = null)
     * @method Grid\Column|Collection hanshuigle(string $label = null)
     * @method Grid\Column|Collection kangkuleixing(string $label = null)
     * @method Grid\Column|Collection chukucangku(string $label = null)
     * @method Grid\Column|Collection user(string $label = null)
     * @method Grid\Column|Collection zhidanren(string $label = null)
     * @method Grid\Column|Collection oedertime(string $label = null)
     * @method Grid\Column|Collection chuorder(string $label = null)
     * @method Grid\Column|Collection chutime(string $label = null)
     * @method Grid\Column|Collection shentime(string $label = null)
     * @method Grid\Column|Collection qiantime(string $label = null)
     * @method Grid\Column|Collection shouhuokehu(string $label = null)
     * @method Grid\Column|Collection danjuqudao(string $label = null)
     * @method Grid\Column|Collection retailName(string $label = null)
     * @method Grid\Column|Collection waibuhao(string $label = null)
     * @method Grid\Column|Collection zuzhi(string $label = null)
     * @method Grid\Column|Collection beizhu(string $label = null)
     * @method Grid\Column|Collection shouhuodizhi(string $label = null)
     * @method Grid\Column|Collection gukedizhi(string $label = null)
     * @method Grid\Column|Collection wuliugongsi(string $label = null)
     * @method Grid\Column|Collection tihuofangshi(string $label = null)
     * @method Grid\Column|Collection tuihuoleixing(string $label = null)
     * @method Grid\Column|Collection client_id(string $label = null)
     * @method Grid\Column|Collection scopes(string $label = null)
     * @method Grid\Column|Collection revoked(string $label = null)
     * @method Grid\Column|Collection expires_at(string $label = null)
     * @method Grid\Column|Collection secret(string $label = null)
     * @method Grid\Column|Collection provider(string $label = null)
     * @method Grid\Column|Collection redirect(string $label = null)
     * @method Grid\Column|Collection personal_access_client(string $label = null)
     * @method Grid\Column|Collection password_client(string $label = null)
     * @method Grid\Column|Collection access_token_id(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection tokenable_type(string $label = null)
     * @method Grid\Column|Collection tokenable_id(string $label = null)
     * @method Grid\Column|Collection abilities(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection wxid(string $label = null)
     * @method Grid\Column|Collection num(string $label = null)
     * @method Grid\Column|Collection state(string $label = null)
     * @method Grid\Column|Collection rundate(string $label = null)
     * @method Grid\Column|Collection photo(string $label = null)
     * @method Grid\Column|Collection target(string $label = null)
     * @method Grid\Column|Collection actual(string $label = null)
     * @method Grid\Column|Collection ip_address(string $label = null)
     * @method Grid\Column|Collection user_agent(string $label = null)
     * @method Grid\Column|Collection last_activity(string $label = null)
     * @method Grid\Column|Collection zt_store_id(string $label = null)
     * @method Grid\Column|Collection zt_product_id(string $label = null)
     * @method Grid\Column|Collection purchases(string $label = null)
     * @method Grid\Column|Collection sales(string $label = null)
     * @method Grid\Column|Collection sequence(string $label = null)
     * @method Grid\Column|Collection batch_id(string $label = null)
     * @method Grid\Column|Collection family_hash(string $label = null)
     * @method Grid\Column|Collection should_display_on_index(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection entry_uuid(string $label = null)
     * @method Grid\Column|Collection tag(string $label = null)
     * @method Grid\Column|Collection nickName(string $label = null)
     * @method Grid\Column|Collection unionid(string $label = null)
     * @method Grid\Column|Collection openid(string $label = null)
     * @method Grid\Column|Collection miniapp_openid(string $label = null)
     * @method Grid\Column|Collection sex(string $label = null)
     * @method Grid\Column|Collection tel(string $label = null)
     * @method Grid\Column|Collection real_name(string $label = null)
     * @method Grid\Column|Collection home(string $label = null)
     * @method Grid\Column|Collection weibo(string $label = null)
     * @method Grid\Column|Collection wechat(string $label = null)
     * @method Grid\Column|Collection github(string $label = null)
     * @method Grid\Column|Collection qq(string $label = null)
     * @method Grid\Column|Collection wakatime(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     * @method Grid\Column|Collection mobile_verified_at(string $label = null)
     * @method Grid\Column|Collection lock(string $label = null)
     * @method Grid\Column|Collection credit1(string $label = null)
     * @method Grid\Column|Collection credit2(string $label = null)
     * @method Grid\Column|Collection credit3(string $label = null)
     * @method Grid\Column|Collection credit4(string $label = null)
     * @method Grid\Column|Collection credit5(string $label = null)
     * @method Grid\Column|Collection credit6(string $label = null)
     * @method Grid\Column|Collection favour_count(string $label = null)
     * @method Grid\Column|Collection favorite_count(string $label = null)
     * @method Grid\Column|Collection jinhuo(string $label = null)
     * @method Grid\Column|Collection nums(string $label = null)
     * @method Grid\Column|Collection message_type(string $label = null)
     * @method Grid\Column|Collection message_data(string $label = null)
     * @method Grid\Column|Collection robot_type(string $label = null)
     * @method Grid\Column|Collection wx_headimgurl(string $label = null)
     * @method Grid\Column|Collection wx_num(string $label = null)
     * @method Grid\Column|Collection clientId(string $label = null)
     * @method Grid\Column|Collection open(string $label = null)
     * @method Grid\Column|Collection online(string $label = null)
     * @method Grid\Column|Collection friend(string $label = null)
     * @method Grid\Column|Collection group(string $label = null)
     * @method Grid\Column|Collection transfer(string $label = null)
     * @method Grid\Column|Collection apiurl(string $label = null)
     * @method Grid\Column|Collection towxid(string $label = null)
     * @method Grid\Column|Collection text(string $label = null)
     * @method Grid\Column|Collection img(string $label = null)
     * @method Grid\Column|Collection video(string $label = null)
     * @method Grid\Column|Collection file(string $label = null)
     * @method Grid\Column|Collection xml(string $label = null)
     * @method Grid\Column|Collection link(string $label = null)
     * @method Grid\Column|Collection robot_wxid(string $label = null)
     * @method Grid\Column|Collection zt_company_id(string $label = null)
     * @method Grid\Column|Collection admin_wxid(string $label = null)
     * @method Grid\Column|Collection ischeck(string $label = null)
     * @method Grid\Column|Collection advance(string $label = null)
     * @method Grid\Column|Collection isadd(string $label = null)
     * @method Grid\Column|Collection chat(string $label = null)
     * @method Grid\Column|Collection kucun(string $label = null)
     * @method Grid\Column|Collection retailCode(string $label = null)
     * @method Grid\Column|Collection deptRegionCode(string $label = null)
     * @method Grid\Column|Collection deptBigRegionCode(string $label = null)
     * @method Grid\Column|Collection new(string $label = null)
     * @method Grid\Column|Collection from_group(string $label = null)
     * @method Grid\Column|Collection from_group_name(string $label = null)
     * @method Grid\Column|Collection from_wxid(string $label = null)
     * @method Grid\Column|Collection from_name(string $label = null)
     * @method Grid\Column|Collection sdkVer(string $label = null)
     * @method Grid\Column|Collection Event(string $label = null)
     * @method Grid\Column|Collection msg(string $label = null)
     * @method Grid\Column|Collection msg_source(string $label = null)
     * @method Grid\Column|Collection clientid(string $label = null)
     * @method Grid\Column|Collection msg_id(string $label = null)
     * @method Grid\Column|Collection commission(string $label = null)
     * @method Grid\Column|Collection start-time(string $label = null)
     * @method Grid\Column|Collection stop-time(string $label = null)
     * @method Grid\Column|Collection group_ids(string $label = null)
     * @method Grid\Column|Collection channel(string $label = null)
     * @method Grid\Column|Collection zt_store_code(string $label = null)
     * @method Grid\Column|Collection amount(string $label = null)
     * @method Grid\Column|Collection wx_img_id(string $label = null)
     * @method Grid\Column|Collection code(string $label = null)
     * @method Grid\Column|Collection targets(string $label = null)
     * @method Grid\Column|Collection srarttime(string $label = null)
     * @method Grid\Column|Collection stoptime(string $label = null)
     * @method Grid\Column|Collection acctid(string $label = null)
     * @method Grid\Column|Collection conversation_id(string $label = null)
     * @method Grid\Column|Collection corp_id(string $label = null)
     * @method Grid\Column|Collection mobile(string $label = null)
     * @method Grid\Column|Collection nickname(string $label = null)
     * @method Grid\Column|Collection position(string $label = null)
     * @method Grid\Column|Collection realname(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection group_wxid(string $label = null)
     * @method Grid\Column|Collection nostoremsg(string $label = null)
     * @method Grid\Column|Collection appinfo(string $label = null)
     * @method Grid\Column|Collection cdn(string $label = null)
     * @method Grid\Column|Collection cdn_type(string $label = null)
     * @method Grid\Column|Collection content_type(string $label = null)
     * @method Grid\Column|Collection is_pc(string $label = null)
     * @method Grid\Column|Collection receiver(string $label = null)
     * @method Grid\Column|Collection send_time(string $label = null)
     * @method Grid\Column|Collection sender(string $label = null)
     * @method Grid\Column|Collection sender_name(string $label = null)
     * @method Grid\Column|Collection server_id(string $label = null)
     * @method Grid\Column|Collection path(string $label = null)
     * @method Grid\Column|Collection ai(string $label = null)
     * @method Grid\Column|Collection wx_work_user_id(string $label = null)
     * @method Grid\Column|Collection roomid(string $label = null)
     * @method Grid\Column|Collection roomname(string $label = null)
     * @method Grid\Column|Collection to_wxid(string $label = null)
     * @method Grid\Column|Collection fsdata(string $label = null)
     * @method Grid\Column|Collection start(string $label = null)
     * @method Grid\Column|Collection gati(string $label = null)
     * @method Grid\Column|Collection percentage(string $label = null)
     * @method Grid\Column|Collection reward(string $label = null)
     * @method Grid\Column|Collection starttime(string $label = null)
     * @method Grid\Column|Collection ticheng(string $label = null)
     * @method Grid\Column|Collection offline(string $label = null)
     * @method Grid\Column|Collection product_brands_id(string $label = null)
     * @method Grid\Column|Collection product_seies_id(string $label = null)
     * @method Grid\Column|Collection product_classes_id(string $label = null)
     * @method Grid\Column|Collection ztid(string $label = null)
     * @method Grid\Column|Collection terminalsupplierCode(string $label = null)
     * @method Grid\Column|Collection terminalsupplierName(string $label = null)
     * @method Grid\Column|Collection storecodeCode(string $label = null)
     * @method Grid\Column|Collection storecodeName(string $label = null)
     * @method Grid\Column|Collection departmentSecLevelCode(string $label = null)
     * @method Grid\Column|Collection departmentSecLevelName(string $label = null)
     * @method Grid\Column|Collection departmentStairCode(string $label = null)
     * @method Grid\Column|Collection departmentStairName(string $label = null)
     * @method Grid\Column|Collection tid(string $label = null)
     * @method Grid\Column|Collection date(string $label = null)
     * @method Grid\Column|Collection customerZeroAmount(string $label = null)
     * @method Grid\Column|Collection unitPrice(string $label = null)
     * @method Grid\Column|Collection warehouseName(string $label = null)
     * @method Grid\Column|Collection facadeShort(string $label = null)
     * @method Grid\Column|Collection isEnable(string $label = null)
     * @method Grid\Column|Collection canalCategoryName(string $label = null)
     * @method Grid\Column|Collection canalCategoryCode(string $label = null)
     * @method Grid\Column|Collection riscode(string $label = null)
     * @method Grid\Column|Collection storename(string $label = null)
     * @method Grid\Column|Collection storecode(string $label = null)
     * @method Grid\Column|Collection zid(string $label = null)
     * @method Grid\Column|Collection provinceName(string $label = null)
     * @method Grid\Column|Collection cityName(string $label = null)
     * @method Grid\Column|Collection countyName(string $label = null)
     * @method Grid\Column|Collection townName(string $label = null)
     * @method Grid\Column|Collection ext23(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection logo
     * @property Show\Field|Collection home_page
     * @property Show\Field|Collection zip_url
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection key
     * @property Show\Field|Collection expiration
     * @property Show\Field|Collection owner
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection group_welcome_message_id
     * @property Show\Field|Collection wx_work_id
     * @property Show\Field|Collection welcome_message
     * @property Show\Field|Collection zt_products_id
     * @property Show\Field|Collection zt_stores_id
     * @property Show\Field|Collection quantity
     * @property Show\Field|Collection jd_product_id
     * @property Show\Field|Collection price
     * @property Show\Field|Collection endtime
     * @property Show\Field|Collection sku
     * @property Show\Field|Collection listedPrice
     * @property Show\Field|Collection tokenPrice
     * @property Show\Field|Collection thumbnail
     * @property Show\Field|Collection attempts
     * @property Show\Field|Collection reserved_at
     * @property Show\Field|Collection available_at
     * @property Show\Field|Collection year
     * @property Show\Field|Collection month
     * @property Show\Field|Collection time
     * @property Show\Field|Collection deptBigRegionName
     * @property Show\Field|Collection deptRegionName
     * @property Show\Field|Collection lishipianqu
     * @property Show\Field|Collection canalTypeName
     * @property Show\Field|Collection client
     * @property Show\Field|Collection brand
     * @property Show\Field|Collection pinlei
     * @property Show\Field|Collection xilie
     * @property Show\Field|Collection zixilie
     * @property Show\Field|Collection leixing
     * @property Show\Field|Collection zengpin
     * @property Show\Field|Collection hanshuidanjia
     * @property Show\Field|Collection hanshuijine
     * @property Show\Field|Collection shuilv
     * @property Show\Field|Collection yuefan
     * @property Show\Field|Collection danpinzhekou
     * @property Show\Field|Collection hanshuizhekoue
     * @property Show\Field|Collection hanshuijxse
     * @property Show\Field|Collection wushuidanjia
     * @property Show\Field|Collection wushuijine
     * @property Show\Field|Collection wushuizke
     * @property Show\Field|Collection wushuijxse
     * @property Show\Field|Collection hanshuigle
     * @property Show\Field|Collection kangkuleixing
     * @property Show\Field|Collection chukucangku
     * @property Show\Field|Collection user
     * @property Show\Field|Collection zhidanren
     * @property Show\Field|Collection oedertime
     * @property Show\Field|Collection chuorder
     * @property Show\Field|Collection chutime
     * @property Show\Field|Collection shentime
     * @property Show\Field|Collection qiantime
     * @property Show\Field|Collection shouhuokehu
     * @property Show\Field|Collection danjuqudao
     * @property Show\Field|Collection retailName
     * @property Show\Field|Collection waibuhao
     * @property Show\Field|Collection zuzhi
     * @property Show\Field|Collection beizhu
     * @property Show\Field|Collection shouhuodizhi
     * @property Show\Field|Collection gukedizhi
     * @property Show\Field|Collection wuliugongsi
     * @property Show\Field|Collection tihuofangshi
     * @property Show\Field|Collection tuihuoleixing
     * @property Show\Field|Collection client_id
     * @property Show\Field|Collection scopes
     * @property Show\Field|Collection revoked
     * @property Show\Field|Collection expires_at
     * @property Show\Field|Collection secret
     * @property Show\Field|Collection provider
     * @property Show\Field|Collection redirect
     * @property Show\Field|Collection personal_access_client
     * @property Show\Field|Collection password_client
     * @property Show\Field|Collection access_token_id
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection tokenable_type
     * @property Show\Field|Collection tokenable_id
     * @property Show\Field|Collection abilities
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection wxid
     * @property Show\Field|Collection num
     * @property Show\Field|Collection state
     * @property Show\Field|Collection rundate
     * @property Show\Field|Collection photo
     * @property Show\Field|Collection target
     * @property Show\Field|Collection actual
     * @property Show\Field|Collection ip_address
     * @property Show\Field|Collection user_agent
     * @property Show\Field|Collection last_activity
     * @property Show\Field|Collection zt_store_id
     * @property Show\Field|Collection zt_product_id
     * @property Show\Field|Collection purchases
     * @property Show\Field|Collection sales
     * @property Show\Field|Collection sequence
     * @property Show\Field|Collection batch_id
     * @property Show\Field|Collection family_hash
     * @property Show\Field|Collection should_display_on_index
     * @property Show\Field|Collection content
     * @property Show\Field|Collection entry_uuid
     * @property Show\Field|Collection tag
     * @property Show\Field|Collection nickName
     * @property Show\Field|Collection unionid
     * @property Show\Field|Collection openid
     * @property Show\Field|Collection miniapp_openid
     * @property Show\Field|Collection sex
     * @property Show\Field|Collection tel
     * @property Show\Field|Collection real_name
     * @property Show\Field|Collection home
     * @property Show\Field|Collection weibo
     * @property Show\Field|Collection wechat
     * @property Show\Field|Collection github
     * @property Show\Field|Collection qq
     * @property Show\Field|Collection wakatime
     * @property Show\Field|Collection email_verified_at
     * @property Show\Field|Collection mobile_verified_at
     * @property Show\Field|Collection lock
     * @property Show\Field|Collection credit1
     * @property Show\Field|Collection credit2
     * @property Show\Field|Collection credit3
     * @property Show\Field|Collection credit4
     * @property Show\Field|Collection credit5
     * @property Show\Field|Collection credit6
     * @property Show\Field|Collection favour_count
     * @property Show\Field|Collection favorite_count
     * @property Show\Field|Collection jinhuo
     * @property Show\Field|Collection nums
     * @property Show\Field|Collection message_type
     * @property Show\Field|Collection message_data
     * @property Show\Field|Collection robot_type
     * @property Show\Field|Collection wx_headimgurl
     * @property Show\Field|Collection wx_num
     * @property Show\Field|Collection clientId
     * @property Show\Field|Collection open
     * @property Show\Field|Collection online
     * @property Show\Field|Collection friend
     * @property Show\Field|Collection group
     * @property Show\Field|Collection transfer
     * @property Show\Field|Collection apiurl
     * @property Show\Field|Collection towxid
     * @property Show\Field|Collection text
     * @property Show\Field|Collection img
     * @property Show\Field|Collection video
     * @property Show\Field|Collection file
     * @property Show\Field|Collection xml
     * @property Show\Field|Collection link
     * @property Show\Field|Collection robot_wxid
     * @property Show\Field|Collection zt_company_id
     * @property Show\Field|Collection admin_wxid
     * @property Show\Field|Collection ischeck
     * @property Show\Field|Collection advance
     * @property Show\Field|Collection isadd
     * @property Show\Field|Collection chat
     * @property Show\Field|Collection kucun
     * @property Show\Field|Collection retailCode
     * @property Show\Field|Collection deptRegionCode
     * @property Show\Field|Collection deptBigRegionCode
     * @property Show\Field|Collection new
     * @property Show\Field|Collection from_group
     * @property Show\Field|Collection from_group_name
     * @property Show\Field|Collection from_wxid
     * @property Show\Field|Collection from_name
     * @property Show\Field|Collection sdkVer
     * @property Show\Field|Collection Event
     * @property Show\Field|Collection msg
     * @property Show\Field|Collection msg_source
     * @property Show\Field|Collection clientid
     * @property Show\Field|Collection msg_id
     * @property Show\Field|Collection commission
     * @property Show\Field|Collection start-time
     * @property Show\Field|Collection stop-time
     * @property Show\Field|Collection group_ids
     * @property Show\Field|Collection channel
     * @property Show\Field|Collection zt_store_code
     * @property Show\Field|Collection amount
     * @property Show\Field|Collection wx_img_id
     * @property Show\Field|Collection code
     * @property Show\Field|Collection targets
     * @property Show\Field|Collection srarttime
     * @property Show\Field|Collection stoptime
     * @property Show\Field|Collection acctid
     * @property Show\Field|Collection conversation_id
     * @property Show\Field|Collection corp_id
     * @property Show\Field|Collection mobile
     * @property Show\Field|Collection nickname
     * @property Show\Field|Collection position
     * @property Show\Field|Collection realname
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection group_wxid
     * @property Show\Field|Collection nostoremsg
     * @property Show\Field|Collection appinfo
     * @property Show\Field|Collection cdn
     * @property Show\Field|Collection cdn_type
     * @property Show\Field|Collection content_type
     * @property Show\Field|Collection is_pc
     * @property Show\Field|Collection receiver
     * @property Show\Field|Collection send_time
     * @property Show\Field|Collection sender
     * @property Show\Field|Collection sender_name
     * @property Show\Field|Collection server_id
     * @property Show\Field|Collection path
     * @property Show\Field|Collection ai
     * @property Show\Field|Collection wx_work_user_id
     * @property Show\Field|Collection roomid
     * @property Show\Field|Collection roomname
     * @property Show\Field|Collection to_wxid
     * @property Show\Field|Collection fsdata
     * @property Show\Field|Collection start
     * @property Show\Field|Collection gati
     * @property Show\Field|Collection percentage
     * @property Show\Field|Collection reward
     * @property Show\Field|Collection starttime
     * @property Show\Field|Collection ticheng
     * @property Show\Field|Collection offline
     * @property Show\Field|Collection product_brands_id
     * @property Show\Field|Collection product_seies_id
     * @property Show\Field|Collection product_classes_id
     * @property Show\Field|Collection ztid
     * @property Show\Field|Collection terminalsupplierCode
     * @property Show\Field|Collection terminalsupplierName
     * @property Show\Field|Collection storecodeCode
     * @property Show\Field|Collection storecodeName
     * @property Show\Field|Collection departmentSecLevelCode
     * @property Show\Field|Collection departmentSecLevelName
     * @property Show\Field|Collection departmentStairCode
     * @property Show\Field|Collection departmentStairName
     * @property Show\Field|Collection tid
     * @property Show\Field|Collection date
     * @property Show\Field|Collection customerZeroAmount
     * @property Show\Field|Collection unitPrice
     * @property Show\Field|Collection warehouseName
     * @property Show\Field|Collection facadeShort
     * @property Show\Field|Collection isEnable
     * @property Show\Field|Collection canalCategoryName
     * @property Show\Field|Collection canalCategoryCode
     * @property Show\Field|Collection riscode
     * @property Show\Field|Collection storename
     * @property Show\Field|Collection storecode
     * @property Show\Field|Collection zid
     * @property Show\Field|Collection provinceName
     * @property Show\Field|Collection cityName
     * @property Show\Field|Collection countyName
     * @property Show\Field|Collection townName
     * @property Show\Field|Collection ext23
     *
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection logo(string $label = null)
     * @method Show\Field|Collection home_page(string $label = null)
     * @method Show\Field|Collection zip_url(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection key(string $label = null)
     * @method Show\Field|Collection expiration(string $label = null)
     * @method Show\Field|Collection owner(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection group_welcome_message_id(string $label = null)
     * @method Show\Field|Collection wx_work_id(string $label = null)
     * @method Show\Field|Collection welcome_message(string $label = null)
     * @method Show\Field|Collection zt_products_id(string $label = null)
     * @method Show\Field|Collection zt_stores_id(string $label = null)
     * @method Show\Field|Collection quantity(string $label = null)
     * @method Show\Field|Collection jd_product_id(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection endtime(string $label = null)
     * @method Show\Field|Collection sku(string $label = null)
     * @method Show\Field|Collection listedPrice(string $label = null)
     * @method Show\Field|Collection tokenPrice(string $label = null)
     * @method Show\Field|Collection thumbnail(string $label = null)
     * @method Show\Field|Collection attempts(string $label = null)
     * @method Show\Field|Collection reserved_at(string $label = null)
     * @method Show\Field|Collection available_at(string $label = null)
     * @method Show\Field|Collection year(string $label = null)
     * @method Show\Field|Collection month(string $label = null)
     * @method Show\Field|Collection time(string $label = null)
     * @method Show\Field|Collection deptBigRegionName(string $label = null)
     * @method Show\Field|Collection deptRegionName(string $label = null)
     * @method Show\Field|Collection lishipianqu(string $label = null)
     * @method Show\Field|Collection canalTypeName(string $label = null)
     * @method Show\Field|Collection client(string $label = null)
     * @method Show\Field|Collection brand(string $label = null)
     * @method Show\Field|Collection pinlei(string $label = null)
     * @method Show\Field|Collection xilie(string $label = null)
     * @method Show\Field|Collection zixilie(string $label = null)
     * @method Show\Field|Collection leixing(string $label = null)
     * @method Show\Field|Collection zengpin(string $label = null)
     * @method Show\Field|Collection hanshuidanjia(string $label = null)
     * @method Show\Field|Collection hanshuijine(string $label = null)
     * @method Show\Field|Collection shuilv(string $label = null)
     * @method Show\Field|Collection yuefan(string $label = null)
     * @method Show\Field|Collection danpinzhekou(string $label = null)
     * @method Show\Field|Collection hanshuizhekoue(string $label = null)
     * @method Show\Field|Collection hanshuijxse(string $label = null)
     * @method Show\Field|Collection wushuidanjia(string $label = null)
     * @method Show\Field|Collection wushuijine(string $label = null)
     * @method Show\Field|Collection wushuizke(string $label = null)
     * @method Show\Field|Collection wushuijxse(string $label = null)
     * @method Show\Field|Collection hanshuigle(string $label = null)
     * @method Show\Field|Collection kangkuleixing(string $label = null)
     * @method Show\Field|Collection chukucangku(string $label = null)
     * @method Show\Field|Collection user(string $label = null)
     * @method Show\Field|Collection zhidanren(string $label = null)
     * @method Show\Field|Collection oedertime(string $label = null)
     * @method Show\Field|Collection chuorder(string $label = null)
     * @method Show\Field|Collection chutime(string $label = null)
     * @method Show\Field|Collection shentime(string $label = null)
     * @method Show\Field|Collection qiantime(string $label = null)
     * @method Show\Field|Collection shouhuokehu(string $label = null)
     * @method Show\Field|Collection danjuqudao(string $label = null)
     * @method Show\Field|Collection retailName(string $label = null)
     * @method Show\Field|Collection waibuhao(string $label = null)
     * @method Show\Field|Collection zuzhi(string $label = null)
     * @method Show\Field|Collection beizhu(string $label = null)
     * @method Show\Field|Collection shouhuodizhi(string $label = null)
     * @method Show\Field|Collection gukedizhi(string $label = null)
     * @method Show\Field|Collection wuliugongsi(string $label = null)
     * @method Show\Field|Collection tihuofangshi(string $label = null)
     * @method Show\Field|Collection tuihuoleixing(string $label = null)
     * @method Show\Field|Collection client_id(string $label = null)
     * @method Show\Field|Collection scopes(string $label = null)
     * @method Show\Field|Collection revoked(string $label = null)
     * @method Show\Field|Collection expires_at(string $label = null)
     * @method Show\Field|Collection secret(string $label = null)
     * @method Show\Field|Collection provider(string $label = null)
     * @method Show\Field|Collection redirect(string $label = null)
     * @method Show\Field|Collection personal_access_client(string $label = null)
     * @method Show\Field|Collection password_client(string $label = null)
     * @method Show\Field|Collection access_token_id(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection tokenable_type(string $label = null)
     * @method Show\Field|Collection tokenable_id(string $label = null)
     * @method Show\Field|Collection abilities(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection wxid(string $label = null)
     * @method Show\Field|Collection num(string $label = null)
     * @method Show\Field|Collection state(string $label = null)
     * @method Show\Field|Collection rundate(string $label = null)
     * @method Show\Field|Collection photo(string $label = null)
     * @method Show\Field|Collection target(string $label = null)
     * @method Show\Field|Collection actual(string $label = null)
     * @method Show\Field|Collection ip_address(string $label = null)
     * @method Show\Field|Collection user_agent(string $label = null)
     * @method Show\Field|Collection last_activity(string $label = null)
     * @method Show\Field|Collection zt_store_id(string $label = null)
     * @method Show\Field|Collection zt_product_id(string $label = null)
     * @method Show\Field|Collection purchases(string $label = null)
     * @method Show\Field|Collection sales(string $label = null)
     * @method Show\Field|Collection sequence(string $label = null)
     * @method Show\Field|Collection batch_id(string $label = null)
     * @method Show\Field|Collection family_hash(string $label = null)
     * @method Show\Field|Collection should_display_on_index(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection entry_uuid(string $label = null)
     * @method Show\Field|Collection tag(string $label = null)
     * @method Show\Field|Collection nickName(string $label = null)
     * @method Show\Field|Collection unionid(string $label = null)
     * @method Show\Field|Collection openid(string $label = null)
     * @method Show\Field|Collection miniapp_openid(string $label = null)
     * @method Show\Field|Collection sex(string $label = null)
     * @method Show\Field|Collection tel(string $label = null)
     * @method Show\Field|Collection real_name(string $label = null)
     * @method Show\Field|Collection home(string $label = null)
     * @method Show\Field|Collection weibo(string $label = null)
     * @method Show\Field|Collection wechat(string $label = null)
     * @method Show\Field|Collection github(string $label = null)
     * @method Show\Field|Collection qq(string $label = null)
     * @method Show\Field|Collection wakatime(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     * @method Show\Field|Collection mobile_verified_at(string $label = null)
     * @method Show\Field|Collection lock(string $label = null)
     * @method Show\Field|Collection credit1(string $label = null)
     * @method Show\Field|Collection credit2(string $label = null)
     * @method Show\Field|Collection credit3(string $label = null)
     * @method Show\Field|Collection credit4(string $label = null)
     * @method Show\Field|Collection credit5(string $label = null)
     * @method Show\Field|Collection credit6(string $label = null)
     * @method Show\Field|Collection favour_count(string $label = null)
     * @method Show\Field|Collection favorite_count(string $label = null)
     * @method Show\Field|Collection jinhuo(string $label = null)
     * @method Show\Field|Collection nums(string $label = null)
     * @method Show\Field|Collection message_type(string $label = null)
     * @method Show\Field|Collection message_data(string $label = null)
     * @method Show\Field|Collection robot_type(string $label = null)
     * @method Show\Field|Collection wx_headimgurl(string $label = null)
     * @method Show\Field|Collection wx_num(string $label = null)
     * @method Show\Field|Collection clientId(string $label = null)
     * @method Show\Field|Collection open(string $label = null)
     * @method Show\Field|Collection online(string $label = null)
     * @method Show\Field|Collection friend(string $label = null)
     * @method Show\Field|Collection group(string $label = null)
     * @method Show\Field|Collection transfer(string $label = null)
     * @method Show\Field|Collection apiurl(string $label = null)
     * @method Show\Field|Collection towxid(string $label = null)
     * @method Show\Field|Collection text(string $label = null)
     * @method Show\Field|Collection img(string $label = null)
     * @method Show\Field|Collection video(string $label = null)
     * @method Show\Field|Collection file(string $label = null)
     * @method Show\Field|Collection xml(string $label = null)
     * @method Show\Field|Collection link(string $label = null)
     * @method Show\Field|Collection robot_wxid(string $label = null)
     * @method Show\Field|Collection zt_company_id(string $label = null)
     * @method Show\Field|Collection admin_wxid(string $label = null)
     * @method Show\Field|Collection ischeck(string $label = null)
     * @method Show\Field|Collection advance(string $label = null)
     * @method Show\Field|Collection isadd(string $label = null)
     * @method Show\Field|Collection chat(string $label = null)
     * @method Show\Field|Collection kucun(string $label = null)
     * @method Show\Field|Collection retailCode(string $label = null)
     * @method Show\Field|Collection deptRegionCode(string $label = null)
     * @method Show\Field|Collection deptBigRegionCode(string $label = null)
     * @method Show\Field|Collection new(string $label = null)
     * @method Show\Field|Collection from_group(string $label = null)
     * @method Show\Field|Collection from_group_name(string $label = null)
     * @method Show\Field|Collection from_wxid(string $label = null)
     * @method Show\Field|Collection from_name(string $label = null)
     * @method Show\Field|Collection sdkVer(string $label = null)
     * @method Show\Field|Collection Event(string $label = null)
     * @method Show\Field|Collection msg(string $label = null)
     * @method Show\Field|Collection msg_source(string $label = null)
     * @method Show\Field|Collection clientid(string $label = null)
     * @method Show\Field|Collection msg_id(string $label = null)
     * @method Show\Field|Collection commission(string $label = null)
     * @method Show\Field|Collection start-time(string $label = null)
     * @method Show\Field|Collection stop-time(string $label = null)
     * @method Show\Field|Collection group_ids(string $label = null)
     * @method Show\Field|Collection channel(string $label = null)
     * @method Show\Field|Collection zt_store_code(string $label = null)
     * @method Show\Field|Collection amount(string $label = null)
     * @method Show\Field|Collection wx_img_id(string $label = null)
     * @method Show\Field|Collection code(string $label = null)
     * @method Show\Field|Collection targets(string $label = null)
     * @method Show\Field|Collection srarttime(string $label = null)
     * @method Show\Field|Collection stoptime(string $label = null)
     * @method Show\Field|Collection acctid(string $label = null)
     * @method Show\Field|Collection conversation_id(string $label = null)
     * @method Show\Field|Collection corp_id(string $label = null)
     * @method Show\Field|Collection mobile(string $label = null)
     * @method Show\Field|Collection nickname(string $label = null)
     * @method Show\Field|Collection position(string $label = null)
     * @method Show\Field|Collection realname(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection group_wxid(string $label = null)
     * @method Show\Field|Collection nostoremsg(string $label = null)
     * @method Show\Field|Collection appinfo(string $label = null)
     * @method Show\Field|Collection cdn(string $label = null)
     * @method Show\Field|Collection cdn_type(string $label = null)
     * @method Show\Field|Collection content_type(string $label = null)
     * @method Show\Field|Collection is_pc(string $label = null)
     * @method Show\Field|Collection receiver(string $label = null)
     * @method Show\Field|Collection send_time(string $label = null)
     * @method Show\Field|Collection sender(string $label = null)
     * @method Show\Field|Collection sender_name(string $label = null)
     * @method Show\Field|Collection server_id(string $label = null)
     * @method Show\Field|Collection path(string $label = null)
     * @method Show\Field|Collection ai(string $label = null)
     * @method Show\Field|Collection wx_work_user_id(string $label = null)
     * @method Show\Field|Collection roomid(string $label = null)
     * @method Show\Field|Collection roomname(string $label = null)
     * @method Show\Field|Collection to_wxid(string $label = null)
     * @method Show\Field|Collection fsdata(string $label = null)
     * @method Show\Field|Collection start(string $label = null)
     * @method Show\Field|Collection gati(string $label = null)
     * @method Show\Field|Collection percentage(string $label = null)
     * @method Show\Field|Collection reward(string $label = null)
     * @method Show\Field|Collection starttime(string $label = null)
     * @method Show\Field|Collection ticheng(string $label = null)
     * @method Show\Field|Collection offline(string $label = null)
     * @method Show\Field|Collection product_brands_id(string $label = null)
     * @method Show\Field|Collection product_seies_id(string $label = null)
     * @method Show\Field|Collection product_classes_id(string $label = null)
     * @method Show\Field|Collection ztid(string $label = null)
     * @method Show\Field|Collection terminalsupplierCode(string $label = null)
     * @method Show\Field|Collection terminalsupplierName(string $label = null)
     * @method Show\Field|Collection storecodeCode(string $label = null)
     * @method Show\Field|Collection storecodeName(string $label = null)
     * @method Show\Field|Collection departmentSecLevelCode(string $label = null)
     * @method Show\Field|Collection departmentSecLevelName(string $label = null)
     * @method Show\Field|Collection departmentStairCode(string $label = null)
     * @method Show\Field|Collection departmentStairName(string $label = null)
     * @method Show\Field|Collection tid(string $label = null)
     * @method Show\Field|Collection date(string $label = null)
     * @method Show\Field|Collection customerZeroAmount(string $label = null)
     * @method Show\Field|Collection unitPrice(string $label = null)
     * @method Show\Field|Collection warehouseName(string $label = null)
     * @method Show\Field|Collection facadeShort(string $label = null)
     * @method Show\Field|Collection isEnable(string $label = null)
     * @method Show\Field|Collection canalCategoryName(string $label = null)
     * @method Show\Field|Collection canalCategoryCode(string $label = null)
     * @method Show\Field|Collection riscode(string $label = null)
     * @method Show\Field|Collection storename(string $label = null)
     * @method Show\Field|Collection storecode(string $label = null)
     * @method Show\Field|Collection zid(string $label = null)
     * @method Show\Field|Collection provinceName(string $label = null)
     * @method Show\Field|Collection cityName(string $label = null)
     * @method Show\Field|Collection countyName(string $label = null)
     * @method Show\Field|Collection townName(string $label = null)
     * @method Show\Field|Collection ext23(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
