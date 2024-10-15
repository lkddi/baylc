<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('任务名称');
            $table->string('description')->nullable()->comment('任务描述');
            $table->string('command_class')->default('')->comment('任务的命令类名');
            $table->enum('schedule_type',['daily', 'hourly', 'every_minutes'])->comment('任务的调度类型，可以是每日（daily）、每小时（hourly）或每几分钟（every_minutes）');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->string('schedule_value')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
