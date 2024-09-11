<?php

namespace App\Admin\Metrics\Examples;

use Admin;
use App\Models\WxSale;
use Carbon\Carbon;
use DB;
use Dcat\Admin\Widgets\Metrics\Card;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class TotalWxsalesPrices extends Card
{
    /**
     * 卡片底部内容.
     *
     * @var string|Renderable|\Closure
     */
    protected $footer;

    /**
     * 初始化卡片.
     */
    protected function init()
    {
        parent::init();

        $this->title('金额统计');
        $this->dropdown([
            '1' => '本月',
            '30' => '上个月',
            '365' => '本年',
        ]);
    }

    /**
     * 处理请求.
     *
     * @param Request $request
     *
     * @return void
     */
    public function handle(Request $request)
    {
        $now = Carbon::now();
        $firstOfMonth = Carbon::now()->firstOfMonth()->toDateTimeString();//本月开始时间  2024-01-01 00:00:00
        $firstOfMonthend = Carbon::now()->endOfMonth()->toDateTimeString();//本月开始时间  2024-01-01 00:00:00

        $startOfMonth = Carbon::now()->subMonth(1)->startOfMonth()->toDateTimeString(); //上个月
        $startOfMonthend = Carbon::now()->subMonth(1)->endOfMonth()->toDateTimeString(); //上个月

        $lastOfMonth = Carbon::now()->subMonth(2)->startOfMonth()->toDateTimeString(); //上上个月
        $lastOfMonthend = Carbon::now()->subMonth(2)->endOfMonth()->toDateTimeString(); //上上个月

        $startOfYear = Carbon::now()->startOfYear()->toDateTimeString(); //
        $startOfYearend = Carbon::now()->endOfYear()->toDateTimeString(); //

        $lastOfYear = Carbon::now()->subYear()->startOfYear()->toDateTimeString(); //
        $lastOfYearend = Carbon::now()->subYear()->endOfYear()->toDateTimeString(); //

        switch ($request->get('option')) {
            case '365':
                $data = $this->summary($startOfYear, $lastOfYear, $startOfYearend, $lastOfYearend);
                $this->content($data['sales']);
                if ($data['sales'] >= $data['sales1']) {
                    $this->up(round($data['sales'] / $data['sales1'] * 100, 2));
                } else {
                    $this->down(round($data['sales'] / $data['sales1'] * 100, 2));
                }

                break;
            case '30':
                $data = $this->summary($startOfMonth, $lastOfMonth, $startOfMonthend, $lastOfMonthend);
                $this->content($data['sales']);
                if ($data['sales'] >= $data['sales1']) {
                    $this->up(round($data['sales'] / $data['sales1'] * 100, 2));
                } else {
                    $this->down(round($data['sales'] / $data['sales1'] * 100, 2));
                }
                break;
            case '1':
            default:
                $data = $this->summary($firstOfMonth, $startOfMonth, $firstOfMonthend, $startOfMonthend);
                $this->content($data['sales']);
                if ($data['sales'] >= $data['sales1']) {
                    $this->up(round($data['sales'] / $data['sales1'] * 100, 2));
                } else {
                    $this->down(round($data['sales'] / $data['sales1'] * 100, 2));
                }
        }
    }

    public function summary($start, $start1, $end, $end1)
    {
        $sales = WxSale::whereBetween('created_at', [$start, $end])->company()->sum(DB::raw('quantity * price'));
        $sales1 = WxSale::whereBetween('created_at', [$start1, $end1])->company()->sum(DB::raw('quantity * price'));

//        if (Admin::user()->isRole('chengdu')){
//            $sales = WxSale::whereBetween('created_at', [$start, $end])->where('zt_company_id', '2')->sum(DB::raw('quantity * price'));
//            $sales1 = WxSale::whereBetween('created_at', [$start1, $end1])->where('zt_company_id', '2')->sum(DB::raw('quantity * price'));
//        }elseif (Admin::user()->isRole('beijing')){
//            $sales = WxSale::whereBetween('created_at', [$start, $end])->where('zt_company_id',  '1')->sum(DB::raw('quantity * price'));
//            $sales1 = WxSale::whereBetween('created_at', [$start1, $end1])->where('zt_company_id', '=', '1')->sum(DB::raw('quantity * price'));
//        }


        $sales1 = $sales1 == 0 ? 1 : $sales1;
        $data['sales'] = $sales;
        $data['sales1'] = $sales1;
        return $data;
    }


    /**
     * @param int $percent
     *
     * @return $this
     */
    public function up($percent)
    {
        return $this->footer(
            "<i class=\"feather icon-trending-up text-success\"></i> {$percent}% Increase"
        );
    }

    /**
     * @param int $percent
     *
     * @return $this
     */
    public function down($percent)
    {
        return $this->footer(
            "<i class=\"feather icon-trending-down text-danger\"></i> {$percent}% Decrease"
        );
    }

    /**
     * 设置卡片底部内容.
     *
     * @param string|Renderable|\Closure $footer
     *
     * @return $this
     */
    public function footer($footer)
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * 渲染卡片内容.
     *
     * @return string
     */
    public function renderContent()
    {
        $content = parent::renderContent();

        return <<<HTML
<div class="d-flex justify-content-between align-items-center mt-1" style="margin-bottom: 2px">
    <h2 class="ml-1 font-lg-1">{$content}</h2>
</div>
<div class="ml-1 mt-1 font-weight-bold text-80">
    {$this->renderFooter()}
</div>
HTML;
    }

    /**
     * 渲染卡片底部内容.
     *
     * @return string
     */
    public function renderFooter()
    {
        return $this->toString($this->footer);
    }
}
