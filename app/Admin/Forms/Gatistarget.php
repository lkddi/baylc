<?php

namespace App\Admin\Forms;

use App\Imports\ImportGatistarget;
use App\Imports\ImportSalesstarget;
use App\Models\ZtCompany;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class Gatistarget extends Form implements LazyRenderable
{
    use LazyWidget;

    public function handle(array $input)
    {

        $file = Storage::disk('public')->path($input['file']);
        $data = Excel::import(new ImportGatistarget(), $file);
        return $this->response()->success('发送成功')->refresh();
    }

    public function form()
    {
        $this->file('file', trans('admin.file'))->autoUpload();
    }
}
