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
        Schema::create('stock_piles', function (Blueprint $table) {
            $table->id();
            $table->string('zt_store_code')->default(0)->comment('门店id');
//            $table->foreignIdFor(\App\Models\ZtSale::class)->constrained();
            $table->bigInteger('zt_product_id')->default(0)->comment('产品id');
//            $table->foreignIdFor(\App\Models\ZtProduct::class)->constrained();
            $table->integer('quantity')->default(0)->comment('库存');
            $table->integer('purchases')->default(0)->comment('进货数');
            $table->integer('sales')->default(0)->comment('销售数');
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
        Schema::dropIfExists('stock_piles');
    }
};
