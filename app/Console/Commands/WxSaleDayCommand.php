<?php

namespace App\Console\Commands;

use App\Jobs\SendMessageWorkJob;
use App\Models\WxBot;
use App\Models\WxSale;
use App\Services\QyWechatData;
use Carbon\Carbon;
use Illuminate\Console\Command;

class WxSaleDayCommand extends Command
{
    /**
     * 每日数据通报 成都公司
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:wxsaleday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->newSales(['京东地采直营', '京东专卖店', '天猫优品'], 'R:83899262639877');
        sleep(2);
        $this->newSalesModel(['京东地采直营', '京东专卖店', '天猫优品'], 'R:83899262639877');
        sleep(2);
        $this->newSales(['代理乡镇', '乡镇直营', '建材', '代理建材'], 'R:10943735086862129');
        sleep(2);
        $this->newSalesModel(['代理乡镇', '乡镇直营', '建材', '代理建材'], 'R:10943735086862129');
        sleep(2);
        $this->newSales(['成都金松苏宁零售云', '苏宁常规', '成都金松苏宁','苏宁零售云地采'], 'R:10914397865647530');
        sleep(2);
        $this->newSalesModel(['成都金松苏宁零售云', '苏宁常规', '成都金松苏宁','苏宁零售云地采'], 'R:10914397865647530');

    }

    public function newSales($categories, $to)
    {
        $today = Carbon::today()->toDateString();
        $sales = WxSale::with(['store', 'product'])
            ->where('zt_company_id', 2)
            ->whereDate('created_at', $today)
            ->whereHas('store', function ($query) use ($categories) {
                $query->whereIn('canalCategoryName', $categories);
            })
            ->get();
        // 使用集合进行汇总
        $summary = $sales->groupBy('zt_store_id')
            ->map(function ($sales) {
                return [
                    'total_quantity' => 0,
                    'total_amount' => 0
                ];
            })
            ->map(function ($summary, $key) use ($sales) {
                $total_quantity = $sales->where('zt_store_id', $key)->sum('quantity');
                $total_amount = $sales->where('zt_store_id', $key)->sum('amount');
                $total_price = $sales->where('zt_store_id', $key)->sum('price');
                // 计算总价格，即每个销售记录的 product.price 乘以 quantity 的总和
                $total_price = $sales->where('zt_store_id', $key)->sum(function ($sale) {
                    return $sale->product->price * $sale->quantity;
                });
                return [
                    'store_name' => $sales->firstWhere('zt_store_id', $key)->store->name,
                    'total_quantity' => $total_quantity,
                    'total_amount' => $total_amount,
                    'total_price' => $total_price,
                ];
            });

        // 转换为数组并排序（示例：按总金额降序排序）
        $summaryArray = $summary->sortByDesc('total_quantity')->values()->all();

        // 计算整体金额及台量汇总
        $overallTotalQuantity = $sales->sum('quantity');
        if (!$overallTotalQuantity){
            return;
        }
        $overallTotalPrice = $sales->sum(function ($sale) {
            return $sale->product->price * $sale->quantity;
        });

        $mes = $today . '销售日报' . PHP_EOL;
        // 添加整体汇总信息
        $mes .= '总计：' . $overallTotalQuantity . '台，' . $overallTotalPrice . '元' . PHP_EOL;
        foreach ($summaryArray as $item) {
            $mes .= $item['store_name'] . '：' . $item['total_quantity'] . '台，' . $item['total_price'] . '元' . PHP_EOL;
        }
        $bot = WxBot::find(3);
        $mess = [
            "guid" => $bot->clientId,
            "conversation_id" => $to,
            "content" => $mes
        ];

        QyWechatData::send_work_api($mess, '/msg/send_text');
    }

    public function newSalesModel($categories, $to)
    {
        $today = Carbon::today()->toDateString();
        $sales = WxSale::with(['store', 'product'])
            ->where('zt_company_id', 2)
            ->whereDate('created_at', $today)
            ->whereHas('store', function ($query) use ($categories) {
                $query->whereIn('canalCategoryName', $categories);
            })
            ->get();
        // 使用集合进行汇总
        $summary = $sales->groupBy('model')
            ->map(function ($sales) {
                return [
                    'total_quantity' => 0,
                    'total_amount' => 0
                ];
            })
            ->map(function ($summary, $key) use ($sales) {
                $total_quantity = $sales->where('model', $key)->sum('quantity');
                $total_amount = $sales->where('model', $key)->sum('amount');
                $total_price = $sales->where('model', $key)->sum('price');
                // 计算总价格，即每个销售记录的 product.price 乘以 quantity 的总和
                $total_price = $sales->where('model', $key)->sum(function ($sale) {
                    return $sale->product->price * $sale->quantity;
                });
                return [
                    'model' => $sales->firstWhere('model', $key)->model,
                    'total_quantity' => $total_quantity,
                    'total_amount' => $total_amount,
                    'total_price' => $total_price,
                ];
            });

        // 转换为数组并排序（示例：按总金额降序排序）
        $summaryArray = $summary->sortByDesc('total_quantity')->values()->all();
        // 计算整体金额及台量汇总
        $overallTotalQuantity = $sales->sum('quantity');
        if (!$overallTotalQuantity){
            return;
        }
        $overallTotalPrice = $sales->sum(function ($sale) {
            return $sale->product->price * $sale->quantity;
        });
        $mes = $today . '销售日报' . PHP_EOL;
        // 添加整体汇总信息
        $mes .= '总计：' . $overallTotalQuantity . '台，' . $overallTotalPrice . '元' . PHP_EOL;
        foreach ($summaryArray as $item) {
            $mes .= $item['model'] . '：' . $item['total_quantity'] . '台，' . $item['total_price'] . '元' . PHP_EOL;
        }
        $bot = WxBot::find(3);
        $mess = [
            "guid" => $bot->clientId,
            "conversation_id" => $to,
            "content" => $mes
        ];

        QyWechatData::send_work_api($mess, '/msg/send_text');
    }

}
