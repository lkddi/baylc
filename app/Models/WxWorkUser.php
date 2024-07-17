<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class WxWorkUser extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'wx_work_user';

    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
}
