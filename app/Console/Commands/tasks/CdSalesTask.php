<?php

namespace App\Console\Commands\tasks;

use App\Jobs\SendMessageWorkJob;
use App\Models\WxSale;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CdSalesTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:cdsales';

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
        $today = Carbon::today()->toDateString();
        $sales = WxSale::with(['store', 'product'])->where('zt_company_id', 2)->whereDate('created_at', $today)->get();
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
        $mes = $today.'销售日报'.PHP_EOL;
        foreach ($summaryArray as $item) {
            $mes .= $item['store_name'] . '：' . $item['total_quantity'] . '台，' . $item['total_price'] . '元'.PHP_EOL;
        }
//        $data['conversation_id'] = 'R:10921933120267894';
        $send['conversation_id'] = 'R:83899262639877';
        $send['content'] = $mes;
        SendMessageWorkJob::dispatch($send, '/msg/send_text');
    }
}
