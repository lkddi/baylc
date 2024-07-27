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
        Schema::create('zt_canal_types', function (Blueprint $table) {
            $table->id();
            $table->string('title',20);
            $table->string('code',20)->unique();
            $table->unsignedBigInteger('zt_company_id')->comment('公司id');
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
        Schema::dropIfExists('zt_canal_types');
    }
};
