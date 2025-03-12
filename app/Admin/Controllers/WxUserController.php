<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Card\WxUserCard;
use App\Admin\Metrics\Examples\NewDevices;
use App\Admin\Metrics\Examples\NewUsers;
use App\Admin\Repositories\WxUser;
use App\Models\WxGroup;
use App\Models\ZtStore;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxUserController extends AdminController
{


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxUser(['group', 'store']), function (Grid $grid) {
//            $grid->model()->orderBy('id', 'desc');
//            $grid->model()->orderBy('zt_store_id', 'asc');
//            $grid->model()->orderBy('nostoremsg', 'asc');
            $grid->model()->orderBy('id', 'desc');

            $grid->column('id')->sortable();
            $grid->column('group.nickname')->sortable();
            $grid->column('name')->editable();
            $grid->column('wxid');
            $grid->column('nickname')->sortable();
            $grid->column('admin')->switch();
            $grid->column('nostoremsg')->switch();
            $grid->column('store.name');

            //禁止插入
            $grid->disableCreateButton();
            $grid->export();

            //表格快捷搜索
            $grid->quickSearch(['name', 'wxid', 'group.title', 'nickname', 'group_wxid']);
            $grid->selector(function (Grid\Tools\Selector $selector) {
                $selector->select('wx_group_id', '群', WxGroup::where('user', 1)->get()->pluck('nickname', 'id'));
//                $selector->select('deptBigRegionName', '渠道', ZtDeptBigRegion::Company()->pluck('title', 'title'));
//                $selector->select('store.canalTypeName', '渠道', ZtCanalType::Company()->pluck('title', 'title'));
            });

            $grid->filter(function (Grid\Filter $filter) {
//                $filter->equal('id');
//                $filter->equal('wxid','群名id');
                $filter->like('group.title', '群名')->select(WxGroup::all()->pluck('title', 'title'));
                $filter->like('store.name', '门店名')->select(ZtStore::all()->pluck('title'));
                $filter->like('nickname', '昵称');
                $filter->like('name', '姓名');
                $filter->like('wxid', 'Wxid');

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
        return Show::make($id, new WxUser(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('nickname');
            $show->field('wxid');
            $show->field('zt_store_id');
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
        return Form::make(new WxUser(), function (Form $form) {
            $form->display('id');
            $form->display('wx_group_id');
            $form->text('name');
            $form->text('nickname');
            $form->text('wxid');
            $form->text('nostoremsg');
            $form->select('zt_store_id')->options(ZtStore::get()->pluck('name', 'id'));

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
