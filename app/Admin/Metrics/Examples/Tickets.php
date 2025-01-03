<?php

namespace App\Admin\Metrics\Examples;

use Dcat\Admin\Widgets\Metrics\RadialBar;
use Illuminate\Http\Request;
use App\Models\WxSale;
use Carbon\Carbon;

class Tickets extends RadialBar
{
    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $this->title('近期销售额');
        $this->height(400);
        $this->chartHeight(300);
        $this->chartLabels('Completed Tickets');
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

        // Get sales amount data
        $salesData = WxSale::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('SUM(quantity * price) as total_amount')
            ->first();

        // Calculate percentages for the radial bar
        $totalAmount = $salesData->total_amount ?? 0;

        // Get data for footer sections
        $todayData = WxSale::query()
            ->whereDate('created_at', Carbon::today())
            ->selectRaw('SUM(quantity * price) as today_amount')
            ->first();

        $yesterdayData = WxSale::query()
            ->whereDate('created_at', Carbon::yesterday())
            ->selectRaw('SUM(quantity * price) as yesterday_amount')
            ->first();

        $avgData = WxSale::query()
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('AVG(quantity * price) as avg_amount')
            ->first();

        // Calculate percentage for chart (today's amount vs period average)
        $chartPercentage = $avgData->avg_amount > 0
            ? round(($todayData->today_amount / $avgData->avg_amount) * 100)
            : 0;

        // Format amounts for display (convert to 万元)
        $formattedTotal = number_format($totalAmount / 10000, 0);
        $todayAmount = number_format(($todayData->today_amount ?? 0) / 10000, 0);
        $yesterdayAmount = number_format(($yesterdayData->yesterday_amount ?? 0) / 10000, 0);
        $avgAmount = number_format(($avgData->avg_amount ?? 0) , 0);

        // Update card content and chart
        $this->withContent($formattedTotal);
        $this->withFooter($todayAmount, $yesterdayAmount, $avgAmount);
        $this->withChart($chartPercentage);
    }

    /**
     * 设置图表数据.
     *
     * @param int $data
     *
     * @return $this
     */
    public function withChart(int $data)
    {
        return $this->chart([
            'series' => [$data],
        ]);
    }

    /**
     * 卡片内容
     *
     * @param string $content
     *
     * @return $this
     */
    public function withContent($content)
    {
        return $this->content(
            <<<HTML
<div class="d-flex flex-column flex-wrap text-center p-1">
    <h3 class="font-lg-1 mt-1 mb-0" style="white-space: nowrap;"><span style="display: inline-block;">{$content}<small style="font-size: 0.6em;">万</small></span></h3>
    <small>总销售额</small>
</div>
HTML
        );
    }

    /**
     * 卡片底部内容.
     *
     * @param string $today
     * @param string $yesterday
     * @param string $average
     *
     * @return $this
     */
    public function withFooter($today, $yesterday, $average)
    {
        return $this->footer(
            <<<HTML
<div class="d-flex justify-content-between p-1" style="padding-top: 0!important;">
    <div class="text-center">
        <p>今日销售额</p>
        <span class="font-lg-1" style="white-space: nowrap;"><span style="display: inline-block;">{$today}<small style="font-size: 0.6em;">万</small></span></span>
    </div>
    <div class="text-center">
        <p>昨日销售额</p>
        <span class="font-lg-1" style="white-space: nowrap;"><span style="display: inline-block;">{$yesterday}<small style="font-size: 0.6em;">万</small></span></span>
    </div>
    <div class="text-center">
        <p>平均销售额</p>
        <span class="font-lg-1" style="white-space: nowrap;"><span style="display: inline-block;">{$average}<small style="font-size: 0.6em;">元</small></span></span>
    </div>
</div>
HTML
        );
    }
}
