<?php

namespace Database\Seeders;

use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Models\Menu;
use Dcat\Admin\Models\Permission;
use Dcat\Admin\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');
        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id'     => 0,
                'order'         => 1,
                'title'         => 'Index',
                'icon'          => 'feather icon-bar-chart-2',
                'uri'           => '/',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 0,
                'order'         => 2,
                'title'         => '数据查询',
                'icon'          => 'fa-align-center',
                'uri'           => '',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 0,
                'order'         => 3,
                'title'         => '基础设置',
                'icon'          => 'fa-bank',
                'uri'           => '',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 0,
                'order'         => 4,
                'title'         => 'Bot设置',
                'icon'          => 'fa-wechat',
                'uri'           => '',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 0,
                'order'         => 5,
                'title'         => 'Admin',
                'icon'          => 'feather icon-settings',
                'uri'           => '',
                'created_at'    => $createdAt,
            ],




//数据查询菜单
            [
                'parent_id'     => 2,
                'order'         => 1,
                'title'         => '提成',
                'icon'          => 'fa-bar-chart-o',
                'uri'           => 'wxsale',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 2,
                'order'         => 2,
                'title'         => '实需',
                'icon'          => 'fa-area-chart',
                'uri'           => 'ztsale',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 2,
                'order'         => 3,
                'title'         => '审核',
                'icon'          => 'fa-chain-broken',
                'uri'           => 'wximg',
                'created_at'    => $createdAt,
            ],
//            [
//                'parent_id'     => 2,
//                'order'         => 4,
//                'title'         => '实贩导入',
//                'icon'          => 'fa-plus',
//                'uri'           => 'nccsale/import',
//                'created_at'    => $createdAt,
//            ],


            //基础设置菜单
            [
                'parent_id'     => 3,
                'order'         => 1,
                'title'         => '产品',
                'icon'          => 'fa-product-hunt',
                'uri'           => 'product',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 3,
                'order'         => 2,
                'title'         => '大区',
                'icon'          => 'fa-sitemap',
                'uri'           => 'ZtDeptBigRegion',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 3,
                'order'         => 3,
                'title'         => '地区',
                'icon'          => 'fa-list-ul',
                'uri'           => 'ZtDeptRegion',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 3,
                'order'         => 4,
                'title'         => '片区',
                'icon'          => 'fa-list',
                'uri'           => 'ZtRetail',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 3,
                'order'         => 5,
                'title'         => '渠道',
                'icon'          => 'fa-bars',
                'uri'           => 'ZtCanalType',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 3,
                'order'         => 6,
                'title'         => '门店',
                'icon'          => 'fa-fort-awesome',
                'uri'           => 'StoreHouse',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 3,
                'order'         => 7,
                'title'         => '促销',
                'icon'          => 'fa-user-circle-o',
                'uri'           => 'wxuser',
                'created_at'    => $createdAt,
            ],

            //机器人设置菜单
            [
                'parent_id'     => 4,
                'order'         => 1,
                'title'         => 'Bot管理',
                'icon'          => 'fa-user-secret',
                'uri'           => 'wxbot',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 4,
                'order'         => 2,
                'title'         => '群管理',
                'icon'          => 'fa-users',
                'uri'           => 'group',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 4,
                'order'         => 3,
                'title'         => '聊天记录',
                'icon'          => 'fa-users',
                'uri'           => 'msg',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 4,
                'order'         => 4,
                'title'         => '转发消息',
                'icon'          => 'fa-snapchat',
                'uri'           => 'wxforward',
                'created_at'    => $createdAt,
            ],
            //系统设置菜单
            [
                'parent_id'     => 5,
                'order'         => 3,
                'title'         => 'Users',
                'icon'          => '',
                'uri'           => 'auth/users',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 5,
                'order'         => 4,
                'title'         => 'Roles',
                'icon'          => '',
                'uri'           => 'auth/roles',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 5,
                'order'         => 5,
                'title'         => 'Permission',
                'icon'          => '',
                'uri'           => 'auth/permissions',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 5,
                'order'         => 6,
                'title'         => 'Menu',
                'icon'          => '',
                'uri'           => 'auth/menu',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 5,
                'order'         => 7,
                'title'         => 'Extensions',
                'icon'          => '',
                'uri'           => 'auth/extensions',
                'created_at'    => $createdAt,
            ],

        ]);

        (new Menu())->flushCache();
    }
}
