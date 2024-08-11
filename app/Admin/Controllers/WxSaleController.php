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
            ->header('表格')
            ->description('表格功能展示')
            ->body(function (Row $row) {
                $row->column(4, new TotalWxsales());
                $row->column(4, new TotalWxsaleAmounts());
                $row->column(4, new TotalWxsalesPrices());
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
        return Grid::make(new WxSale(['store','wxuser','company']), function (Grid $grid) {
            if (Admin::user()->id !=1) {
                if (Admin::user()->isRole('chengdu')) {
                    $grid->model()->where('zt_company_id', 2);
                } elseif (Admin::user()->isRole('beijing')) {
                    $grid->model()->where('zt_company_id', 1);
                }
                // 魏丽静 只能查看环京大区数据
                if (Admin::user()->id == 5){
                    $ids = ZtDeptBigRegion::find(1)->store->pluck('id');
                    $grid->model()->whereIn('zt_store_id',$ids);
                }
            }


            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('store.deptBigRegionName')->sortable();
            $grid->column('store.deptRegionName')->sortable();
            $grid->column('store.retailName')->sortable();
            $grid->column('store.canalCategoryName')->sortable();
            $grid->column('store.name')->sortable();
            $grid->column('model')->sortable();
            $grid->column('quantity');
            $grid->column('amount');

            $grid->column('created_at')->datetime();
            //禁止插入
            $grid->disableCreateButton();
//            $grid->export();
            //导出数据进行 关联数据替换

            $grid->export()->rows(function (Collection $rows) {
                foreach ($rows as $index => &$row) {
//                    \Log::info($row);
                    $row->{"store.deptBigRegionName"} = $row->store->deptBigRegionName??'';
                    $row->{"store.canalCategoryName"} = $row->store->canalTypeName??'';
                    $row->{"store.deptRegionName"} = $row->store->deptRegionName??'';
                    $row->{"store.retailName"} = $row->store->retailName??'';
                    $row->{"store.name"} = $row->store->title??'';
                }
                return $rows;
            })->filename(admin_trans_label('销售明细').'-'.date('Ymdhis',time()));
            //表格快捷搜索
            $grid->quickSearch(['store.name', 'product.model','wxuser.nickname','store.canalCategoryName','store.deptBigRegionName','store.retailName']);
            // 启用表格异步渲染功能
            $grid->async();
//            $grid->showRefreshButton();

            // 开启字段选择器功能
            $grid->showColumnSelector();
            // 默认为每页20条
            $grid->paginate(30);

//            $grid->export(new ExcelExpoter());
            // 显示
            $grid->filter(function (Grid\Filter $filter) {
//                $filter->equal('company.name','分公司')->select(ZtCompany::get()->pluck('name', 'name'));
                $filter->equal('store.deptBigRegionName','大区')->select(ZtDeptBigRegion::Company()->pluck('title', 'title'));
                $filter->equal('store.deptRegionName','地区')->select(ZtDeptRegion::Company()->pluck('title', 'title'));
                $filter->equal('store.retailName','片区')->select(ZtRetail::Company()->pluck('title', 'title'));
//                $filter->equal('deptBigRegionName','大区')->select(ZtDeptBigRegion::get()->pluck('title', 'title'));

                $filter->equal('store.canalCategoryName','渠道')->select(ZtCanalType::Company()->pluck('title', 'title'));
                $filter->like('zt_store_code','门店名')->select(ZtStore::Company()->pluck('name', 'code'));
                $filter->equal('zt_product_id','型号')->select(ZtProduct::get()->pluck('title', 'id'));
            });

//            $grid->footer(function ($collection) use ($grid) {
////                $query = WxSale::qu();
//                // 拿到表格筛选 where 条件数组进行遍历
//                $grid->model()->getQueries()->unique()->each(function ($value) use (&$query) {
//                    if (in_array($value['method'], ['paginate', 'get', 'orderBy', 'orderByDesc'], true)) {
//                        return;
//                    }
//                    $query = call_user_func_array([$query, $value['method']], $value['arguments'] ?? []);
//                });
//                // 查出统计数据
//                $data = wxsales::all()->sum('price');
//                return "<div style='padding: 10px;'>总销售额 ：$data </div>";
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
        return Show::make($id, new WxSale(), function (Show $show) {
            $show->field('id');
            $show->field('zt_store_code');
            $show->field('zt_product_id');
            $show->field('quantity');
            $show->field('amount');
            $show->field('cjdata');
            $show->field('user');
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
            $form->text('cjdata');
            $form->text('user');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
