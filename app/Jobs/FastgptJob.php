<?php

namespace App\Jobs;

use App\Services\FastgptService;
use Cache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FastgptJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $gptid;

    public function __construct($data,$gptid = 1)
    {
        $this->data = $data;
        $this->gptid = $gptid;
    }


    public function handle()
    {
        $lockKey = 'job_lock_fast' . $this->uniqueJobIdentifier();
        $num = Cache::get($lockKey . 'id') ?? 0;
        if (cache()->has($lockKey)) {
            // 如果锁已存在，则不执行任务
            return;
        }

        cache()->put($lockKey, true, now()->addMinutes(5)); // 设置锁的过期时间

        try {
            Cache::put($lockKey . 'id', $num + 1);
//            $fast = app(FastgptService::class);
            $fast = new FastgptService($this->gptid);
            $fast->sendMessage($this->data, $lockKey);
        } finally {
            // 确保在任务完成后释放锁
            Cache::forget($lockKey . 'id');
            cache()->forget($lockKey);
        }

    }

    protected function uniqueJobIdentifier()
    {
        // 生成一个任务的唯一标识符，可以是任何可以唯一确定任务的值
        // 例如，你可以使用请求参数、用户ID、组合条件等
        return md5($this->data['message_data']['appinfo']);
    }
}
