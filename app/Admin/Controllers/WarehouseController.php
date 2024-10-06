<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Warehouse;
use App\Models\ZtCanalType;
use App\Models\ZtDeptBigRegion;
use App\Models\ZtDeptRegion;
use App\Models\ZtProduct;
use App\Models\ZtRetail;
use App\Models\ZtStore;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WarehouseController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Warehouse(['store', 'product']), function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');

//            dd( $grid->column('id'));
            $grid->column('id')->sortable();
            $grid->column('store.title');
            $grid->column('product.model');
            $grid->column('quantity');
            $grid->column('jinhuo');
            $grid->column('nums');
//            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            //禁止插入
            $grid->disableCreateButton();
            $grid->export();
            //表格快捷搜索
            $grid->quickSearch(['zt_stores_id', 'zt_products_id', 'store.title', 'product.model']);
            // 启用表格异步渲染功能
            $grid->async();

            // 开启字段选择器功能
            $grid->showColumnSelector();
            // 默认为每页20条
            $grid->paginate(30);
            $grid->filter(function (Grid\Filter $filter) {
//                $filter->equal('xid','单号');
                $filter->like('zt_stores_id', '门店名')->select(ZtStore::get()->pluck('title', 'code'));
                $filter->equal('zt_products_id', '型号')->select(ZtProduct::get()->pluck('title', 'id'));
//                $filter->equal('retailName','片区')->select(ZtRetail::get()->pluck('title', 'title'));
//                $filter->equal('deptRegionName','地区')->select(ZtDeptRegion::get()->pluck('title', 'title'));
//                $filter->equal('deptBigRegionName','大区')->select(ZtDeptBigRegion::get()->pluck('title', 'title'));

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
        return Show::make($id, new Warehouse(), function (Show $show) {
            $show->field('id');
            $show->field('zt_stores_id');
            $show->field('zt_products_id');
            $show->field('quantity');
            $show->field('jinhuo');
            $show->field('nums');
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
        return Form::make(new Warehouse(), function (Form $form) {
            $form->display('id');
            $form->text('zt_stores_id');
            $form->text('zt_products_id');
            $form->text('quantity');
            $form->text('jinhuo');
            $form->text('nums');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
