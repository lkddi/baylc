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
        Schema::create('wx_users', function (Blueprint $table) {
            $table->id();
            $table->string('name',20)->nullable()->comment('真实姓名');
            $table->string('nickname',30)->default('')->comment('名字');
            $table->string('wxid',50)->default('')->comment('WxId');
            $table->unsignedBigInteger('wx_group_id')->nullable()->comment('group_wxid');
            $table->unsignedBigInteger('zt_store_id')->nullable()->comment('门店id');
            $table->unsignedTinyInteger('nostoremsg')->nullable()->comment('门店绑定不提醒');
            $table->tinyInteger('admin')->default(0)->comment('群管');
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
        Schema::dropIfExists('wx_users');
    }
};
