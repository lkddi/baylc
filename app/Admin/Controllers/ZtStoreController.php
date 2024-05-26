<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ZtStore;
use App\Models\ZtCanalType;
use App\Models\ZtDeptBigRegion;
use App\Models\ZtDeptRegion;
use App\Models\ZtRetail;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ZtStoreController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ZtStore(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('code');
            $grid->column('name');
            $grid->column('title')->editable();
            $grid->column('nickname')->editable();
            $grid->column('canalTypeName');
            $grid->column('retailName');
            $grid->column('advance')->switch()->sortable();
            $grid->column('deptRegionName');
            $grid->column('deptBigRegionName');
            //禁止插入
            $grid->disableCreateButton();

            //表格快捷搜索
            $grid->quickSearch(['name', 'title', 'canalTypeName','retailName','code']);
            // 默认为每页20条
            $grid->paginate(30);
            $grid->filter(function (Grid\Filter $filter) {
//                $filter->like('name','门店名');
                $filter->equal('canalTypeName','渠道')->select(ZtCanalType::get()->pluck('title', 'title'));
                $filter->equal('retailName','片区')->select(ZtRetail::get()->pluck('title', 'title'));
                $filter->equal('deptRegionName','地区')->select(ZtDeptRegion::get()->pluck('title', 'title'));
                $filter->equal('deptBigRegionName','大区')->select(ZtDeptBigRegion::get()->pluck('title', 'title'));
            });

//            $grid->selector(function (Grid\Tools\Selector $selector) {
//                $selector->select('deptBigRegionName', '大区', ZtDeptBigRegion::get()->pluck('title', 'title'));
//            });
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
        return Show::make($id, new ZtStore(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('title');
            $show->field('zt_id');
            $show->field('zt_channel_id');
            $show->field('zt_area_id');
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
        return Form::make(new ZtStore(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('title');
            $form->text('nickname');
            $form->text('advance');
            $form->text('canalTypeName');
            $form->text('retailName');
            $form->text('deptRegionName');
            $form->text('deptBigRegionName');


            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}