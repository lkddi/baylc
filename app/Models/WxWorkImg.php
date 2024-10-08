<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;


class WxWorkImg extends Model
{
	use HasDateTimeFormatter;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];


    protected $table = 'wx_work_img';

}
