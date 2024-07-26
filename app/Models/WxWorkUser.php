<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WxWorkUser extends Model
{
    use HasFactory;

    use HasDateTimeFormatter;
    protected $table = 'wx_work_user';

    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [

    ];

    protected $fillable = [
        // 其他已有的可填充属性
        'sender',
        'sender_name',
        'nostoremsg'
    ];
}
