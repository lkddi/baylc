<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Task;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class TaskController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Task(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('description');
            $grid->column('command_class');
            $grid->column('schedule_type');
            $grid->column('schedule_value');
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
        return Show::make($id, new Task(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('description');
            $show->field('command_class');
            $show->field('schedule_type');
            $show->field('schedule_value');
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
        return Form::make(new Task(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('description');
            $form->text('command_class');
            $form->select('schedule_type')->options(['daily'=>'每天', 'hourly'=>'N小时', 'every_minutes'=>'N分钟']);
            $form->text('schedule_value');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
