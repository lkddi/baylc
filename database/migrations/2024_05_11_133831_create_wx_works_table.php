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
        Schema::create('wx_works', function (Blueprint $table) {
            $table->id();
            $table->string('roomid',50)->unique()->comment('群id');
            $table->unsignedBigInteger('zt_company_id')->comment('公司id');
            $table->string('roomname',100)->nullable()->comment('群名');
            $table->integer('user')->default(0)->comment('登记用户');
            $table->integer('ischeck')->default(0)->comment('是否开启查库存');
            $table->integer('advance')->default(0)->comment('是否开启查推进');
            $table->integer('isadd')->default(0)->comment('是否开启登记');
            $table->integer('chat')->default(0)->comment('是否记录聊天');
            $table->integer('photo')->default(0)->comment('是否保存图片');
            $table->integer('kucun')->default(0)->comment('是否减库存');
            $table->tinyInteger('ai')->default(0)->comment('是否ai');
            $table->tinyInteger('manualControl')->default(0)->comment('手动增加');
//            $table->string('retailCode')->nullable()->comment('片区id');
//            $table->string('retailName')->nullable()->comment('片区');
//            $table->string('deptRegionCode')->nullable()->comment('地区id');
//            $table->string('deptRegionName')->nullable()->comment('地区');
//            $table->string('deptBigRegionCode')->nullable()->comment('大区id');
//            $table->string('deptBigRegionName')->nullable()->comment('大区');
            $table->string('new')->default(0)->nullable()->comment('更新');
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
        Schema::dropIfExists('wx_works');
    }
};
