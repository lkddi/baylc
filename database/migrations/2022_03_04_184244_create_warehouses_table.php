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
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->integer('zt_stores_id')->comment('仓库id');
            $table->integer('zt_products_id')->comment('商品id');
            $table->integer('quantity')->default(0)->comment('数量');
            $table->integer('jinhuo')->default(0)->comment('进货总数量');
            $table->integer('nums')->default(0)->comment('销售数量');
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
        Schema::dropIfExists('warehouses');
    }
};
