<?php

namespace App\Imports;

use App\Models\WxSalestarget;
use App\Models\ZtGati;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class ImportGatistarget implements ToModel, WithValidation, SkipsOnFailure
{
    use Importable;

    public $WECHAT_ADMIN;

    public function __construct()
    {
        $this->WECHAT_ADMIN = Config('wechat_admin');
        Log::info('数据处理页面');
    }

    public function model(array $row)
    {

        return new ZtGati([
            'model' => $row[0],
            'gati' => $row[2],
            'percentage' => $row[1],
            'starttime' => date("Y-m-d H:i:s",formatTime($row[3])),
            'endtime' => date("Y-m-d H:i:s",formatTime($row[4])),
            'state' => 1,
        ]);
    }



    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
//        Log::info($failures);
    }

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            '0' => 'required',//日期
            '1' => 'required|integer',//单号

        ];
    }

    public function excelTime($vale)
    {
        $n = intval(($vale - 25569) * 3600 * 24); //转换成1970年以来的秒数
        return gmdate('Y-m-d H:i:s', $n);//格式化时间,不是用date哦, 时区相差8小时的
    }

}
