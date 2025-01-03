<?php

namespace App\Admin\Metrics\Examples;

use Dcat\Admin\Widgets\Metrics\Line;
use Illuminate\Http\Request;
use App\Models\WxSale;
use Carbon\Carbon;

class NewSales extends Line
{
    /**
     * 初始化卡片内容
     *
     * @return void
     */
    protected function init()
    {
        parent::init();

        $this->title('近期销售');
        $this->dropdown([
            '7' => '7天',
            '15' => '15天',
            '30' => '1个月',
            '365' => '1年',
        ]);
    }

    /**
     * 处理请求
     *
     * @param Request $request
     *
     * @return mixed|void
     */
    public function handle(Request $request)
    {
        $days = $request->get('option', 7);
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subDays($days);

        // Get daily sales data
        $salesData = WxSale::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(quantity) as total_quantity')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Calculate total sales quantity for the card content
        $totalQuantity = $salesData->sum('total_quantity');

        // Prepare chart data
        $chartData = [];
        $currentDate = clone $startDate;
        while ($currentDate <= $endDate) {
            $dateStr = $currentDate->format('Y-m-d');
            $sale = $salesData->firstWhere('date', $dateStr);
            $chartData[] = $sale ? $sale->total_quantity : 0;
            $currentDate->addDay();
        }

        // Update card content and chart
        $this->withContent($totalQuantity);
        $this->withChart($chartData);
    }

    /**
     * 设置图表数据.
     *
     * @param array $data
     *
     * @return $this
     */
    public function withChart(array $data)
    {
        return $this->chart([
            'series' => [
                [
                    'name' => $this->title,
                    'data' => $data,
                ],
            ],
        ]);
    }

    /**
     * 设置卡片内容.
     *
     * @param string $content
     *
     * @return $this
     */
    public function withContent($content)
    {
        return $this->content(
            <<<HTML
<div class="d-flex justify-content-between align-items-center mt-1" style="margin-bottom: 2px">
    <h2 class="ml-1 font-lg-1">{$content}<small style="font-size: 0.6em;">台</small></h2>
    <span class="mb-0 mr-1 text-80">{$this->title}</span>
</div>
HTML
        );
    }
}
