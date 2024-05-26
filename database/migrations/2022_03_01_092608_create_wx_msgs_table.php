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
        Schema::create('wx_msgs', function (Blueprint $table) {
            $table->id();
            $table->string('sdkVer',2)->comment('版本号');
            $table->string('Event',20)->comment('事件');
            $table->string('robot_wxid',20)->comment('机器人id');
            $table->string('type',20)->nullable()->comment('类型 // 1/文本消息 3/图片消息 34/语音消息  42/名片消息  43/视频 47/动态表情 48/地理位置  49/分享链接  2001/红包  2002/小程序  2003/群邀请 更多请参考常量表');
            $table->string('from_group',20)->nullable()->comment('群id');
            $table->string('from_group_name',100)->nullable()->comment('群名');
            $table->string('from_wxid',20)->nullable()->comment('用户id');
            $table->string('from_name',20)->nullable()->comment('用户');
            $table->text('msg')->comment('内容');
            $table->text('msg_source')->nullable()->comment('附带JSON属性（群消息有艾特人员时，返回被艾特信息）');
            $table->string('clientid',20)->nullable()->comment('企业微信可用');
            $table->string('robot_type',20)->nullable()->comment('来源微信类型 0 正常微信 / 1 企业微信');
            $table->string('msg_id',20)->nullable()->comment('消息ID');

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
        Schema::dropIfExists('wx_msgs');
    }
};
