<?php

namespace App\Console\Commands;

use App\Models\User;
use Cache;
use Illuminate\Console\Command;

class WxSaleDayBJCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:bj';

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
        $user = Cache::get('client_id');
        print_r($user);


    }
}
