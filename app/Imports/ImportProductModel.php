<?php

namespace App\Imports;

use App\Models\WxSalestarget;
use App\Models\ZtProduct;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Validators\Failure;

class ImportProductModel implements ToModel, WithValidation, SkipsOnFailure
{
    use Importable;


    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }
        if ($row[0] == '型号简称') {
            return null;
        }
        if ($row[0] == '简称') {
            return null;
        }
        $price = $row[2] ?? 0;
        if ($row[2] == '') {
            $price = 0;
        }
        $updateData = [
            'model' => $row[0],
        ];

        if ($price > 0) {
            $updateData['price'] = $price;
        }
        ZtProduct::updateOrCreate([
            'title' => $row[1],
        ], $updateData
        );

//        Log::info($a);
        return null;
    }

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            '0' => 'required',//日期
            '1' => 'required',//台数
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        Log::channel('custom_daily')->info($failures);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
