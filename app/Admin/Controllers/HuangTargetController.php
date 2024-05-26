<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\HuangTarget;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class HuangTargetController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new HuangTarget(['user']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user.name');
            $grid->column('target');
            $grid->column('count');
            $grid->column('startdate');
            $grid->column('stopdate');
            $grid->column('state');
            $grid->column('actual');
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
        return Show::make($id, new HuangTarget(), function (Show $show) {
            $show->field('id');
            $show->field('wxid');
            $show->field('target');
            $show->field('count');
            $show->field('startdate');
            $show->field('stopdate');
            $show->field('state');
            $show->field('actual');
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
        return Form::make(new HuangTarget(), function (Form $form) {
            $form->display('id');
            $form->text('wxid');
            $form->text('target');
            $form->text('count');
            $form->text('startdate');
            $form->text('stopdate');
            $form->text('state');
            $form->text('actual');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
