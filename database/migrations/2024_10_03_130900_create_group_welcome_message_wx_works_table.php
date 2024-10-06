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
        Schema::create('group_welcome_message_wx_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_welcome_message_id');
            $table->unsignedBigInteger('wx_work_id');
            $table->timestamps();
            $table->foreign('group_welcome_message_id')
                ->references('id')->on('group_welcome_messages')
                ->onDelete('cascade');
            $table->foreign('wx_work_id')
                ->references('id')->on('wx_works')
                ->onDelete('cascade');

            // 确保每对 (group_welcome_message_id, wx_work_id) 是唯一的
            $table->unique(['group_welcome_message_id', 'wx_work_id'], 'group_welcome_message_wx_work_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_welcome_message_wx_works');
    }
};
