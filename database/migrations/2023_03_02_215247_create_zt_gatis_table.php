<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 加提 提成 带单
     * @return void
     */
    public function up()
    {

        Schema::create('zt_gatis', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('zt_company_id')->comment('公司id');
            $table->foreignIdFor(\App\Models\ZtCompany::class)->constrained()->comment('公司id');
            $table->unsignedBigInteger('wx_work_id')->nullable()->comment('企业群id');
            $table->integer('gati')->nullable()->default(0)->comment('加提');
            $table->integer('percentage')->nullable()->default(0)->comment('提成');
            $table->foreignIdFor(\App\Models\ZtProduct::class)->constrained();
            $table->string('model')->default(0)->comment('型号');
            $table->timestamp('starttime')->comment('开始时间');
            $table->timestamp('endtime')->comment('结束时间');
            $table->tinyInteger('state')->default(0)->comment('状态');
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
        Schema::dropIfExists('zt_gatis');
    }
};
