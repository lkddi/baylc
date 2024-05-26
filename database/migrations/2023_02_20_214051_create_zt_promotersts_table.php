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
        Schema::create('zt_promotersts', function (Blueprint $table) {
            $table->id();
            $table->string('ztid')->comment('系统id');
            $table->string('code')->comment('编号')->unique();
            $table->string('name')->comment('名字');
            $table->string('terminalsupplierCode')->nullable()->comment('客户编号');
            $table->string('terminalsupplierName')->nullable()->comment('客户名称');
            $table->string('storecodeCode')->nullable()->comment('门店编号');
            $table->string('storecodeName')->nullable()->comment('门店名称');
            $table->string('retailCode')->nullable()->comment('片区名称');
            $table->string('retailName')->nullable()->comment('片区名称');
            $table->string('departmentSecLevelCode')->nullable()->comment('区域编号');
            $table->string('departmentSecLevelName')->nullable()->comment('区域名称');
            $table->string('departmentStairCode')->nullable()->comment('大区编号');
            $table->string('departmentStairName')->nullable()->comment('大区名称');
            $table->string('tel')->comment('电话');
            $table->string('state')->comment('状态 1正常，0未审核 3审核通过');
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
        Schema::dropIfExists('zt_promotersts');
    }
};
