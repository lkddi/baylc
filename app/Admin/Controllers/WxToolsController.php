<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WxMsg;
use Dcat\Admin\Form;
use Dcat\Admin\Form\Field\Markdown;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\Dashboard;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Widgets\Box;
use Dcat\Admin\Widgets\Dropdown;

class WxToolsController extends AdminController
{
    public function index(Content $content)
    {
        // 选填
        $content->header('填写页面头标题');

        // 选填
        $content->description('填写页面描述小标题');

        // 添加面包屑导航
        $content->breadcrumb(
            ['text' => '首页', 'url' => '/admin'],
            ['text' => '用户管理', 'url' => '/admin/users'],
            ['text' => '编辑用户']
        );

        // 填充页面body部分，这里可以填入任何可被渲染的对象
        return $content->body('hello world');
    }


}
