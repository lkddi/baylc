<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ZtCanalType;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ZtCanalTypeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ZtCanalType(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('code');
            $grid->column('updated_at')->datetime()->sortable();

            $grid->disableCreateButton();

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
        return Show::make($id, new ZtCanalType(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('Code');
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
        return Form::make(new ZtCanalType(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('Code');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
