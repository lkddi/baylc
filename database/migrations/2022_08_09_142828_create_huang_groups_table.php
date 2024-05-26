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
        Schema::create('huang_groups', function (Blueprint $table) {
            $table->id();
            $table->string('wxid')->comment('微信id');
            $table->decimal('num',8,2)->nullable()->comment('公里数');
            $table->integer('state')->default(0)->comment('状态');
            $table->dateTime('rundate')->comment('跑步日期');
            $table->text('photo')->comment('图片');
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
        Schema::dropIfExists('huang_groups');
    }
};
