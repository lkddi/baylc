<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\GroupWelcomeMessage;
use App\Models\WxWork;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class GroupWelcomeMessageController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new GroupWelcomeMessage('works'), function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('welcome_message');
            $grid->column('is_enabled')->switch();
            $grid->works()->pluck('roomname')->label('primary');
            $grid->column('created_at')->sortable();

            $grid->disableEditButton();
            $grid->disableViewButton();

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
        return Show::make($id, new GroupWelcomeMessage(), function (Show $show) {
            $show->field('id');
            $show->field('welcome_message');
            $show->field('is_enabled');
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
        $group_welcome_message = GroupWelcomeMessage::with(['works']);
        return Form::make($group_welcome_message, function (Form $form) {
            $form->display('id');
            $form->textarea('welcome_message');
            $form->radio('is_enabled')->options(['1' => '启用', '0'=> '关闭'])->default('1');
            $form->listbox('works')->options(WxWork::Company()->pluck('roomname','id'));

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
