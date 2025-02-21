<?php

namespace App\Admin\Forms;

use App\Imports\ImportProductModel;
use App\Imports\ImportStoreModel;
use Dcat\Admin\Models\Administrator;
use Dcat\Admin\Widgets\Form;
use Symfony\Component\HttpFoundation\Response;
//use App\Imports\DataExcel;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Throwable;

class ZtProductImport extends Form
{
    public function handle(array $input)
    {
        try {
            Excel::import(new ImportProductModel(time()), $input['file'],'public');
            return $this->response()
                ->success('导入成功')
                ->redirect('/product');
        } catch (ValidationException $validationException) {
            return Response::withException($validationException);
        } catch (Throwable $throwable) {
            \Log::info($throwable);
            return $this->response()->error('上传失败')->refresh();
        }
    }

    public function form()
    {
        $this->file('file', '上传数据（Excel）')->rules('required', ['required' => '文件不能为空']);
    }

}
