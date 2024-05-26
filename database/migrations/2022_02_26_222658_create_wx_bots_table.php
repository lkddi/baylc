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
        Schema::create('wx_bots', function (Blueprint $table) {
            $table->id();
            $table->string('wxid')->default('')->comment('WxId');
            $table->string('username')->nullable()->default('')->comment('名字');
            $table->string('wx_num')->nullable()->default('')->comment('个人微信号,企业微信为空');
            $table->string('robot_type')->nullable()->default('')->comment('是否为企业微信 个人微信0 企业微信1');
            $table->string('wx_headimgurl')->nullable()->default('')->comment('头像');
            $table->string('clientId')->nullable()->default('')->comment('个人微信是0 企业微信是客户ID');
            $table->integer('open')->default(1)->comment('状态');
            $table->integer('friend')->default(0)->comment('自动加好友');
            $table->integer('group')->default(0)->comment('自动加群');
            $table->integer('transfer')->default(0)->comment('自动接收转账');
            $table->string('apiurl')->nullable()->comment('接口地址');
            $table->string('token')->nullable();
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
        Schema::dropIfExists('wx_bots');
    }
};
