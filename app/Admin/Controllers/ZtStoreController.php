<?php

namespace App\Admin\Controllers;

use Admin;
use App\Admin\Grid\ImportStore;
use App\Admin\Repositories\ZtStore;
use App\Models\ZtCanalType;
use App\Models\ZtCompany;
use App\Models\ZtDeptBigRegion;
use App\Models\ZtDeptRegion;
use App\Models\ZtRetail;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

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
            $grid->model()->Company();
            $grid->column('id')->sortable();
            $grid->column('code');
//            $grid->column('riscode');
            $grid->column('name');
            $grid->column('warehouseName');
            $grid->column('facadeShort')->sortable();
//            $grid->column('storecode')->sortable();
            $grid->column('nickname')->editable()->sortable();
            $grid->column('canalCategoryName');
            $grid->column('retailName');
            $grid->column('isEnable')->bool(['1' => true, '2' => false])->sortable();
            $grid->column('deptRegionName');
            $grid->column('deptBigRegionName');
            $grid->column('updated_at')->sortable();

            $grid->selector(function (Grid\Tools\Selector $selector) {
                if (Admin::user()->id ==1) $selector->select('zt_company_id', '分公司', ZtCompany::get()->pluck('name', 'id'));
                $selector->select('isEnable', '状态', [
                    1 => '正常',
                    2 => '闭店',
                ]);
                $selector->select('deptBigRegionName', '渠道', ZtDeptBigRegion::Company()->pluck('title', 'title'));
                $selector->select('canalTypeName', '渠道', ZtCanalType::Company()->pluck('title', 'title'));
            });
            // 添加样式 字体大小
            $grid->addTableClass(['small']);
            //禁止插入
            $grid->disableCreateButton();

            //启用数据导出
            $grid->export();
            //表格快捷搜索
            $grid->quickSearch(['name', 'warehouseName', 'canalCategoryName','retailName','code','nickname','storename','storecode','facadeShort']);
            // 默认为每页20条
            $grid->paginate(30);
            $grid->filter(function (Grid\Filter $filter) {
//                $filter->like('name','门店名');
                $filter->equal('canalCategoryName','渠道')->select(ZtCanalType::Company()->pluck('title', 'title'));
                $filter->equal('retailName','片区')->select(ZtRetail::Company()->pluck('title', 'title'));
                $filter->equal('deptRegionName','地区')->select(ZtDeptRegion::Company()->pluck('title', 'title'));
                $filter->equal('deptBigRegionName','大区')->select(ZtDeptBigRegion::Company()->pluck('title', 'title'));
            });

//            $grid->tools(new ImportStore());
            $grid->tools(function (Grid\Tools $tools) {
                // excle 导入
                $tools->append(new ImportStore());
            });
//            $grid->actions([new \App\Admin\Forms\ZtStore()]);
//            $grid->tools(function (Grid\Tools $tools) {
//                $tools->append($this->buildPreviewButton());
//            });

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
            $show->field('storename');
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
            $form->text('storename');
            $form->text('nickname')->rules('required|unique:zt_stores,nickname',['unique' => '简称已存在']);
            $form->text('advance');
            $form->text('canalCategoryName');
            $form->text('retailName');
            $form->text('deptRegionName');
            $form->text('deptBigRegionName');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
