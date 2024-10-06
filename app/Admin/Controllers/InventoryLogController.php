<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\InventoryLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class InventoryLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new InventoryLog(['store','product']), function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('store.name');
            $grid->column('product.model');
            $grid->column('type')->using(['in'=>'进','out'=>'销']);
            $grid->column('quantity');
            $grid->column('description');
            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();

            $grid->disableCreateButton();
            $grid->disableDeleteButton();
            $grid->disableEditButton();
            $grid->disableViewButton();

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
        return Show::make($id, new InventoryLog(), function (Show $show) {
            $show->field('id');
            $show->field('zt_products_id');
            $show->field('zt_stores_id');
            $show->field('type');
            $show->field('quantity');
            $show->field('description');
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
        return Form::make(new InventoryLog(), function (Form $form) {
            $form->display('id');
            $form->text('zt_products_id');
            $form->text('zt_stores_id');
            $form->text('type');
            $form->text('quantity');
            $form->text('description');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
