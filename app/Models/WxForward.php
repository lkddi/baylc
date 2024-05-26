<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WxForward extends Model
{
    //消息转发
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(WxGroup::class, 'wxid', 'wxid');
    }
}
