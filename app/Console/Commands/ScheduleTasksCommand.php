<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ScheduleTasksCommand extends Command
{
    protected $signature = 'schedule:tasks';

    protected $description = 'Schedule tasks based on database settings';

    public function handle()
    {
        $tasks = Task::where('status', 1)->get();

        foreach ($tasks as $task) {
            switch ($task->schedule_type) {
                case 'daily':
                    $this->scheduleDailyTask($task);
                    break;
                case 'hourly':
                    $this->scheduleHourlyTask($task);
                    break;
                case 'every_minutes':
                    $this->scheduleEveryMinutesTask($task);
                    break;
            }
        }
    }

    private function scheduleDailyTask($task)
    {
        $time = date('H:i:s', strtotime($task->schedule_value));
        $command = Artisan::call($task->command_class);
        $this->info("Scheduled daily task {$task->name} to run at {$time}.");
    }

    private function scheduleHourlyTask($task)
    {
        $minutes = (int)$task->schedule_value;
        $cronExpression = "{$minutes} * * * *";
        $command = Artisan::call($task->command_class);
        $this->info("Scheduled hourly task {$task->name} to run at {$minutes} minutes past each hour.");
    }

    private function scheduleEveryMinutesTask($task)
    {
        $minutes = (int)$task->schedule_value;
        $cronExpression = "*/{$minutes} * * * *";
        $command = Artisan::call($task->command_class);
        $this->info("Scheduled task {$task->name} to run every {$minutes} minutes.{$task->command_class}");
    }


}
