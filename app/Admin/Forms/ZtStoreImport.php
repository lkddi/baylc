<?php

namespace App\Admin\Forms;

use App\Imports\ImportStoreModel;
use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Widgets\Form;
use Symfony\Component\HttpFoundation\Response;
//use App\Imports\DataExcel;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Throwable;

class ZtStoreImport extends Form
{
    public function handle(array $input)
    {
        $file = env('APP_URL').'/upload/'.$input['file'];

        try {
            Excel::import(new ImportStoreModel(time()), $input['file'],'public');
            //dcat-2.0版本写法
            return $this->response()
                ->success('导入成功')
                ->redirect('/StoreHouse');
            //dcat-1.7
            //return $this->success('导入成功');
        } catch (ValidationException $validationException) {
            return Response::withException($validationException);
        } catch (Throwable $throwable) {
            //dcat 2.0写法
//            $this->response()->status = false;
            return $this->response()->error('上传失败')->refresh();
            //dcat 1.7
            //return $this->error('上传失败')->refresh();
        }
    }

    public function form()
    {
        $this->file('file', '上传数据（Excel）')->rules('required', ['required' => '文件不能为空']);
//        $this->url('/门店批修改简称示例.xls');
    }

}
