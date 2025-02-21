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
        Schema::create('zt_products', function (Blueprint $table) {
            $table->id();
//            $table->integer('zt_company_id')->comment('公司id');
            $table->string('title',50)->unique()->comment('型号');
            $table->string('model',20)->default('')->comment('型号简称');
            $table->integer('price')->default(0)->comment('商品价格');
            $table->integer('ticheng')->default(0)->comment('商品提成');
            $table->integer('offline')->default(1)->comment('产品是否下线');
            $table->bigInteger('product_brands_id');
            $table->bigInteger('product_seies_id');
            $table->bigInteger('product_classes_id');
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
        Schema::dropIfExists('zt_products');
    }
};
