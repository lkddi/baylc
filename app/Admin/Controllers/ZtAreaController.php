<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ZtArea;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ZtAreaController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ZtArea(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('parent_id');
            $grid->column('order');
//            $grid->column('created_at');
            $grid->column('updated_at')->datetime()->sortable();

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
        return Show::make($id, new ZtArea(), function (Show $show) {
            $show->field('id');
            $show->field('id');
            $show->field('title');
            $show->field('parent_id');
            $show->field('order');
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
        return Form::make(new ZtArea(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('parent_id');
            $form->text('order');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
