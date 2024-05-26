<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Tools\WxSalestarget;
use App\Models\NccSale;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class NccSaleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new NccSale(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('year');
            $grid->column('month');
            $grid->column('time');
            $grid->column('deptBigRegionName');
            $grid->column('deptRegionName');
            $grid->column('lishipianqu');
            $grid->column('canalTypeName');
            $grid->column('client');
            $grid->column('brand');
            $grid->column('pinlei');
            $grid->column('xilie');
            $grid->column('zixilie');
            $grid->column('model');
            $grid->column('leixing');
            $grid->column('zengpin');
            $grid->column('number');
            $grid->column('hanshuidanjia');
            $grid->column('hanshuijine');
            $grid->column('shuilv');
            $grid->column('yuefan');
            $grid->column('danpinzhekou');
            $grid->column('hanshuizhekoue');
            $grid->column('hanshuijxse');
            $grid->column('wushuidanjia');
            $grid->column('wushuijine');
            $grid->column('wushuizke');
            $grid->column('wushuijxse');
            $grid->column('hanshuigle');
            $grid->column('kangkuleixing');
            $grid->column('chukucangku');
            $grid->column('user');
            $grid->column('type');
            $grid->column('zhidanren');
            $grid->column('order');
            $grid->column('oedertime');
            $grid->column('chuorder');
            $grid->column('chutime');
            $grid->column('shentime');
            $grid->column('qiantime');
            $grid->column('title');
            $grid->column('shouhuokehu');
            $grid->column('danjuqudao');
            $grid->column('retailName');
            $grid->column('waibuhao');
            $grid->column('zuzhi');
            $grid->column('beizhu');
            $grid->column('shouhuodizhi');
            $grid->column('gukedizhi');
            $grid->column('wuliugongsi');
            $grid->column('tihuofangshi');
            $grid->column('tuihuoleixing');
            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();
            //禁止插入
            $grid->disableCreateButton();
            $grid->export();
            //表格快捷搜索
            $grid->quickSearch(['retailBillCode', 'ownerShopName','ext14Name','ext13Name','shippingareaName','model']);
            // 启用表格异步渲染功能
            $grid->tools(new WxSalestarget());
            // 开启字段选择器功能
            $grid->showColumnSelector();
            // 设置默认隐藏字段
            $grid->hideColumns([
//                'deptBigRegionName',
//                'deptRegionName',
                'lishipianqu',
                'canalTypeName',
//                'client',
                'brand',
                'pinlei',
                'xilie',
                'zixilie',
//                'model',
                'leixing',
                'zengpin',
//                'number',
                'hanshuidanjia',
//                'hanshuijine',
                'shuilv',
                'yuefan',
                'danpinzhekou',
                'hanshuizhekoue',
                'hanshuijxse',
                'wushuidanjia',
                'wushuijine',
                'wushuizke',
                'wushuijxse',
                'hanshuigle',
                'kangkuleixing',
                'chukucangku',
                'user',
                'type',
                'zhidanren',
//                'order',
                'oedertime',
                'chuorder',
                'chutime',
                'shentime',
                'qiantime',
                'title',
                'shouhuokehu',
                'danjuqudao',
                'retailName',
                'waibuhao',
                'zuzhi',
                'beizhu',
                'shouhuodizhi',
                'gukedizhi',
                'wuliugongsi',
                'tihuofangshi',
                'tuihuoleixing', 'created_at']);
            // 默认为每页20条
            $grid->paginate(30);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('deptBigRegionName');

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
        return Show::make($id, new NccSale(), function (Show $show) {
            $show->field('id');
            $show->field('year');
            $show->field('month');
            $show->field('time');
            $show->field('deptBigRegionName');
            $show->field('deptRegionName');
            $show->field('lishipianqu');
            $show->field('canalTypeName');
            $show->field('client');
            $show->field('brand');
            $show->field('pinlei');
            $show->field('xilie');
            $show->field('zixilie');
            $show->field('model');
            $show->field('leixing');
            $show->field('zengpin');
            $show->field('number');
            $show->field('hanshuidanjia');
            $show->field('hanshuijine');
            $show->field('shuilv');
            $show->field('yuefan');
            $show->field('danpinzhekou');
            $show->field('hanshuizhekoue');
            $show->field('hanshuijxse');
            $show->field('wushuidanjia');
            $show->field('wushuijine');
            $show->field('wushuizke');
            $show->field('wushuijxse');
            $show->field('hanshuigle');
            $show->field('kangkuleixing');
            $show->field('chukucangku');
            $show->field('user');
            $show->field('type');
            $show->field('zhidanren');
            $show->field('order');
            $show->field('oedertime');
            $show->field('chuorder');
            $show->field('chutime');
            $show->field('shentime');
            $show->field('qiantime');
            $show->field('title');
            $show->field('shouhuokehu');
            $show->field('danjuqudao');
            $show->field('retailName');
            $show->field('waibuhao');
            $show->field('zuzhi');
            $show->field('beizhu');
            $show->field('shouhuodizhi');
            $show->field('gukedizhi');
            $show->field('wuliugongsi');
            $show->field('tihuofangshi');
            $show->field('tuihuoleixing');
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
        return Form::make(new NccSale(), function (Form $form) {
            $form->display('id');
            $form->text('year');
            $form->text('month');
            $form->text('time');
            $form->text('deptBigRegionName');
            $form->text('deptRegionName');
            $form->text('lishipianqu');
            $form->text('canalTypeName');
            $form->text('client');
            $form->text('brand');
            $form->text('pinlei');
            $form->text('xilie');
            $form->text('zixilie');
            $form->text('model');
            $form->text('leixing');
            $form->text('zengpin');
            $form->text('number');
            $form->text('hanshuidanjia');
            $form->text('hanshuijine');
            $form->text('shuilv');
            $form->text('yuefan');
            $form->text('danpinzhekou');
            $form->text('hanshuizhekoue');
            $form->text('hanshuijxse');
            $form->text('wushuidanjia');
            $form->text('wushuijine');
            $form->text('wushuizke');
            $form->text('wushuijxse');
            $form->text('hanshuigle');
            $form->text('kangkuleixing');
            $form->text('chukucangku');
            $form->text('user');
            $form->text('type');
            $form->text('zhidanren');
            $form->text('order');
            $form->text('oedertime');
            $form->text('chuorder');
            $form->text('chutime');
            $form->text('shentime');
            $form->text('qiantime');
            $form->text('title');
            $form->text('shouhuokehu');
            $form->text('danjuqudao');
            $form->text('retailName');
            $form->text('waibuhao');
            $form->text('zuzhi');
            $form->text('beizhu');
            $form->text('shouhuodizhi');
            $form->text('gukedizhi');
            $form->text('wuliugongsi');
            $form->text('tihuofangshi');
            $form->text('tuihuoleixing');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
