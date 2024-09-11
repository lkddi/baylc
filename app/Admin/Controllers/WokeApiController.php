<?php

namespace App\Admin\Controllers;


use App\Services\QyWechatData;
use App\Services\Rabbitmq\RabbitmqServer;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Box;
use Dcat\Admin\Widgets\Form;
use App\Http\Controllers\Controller;

class WokeApiController extends Controller
{
    use PreviewCode;

    protected $options = [
        11154 => '发送消息',
        11038 => '获取会话群聊列表',
        3 => '显示文件上传',
        4 => '还是显示文本框',
    ];

    public function index(Content $content)
    {
        return $content->title('表单动态显示')
//            ->body($this->buildPreviewButton())
            ->body($this->newline())
            ->body(
                <<<HTML
<div class="card">{$this->form()->render()}</div>
HTML
            );
    }

    protected function form()
    {
        $form = new Form();
        $form->tab('Api', function (Form $form) {
            $form->display('title')->value('选择你要的操作');

            $form->select('select')
                ->when(11154, function (Form $form) {
                    $form->text('conversation_id');
                    $form->textarea('content')->help('请输入要发送的内容');
                })
                ->when(11038, function (Form $form) {
                    $form->number('page_num')->default(10);
                    $form->number('page_size')->default(100);
                })
                ->when(3, function (Form $form) {
                    $form->textarea('text1');
                })
                ->options($this->options);
        });


        return $form;
    }

//    public function store()
//    {
//        \Log::info(\request()->get());
//    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = [];
        $data['client_id'] = 1;
        $data['message_type'] = $request->get('select');
        switch ($request->get('select')){
            case 11154://发送文本消息
                $data['params'] = [
                    'conversation_id' => $request->get('conversation_id'),
                    'content' => $request->get('content'),
                ];
                break;
            case 11038:
                $data['params'] = [
                    'page_num' => $request->get('page_num'),
                    'page_size' => $request->get('page_size'),
                ];

        }

        $mq = new RabbitmqServer();
        $mq->send($data);
        \Log::info($data);
        return $this->success();
//        return $this->form()->saving(function (\Dcat\Admin\Form $form) {
//            // 清空缓存
//            $form->multipleSteps()->flushStash();
//            \Log::info($form->text('text1'));
//
//            // 拦截保存操作
//            return response(
//                $form->multipleSteps()
//                    ->done()
//                    ->render()
//            );
//        })->store();
//        \Log::info();
    }


}
