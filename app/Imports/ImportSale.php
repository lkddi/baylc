<?php

namespace App\Imports;

use App\Models\WxSalestarget;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class ImportSale implements ToModel, WithValidation, SkipsOnFailure
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
//            '2' => 'required',//单号
//            '4' => 'required',//客户
//            '6' => 'required',//型号
            '16' => 'required|integer',//台数
            '17' => 'required|integer',//单价
            '18' => 'required|integer',//金额
//
//            // Above is alias for as it always validates in batches
//            '*.1' => Rule::in(['patrick@maatwebsite.nl']),
//
//            // Can also use callback validation rules
//            '0' => function ($attribute, $value, $onFailure) {
//                if ($value !== 'Patrick Brouwers') {
//                    $onFailure('Name is not Patrick Brouwers');
//                }
//            }
        ];
    }

    public function excelTime($vale)
    {
        $n = intval(($vale - 25569) * 3600 * 24); //转换成1970年以来的秒数
        return gmdate('Y-m-d H:i:s', $n);//格式化时间,不是用date哦, 时区相差8小时的
    }
////
//    /*
//     * 检查型号是否存在
//     */
//    public function addProduct($vale)
//    {
//        $models = Product::where('title', $vale[13])->first();
//        if (!$models) {
//            $jc = explode('-', $vale[13]);
//            $mlde = new Product();
//            $mlde->title = $vale[13];
//            $mlde->model = $jc[1];
//            $mlde->save();
//            $id = $mlde->id;
//            Log::info('型号不存在' . $vale[13] . '新建型号:' . $id);
//            GetWechat::SendMessage((new self())->WECHAT_ADMIN, '型号不存在' . $vale[13] . '新建型号:' . $id);
////            $content->withSuccess('提醒', '操作成功');
//        } else {
//            $id = $models->id;
//        }
////        $sale = Sale::where('xsd_saleid', $vale[2])
////            ->where('products_id', $id)
//////            ->where('Amount', $vale[14])
////            ->first();
////        if (!$sale) {
////            $num = $vale[7];
////            $this->addStorenum($vale[4], $id, $num);
////        }
//        $this->addStorenum($vale[7], $id, $vale[16]);
//
//        return $id;
//    }
//
//    /*
//     * 增加库存数量
//     */
//    public function addStorenum($housid, $id, $num)
//    {
//        $store_houses_id = $this->checkStroe($housid);
//        $m = Product::find($id);
//        $kucun = StockPile::where(['store_houses_id' => $store_houses_id, 'products_id' => $id])->first();
//        if ($kucun) {
//            $comment = '客户:' . $housid . '型号' . $m->model . '由' . $kucun->Quantity . '增加' . $num;
////            LogServer::add('stockpile', '1', $comment);
//            $kucun->increment('jhnums', $num); //增加进货总量
//            if ($num < 0) {
//                $kucun->decrement('Quantity', abs($num));//增加现有库存
//            } else {
//                $kucun->increment('Quantity', $num);//增加现有库存
//            }
//            $kucun->save();
//        } else {
//            $kucun = new StockPile;
//            $kucun->store_houses_id = $store_houses_id;
//            $kucun->products_id = $id;
//            $kucun->nums = 0;
//            $kucun->jhnums = $num;
//            $kucun->Quantity = $num;
//            $comment = '客户:' . $housid . '型号' . $m->model . '由' . $kucun->Quantity . '增加' . $num;
////            LogServer::add('stockpile', '1', $comment);
//            $kucun->save();
//        }
//        LogServer::add('stockpile', '1', $comment);
//    }
//
//    public function checkStroe($vale)
//    {
//        $store = StoreHouse::where('xsdname', $vale)->first();
//        if ($store) {
//            $md_id = $store->id;
//        } else {
//            $md_id = 24;
//        }
//        return $md_id;
//    }
}
