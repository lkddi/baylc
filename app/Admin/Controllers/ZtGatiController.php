<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Tools\ZtGatiTool;
use App\Admin\Repositories\ZtGati;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ZtGatiController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ZtGati(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('model');
            $grid->column('gati');
            $grid->column('percentage');
//            $grid->column('reward');
            $grid->column('starttime');
            $grid->column('endtime');
            $grid->column('state');
//            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            //禁止插入
            $grid->disableCreateButton();

            // 启用表格异步渲染功能
            $grid->tools(new ZtGatiTool());

            $grid->paginate(30);
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
        return Show::make($id, new ZtGati(), function (Show $show) {
            $show->field('id');
            $show->field('gati');
            $show->field('percentage');
            $show->field('reward');
            $show->field('model');
            $show->field('starttime');
            $show->field('endtime');
            $show->field('state');
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
        return Form::make(new ZtGati(), function (Form $form) {
            $form->display('id');
            $form->text('gati');
            $form->text('percentage');
            $form->text('reward');
            $form->text('model');
            $form->text('starttime');
            $form->text('endtime');
            $form->text('state');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
