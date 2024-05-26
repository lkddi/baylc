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
        Schema::create('zt_stores', function (Blueprint $table) {
            $table->id();
            $table->string('name',200)->comment('门店');
            $table->string('facadeShort',200)->comment('门店简称');
            $table->string('warehouseName',200)->comment('门店名称');
            $table->string('code',10)->unique()->comment('中台id');
            $table->string('canalCategoryCode',10)->unique()->comment('渠道编号');
            $table->string('canalCategoryName',10)->unique()->comment('渠道名称');
            $table->integer('isEnable')->nullable()->default(1)->comment('是否启用');
            $table->string('retailCode')->nullable()->comment('片区id');
            $table->string('retailName')->nullable()->comment('片区');
            $table->string('deptRegionCode')->nullable()->comment('地区id');
            $table->string('deptRegionName')->nullable()->comment('地区');
            $table->string('deptBigRegionCode')->nullable()->comment('大区id');
            $table->string('deptBigRegionName')->nullable()->comment('大区');
            $table->string('riscode')->nullable()->comment('RIS门店编码');
            $table->string('storename')->nullable()->comment('客户系统门店名称');
            $table->string('storecode')->nullable()->comment('客户系统门店编码');
            $table->string('zid')->nullable()->comment('中台id');
            $table->string('provinceName')->nullable()->comment('省');
            $table->string('cityName')->nullable()->comment('市');
            $table->string('countyName')->nullable()->comment('区县');
            $table->string('townName')->nullable()->comment('镇');
            $table->string('ext23')->nullable()->comment('归属客户');
//            $table->string('title',100)->nullable()->comment('简称');
            $table->integer('advance')->nullable()->default(0)->comment('是否启用推进');
//            $table->string('canalTypeName')->nullable()->comment('中台门店渠道');
//            $table->string('canalTypeCode')->nullable()->comment('中台门店渠道id');

            $table->integer('new')->default(0)->nullable()->comment('更新键值');

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
        Schema::dropIfExists('zt_stores');
    }
};
