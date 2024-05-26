<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxWorkImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_work_img', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appinfo')->nullable();
            $table->json('cdn')->nullable()->comment('图片数据');
            $table->string('cdn_type')->nullable()->comment('cdn类型');
            $table->string('content_type')->nullable();
            $table->string('conversation_id')->nullable()->comment('群id');
            $table->string('is_pc')->nullable();
            $table->string('receiver')->nullable();
            $table->string('send_time')->nullable()->comment('发送时间');
            $table->string('sender')->nullable()->comment('发送者id');
            $table->string('sender_name')->nullable()->comment('昵称');
            $table->string('server_id')->nullable();
            $table->string('state')->default('0')->nullable();
            $table->string('path')->default('')->comment('本地目录');
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
        Schema::dropIfExists('wx_work_img');
    }
}
