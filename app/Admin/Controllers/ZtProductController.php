<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\ImportProduct;
use App\Admin\Repositories\ZtProduct;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ZtProductController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ZtProduct(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->model()->orderBy('offline', 'desc');
            $grid->model()->orderBy('id', 'desc');
            $grid->column('title');
            $grid->column('model');
            $grid->column('price')->editable()->sortable();
            $grid->column('ticheng');
            $grid->column('offline')->switch();
//            $grid->column('created_at');
            $grid->column('updated_at')->sortable();


            $grid->tools(function (Grid\Tools $tools) {
                // excle 导入
                $tools->append(new ImportProduct());
            });
            //禁止插入
//            $grid->disableCreateButton();
            //启用数据导出
            $grid->export();
            //表格快捷搜索
            $grid->quickSearch(['model', 'title']);
            // 默认为每页20条
            $grid->paginate(30);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('title');
                $filter->like('model');

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
        return Show::make($id, new ZtProduct(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('model');
            $show->field('Price');
            $show->field('ticheng');
            $show->field('offline');
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
        return Form::make(new ZtProduct(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('model');
            $form->text('price');
            $form->text('ticheng');
            $form->text('offline');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
