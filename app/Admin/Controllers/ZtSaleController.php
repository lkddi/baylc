<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ZtSale;
use App\Models\ZtCanalType;
use App\Models\ZtDeptBigRegion;
use App\Models\ZtDeptRegion;
use App\Models\ZtRetail;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ZtSaleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ZtSale(['store']), function (Grid $grid) {
            //获取今年
//            $grid->model()->where('purMachineYear','2024');
//            dd($grid);
            $grid->model()->orderByDesc('date');
//            $grid->column('xid')->sortable();
//            $grid->column('id')->sortable();
            $grid->column('id')->sortable();
            $grid->column('year')->sortable();
//            $grid->column('purMachineMonth')->sortable();
            $grid->column('date')->display(function($text) {
                return date("m-d",$text);
            })->sortable();
//
            $grid->column('ownerShopName');
//
            $grid->column('store.deptBigRegionName');
//            $grid->column('store.deptRegionName');
//            $grid->column('store.retailName');
//            $grid->column('store.canalCategoryName');

            $grid->column('model');
            $grid->column('amount');
            $grid->column('customerZeroAmount');
            $grid->column('unitPrice');

            //禁止插入
            $grid->disableCreateButton();
            $grid->export();
            //表格快捷搜索
            $grid->quickSearch(['ownerShopName','model','store.deptBigRegionName']);
            // 启用表格异步渲染功能
            $grid->async();

//            简化分页 (simplePaginate)
//            $grid->simplePaginate();

            // 开启字段选择器功能
            $grid->showColumnSelector();
            // 默认为每页20条
            $grid->paginate(30);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('xid','单号');
                $filter->like('ownerShopName','门店名');
                $filter->equal('canalTypeName','渠道')->select(ZtCanalType::get()->pluck('title', 'title'));
                $filter->equal('ext13Name','片区')->select(ZtRetail::get()->pluck('title', 'title'));
                $filter->equal('ext11Name','地区')->select(ZtDeptRegion::get()->pluck('title', 'title'));
                $filter->equal('ext12Name','大区')->select(ZtDeptBigRegion::get()->pluck('title', 'title'));

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
        return Show::make($id, new ZtSale(), function (Show $show) {
            $show->field('xid');
            $show->field('id');
            $show->field('dr');
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
        return Form::make(new ZtSale(), function (Form $form) {
            $form->display('xid');
            $form->text('id');
            $form->text('dr');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
