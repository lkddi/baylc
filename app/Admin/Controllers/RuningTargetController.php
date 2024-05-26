<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\RuningTarget;
use App\Models\WxUser;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class RuningTargetController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new RuningTarget(['user']), function (Grid $grid) {

            $grid->column('id')->sortable();
            $grid->column('user.name');
            $grid->column('actual');
            $grid->column('state');
            $grid->column('target')->editable();
            $grid->column('rundate');
            $grid->column('created_at')->datetime();
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
        return Show::make($id, new RuningTarget(), function (Show $show) {
            $show->field('id');
            $show->field('wxid');
            $show->field('target');
            $show->field('rundate');
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
        return Form::make(new RuningTarget(), function (Form $form) {
            $form->display('id');
            $form->select('wxid')->options(WxUser::where('group_wxid','17905953915@chatroom')->get()->pluck('name', 'wxid'));
            $form->text('target');
            $form->date('rundate');
            $form->text('state');
            $form->text('actual');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
