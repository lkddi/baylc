<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatbotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
// 定义一个函数，参数为Blueprint对象
        Schema::create('wechat_bots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token')->unique();
            $table->string('uuid')->index()->nullable();
            $table->string('appid')->nullable('');
            $table->string('callbackUrl')->nullable()->comment('回调url');
            $table->string('wxid')->unique()->nullable();
            $table->string('nickName')->nullable();
            $table->string('smallHeadImgUrl')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0:正常 1:禁用');
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
        Schema::dropIfExists('wechatbot');
    }
}
