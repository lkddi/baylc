<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ZtPromoterst;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ZtPromoterstController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ZtPromoterst(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('ztid');
            $grid->column('code');
            $grid->column('name');
            $grid->column('terminalsupplierCode');
            $grid->column('terminalsupplierName');
            $grid->column('regionId');
            $grid->column('regionCode');
            $grid->column('regionName');
            $grid->column('tel');
            $grid->column('user_id');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
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
        return Show::make($id, new ZtPromoterst(), function (Show $show) {
            $show->field('id');
            $show->field('ztid');
            $show->field('code');
            $show->field('name');
            $show->field('terminalsupplierCode');
            $show->field('terminalsupplierName');
            $show->field('regionId');
            $show->field('regionCode');
            $show->field('regionName');
            $show->field('tel');
            $show->field('user_id');
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
        return Form::make(new ZtPromoterst(), function (Form $form) {
            $form->display('id');
            $form->text('ztid');
            $form->text('code');
            $form->text('name');
            $form->text('terminalsupplierCode');
            $form->text('terminalsupplierName');
            $form->text('regionId');
            $form->text('regionCode');
            $form->text('regionName');
            $form->text('tel');
            $form->text('user_id');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
