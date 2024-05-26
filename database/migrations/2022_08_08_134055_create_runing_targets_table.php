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
        Schema::create('runing_targets', function (Blueprint $table) {
            $table->id();
            $table->string('wxid')->comment('wxid');
            $table->decimal('target',8,2)->comment('目标');
            $table->dateTime('rundate')->comment('目标日期');
            $table->integer('state')->default(0)->comment('状态');
            $table->decimal('actual',8,2)->default(0)->comment('实际');
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
        Schema::dropIfExists('runing_targets');
    }
};
