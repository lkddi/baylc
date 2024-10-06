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
        Schema::create('group_welcome_messages', function (Blueprint $table) {
            $table->id();
            $table->text('welcome_message')->nullable()->comment('欢迎消息');
            $table->tinyInteger('is_enabled')->default(1)->comment('是否启用');
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
        Schema::dropIfExists('group_welcome_messages');
    }
};
