<?php

namespace App\Imports;

use App\Models\WxSalestarget;
use App\Models\ZtGati;
use App\Models\ZtProduct;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class ImportGatistarget implements ToModel, WithValidation, SkipsOnFailure
{
    use Importable;

    public function __construct()
    {
        Log::info('数据处理页面');
    }

    public function model(array $row)
    {

        if (!isset($row[0])) {
            return null;
        }
        if ($row[0] == '公司id') {
            return null;
        }
        return new ZtGati([
            'zt_company_id'=>$row[0],
            'model' => $row[1],
            'percentage' => $row[2],
            'zt_product_id'=> ZtProduct::where('title',$row[1])->first()->id,
            'starttime' => date("Y-m-d H:i:s",formatTime($row[3])),
            'endtime' => date("Y-m-d H:i:s",formatTime($row[4])),
            'state' => 1,
        ]);
    }


    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            '0' => 'required',
            '1' => 'required',
            '2' => 'required|integer',

        ];
    }

    public function excelTime($vale)
    {
        $n = intval(($vale - 25569) * 3600 * 24); //转换成1970年以来的秒数
        return gmdate('Y-m-d H:i:s', $n);//格式化时间,不是用date哦, 时区相差8小时的
    }

    public function onFailure(Failure ...$failures)
    {
        Log::channel('custom_daily')->info($failures);
    }

}
