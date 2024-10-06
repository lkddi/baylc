<?php

namespace App\Admin\Controllers;

use Admin;
use App\Admin\Extensions\Tools\WxGroupsUser;
use App\Admin\Grid\Tools\WxWorkBotTool;
use App\Admin\Repositories\WxWork;
use App\Models\ZtCompany;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Log;

class WxWorkController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxWork(['companys']), function (Grid $grid) {
            if (Admin::user()->id !=1) {
                $grid->model()->company();
            }

            $grid->model()->orderBy('retailCode', 'desc');
            if (Admin::user()->id ==1) $grid->column('companys.name');
            $grid->column('roomid');
            $grid->column('roomname')->editable();
//            if (Admin::user()->id ==1) $grid->column('company.name');
            $grid->column('user')->switch();
            $grid->column('photo')->switch();
//            $grid->column('advance')->switch();
            $grid->column('ischeck')->switch();
            $grid->column('isadd')->switch();
//            $grid->column('chat')->switch();
            $grid->column('kucun')->switch();
            $grid->column('ai')->switch();
//            $grid->column('new')->switch();
            $grid->column('updated_at')->sortable();
            $grid->disableCreateButton();
            $grid->export();
            $grid->tools(new WxWorkBotTool());

            $grid->selector(function (Grid\Tools\Selector $selector) {
                if (Admin::user()->id ==1) $selector->select('zt_company_id', '分公司', ZtCompany::get()->pluck('name', 'id'));

            });

            // 禁用删除按钮
//            $grid->disableDeleteButton();
            // 禁用批量删除
            $grid->disableBatchDelete();
            $grid->batchActions([
                new WxGroupsUser('退群删除群用户', 1),
//                new WxGroupsUser('更新群成员信息', 1)
            ]);
            //表格快捷搜索
            $grid->quickSearch(['wxid', 'username','company.name']);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('wxid');
                $filter->equal('title');
                $filter->equal('company.name');

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
        return Show::make($id, new WxWork(), function (Show $show) {
            $show->field('id');
            $show->field('wxid');
            $show->field('title');
            $show->field('zt_company_id');
            $show->field('admin');
            $show->field('user');
            $show->field('ischeck');
            $show->field('isadd');
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
        return Form::make(new WxWork(), function (Form $form) {

            $form->display('id');
            $form->text('roomid');
            $form->text('roomname');
            $form->select('zt_company_id')->options(ZtCompany::get()->pluck('name', 'id'));
            $form->switch('ischeck');
            $form->switch('user');
            $form->switch('photo');
            $form->switch('isadd');
            $form->switch('chat');
            $form->switch('photo');
            $form->switch('advance');
            $form->switch('kucun');
            $form->switch('ai');

            $form->display('created_at');
            $form->display('updated_at');

//            $form->saved(function (Form $form) {
//                $user = $form->user;
//                $wxid = $form->model()->wxid;
//                if ($user) {
//                    EventGroupMemberAdd::GetGroupMember('wxid_pruy5b5gm0bg12', $wxid, 1);
//                }
//
//            });
        });


    }
}
