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
        Schema::create('wx_forwards', function (Blueprint $table) {
            $table->id();
            $table->string('wxid',50)->unique()->comment('群id');
            $table->string('towxid')->nullable()->comment('群id');
            $table->integer('open')->default(0)->comment('总开关');
            $table->integer('text')->default(0)->comment('转发文本消息');
            $table->integer('img')->default(0)->comment('转发拖消息');
            $table->integer('video')->default(0)->comment('转发视频消息');
            $table->integer('file')->default(0)->comment('转发文件消息');
            $table->integer('xml')->default(0)->comment('转发小程序消息');
            $table->integer('link')->default(0)->comment('转发链接消息');
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
        Schema::dropIfExists('wx_forwards');
    }
};
