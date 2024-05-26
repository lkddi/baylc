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
        Schema::create('wx_imgs', function (Blueprint $table) {
            $table->id();
            $table->string('from_group',20)->comment('群id');
            $table->string('from_group_name',50)->comment('群名');
            $table->string('from_wxid',20)->comment('用户id');
            $table->string('from_name',50)->comment('用户名');
            $table->string('robot_wxid',20)->comment('机器人id');
            $table->string('user_id',20)->nullable()->comment('最后操作者');
            $table->string('img')->comment('img');
            $table->integer('state')->nullable()->default(0)->comment('状态');
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
        Schema::dropIfExists('wx_imgs');
    }
};
