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
        //内容转发数据库
        Schema::create('wx_zhuanfas', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->json('msg');
            $table->string('to_wxid');
            $table->integer('state')->default(1);
            $table->dateTime('fsdata')->comment('时间');
            $table->integer('start')->default(0)->comment('开始发送');
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
        Schema::dropIfExists('wx_zhuanfas');
    }
};
