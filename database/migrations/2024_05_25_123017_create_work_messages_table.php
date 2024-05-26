<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id')->nullable()->comment('id');
            $table->string('message_type')->nullable()->comment('类型');
            $table->json('message_data')->nullable()->comment('内容');
            $table->string('state')->default('0')->nullable()->comment('状态');
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
        Schema::dropIfExists('work_messages');
    }
}
