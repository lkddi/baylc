<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\RuningGroup;
use App\Models\RuningTarget;
use App\Models\WxUser;
use App\Wechats\VlwApiServer;
use Carbon\Carbon;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class RuningGroupController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new RuningGroup(['user']), function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');

            $grid->column('id')->sortable();
            $grid->column('user.name');
            $grid->column('state')->switch();

            $grid->column('num')->editable();
            $grid->column('photo')->image();

//            if (!$grid->column('state')) $grid->column('photo')->image();

            $grid->column('rundate');
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
        return Show::make($id, new RuningGroup(), function (Show $show) {
            $show->field('id');
            $show->field('wxid');
            $show->field('state');
            $show->field('num');
            $show->field('photo')->image();
            $show->field('rundate');
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
        return Form::make(new RuningGroup(), function (Form $form) {
            $form->display('id');
            $form->select('wxid')->options(WxUser::where('group_wxid', '17905953915@chatroom')->get()->pluck('name', 'wxid'));
            $form->switch('state')->default(0);
            $form->number('num');
            $form->file('photo');
            $form->date('rundate');
            $form->display('created_at');
            $form->display('updated_at');

            $form->saving(function (Form $form) {
                //审核通过 增加总量
                $run = \App\Models\RuningGroup::find($form->getKey());
                $wxid = $run->wxid ?? $form->wxid;
                $num = $run->num ?? $form->num;
                $y = Carbon::now()->isoFormat('YYYY');
                $m = Carbon::now()->isoFormat('MM');
                $user = RuningTarget::where('wxid', $wxid)
                    ->whereYear('rundate', $y)
                    ->whereMonth('rundate', $m)
                    ->first();
                if ($user) {
                    $form->state ? $user->increment('actual', $num) : $user->decrement('actual', $num);
                    $user->save();
                    $data['from_group'] = '17905953915@chatroom';
                    $data['robot_wxid'] = 'wxid_pruy5b5gm0bg12';
                    $runnum = $user->target - $user->actual;
                    if ($runnum < 0) {
                        $m = '。';
                    } else {
                        $m = '，距离目标:' . $runnum . '公里';
                    }
                    $form->state ? $msg = findWxUserName($wxid, $data['from_group']) . ':今日跑步:' . $num . '公里，本月累计跑步:' . $user->actual . '公里' . $m : null;
                    $form->state ? VlwApiServer::SendTextMsg($data['robot_wxid'], $data['from_group'], $msg) : null;
                } else {
                    $user = new RuningTarget();
                    $user->rundate = Carbon::now();
                    $user->wxid = $wxid;
                    $form->state ? $user->actual = $num : $user->actual = 0;
                    $user->save();
                }
                // 中断后续逻辑
            });
        });
    }
}
