<?php

namespace App\Admin\Extensions;

use App\Models\WxSale;
use Dcat\Admin\Grid\Exporters\AbstractExporter;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Admin\Metrics\Examples\NewDevices;
use App\Admin\Metrics\Examples\NewUsers;
use App\Admin\Metrics\Examples\TotalUsers;
// class WxSaleExcelExpoter extends  AbstractExporter implements FromQuery,WithMapping
class WxSaleExcelExpoter extends  AbstractExporter implements FromCollection
{
    /**
     * @return array
     */
    public function export()
    {
//        return Excel::download(new WxSale(), 'users.xlsx');
        $this->collection($this->buildData());
    }

    public function collection()
    {
        return ;
    }

//
//    protected $fileName = '销售明细.xlsx';
//    protected $headings = ['ID', '大区','渠道', '门店','产品', '数量', '提成', '促销员','时间'];
////
////
//    public function map($ticheng): array
//    {
//        return [
//            $ticheng->id,
////            $ticheng->store->deptBigRegionName,
////            $ticheng->store->canalTypeName,
////            $ticheng->store->title,
////            $ticheng->model,
////            $ticheng->quantity,
////            $ticheng->amount,
////            $ticheng->name,
////            $ticheng->created_at
//        ];
//    }
}
