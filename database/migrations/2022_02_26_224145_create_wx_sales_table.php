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
        Schema::create('wx_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zt_company_id')->comment('公司id');
            $table->foreignIdFor(\App\Models\ZtStore::class)->constrained();
            $table->string('zt_store_code')->nullable()->comment('门店code');
            $table->string('model')->nullable()->comment('商品');
            $table->foreignIdFor(\App\Models\ZtProduct::class)->constrained();
            $table->integer('quantity')->default(0)->comment('数量');
            $table->integer('amount')->comment('提成');
            $table->integer('price')->comment('卖价');
            $table->string('user')->comment('促销员');
            $table->string('from_group')->comment('群id');
            $table->string('from_wxid')->comment('登记者');
            $table->string('wx_img_id')->comment('对应img id');
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
        Schema::dropIfExists('wx_sales');
    }
};
