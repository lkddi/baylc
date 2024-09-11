<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Tools\WxUserListTool;
use App\Admin\Repositories\WxUserList;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxUserListController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxUserList(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('username');
            $grid->column('user_id');
            $grid->column('acctid');
            $grid->column('avatar')->image('', 50,50);
            $grid->column('conversation_id');
//            $grid->column('corp_id');
//            $grid->column('mobile');
            $grid->column('nickname');
//            $grid->column('position');
//            $grid->column('realname');
//            $grid->column('remark');
//            $grid->column('sex');
//            $grid->column('unionid');
//            $grid->column('created_at');
            $grid->column('updated_at')->datetime()->sortable();

            $grid->tools(new WxUserListTool());


            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

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
        return Show::make($id, new WxUserList(), function (Show $show) {
            $show->field('id');
            $show->field('acctid');
            $show->field('avatar');
            $show->field('conversation_id');
            $show->field('corp_id');
            $show->field('mobile');
            $show->field('nickname');
            $show->field('position');
            $show->field('realname');
            $show->field('remark');
            $show->field('sex');
            $show->field('unionid');
            $show->field('user_id');
            $show->field('username');
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
        return Form::make(new WxUserList(), function (Form $form) {
            $form->display('id');
            $form->text('acctid');
            $form->text('avatar');
            $form->text('conversation_id');
            $form->text('corp_id');
            $form->text('mobile');
            $form->text('nickname');
            $form->text('position');
            $form->text('realname');
            $form->text('remark');
            $form->text('sex');
            $form->text('unionid');
            $form->text('user_id');
            $form->text('username');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
