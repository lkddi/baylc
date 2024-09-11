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
        Schema::create('wx_user_lists', function (Blueprint $table) {
            $table->id();
            $table->string('acctid')->nullable()->comment('企业微信id');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('conversation_id')->nullable()->comment('id');
            $table->string('corp_id')->nullable()->comment('企业id');
            $table->string('mobile')->nullable()->comment('手机号');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('position')->nullable()->comment('职位');
            $table->string('realname')->nullable()->comment('真实姓名');
            $table->string('remark')->nullable()->comment('备注');
            $table->tinyInteger('sex')->nullable()->comment('性别');
            $table->string('unionid')->nullable()->comment('unionid');
            $table->string('user_id')->index()->nullable()->comment('user_id');
            $table->string('username')->nullable()->comment('用户名');

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
        Schema::dropIfExists('wx_user_lists');
    }
};
