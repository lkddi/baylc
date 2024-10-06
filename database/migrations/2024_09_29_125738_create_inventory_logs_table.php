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
        Schema::create('inventory_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zt_products_id');
            $table->foreign('zt_products_id')->references('id')->on('zt_products')->onDelete('cascade');
            $table->unsignedBigInteger('zt_stores_id')->comment('客户id');
            $table->foreign('zt_stores_id')->references('id')->on('zt_stores')->onDelete('cascade');
            $table->enum('type', ['in', 'out']); // 'in' 表示进货，'out' 表示销售
            $table->integer('quantity')->default(0); // 变动的数量
            $table->string('description')->nullable()->comment('备注');
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
        Schema::dropIfExists('inventory_logs');
    }
};
