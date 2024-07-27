<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxWorkUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_work_user', function (Blueprint $table) {
            $table->id();
            $table->string('sender')->default('')->comment('用户id');
            $table->string('sender_name')->nullable()->comment('昵称');
            $table->string('zt_store_code')->nullable()->comment('门店编码');
            $table->tinyInteger('nostoremsg')->default('0')->nullable();
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
        Schema::dropIfExists('wx_work_user');
    }
}
