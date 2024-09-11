<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Card\WxBotCard;
use App\Admin\Grid\Tools\WxBotTool;
use App\Admin\Metrics\Examples\NewDevices;
use App\Admin\Metrics\Examples\NewUsers;
use App\Admin\Repositories\Wxbot;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxbotController extends AdminController
{

//    public function index(Content $content)
//    {
//        return $content
//            ->title($this->title())
////            ->description($this->description()['index'] ?? trans('admin.list'))
//            ->body(function (Row $row) {
//                $row->column(4, new WxBotCard());
////                $row->column(4, new NewUsers());
////                $row->column(4, new NewDevices());
//            })
//            ->body($this->grid());
//    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Wxbot(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('wxid');
            $grid->column('username');
            $grid->column('online')->bool();
            $grid->column('robot_type')->using([0 => '微信', 1 => '企业']);
            $grid->column('open')->switch();
            $grid->column('friend')->switch();
            $grid->column('group')->switch();
            $grid->column('transfer')->switch();
//            $grid->column('apiurl');
            $grid->column('clientId')->editable();
//            $grid->column('created_at');
            $grid->column('updated_at')->datetime()->sortable();

            //禁用 新增
            $grid->disableCreateButton();
//            $grid->tools('<a class="btn btn-primary grid-refresh btn-mini"><i class="feather icon-refresh-cw"></i><span class="d-none d-sm-inline">&nbsp; 更新数据</span></a>');
            // 自定义按钮
            $grid->tools(new WxBotTool());


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
        return Show::make($id, new Wxbot(), function (Show $show) {
            $show->field('id');
            $show->field('wxid');
            $show->field('nickname');
//            $show->field('robot_wxid');
            $show->field('open');
            $show->field('apiurl');
//            $show->field('created_at');
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
        return Form::make(new Wxbot(), function (Form $form) {
            $form->display('id');
            $form->text('wxid');
            $form->text('username');
            $form->text('open');
            $form->text('friend');
            $form->text('group');
            $form->text('transfer');
            $form->text('apiurl');
            $form->text('clientId');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
