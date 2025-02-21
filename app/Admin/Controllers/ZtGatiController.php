<?php

namespace App\Admin\Controllers;

use Admin;
use App\Admin\Grid\Tools\ZtGatiTool;
use App\Admin\Repositories\ZtGati;
use App\Models\ZtCompany;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ZtGatiController extends AdminController
{
    /**
     * 提成设置
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ZtGati(['company','product']), function (Grid $grid) {
            if (!Admin::user()->isAdministrator()) {
                $grid->model()->company();
            }
            $grid->column('id')->sortable();
            $grid->column('company.name');
            $grid->column('model');
            $grid->column('gati');
            $grid->column('percentage')->editable();
//            $grid->column('reward');
            $grid->column('starttime');
            $grid->column('endtime');
            $grid->column('state');
//            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            //禁止插入
            $grid->disableCreateButton();
//表格快捷搜索
            $grid->quickSearch(['model']);

            // 启用表格异步渲染功能
            $grid->tools(new ZtGatiTool());

            $grid->selector(function (Grid\Tools\Selector $selector) {
                if (Admin::user()->isAdministrator()) $selector->select('zt_company_id', '分公司', \App\Models\ZtCompany::get()->pluck('name', 'id'));
            });
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
            $form->text('zt_company_id');
            $form->text('gati');
            $form->text('percentage');
            $form->text('model');
            $form->text('zt_product_id');
            $form->text('starttime');
            $form->text('endtime');
            $form->text('state');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
