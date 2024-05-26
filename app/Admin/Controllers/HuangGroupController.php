<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\HuangGroup;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class HuangGroupController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new HuangGroup(['user']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user.name');
            $grid->column('num');
            $grid->column('state');
            $grid->column('rundate');
            $grid->column('photo');
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
        return Show::make($id, new HuangGroup(), function (Show $show) {
            $show->field('id');
            $show->field('wxid');
            $show->field('num');
            $show->field('state');
            $show->field('rundate');
            $show->field('photo');
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
        return Form::make(new HuangGroup(), function (Form $form) {
            $form->display('id');
            $form->text('wxid');
            $form->text('num');
            $form->text('state');
            $form->text('rundate');
            $form->text('photo');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
