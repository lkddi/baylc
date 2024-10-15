<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class WorkMessage extends Model
{
    use HasDateTimeFormatter;


    /**
     * 可批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'message_type',
        'message_data',
        'state'
    ];

}
