<?php

namespace App\Admin\Controllers;

use Admin;
use App\Admin\Metrics\Examples\TotalWxsaleAmounts;
use App\Admin\Metrics\Examples\TotalWxsales;
use App\Admin\Metrics\Examples\TotalWxsalesPrices;
use App\Admin\Repositories\WxSale;
use App\Admin\Repositories\ZtCompany;
use App\Models\ZtCanalType;
use App\Models\ZtDeptRegion;
use App\Models\ZtDeptBigRegion;
use App\Models\ZtProduct;
use App\Models\ZtRetail;
use App\Models\ZtStore;
use Carbon\Carbon;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Collection;
use Dcat\Admin\Layout\Content;

class WxSaleController extends AdminController
{

    public function index(Content $content)
    {
        return $content
            ->header('销售明细')
            ->description('销售登记明细')
            ->body(function (Row $row) {
//                $row->column(4, new TotalWxsales());
//                $row->column(4, new TotalWxsaleAmounts());
//                $row->column(4, new TotalWxsalesPrices());
            })
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxSale(['store', 'wxuser', 'company','product','workuser']), function (Grid $grid) {
            if (!Admin::user()->isAdministrator()) {
                $grid->model()->company();
            }
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('store.deptBigRegionName')->sortable();
            $grid->column('store.deptRegionName')->sortable();
            $grid->column('store.retailName')->sortable();
            $grid->column('store.canalCategoryName')->sortable();
            $grid->column('store.code')->sortable();
            $grid->column('store.nickname')->sortable();
            $grid->column('store.name')->sortable();
            $grid->column('model')->sortable();
            $grid->column('quantity')->sortable();
            $grid->column('product.price');
            $grid->column('amount');
            // 添加样式 字体大小
            $grid->addTableClass(['small']);
            // 添加不存在的字段
            $grid->column('提成金额')->display(function () {
                return $this->quantity * $this->amount;
            });
            $grid->column('销售金额')->display(function () {
                return $this->quantity * $this->product->price;
            });
            $grid->column('workuser.sender_name');
            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();
            //禁止插入
            $grid->disableCreateButton();
            //导出数据进行 关联数据替换
            $grid->export()->rows(function (Collection $rows) {
                foreach ($rows as $index => &$row) {
                    $row->{"提成金额"} = $row->quantity * $row->amount ?? '';
                    $row->{"销售金额"} = $row->quantity * $row->price ?? '';
                }
                return $rows;
            })->filename(admin_trans_label('销售明细') . '-' . date('Ymdhis', time()));

            $grid->selector(function (Grid\Tools\Selector $selector) {
                if (Admin::user()->id ==1) $selector->select('zt_company_id', '分公司', \App\Models\ZtCompany::get()->pluck('name', 'id'));
//                $selector->select('deptBigRegionName', '渠道', ZtDeptBigRegion::Company()->pluck('title', 'title'));
//                $selector->select('store.canalTypeName', '渠道', ZtCanalType::Company()->pluck('title', 'title'));
            });
            //表格快捷搜索
            $grid->quickSearch(['store.name', 'product.model', 'wxuser.nickname', 'store.canalCategoryName', 'store.deptBigRegionName', 'store.retailName', 'store.nickname']);

            // 开启字段选择器功能
            $grid->showColumnSelector();
            // 设置默认隐藏字段
            $grid->hideColumns(['store.code','store.deptRegionName','workuser.sender_name','updated_at']);
            // 默认为每页20条
            $grid->paginate(30);

//            $grid->export(new ExcelExpoter());
            // 显示
            $grid->filter(function (Grid\Filter $filter) {
//                $filter->equal('company.name','分公司')->select(ZtCompany::get()->pluck('name', 'name'));
                $filter->equal('store.deptBigRegionName', '大区')->select(ZtDeptBigRegion::Company()->pluck('title', 'title'));
                $filter->equal('store.deptRegionName', '地区')->select(ZtDeptRegion::Company()->pluck('title', 'title'));
                $filter->equal('store.retailName', '片区')->select(ZtRetail::Company()->pluck('title', 'title'));
                $filter->equal('store.canalCategoryName','渠道')->select(ZtCanalType::Company()->pluck('title', 'title'));
                $filter->equal('zt_product_id', '型号')->select(ZtProduct::get()->pluck('title', 'id'));
//                $filter->in('zt_product_id', '型号')->multipleSelectTable(['key' => 'value']);
                $filter->whereBetween('created_at', function ($q) {
                    $start = $this->input['start'] ?? null;
                    $end = $this->input['end'] ?? null;
                    if ($start !== null) {
                        $startDate = Carbon::createFromFormat('Y-m-d', $start)->startOfDay();
                        $q->where('created_at', '>=', $startDate);
                    }
                    if ($end !== null) {
                        $endDate = Carbon::createFromFormat('Y-m-d', $end)->endOfDay();
                        $q->where('created_at', '<=', $endDate);
                    }
                })->date();

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
        return Show::make($id, new WxSale(), function (Show $show) {
            $show->field('id');
            $show->field('zt_store_code');
            $show->field('zt_product_id');
            $show->field('quantity');
            $show->field('amount');
//            $show->field('cjdata');
//            $show->field('user');
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
        return Form::make(new WxSale(), function (Form $form) {
            $form->display('id');
            $form->text('zt_store_code');
            $form->text('zt_product_id');
            $form->text('quantity');
            $form->text('amount');
//            $form->text('cjdata');
//            $form->text('user');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
