<?php

namespace App\Admin\Forms;

use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;

class ZtStore extends Form implements LazyRenderable
{
    use LazyWidget;

    public function handle(array $input)
    {
        return $this->response()->success('发送成功')->refresh();
    }

    public function form()
    {
//        $this->text('name', trans('admin.name'))->required()->help('用户昵称');
        $this->file('file', trans('admin.file'))->autoUpload();

//        $this->password('old_password', trans('admin.old_password'));

//        $this->password('password', trans('admin.password'))
//            ->minLength(5)
//            ->maxLength(20)
//            ->customFormat(function ($v) {
//                if ($v == $this->password) {
//                    return;
//                }
//
//                return $v;
//            })
//            ->help('请输入5-20个字符');
//        $this->password('password_confirmation', trans('admin.password_confirmation'))
//            ->same('password')
//            ->help('请输入确认密码');
    }
}
