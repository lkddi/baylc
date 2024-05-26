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
        Schema::create('wx_salestargets', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment('门店code');
            $table->string('wxid')->comment('群id');
            $table->integer('targets')->comment('任务');
            $table->timestamp('srarttime')->nullable()->comment('开始时间');
            $table->timestamp('stoptime')->nullable()->comment('结束时间');
            $table->integer('target')->default(0)->comment('状态');
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
        Schema::dropIfExists('wx_salestargets');
    }
};
