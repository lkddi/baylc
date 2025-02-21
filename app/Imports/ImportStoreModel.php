<?php

namespace App\Imports;

use App\Models\WxSalestarget;
use App\Models\ZtStore;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;

class ImportStoreModel implements ToModel, WithValidation, SkipsOnFailure
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
        if (!isset($row[0])) {
            return null;
        }
        if ($row[0] == '终端编码') {
            return null;
        }

//        Log::info($row);
        $a = ZtStore::where('zt_company_id', $row[2])
            ->where('code', $row[0])->first();
        if ($a) {
            $a->nickname = $row[1];
            $a->save();
        } else {
            Log::error('导入门店不存在');
            Log::error($row);
        }

//        Log::info($a);
        return null;
    }

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            '0' => 'required',//日期
            '1' => 'required',//台数
            '2' => 'required',//台数

        ];
    }

    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
        Log::channel('custom_daily')->info($failures);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
