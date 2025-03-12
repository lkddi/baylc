<?php

namespace App\Admin\Controllers;

use Admin;
use App\Admin\Extensions\MigrateUserToNewGroup;
use App\Admin\Extensions\QuitChatroom;
use App\Admin\Extensions\Tools\WxGroupsUser;
use App\Admin\Grid\Tools\WxGroupBotTool;
use App\Admin\Repositories\WxGroup;
use App\Models\WxUser;
use App\Models\ZtCompany;
use App\Models\ZtDeptBigRegion;
use App\Models\ZtRetail;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxGroupController extends AdminController
{
    /**
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxGroup(['retail', 'bot', 'company']), function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->model()->orderBy('robot_wxid', 'desc');
            $grid->model()->orderBy('retailCode', 'desc');
            $grid->column('zt_company_id')->select(array_merge([0 => '无'], ZtCompany::get()->pluck('name', 'id')->toArray()), true);

            $grid->column('wxid');
            $grid->column('nickname')->display(function () {
                if ($this->robot_type) {
                    return $this->nickname . '<span style="color: red">[QW]</span>';
                } else {
                    return $this->nickname;
                }
            });

            $grid->column('user')->switch();
            $grid->column('advance')->switch();
            $grid->column('ischeck')->switch();
            $grid->column('isadd')->switch();
            $grid->column('chat')->switch();
            $grid->column('kucun')->switch();
//            $grid->column('updated_at')->datetime()->sortable();
            $grid->disableCreateButton();
            $grid->export();
            $grid->tools(new WxGroupBotTool());

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                // append一个操作
                $actions->append(new MigrateUserToNewGroup(WxGroup::class));
                $actions->append(new QuitChatroom(WxGroup::class));
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
            $grid->quickSearch(['wxid', 'username']);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('wxid');
                $filter->equal('title');

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
        return Show::make($id, new WxGroup(), function (Show $show) {
            $show->field('id');
            $show->field('wxid');
            $show->field('title');
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
        return Form::make(new WxGroup(), function (Form $form) {

            $form->display('id');
            $form->text('robot_wxid');
            $form->text('wxid');
            $form->text('title');
//            $form->select('admin_wxid')->options(WxUser::where('group_wxid', $form->model()->wxid)->pluck('nickname', 'wxid'));
            $form->select('retailCode')->options(ZtRetail::get()->pluck('title', 'code'));
            $form->select('deptBigRegionCode')->options(ZtDeptBigRegion::get()->pluck('title', 'code'));
            $form->switch('ischeck');
            $form->switch('user');
            $form->switch('isadd');
            $form->switch('chat');
            $form->switch('photo');
            $form->switch('advance');
            $form->switch('kucun');
            $form->text('zt_company_id');

            $form->display('created_at');
            $form->display('updated_at');

            $form->saved(function (Form $form) {
                $user = $form->user;
                $wxid = $form->model()->wxid;
                if (!$user) {
//                    $form->model()->users()->delete();
                }

            });
        });


    }
}
