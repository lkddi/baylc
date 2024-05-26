<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WxWorkImg;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxWorkImgController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxWorkImg(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('appinfo');
            $grid->column('cdn');
            $grid->column('cdn_type');
            $grid->column('content_type');
            $grid->column('conversation_id');
            $grid->column('is_pc');
            $grid->column('receiver');
            $grid->column('send_time');
            $grid->column('sender');
            $grid->column('sender_name');
            $grid->column('server_id');
            $grid->column('state');
            $grid->column('path');
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
        return Show::make($id, new WxWorkImg(), function (Show $show) {
            $show->field('id');
            $show->field('appinfo');
            $show->field('cdn');
            $show->field('cdn_type');
            $show->field('content_type');
            $show->field('conversation_id');
            $show->field('is_pc');
            $show->field('receiver');
            $show->field('send_time');
            $show->field('sender');
            $show->field('sender_name');
            $show->field('server_id');
            $show->field('state');
            $show->field('path');
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
        return Form::make(new WxWorkImg(), function (Form $form) {
            $form->display('id');
            $form->text('appinfo');
            $form->text('cdn');
            $form->text('cdn_type');
            $form->text('content_type');
            $form->text('conversation_id');
            $form->text('is_pc');
            $form->text('receiver');
            $form->text('send_time');
            $form->text('sender');
            $form->text('sender_name');
            $form->text('server_id');
            $form->text('state');
            $form->text('path');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
