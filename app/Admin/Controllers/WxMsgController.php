<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WxMsg;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxMsgController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxMsg(), function (Grid $grid) {
            // 启用 simplePaginate 分页功能
            $grid->simplePaginate();
            $grid->model()->orderBy('id', 'desc');

            $grid->column('id')->sortable();
//            $grid->column('sdkVer');
            $grid->column('Event')->using(['EventGroupChat' => '群', 1 => '正常']);
//            $grid->column('robot_wxid');
            $grid->column('type')->using(['1' => '文本', 3 => '图片','2002'=>'小程序']);
//            $grid->column('from_group');
            $grid->column('from_group_name')->limit(8, '...');
//            $grid->column('from_wxid');
            $grid->column('from_name')->limit(5, '...');
            $grid->column('msg')->limit(30);
            $grid->column('updated_at')->sortable();
            $grid->disableCreateButton();

            //表格快捷搜索
            $grid->quickSearch(['Event', 'from_group_name','from_name','msg']);
            // 开启字段选择器功能
            $grid->showColumnSelector();
            // 默认为每页20条
            $grid->paginate(30);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('Event');
                $filter->like('from_group_name');
                $filter->like('from_name');
                $filter->like('msg');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new WxMsg(), function (Show $show) {
            $show->field('id');
            $show->field('sdkVer');
            $show->field('Event');
            $show->field('robot_wxid');
            $show->field('type');
            $show->field('from_group');
            $show->field('from_group_name');
            $show->field('from_wxid');
            $show->field('from_name');
            $show->field('msg');
            $show->field('msg_source');
            $show->field('clientid');
            $show->field('robot_type');
            $show->field('msg_id');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new WxMsg(), function (Form $form) {
            $form->display('id');
            $form->text('sdkVer');
            $form->text('Event');
            $form->text('robot_wxid');
            $form->text('type');
            $form->text('from_group');
            $form->text('from_group_name');
            $form->text('from_wxid');
            $form->text('from_name');
            $form->text('msg');
            $form->text('msg_source');
            $form->text('clientid');
            $form->text('robot_type');
            $form->text('msg_id');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
