<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Tools\SalestargetTool;
use App\Admin\Repositories\WxSalestarget;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxSalestargetController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxSalestarget(['store']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('store.title');
            $grid->column('targets');
            $grid->column('srarttime');
            $grid->column('stoptime');
            $grid->column('state')->switch();
//            $grid->column('created_at');
            $grid->column('updated_at')->datetime()->sortable();
            // 启用表格异步渲染功能
            $grid->tools(new SalestargetTool());
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
        return Show::make($id, new WxSalestarget(), function (Show $show) {
            $show->field('id');
            $show->field('code');
            $show->field('target');
            $show->field('srarttime');
            $show->field('stoptime');
            $show->field('target');
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
        return Form::make(new WxSalestarget(), function (Form $form) {
            $form->display('id');
            $form->text('code');
            $form->text('target');
            $form->text('srarttime');
            $form->text('stoptime');
            $form->text('target');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
