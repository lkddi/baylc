<?php

namespace App\Imports;

use App\Models\WxSalestarget;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class ImportSalesstarget implements ToModel, WithValidation, SkipsOnFailure
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
        Log::info($row);
//        dd($row);

//        $data = [
//            'store_houses_id' => $this->checkStroe($row[7]),
//            'products_id' => $this->addProduct($row),
//            'fhdate' => $row[2],//$this->excelTime($row[0]),
//            'xsd_saleid' => $row[35]
//        ];
//        $data1 = [
//            'Quantity' => $row[16],
//            'Price' => $row[17],
//            'Amount' => $row[18],
//        ];
//
//        return WxSalestarget::firstOrCreate($data, $data1);
        return new WxSalestarget([
            'code'=>$row[0],
            'targets'=>$row[1],
//            'srarttime'=>$row[2],
//            'stoptime'=>$row[3],
            'state'=>$row[4],
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
