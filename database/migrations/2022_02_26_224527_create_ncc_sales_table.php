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
        Schema::create('ncc_sales', function (Blueprint $table) {
            $table->id();
            $table->string('year',10)->nullable();
            $table->string('month',10)->nullable();
            $table->string('time',20)->nullable();
            $table->string('deptBigRegionName',20)->nullable()->comment('大区');
            $table->string('deptRegionName',20)->nullable()->comment('地区');
            $table->string('lishipianqu',20)->nullable()->comment('片区');
            $table->string('canalTypeName',40)->nullable()->comment('中台门店渠道');
            $table->string('client',100)->nullable()->comment('客户');
            $table->string('brand',20)->nullable()->comment('商品品牌');
            $table->string('pinlei')->nullable()->comment('商品品类');
            $table->string('xilie')->nullable()->comment('商品系列');
            $table->string('zixilie')->nullable()->comment('商品子系列');
            $table->string('model')->nullable()->comment('商品型号');
            $table->string('leixing')->nullable()->comment('商品类型');
            $table->string('zengpin')->nullable()->comment('是否赠品');
            $table->string('number')->nullable()->comment('实发数量');
            $table->string('hanshuidanjia')->nullable()->comment('含税单价');
            $table->string('hanshuijine')->nullable()->comment('含税金额');
            $table->string('shuilv')->nullable()->comment('税率');
            $table->string('yuefan')->nullable()->comment('月返');
            $table->string('danpinzhekou')->nullable()->comment('单品折扣');
            $table->string('hanshuizhekoue')->nullable()->comment('含税折扣额');
            $table->string('hanshuijxse')->nullable()->comment('含税净销售额');
            $table->string('wushuidanjia')->nullable()->comment('无税单价');
            $table->string('wushuijine')->nullable()->comment('无税金额');
            $table->string('wushuizke')->nullable()->comment('无税折扣额');
            $table->string('wushuijxse')->nullable()->comment('无税净销售额');
            $table->string('hanshuigle')->nullable()->comment('含税零供额');
            $table->string('kangkuleixing')->nullable()->comment('仓库类型');
            $table->string('chukucangku')->nullable()->comment('出货仓库');
            $table->string('user')->nullable()->comment('业务员');
            $table->string('type')->nullable()->comment('单据类型');
            $table->string('zhidanren')->nullable()->comment('制单人');
            $table->string('order')->nullable()->comment('订单号');
            $table->string('oedertime')->nullable()->comment('订单日期');
            $table->string('chuorder')->nullable()->comment('出库单号');
            $table->string('chutime')->nullable()->comment('出库单据日期');
            $table->string('shentime')->nullable()->comment('订单审批日期');
            $table->string('qiantime')->nullable()->comment('签字日期');
            $table->string('title')->nullable()->comment('商品名称');
            $table->string('shouhuokehu')->nullable()->comment('收货客户');
            $table->string('danjuqudao')->nullable()->comment('单据渠道');
            $table->string('retailName')->nullable()->comment('当前片区');
            $table->string('waibuhao')->nullable()->comment('外部号');
            $table->string('zuzhi')->nullable()->comment('组织');
            $table->string('beizhu')->nullable()->comment('备注');
            $table->string('shouhuodizhi')->nullable()->comment('收货地址');
            $table->string('gukedizhi')->nullable()->comment('顾客地址');
            $table->string('wuliugongsi')->nullable()->comment('配送物流公司');
            $table->string('tihuofangshi')->nullable()->comment('提货方式');
            $table->string('tuihuoleixing')->nullable()->comment('退货类型');
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
        Schema::dropIfExists('ncc_sales');
    }
};
