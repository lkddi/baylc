<?php

namespace App\Console\Commands\tasks;

use Illuminate\Console\Command;

class BjSalesTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:bjsales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '北京公司销量统计';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        print_r('ddd');
        return Command::SUCCESS;
    }
}
