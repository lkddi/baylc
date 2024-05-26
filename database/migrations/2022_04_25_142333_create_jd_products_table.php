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
        //京东产品列表
        Schema::create('jd_products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->comment('sku');
            $table->string('model')->comment('型号');
            $table->string('title')->nullable()->comment('标题');
            $table->string('code')->nullable()->comment('中台编码');
            $table->string('goodsSeriesCode')->nullable()->comment('系列id');
            $table->string('goodsSeriesName')->nullable()->comment('系列名');
            $table->string('goodsSeriesSonCode')->nullable()->comment('系列-分类id');
            $table->string('goodsSeriesSonName')->nullable()->comment('系列-分类名');
            $table->integer('order')->default(0)->comment('排序');
            $table->tinyInteger('show')->default(1)->comment('显示');
            $table->string('listedPrice')->comment('挂牌价');
            $table->string('tokenPrice')->comment('令牌价');
            $table->string('thumbnail')->nullable()->comment('缩略图');

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
        Schema::dropIfExists('jd_products');
    }
};
