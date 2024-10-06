<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WxWorkUser;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxWorkUserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxWorkUser(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('sender');
            $grid->column('sender_name');
//            $grid->column('zt_store_code');
//            $grid->column('nostoremsg');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

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
        return Show::make($id, new WxWorkUser(), function (Show $show) {
            $show->field('id');
            $show->field('sender');
            $show->field('sender_name');
            $show->field('zt_store_code');
            $show->field('nostoremsg');
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
        return Form::make(new WxWorkUser(), function (Form $form) {
            $form->display('id');
            $form->text('sender');
            $form->text('sender_name');
            $form->text('zt_store_code');
            $form->text('nostoremsg');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
