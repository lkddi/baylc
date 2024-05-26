<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WxReward;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxRewardController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxReward(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('model');
            $grid->column('commission');
            $grid->column('starttime');
            $grid->column('stoptime');
            $grid->column('group_ids');
            $grid->column('state');
            $grid->column('channel');
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
        return Show::make($id, new WxReward(), function (Show $show) {
            $show->field('id');
            $show->field('model');
            $show->field('commission');
            $show->field('starttime');
            $show->field('stoptime');
            $show->field('group_ids');
            $show->field('state');
            $show->field('channel');
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
        return Form::make(new WxReward(), function (Form $form) {
            $form->display('id');
            $form->text('model');
            $form->text('commission');
            $form->text('starttime');
            $form->text('stoptime');
            $form->text('group_ids');
            $form->text('state');
            $form->text('channel');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
