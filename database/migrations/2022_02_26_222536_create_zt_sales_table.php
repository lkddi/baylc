<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zt_sales', function (Blueprint $table) {
            $table->id();
            $table->string('tid')->nullable()->comment('中台id');
            $table->integer('year')->nullable()->comment('年');//PUR_MACHINE_YEAR
            $table->integer('month')->nullable()->comment('月');//PUR_MACHINE_MONTH
            $table->string('date')->nullable()->comment('时间');//CREATIONDATE
            $table->string('retailBillCode')->nullable()->comment('销售单号');;
//            $table->string('saleTypeName')->nullable()->comment('销售类型');
            $table->string('retailTypeName')->nullable()->comment('销售方式');
            $table->string('zt_store_code')->nullable()->comment('门店编码');;
            $table->string('ownerShopName')->nullable()->comment('门店名');
            $table->string('model', 100)->nullable()->comment('型号');
            $table->string('customerZeroAmount', 100)->nullable()->comment('零售价');
            $table->string('unitPrice', 100)->nullable()->comment('卖价');
            $table->integer('amount')->nullable()->comment('数量');
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
        Schema::dropIfExists('zt_sales');
    }
};
