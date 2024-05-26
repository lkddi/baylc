<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WxForward;
use App\Models\WxGroup;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class WxForwardController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WxForward(['group']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('group.title');
            $grid->column('towxid');
            $grid->column('open')->switch();
            $grid->column('text')->switch();
            $grid->column('img')->switch();
            $grid->column('video')->switch();
            $grid->column('file')->switch();
            $grid->column('xml')->switch();
            $grid->column('link')->switch();
//            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();

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
        return Show::make($id, new WxForward(), function (Show $show) {
            $show->field('id');
            $show->field('wxid');
            $show->field('towxid');
            $show->field('text');
            $show->field('img');
            $show->field('video');
            $show->field('file');
            $show->field('xml');
            $show->field('all');
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
        return Form::make(new WxForward(), function (Form $form) {
            $form->display('id');
            $form->select('wxid')->options(WxGroup::get()->pluck('title', 'wxid'));
            $form->multipleSelect('towxid')->options(WxGroup::get()->pluck('title', 'wxid'));

            $form->switch('open');
            $form->switch('text');
            $form->switch('img');
            $form->switch('video');
            $form->switch('file');
            $form->switch('xml');
            $form->switch('link');
//            $form->saved(function (Form $form) {
////                $user = $form->user;
////                $wxid = $form->model()->wxid;
//                dd($form);
//                if ($user){
////                    EventGroupMemberAdd::GetGroupMember('wxid_pruy5b5gm0bg12',$wxid,1);
//                }
//
//            });
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
