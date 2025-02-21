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
        Schema::create('zt_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->comment('公司简称');
            $table->string('code', 200)->comment('编码');
            $table->string('title', 200)->comment('公司名称');
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
        Schema::dropIfExists('zt_companies');
    }
};
