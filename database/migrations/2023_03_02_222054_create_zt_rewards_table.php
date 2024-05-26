<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zt_rewards', function (Blueprint $table) {
            $table->id();
            $table->integer('reward')->default(0)->comment('带单');
            $table->string('model')->default(0)->comment('型号');
            $table->timestamp('starttime')->comment('开始时间');
            $table->timestamp('endtime')->comment('结束时间');
            $table->tinyInteger('state')->default(0)->comment('状态');
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
        Schema::dropIfExists('zt_rewards');
    }
};
