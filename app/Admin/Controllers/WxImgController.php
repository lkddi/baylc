<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WxImg;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Widgets\Card;

class WxImgController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxImg(['wxuser']), function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
//            $grid->column('from_group');
            $grid->column('from_group_name');
            $grid->column('from_wxid');
            $grid->column('from_name');
//            $grid->column('robot_wxid');
            $grid->column('wxuser.nickname');
            $grid->column('img')->display('查看') // 设置按钮名称
            ->modal(function ($modal) {
                // 设置弹窗标题
                $modal->title('标题 ');
                // 自定义图标
                $modal->icon('feather icon-x');
                $img = '<img src="' .$this->img .'"width="560">';
                $card = new Card(null, $img);
                return "<div style='padding:10px 10px 0'>$card</div>";
            });
            $grid->column('state')->bool();
            $grid->column('created_at')->format('YYYY-MM-DD');
//            $grid->column('updated_at')->sortable();

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
        return Show::make($id, new WxImg(), function (Show $show) {
            $show->field('id');
            $show->field('from_group');
            $show->field('from_group_name');
            $show->field('from_wxid');
            $show->field('from_name');
            $show->field('robot_wxid');
            $show->field('user_id');
            $show->field('img');
            $show->field('state');
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
        return Form::make(new WxImg(), function (Form $form) {
            $form->display('id');
            $form->text('from_group');
            $form->text('from_group_name');
            $form->text('from_wxid');
            $form->text('from_name');
            $form->text('robot_wxid');
            $form->text('user_id');
            $form->text('img');
            $form->text('state');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
