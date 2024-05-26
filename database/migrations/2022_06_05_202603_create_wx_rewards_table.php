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
        Schema::create('wx_rewards', function (Blueprint $table) {
            $table->id();
            $table->string('model')->comment('型号');
            $table->integer('commission')->comment('提成');
            $table->timestamp('start-time')->nullable()->comment('开始时间');
            $table->timestamp('stop-time')->nullable()->comment('结束时间');
            $table->string('group_ids')->nullable()->comment('作用群');
            $table->integer('state')->nullable()->default(0)->comment('状态');
            $table->string('channel')->nullable()->comment('渠道');
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
        Schema::dropIfExists('wx_rewards');
    }
};
