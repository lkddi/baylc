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
        Schema::create('wx_work_wx_work_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wx_work_id');
            $table->unsignedBigInteger('wx_work_user_id');
            $table->timestamps();

        });

        // 添加外键约束
        Schema::table('wx_work_wx_work_user', function (Blueprint $table) {
            $table->foreign('wx_work_id')->references('id')->on('wx_works')->onDelete('cascade');
            $table->foreign('wx_work_user_id')->references('id')->on('wx_work_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wx_work_wx_work_user');
    }
};
