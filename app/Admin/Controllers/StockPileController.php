<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\StockPile;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class StockPileController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new StockPile(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('store_houses_id');
            $grid->column('products_id');
            $grid->column('quantity');
            $grid->column('purchases');
            $grid->column('sales');
//            $grid->column('created_at');
            $grid->column('updated_at')->datetime()->sortable();

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
        return Show::make($id, new StockPile(), function (Show $show) {
            $show->field('id');
            $show->field('store_houses_id');
            $show->field('products_id');
            $show->field('quantity');
            $show->field('purchases');
            $show->field('sales');
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
        return Form::make(new StockPile(), function (Form $form) {
            $form->display('id');
            $form->text('store_houses_id');
            $form->text('products_id');
            $form->text('quantity');
            $form->text('purchases');
            $form->text('sales');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
