<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\GetOnline;
use App\Admin\Renderable\GeweLoginTable;
use App\Admin\Repositories\WechatBot;
use Arr;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Widgets\Table;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;

class WechatBotController extends AdminController
{
    /**
     * page index
     */
    public function index(Content $content)
    {
        return $content
            ->header('列表')
            ->description('全部')
            ->breadcrumb(['text'=>'列表','url'=>''])
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WechatBot(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('token');
            $grid->column('appid');
            $grid->column('wxid');
            $grid->column('nickName');
            $grid->column('smallHeadImgUrl')->image('', 50,50);
//            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                // append一个操作
                $actions->append(new GetOnline(WechatBot::class));
                // prepend一个操作
//                $actions->prepend('<a href=""><i class="fa fa-paper-plane"></i></a>');
            });


            $grid->actions(function (Grid\Displayers\Actions $actions) {
                // $actions->disableDelete(); //  禁用删除
                // $actions->disableEdit();   //  禁用修改
                // $actions->disableQuickEdit(); //禁用快速修改(弹窗形式)
                // $actions->disableView(); //  禁用查看
            });
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
        return Show::make($id, new WechatBot(), function (Show $show) {
            $show->field('id');
            $show->field('token');
            $show->field('uuid');
            $show->field('appid');
            $show->field('callbackUrl');
            $show->field('admin_user_id');
            $show->field('wxid');
            $show->field('nickName');
            $show->field('smallHeadImgUrl');
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
        return Form::make(new WechatBot(), function (Form $form) {
            $form->display('id');
            $form->text('token');
            $form->text('uuid');
            $form->text('appid');
            $form->text('callbackUrl');
            $form->text('wxid');
            $form->text('nickName');
            $form->text('smallHeadImgUrl');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }


}
