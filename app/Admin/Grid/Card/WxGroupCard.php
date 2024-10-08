<?php

namespace App\Admin\Grid\Card;

use App\Admin\Metrics\Examples\TotalUsers;
use App\Models\WxBot;
use App\Models\WxGroup;
use App\Servers\Server;
use App\Wechats\VlwApiServer;
use Dcat\Admin\Widgets\Metrics\Card;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class WxGroupCard extends Card
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

        $this->title('微信群');
        $this->dropdown([
            '7' => '群数量',
            '28' => '更新群信息',
//            '30' => 'Last Month',
//            '365' => 'Last Year',
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
        switch ($request->get('option')) {
            case '365':
                $this->content(mt_rand(600, 1500));
                $this->down(mt_rand(1, 30));
                break;
            case '30':
                $this->content(mt_rand(170, 250));
                $this->up(mt_rand(12, 50));
                break;
            case '28':
                $a = VlwApiServer::GetRobotList();
                Server::updateBot($a);
                $this->content('刷新页面');
//                $this->up(mt_rand(5, 50));
                break;
            case '7':
            default:
                $bot = WxGroup::all();
                $this->content($bot->count());
                $this->up(15);
        }
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
